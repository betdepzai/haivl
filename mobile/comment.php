<?php
// +-------------------------------------------------------------------------+
// | Mobile Melody Plug-in for PHP Melody ( www.phpsugar.com )
// +-------------------------------------------------------------------------+
// | MOBILE MELODY IS NOT FREE SOFTWARE
// | If you have downloaded this software from a website other
// | than www.phpsugar.com or if you have received
// | this software from someone who is not a representative of
// | phpSugar, you are involved in an illegal activity.
// | ---
// | In such case, please contact: support@phpsugar.com.
// +-------------------------------------------------------------------------+
// | Developed by: phpSugar (www.phpsugar.com) / support@phpsugar.com
// | Copyright: (c) 2004-2015 PhpSugar.com. All rights reserved.
// +-------------------------------------------------------------------------+

session_start();
require('../config.php');
require_once('../include/functions.php');
require_once('../include/user_functions.php');
require_once('../include/islogged.php');
$message = '';

if ($config['comment_system'] == 'off')
{
	echo json_encode(array("cond" => false, "msg" => $lang['comments_disabled']));
	exit();
}

if (($logged_in == 1) || ($logged_in == 0 && $config['guests_can_comment'] == 1)) 
{
	
	$vid = secure_sql($_POST['vid']);
	$ip = secure_sql($_SERVER['REMOTE_ADDR']);
	
	if ($vid) 
	{
		if (strpos($vid, 'article-') !== false && $config['mod_article'] == '1')
		{
			$article_id = (int) str_replace('article-', '', $vid);
			$item = get_article($article_id); 
		}
		else if ($config['mod_article'] != '1')
		{
			echo json_encode(array("cond" => false, "msg" => $lang['comments_disabled']));
			exit();
		}
		else
		{
			$item = request_video($vid);
		}
		
		if ($item['restricted'] == '1')
		{
			echo json_encode(array("cond" => false, "msg" => sprintf($lang['must_sign_in'], _URL."/login."._FEXT, _URL."/register."._FEXT)));
			exit();
		}
		
		if ($item['allow_comments'] == 0)
		{
			echo json_encode(array("cond" => false, "msg" => $lang['comments_disabled']));
			exit();
		}
		
		if ($logged_in == 1)
		{
			$user = $userdata['username'];
			$user_id = $userdata['id'];
		} 
		else 
		{
	
			$user = trim($_POST['username']);
			$user = strip_tags($user);
			$user = specialchars($user, 1);
			$user = secure_sql($user);
			$user_id = $_POST['user_id'];
			
			
	
			
			
			if($user == '')
			{
				$message = json_encode(array("cond" => false, "msg" => $lang['comment_msg1']));
				echo $message;
				exit();
			}
			else
			{
				$sql = "SELECT username FROM pm_users WHERE power = '".U_ADMIN."'";
				$result = mysql_query($sql);
				$username_found = 0;
				if($result)
				{	
					$row = "";
					while($row = mysql_fetch_assoc($result))
					{
						if(strcmp(strtolower($user), strtolower($row['username'])) == 0)
						{
							$username_found = 1;
							break;
						}
					}
				}
				if($username_found)
				{
					$message = json_encode(array("cond" => false, "msg" => $lang['comment_msg7']));
					echo $message;
					exit();
				}
				mysql_free_result($result);
			}
		}
		
		$added = time();
		// ** PREP THE COMMENT FOR MYSQL OR REMOVE IT IF IT'S SPAM ** //
		$comment = trim($_POST['comment_txt']);
		$comment = nl2br($comment);
		$comment = @removeEvilTags($comment);
		$comment = @secure_sql($comment);
		if ($comment == '')
		{
			$message = json_encode(array("cond" => false, "msg" => $lang['comment_msg2']));
			echo $message;
			exit();
		}
		$comment = word_wrap_pass($comment);
		if ($logged_in == 0)
		{
			//	Check captcha code
			include ("../include/securimage.php");
			$img = new Securimage();
			$valid_captcha = $img->check($_POST['captcha']);
			if( !$valid_captcha && $_POST['captcha'] != '') 
			{
				$message = json_encode(array("cond" => false, "msg" => $lang['register_err_msg1']));
				echo $message;
				exit();
			}
			elseif( $_POST['captcha'] == '')
			{
				$message = json_encode(array("cond" => false, "msg" => $lang['type_captcha']));
				echo $message;
				exit();
			}
		}
		// check for duplicate comments/spam
		$query = @mysql_query("SELECT id FROM pm_comments WHERE uniq_id = '".$vid."' AND user_id = '".$user_id."' AND comment LIKE '".$comment."' AND user_ip = '".$ip."'");
		$count = @mysql_num_rows($query);
		
		if ($count >= 1) 
		{
			$message = json_encode(array("cond" => false, "msg" => $lang['comment_msg3']));
		}
		else if ($count == 0 && !empty($comment)) 
		{
			$sql = "INSERT INTO pm_comments SET uniq_id = '".$vid."', username = '".$user."', comment = '".$comment."', user_ip = '".$ip."', added = '".$added."', user_id = '".$user_id."'";
			if($config['comm_moderation_level'] == MODERATE_ALL)
			{
				$sql .= ", approved = '0'";
			}
			else if (($config['comm_moderation_level'] == MODERATE_GUESTS) && ($logged_in == 0))
			{
				$sql .= ", approved = '0'";
			}
			else
			{	//	no moderation or the user is logged in;
				$sql .= ", approved = '1'";
			}
						
			$result = @mysql_query($sql);
	
			if ( ! $result)
			{
				$message = json_encode(array("cond" => false, "msg" => $lang['comment_msg4']));
			}
			else
			{
				if (($config['comm_moderation_level'] == MODERATE_ALL) || (($config['comm_moderation_level'] == MODERATE_GUESTS) && ($logged_in == 0)))
				{
					$message = json_encode(array("cond" => true, "msg" => $lang['comment_msg5']));
				}
				else
				{
					//	preview comment
					$prev_user = $user;
					if ($user_id == 0)
					{
						$prev_user = '<div class=\"comment-author\">'.$user.'</div>';
						$avatar_url = _URL."/"._UPFOLDER."/avatars/no_avatar.gif";
					}
					else if ($user_id > 0)
					{
						$q = @mysql_query("SELECT gender, avatar FROM pm_users WHERE id = '".$user_id."'");
						$u = @mysql_fetch_array($q);
						if(empty($u['avatar']) || $u['avatar'] == 'no_avatar.gif')
						{
							$avatar_url = _URL."/"._UPFOLDER."/avatars/".$u['gender'].".gif";
						} 
						else 
						{
							$avatar_url = _URL."/"._UPFOLDER."/avatars/".$u['avatar'];
						}
						$prev_user = "<div class=\"comment-author\"><a href=\""._URL."/profile."._FEXT."?u=".$prev_user."\" rel=\"nofollow\">".$prev_user."</a></div>";
					}
					
					$avatar_url = '<img src="'.$avatar_url.'" alt="'.$user.'" border="0" width="48" height="48" class="avatar_img" />';
					
					$added = "";
					$added .= time_since(time());
					$added .= " ".$lang['ago']."";
					$comment = str_replace('\n', "", $comment);
					$comment = stripslashes($comment);
					
					$html = '<div class="comment-head">'.$avatar_url.' '.$prev_user.' <div class="comment-date">'.$added.'</div></div>'.$comment;
					
					$message = json_encode(array("cond" => true,
												 "msg" => $lang['comment_msg6'], 
												 "preview" => true,
												 "html" => $html
											));
				}
			}
			//	set a cookie to remember this guest
			if ($logged_in != 1 && $_COOKIE[COOKIE_AUTHOR] == '' || (strcmp($_COOKIE[COOKIE_AUTHOR], specialchars($user)) != 0))
			{
				//setcookie(COOKIE_AUTHOR, specialchars($user), time() + COOKIE_TIME, COOKIE_PATH);
			}
		}
	} 
	else 
	{
		$message = json_encode(array("cond" => false, "msg" => $lang['comment_msg4']));
	}
}
else 
{
	exit;
}
echo $message;
exit();
?>