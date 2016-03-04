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
$page_type = 'video';
include('settings.php');

$unique_id = magicSlashes($_GET['vid']);
$video_is_restricted = false;

//Chinh sua by anhtai
$taisql = mysql_query("SELECT video_slug FROM pm_videos WHERE uniq_id = '". $unique_id ."'");
$video_slug = mysql_fetch_array($taisql);



if ( ! empty($unique_id) && strlen($unique_id) < 10) 
{
	$video = request_video($unique_id);
	$sql = mysql_query("SELECT added FROM pm_videos WHERE uniq_id = '". $unique_id ."'");
	$added_date = mysql_fetch_array($sql);
	
	$category_name = make_cats_mobi('pm_categories', $video['category']);
	$now = time();
	if(strstr($video['category'], ",")) 
	{
		$temp = explode(",", $categories);
		$categories = trim($temp[0]);
	} else {
		$categories = $video['category'];
	}
			
	if ( ! $video_is_restricted && update_view_count_mobi($video['id'])) // @since 1.6.5
	{
		add_to_chart($video['uniq_id']);
	}

if($video == 0) { 
		header("Location: ". _URL_MOBI ."/index."._FEXT);
		exit;
	}
} else {
		header("Location: ". _URL_MOBI ."/index."._FEXT);
		exit;
}

$comments_no = ($video['allow_comments'] == 1) ? count_entries('pm_comments', 'uniq_id', $unique_id) : 0;

$meta_title = $video['video_title'];
include('header.php');
?>
<div id="video_player">
	<h1 style="margin-top:15px;color:#3c3c3c"><?php echo $video['video_title']; ?></h1>
	<div class="video_details"><div id="fb-root"></div>

	<strong><?php echo $lang['articles_by'] ." ". $video['submitted']; ?></strong> <span class="added_date"><?php echo time_since($added_date[0])." ". $lang['ago']; ?></span> <span class="video_views border2"><?php echo pm_number_format_mobi($video['site_views']); ?> xem</span>
	</div>
	<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="mbfacebook"><div class="fb-like" data-href="<?php echo urldecode(makevideolink($video['uniq_id'], $video['video_title'], $video['video_slug'])); ?>" data-width="150" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div></div>
<?php if ($video['restricted'] == '1' && ! $logged_in) : ?>
	<div class="video_details">
		<?php echo $lang['restricted_sorry']; ?>
		<br /><br />
		<?php echo $lang['restricted_register']; ?>
		<form action="<?php echo _URL_MOBI;?>/signin.php" method="post" name="login_form" class="login" autocomplete="off">
		<input name="username" type="email" size="15" class="inputtext" placeholder="<?php echo $lang['your_username_or_email'];?>" autofocus="autofocus" />
		<input name="pass" type="password" size="15" class="inputtext" placeholder="<?php echo $lang['password'];?>" />
		<input type="hidden" name="ref" value="<?php echo '/watch.php?vid='. $video['uniq_id']; ?>" />
		<button class="submit border2" name="Login"><?php echo $lang['login']; ?></button>
		</form>
	</div>
<?php else : ?>
<!---->
<?php
if ($config['total_preroll_ads'] > 0)
{
	if (isset($_COOKIE[COOKIE_PREROLLAD]) && strlen($_COOKIE[COOKIE_PREROLLAD]) > 0)
	{
		$display_preroll_ad = false;
	}
	
	if ( ! $video)
	{
		$preroll_ad_data = get_preroll_ad();
		
		if (is_array($preroll_ad_data))
		{
			$display_preroll_ad = true;

			$preroll_ad_data['timeleft_start'] = ($preroll_ad_data['duration'] > 60) ? sec2hms($preroll_ad_data['duration']) : $preroll_ad_data['duration'];
			$preroll_ad_player_uniq_id = $video['uniq_id'];
			$preroll_ad_player_page = $page;
		}
		else
		{
			$display_preroll_ad = false;
		}
		return $preroll_ad_data;
	}

	//
	$sql_where = $sql = '';
	$sql_where .= (is_array($userdata) && $userdata['id'] != 0) ? " (user_group = '0' OR user_group = '1') " : " (user_group = '0' OR user_group = '2') "; // 0 = everyone; 1 = logged only; 2 = guests only
	$sql_where .= ($sql_where != '') ? ' AND ' : '';
	$sql_where .= " status = '1' ";
	
	$sql = "SELECT * FROM pm_preroll_ads WHERE $sql_where ";
	
	if ( ! $result = mysql_query($sql))
	{
		$display_preroll_ad = false;
	}

	$categories = explode(',', $video['category']);
	
	$units = array();
	while ($row = mysql_fetch_assoc($result))
	{
		$options = array();
		if (strlen($row['options']) > 0)
		{
			$options = (array) unserialize($row['options']);
		}
		
		if (count($options['ignore_source']) > 0)
		{
			if (in_array($video['source_id'], $options['ignore_source']))
			{
				continue;
			}
		}
		
		if (count($options['ignore_category']) > 0)
		{
			$found = false; 
			foreach ($options['ignore_category'] as $k => $ignore_cat_id)
			{
				if (in_array($ignore_cat_id, $categories))
				{
					$found = true;
					break;
				}
			}
			
			if ($found)
			{
				continue;
			}
		}

		$units[] = array_merge($row, $options);
		unset($options);
	}
	mysql_free_result($result);

	$units_count = count($units);
	
	if ($units_count == 0)
	{
		$display_preroll_ad = false;
	}
	
	$rand = rand(0, $units_count-1);
	$preroll_ad_data = $units[$rand];
	
	$display_preroll_ad = true;
	$preroll_ad_data['timeleft_start'] = ($preroll_ad_data['duration'] > 60) ? sec2hms($preroll_ad_data['duration']) : $preroll_ad_data['duration'];
	$preroll_ad_player_uniq_id = $video['uniq_id'];
	$preroll_ad_player_page = $page;
}
?>

<?php if($display_preroll_ad == true) { ?>
<div id="preroll_placeholder" class="border-radius4">
	<div class="preroll_countdown">
	<?php echo $lang['preroll_ads_timeleft']; ?> <span class="preroll_timeleft"><?php echo $preroll_ad_data['timeleft_start']; ?></span>
	</div>
	<?php echo $preroll_ad_data['code']; ?>

	<?php if($preroll_ad_data['skip']) : ?>
		<div class="preroll_skip_countdown">
		   <?php echo $lang['preroll_ads_skip_msg']; ?> <span class="preroll_skip_timeleft"><?php echo $preroll_ad_data['skip_delay_seconds']; ?></span>
		</div>
		<div class="preroll_skip_button">
		<button class="btn btn-blue hide" id="preroll_skip_btn"><?php echo $lang['preroll_ads_skip']; ?></button>
		</div>
	<?php endif; ?>
	
	<?php if($preroll_ad_data['preroll_ad_data'] == 0) : ?>
		<img src="<?php echo _URL; ?>/ajax.php?p=stats&do=show&aid=<?php echo $preroll_ad_data['id']; ?>&at=<?php echo _AD_TYPE_PREROLL; ?>" width="1" height="1" border="0" />
	<?php endif; ?>
</div>
<?php 
} else { 
	include('player.php');
}
?>
<!---->
<?php endif; ?>
</div>

<?php echo show_mm_ad("mobile_video"); // ad after the video ?>

<div id="content">
    <div id="share">
	<?php if($config['show_addthis_widget'] == 1) { ?>
	<div class="fb-like" data-href="<?php echo urldecode(makevideolink($video['uniq_id'], $video['video_title'], $video['video_slug'])); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
    <?php } ?>
    </div>
	<?php if(!empty($video['description'])) { ?>
	<div id="video_description">
		<p class="description_txt">
		<?php echo $video['description']; ?>
		</p>
	</div>
	<?php } ?>

	<div id="related_categories">
		<strong><?php echo $lang['related_cats']; ?></strong>: <?php echo $category_name; ?>
	</div>

	<ul class="idTabs"> 
	<li id="btn_blue"><a href="#related"><?php echo $lang['tab_related']; ?></a></li>
	<?php if ($video['allow_comments'] == 1) : ?>
	<li id="btn_blue"><a href="#comments"><?php echo $lang['comments']; ?> (<?php echo $comments_no; ?>)</a></li>
	<?php endif;?>
	</ul>

	<div id="related">
		<ul id="video_listing">
		<?php
		$related_videos = mobi_get_related_video_list(explode(',', $video['category']), $video['video_title'], _RELATED_LIMIT, $video['id']);
		if (count($related_videos) > 0)
		{
			foreach ($related_videos as $k => $video_data)
			{
				echo videoLI($video_data);
			}
		}
		?>
		</ul>
	</div>
	<div id="divider" class="new_videos">Clip hot mới nhất</div>
	<?php echo show_mm_ad("mobile_video"); // ad after the video ?>

	<!-- anhtai them related hot video -->
	<div id="related hotmobile">
		<ul id="video_listing">
		<?php
		$hot_videos = mobi_get_hot_video_list(explode(',', $video['category']), $video['video_title'], _RELATED_LIMIT, $video['id']);
		if (count($related_videos) > 0)
		{
			foreach ($hot_videos as $k => $video_data)
			{
				echo videoLI($video_data);
			}
		}
		?>
		</ul>
	</div>
	<!--END anhtai them related hot video -->
	
	<?php if ($video['allow_comments'] == 1) : ?>
	<div id="comments">
		<div class="post_comment">
		<?php
		if($logged_in == 1) {
		?>		
			<span class="mycommentspan" name="mycommentspan" id="mycommentspan"></span>
			<?php

			?>
			<form name="myform" method="post" id="myform" action="">
			<label for="comment_txt"><?php echo $lang['post_comment']; ?></label>
			<br /> 
			<textarea name="comment_txt" id="c_comment_txt" style="width: 99%" rows="3"></textarea>
			<br />
			<input type="hidden" id="c_vid" name="vid" value="<?php echo $video['uniq_id']; ?>" />
			<input type="hidden" id="c_user_id" name="user_id" value="<?php echo $userdata['id']; ?>" />
			<button class="submit border2" id="c_submit"><?php echo $lang['submit_comment']; ?></button>
			</form>
		<?php 
		} else { 
			translate('<a href="'._URL_MOBI.'/login.'._FEXT.'">Sign in</a> with your <strong>'._SITENAME.'</strong> account to post comments.', lmore_signin2post); 
		}
		?>
		</div>

		<ul id="video_comments">
<?php
#echo show_comments_mobi($unique_id, $userdata['power']);
?>
		<?php
		$sql = mysql_query("SELECT * FROM pm_comments WHERE uniq_id = '". $unique_id ."' AND approved = '1' ORDER BY id DESC LIMIT "._COMMENTS_LIMIT);
		while($row = mysql_fetch_array($sql))
		{
		$comment_id = $row['id'];
		?>
			<li>
			<img src="<?php echo getavatar($row['user_id'], $row['username']); ?>" border="0" class="comm_avatar border4" />
			<div class="comment">
				<span class="comm_name"><?php echo $row['username']; ?></span><span class="comm_date"><?php echo time_since($row['added'])." ".$lang['ago']; ?></span>
				<div class="comm_txt"><?php echo htmlentities($row['comment'], ENT_COMPAT, 'UTF-8'); ?></div>
			</div>
			</li>
		<?php
		}
		if(mysql_num_rows($sql) > 0 && mysql_num_rows($sql) >= _COMMENTS_LIMIT) { 
		?>
		<div id="morec<?php echo $comment_id; ?>" class="morecbox">
		<div class="case" id="video_comments"></div>
		<div class="extra_data" id="<?php echo $unique_id; ?>"></div>
		<div align="center">
		<div id="loader"><img src="<?php echo _URL_MOBI; ?>/images/moreajax.gif" /></div>
		<button class="minimal morec" id="<?php echo $comment_id; ?>">
		<?php translate("Load more comments", lmore_comments); ?>
		</button>
		</div>
		</div>
		<?php
		} else {
		?>
		
		<?php
		}
		?>
		</ul><!--end comments-->
	</div>
	<?php endif;?>
<?php
include('footer.php');
?>