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
@header( 'Expires: Wed, 11 Jan 1984 05:00:00 GMT' );
@header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
@header( 'Cache-Control: no-cache, must-revalidate, max-age=0' );
@header( 'Pragma: no-cache' );

$page_type = 'video';
include('settings.php');
include(ABSPATH . 'lang/english.php');

$meta_title = $lang['edit_profile']." - "._SITENAME;
include('header.php');

if( ! is_user_logged_in() )
{
	header("Location: "._URL. "/index."._FEXT);
	exit();
}
if($logged_in)
{
	$query = mysql_query("SELECT * FROM pm_users WHERE id = '".$userdata['id']."'");
	$rows = mysql_num_rows($query);
	$r = mysql_fetch_array($query);
	mysql_free_result($query);

	if($rows == 0)
	{
		header("Location: "._URL."");
		exit();
	}
	$userdata['about'] = str_replace("<br />", "\n", $userdata['about']);

	if(isset($_POST['save']))
	{
		$errors 	= array();
		$links 		= array();
		$link_patterns	= array('facebook' => '#facebook\.#',
								'twitter' => '#twitter\.com\/#',
								'lastfm' => '#last\.fm\/#');
		$nr_errors	= 0;
		$success 	= 0;

		$aboutme	= $_POST['aboutme'];
		$pass		= md5($_POST['pass']);
		$new_pass	= $_POST['new_pass'];
		$email		= trim($_POST['email']);
		$name		= trim($_POST['name']);
		$gender		= secure_sql($_POST['gender']);
		$country	= secure_sql( (int) $_POST['country']);
		$favorite	= secure_sql( (int) $_POST['favorite']);
		$links['website']	= trim($_POST['website']);
		$links['facebook']	= trim($_POST['facebook']);
		$links['twitter']	= trim($_POST['twitter']);
		$links['lastfm']	= trim($_POST['lastfm']);

		$inputs = array();
		foreach($_POST as $key => $val)
		{
			$val = trim($val);
			$val = specialchars($val, 1);
			$inputs[$key] = $val;
		}
		
		if(isset($aboutme))
		{
			$aboutme = removeEvilTags($aboutme);
			$aboutme = word_wrap_pass($aboutme);
			$aboutme = secure_sql($aboutme);
			$aboutme = specialchars($aboutme, 1);
			$aboutme = str_replace('\n', "<br />", $aboutme);
		}
		if(strcmp($name, $userdata['name']) != 0)
		{
			$name = removeEvilTags($name);
			$name = secure_sql($name);
			$name = specialchars($name, 1);
		}
		else
		{
			$name = secure_sql($userdata['name']);
			$name = specialchars($name, 0);
		}
		if ( ! in_array($gender, array('male', 'female')))
		{
			$gender = '';
		}

		$email_validation = validate_email($email);

		switch($email_validation)
		{
			case 1:
				$errors['email'] = $lang['register_err_msg2'];
			break;
			case 2:
				if( strcmp($email, $userdata['email']) != 0 )
					$errors['email'] = $lang['register_err_msg3'];
			break;
		}

		if(strcmp($pass, $userdata['password']) != 0)
		{
			$errors['pass'] = $lang['ep_msg6'];
		}
		if($country == -1 || $country == '')
		{
			$errors['country'] = $lang['ep_msg7'];
		}
/* 	/*editme; fix this; 
		Issue: edit_profile has problem with https:// links
		foreach ($links as $k => $v)
		{
			if (strlen($v) > 0 && strpos($v, "http://") === false)
			{
				$links[$k] = "http://". $v;
			}
		}
*/
		foreach ($link_patterns as $field => $pattern)
		{
			if (strlen($links[$field]) > 0)
			{
				if ( ! preg_match($pattern, $links[$field]))
				{
					$errors[$field] = $lang['profile_msg_social_link'];
				}
			}
		}

		$nr_errors = count($errors);
		if( $nr_errors == 0 )
		{
			foreach ($links as $k => $v)
			{
				$links[$k] = htmlspecialchars($v);
				$links[$k] = secure_sql($links[$k]);
			}

			$sql = "UPDATE pm_users SET ";

			if($new_pass != '')
			{
				$sql .= "password = '".md5($new_pass)."', ";
			}
			$sql .= "name = '".$name."', gender = '".$gender."', country = '".$country."', email = '".$email."', about = '".$aboutme."', favorite = '".$favorite."'";
			$sql .= ", website = '". $links['website'] ."', facebook = '". $links['facebook'] ."' ";
			$sql .= ", twitter = '". $links['twitter'] ."', lastfm = '". $links['lastfm'] ."' ";
			
			$sql .= " WHERE id = '".$userdata['id']."'";
			$result = @mysql_query($sql);
			

			if( !$result )
			{
				$errors['failure'] = $lang['ep_msg8'];
				$success = 0;
			}
			else
			{
				$success = 1;
			}
		}
		else
		{
			$success = 0;
		}
		if( $new_pass != '' )
		{
			$info_msg = '<ul class="alerts-success"><li>'. $lang['ep_msg2'] .'</li></ul>';
		}
	}
}

?>
<div id="welcome">
	<div><?php echo $lang['edit_profile']; ?></div>

<?php
if($errors) {
	echo "<ul class='alerts-warning'>";
	foreach ($errors as $msg_error) {
		echo "<li>".$msg_error."</li>\n";
	}
	echo "</ul>";
} 
if($info_msg) {
	echo $info_msg;
}
?>
</div>
<div id="content">
<?php
if ($config['allow_registration'] == '1')
{
	if($success != 1) 
	{

?>

		<form class="login" name="form" id="register-form" method="post" action="profile-edit.php" enctype="multipart/form-data">
		  <fieldset>
		    <legend><?php echo $lang['about_me']; ?></legend>
		    <div class="control-group">
		      <div class="controls"><input type="text" class="inputtext" name="name" value="<?php if(isset($inputs['name'])) echo $inputs['name']; else echo $userdata['name']; ?>"></div>
		    </div>
		    <div class="control-group">
		      <div class="controls">
		      <input type="text" class="inputtext" name="email" value="<?php if(isset($inputs['email'])) echo $inputs['email']; else echo $userdata['email']; ?>">
		      </div>
		    </div>
		    <div class="control-group">
		      <label class="control-label" for="favorite"><?php echo $lang['my_favorites'];?></label>
		      <div class="controls">
		      <select name="favorite">
				<option value="1" <?php if(isset($userdata['favorite']) && $userdata['favorite'] == 1) echo 'selected="selected"'; else echo 'checked'; ?>><?php echo $lang['public'];?></option>
				<option value="0" <?php if(isset($userdata['favorite']) && $userdata['favorite'] == 0) echo 'selected="selected"'; else echo 'checked'; ?>><?php echo $lang['private'];?></option>
		      </select>
		      </div>
		    </div>
		    <div class="control-group">
		      <label class="control-label" for="gender"><?php echo $lang['gender'];?></label>
		      <div class="controls">
		      <select name="gender">
				<option value="male" <?php if(isset($userdata['gender']) && $userdata['gender'] == 'male') echo 'selected="selected"'; else echo 'checked'; ?>><?php echo $lang['male'];?></option>
				<option value="female" <?php if(isset($userdata['gender']) && $userdata['gender'] == 'female') echo 'selected="selected"'; else echo 'checked'; ?>><?php echo $lang['female'];?></option>
		      </select>
		      </div>
		    </div>
		    <div class="control-group">
		    <label><?php echo $lang['about_me'];?></label>
		      <div class="controls"><textarea name="aboutme" class="inputtext"><?php if(isset($userdata['about']))  echo $userdata['about']; else echo $userdata['about_me']; ?></textarea></div>
		    </div>
		  </fieldset>

		  <fieldset>
		    <legend><?php echo $lang['_social'];?></legend>
		    <div class="control-group">
		      <label class="control-label" for="website"><?php echo $lang['profile_social_website'];?></label>
		      <div class="controls"><input type="text" class="inputtext" name="website" value="<?php if(isset($inputs['website']))  echo $inputs['website']; else echo $userdata['website'] ?>" placeholder="http://"></div>
		    </div>
		    <div class="control-group">
		      <label class="control-label" for="facebook"><?php echo $lang['profile_social_fb'];?></label>
		      <div class="controls"><input type="text" class="inputtext" name="facebook" value="<?php if(isset($inputs['facebook']))  echo $inputs['facebook']; else echo $userdata['facebook'] ?>" placeholder="http://"></div>
		    </div>
		    <div class="control-group">
		      <label class="control-label" for="twitter"><?php echo $lang['profile_social_twitter'];?></label>
		      <div class="controls"><input type="text" class="inputtext" name="twitter" value="<?php if(isset($inputs['twitter']))  echo $inputs['twitter']; else echo $userdata['twitter'] ?>" placeholder="http://"></div>
		    </div>
		  </fieldset>

		  <fieldset>
		    <legend><?php echo $lang['change_pass'];?></legend>
		    <div class="control-group error">
		      <label class="control-label" for="pass"><?php echo $lang['existing_pass'];?></label>
		      <div class="controls"><input type="password" class="inputtext" name="pass" maxlength="32"></div>
		    </div>
		    <div class="control-group">
		      <label class="control-label" for="new_pass"><?php echo $lang['new_pass'];?></label>
		      <div class="controls">
		      <input type="password" class="inputtext" name="new_pass" maxlength="32">
		      <p class="help-block"><small><?php echo $lang['ep_msg5'];?></small></p>
		      </div>
		    </div>
		    
		    <div class="">
		        <div class="controls">
		        <button type="submit" name="save" value="<?php echo $lang['submit_save'];?>" class="submit border2"><?php echo $lang['submit_save'];?></button>
		        </div>
		    </div>
		  </fieldset>
		</form>

	<?php
	} elseif($success == 1) {
	?>
	<div id="logged_redirect" class="border4">
		<div align="center"><?php echo str_replace("%s", "index.php", $lang['login_msg15']); ?></div>
		</div>
	<meta http-equiv="refresh" content="1;URL=profile-edit.php" />
	<?php
	}
}
?>
</div>
<?php
include('footer.php');
?>