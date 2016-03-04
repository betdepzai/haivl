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

$cat = magicSlashes($_GET['cat']);
$cat_id = get_catid_mobi('pm_categories', $cat);
$category_name = get_catname_mobi('pm_categories', $cat);

//Chinh sua by anhtai
$taisql = mysql_query("SELECT tag FROM pm_categories WHERE id = '". $cat_id ."'");
$video_cat_slug = mysql_fetch_array($taisql);

$meta_title = $category_name." - "._SITENAME;
include('header.php');

if(empty($cat))
	$cat_id = 0;

if($cat_id == 0) {
?>
	<div id="navigation"><?php translate("Browsing the videos", browse_vid); ?></div>
	<?php echo show_mm_ad("mobile_video"); // ad after the video ?>
	<ul id="category_listing">
	<?php
	echo list_categories_mobi('pm_categories', 0, '', array('max_levels' => 3));
	?>
	</ul>
<?php
}
?>
<div id="content">
	<?php
	if($cat_id != '' && is_numeric($cat_id)) {
	
	?>
		<h1 id="navigation" class="head1"><?php echo $category_name; ?></h1>
		<?php echo show_mm_ad("mobile_video"); // ad after the video ?>
<!-- Start top videos category -->
<div id="divider" class="new_videos">Video đang hot</div>
<ul class="anhtai_video_list">
		<?php
		$start_timestamp = time() - (15 * 86400);
		$sql1 = mysql_query("SELECT * FROM pm_videos WHERE added <= '". time() ."' AND (category LIKE '%,".$cat_id.",%' 
					   OR category LIKE '%,".$cat_id."' 
					   OR category LIKE '".$cat_id.",%' 
					   OR category='".$cat_id."')  
		AND added >= '". $start_timestamp ."'
					   AND source_id IN (". implode(',', $_mobile_supported_sources) .")
					   ORDER BY site_views DESC LIMIT "._BROWSE_LIMIT);
		while($row1 = mysql_fetch_array($sql1))
		{
		$video_id = $row1['id'];
		echo videoLI($row1);
		}
	
		if(mysql_num_rows($sql1) > 0 && mysql_num_rows($sql1) >= _BROWSE_LIMIT) { 
		?>		
		
		</ul>
		<?php
		} elseif(mysql_num_rows($sql1) == 0) {
		echo '<div class="noresults">'.$lang['browse_msg2'].'</div>';		
		}
	
	?>
	<div id="divider" class="new_videos">Video mới nhất</div>
<!-- END top videos category -->

		<ul id="video_listing">
		<?php
		$sql = mysql_query("SELECT * FROM pm_videos WHERE added <= '". time() ."' AND (category LIKE '%,".$cat_id.",%' 
					   OR category LIKE '%,".$cat_id."' 
					   OR category LIKE '".$cat_id.",%' 
					   OR category='".$cat_id."')  
					   AND source_id IN (". implode(',', $_mobile_supported_sources) .")
					   ORDER BY id DESC LIMIT "._BROWSE_LIMIT);
		while($row = mysql_fetch_array($sql))
		{
		$video_id = $row['id'];
		echo videoLI($row);
		}
	
		if(mysql_num_rows($sql) > 0 && mysql_num_rows($sql) >= _BROWSE_LIMIT) { 
		?>		
		<div id="more<?php echo $video_id; ?>" class="morebox">
			<div align="center">
			<div id="loader"><img src="<?php echo _URL_MOBI; ?>/images/moreajax.gif" /></div>
			<button class="minimal more" id="<?php echo $video_id; ?>"><?php translate("Load more videos", lmore_videos); ?></button>
			</div>
			<div class="case" id="browse"></div>
			<div class="extra_data" id="<?php echo $cat_id; ?>"></div>
		</div>
		</ul>

	<?php
		} elseif(mysql_num_rows($sql) == 0) {
		echo '<div class="noresults">'.$lang['browse_msg2'].'</div>';		
		}
	}
	?>
</div>
<?php
include('footer.php');
?>