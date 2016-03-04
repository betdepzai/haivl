<?php
/**
 * YouTube Auto Importer for phpMelody 1.7.x and higher
 * This is NOT a free plugin. You are not allowed to
 * give away this plugin or to sell it to anyone
 * without permission of melodymods.com
 *
 * To this mod the Melodymods.com "Open source licence for paid plugins" applies
 * See http://melodymods.com/support/licences.htm#opensource
 *
 * @author Dirk-jan Mollema - Melodymods.com
 * @copyright All rights reserved - February 2013
 * @package com.melodymods.youtube_autoimport
 * @version 2.0
 *
 * Contact: dirkjan@sanoweb.nl
 */
$showm = '2';

include('header.php');
if(!$modframework->is_loaded('mod_youtube_autoimport')) exit('Mod YouTube Autoimport not loaded. Cannot access this page');
if(!is_admin()) restricted_access(true);
$mod_yai = new mod_youtube_autoimport();
if(isset($_GET['delete']) && is_numeric($_GET['delete'])){
	$mod_yai->deleteSource($_GET['delete']);
}
?>
<script language="javascript">
function makeSure(){
	return confirm('Are you sure you want to delete this source? This cannot be undone.');
}
</script>
<div id="adminPrimary">
	<div class="content" id="content">
	<?php 
	if(!isset($mod_yai->config['apikey']) || $mod_yai->config['apikey'] == ''){
		echo '<div class="alert alert-error">You do not have a YouTube API key set in your settings. The new version of the YouTube API <strong>requires</strong> the use of an API key.<Br />
 		Please <a href="mm_settings.php?mod=mod_youtube_autoimport">edit the plugin settings</a> to add your key.</div>';
	}
	?>
		<h2>
			YouTube channel sources <a href="yai_edit.php?do=new"
				class="btn btn-mini btn-success"><i class="icon-plus"></i> Add a
				channel</a>
		</h2>

		<div class="tablename">
			<h6>Sources</h6>
		</div>
		<table id="srctbl" class="table table-striped table-bordered pm-tables">
			<thead>
				<tr>
					<th>ID</th>
					<th>Source</th>
					<th>Filter</th>
					<th>Status</th>
					<?php if($modframework->is_loaded('mod_facebook_share')){?>
					<th>FB Sharing</th>
					<?php }?>
					<?php if($modframework->is_loaded('mod_twitter_share')){?>
					<th>Twitter Sharing</th>
					<?php }?>
					<?php if($modframework->is_loaded('mod_youtube_download')){?>
					<th>Download</th>
					<?php }?>
					<th>Last Checked</th>
					<th>Action</th>


				<tr>

			</thead>
			<tbody>
		<?php
		$sources = $mod_yai->fetchList ();
		foreach ( $sources as $src ) {
			$actions = '<a href="yai_edit.php?do=edit&sid=' . $src->id . '" class="btn btn-mini btn-link" rel="tooltip" title="Edit source"><i class="icon-pencil"></i></a>';

			$actions .= ' <a href="youtube_autoimporter.php?delete=' . $src->id . '" onclick="return makeSure();" ';
			$actions .= 'class="btn btn-mini btn-link" rel="tooltip" title="Delete source"><i class="icon-remove"></i></a>';
			if ($src->filtertype == 'all') {
				$filter = 'All videos';
			} else {
				$filter = $src->filter;
			}
			$src->channel = $src->channeltype.': '.$src->channel;
			if($src->channel_label != '') $src->channel .= ' ('.$src->channel_label.')';
			$extras = '';
			if($modframework->is_loaded('mod_facebook_share')){
				$extras.='<td>'.(($src->share_fb==1)? '<i class="icon-ok"></i>':'').'</td>';
			}
			if($modframework->is_loaded('mod_twitter_share')){
				$extras.='<td>'.(($src->share_tw==1)? '<i class="icon-ok"></i>':'').'</td>';
			}
			if($modframework->is_loaded('mod_youtube_download')){
				$extras.='<td>'.(($src->download_yt==1)? '<i class="icon-ok"></i>':'').'</td>';
			}
			printf ( '<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td>%s<td>%s</td><td>%s</td></tr>',$src->id,$src->channel,$filter,($src->isEnabled()? 'Enabled':'Disabled'),$extras,(($src->lastchecked == 0)? 'Never':date('M d, Y H:i', $src->lastchecked)),$actions);
		}
		?>
		</tbody>
		</table>
	</div>
</div>
<style>
#adminPrimary .table#srctbl td {
	text-align: center;
}
#adminPrimary .table#srctbl td:nth-of-type(2){
	text-align: left;
}
</style>
<?php  require_once('footer.php')?>