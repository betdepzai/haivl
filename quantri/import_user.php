<?php

// +------------------------------------------------------------------------+

// | PHP Melody ( www.phpsugar.com )

// +------------------------------------------------------------------------+

// | PHP Melody IS NOT FREE SOFTWARE

// | If you have downloaded this software from a website other

// | than www.phpsugar.com or if you have received

// | this software from someone who is not a representative of

// | PHPSUGAR, you are involved in an illegal activity.

// | ---

// | In such case, please contact: support@phpsugar.com.

// +------------------------------------------------------------------------+

// | Developed by: PHPSUGAR (www.phpsugar.com) / support@phpsugar.com

// | Copyright: (c) 2004-2013 PHPSUGAR. All rights reserved.

// +------------------------------------------------------------------------+



$showm = '2';

/*

$load_uniform = 0;

$load_ibutton = 0;

$load_tinymce = 0;

$load_swfupload = 0;

$load_colorpicker = 0;

$load_prettypop = 0;

*/

$load_scrolltofixed = 1;

$load_chzn_drop = 1;

$load_tagsinput = 1;

$load_ibutton = 1;

$load_prettypop = 1;

$load_import_js = 1;

$load_lazy_load = 1;



$_page_title = 'Import Videos from User';

include('header.php');



$action = trim($_GET['action']);

$page = (empty($_GET['page'])) ? 1 : (int) $_GET['page'];



$post_n_get = 0;

$post_n_get = count($_POST) + count($_GET);

$curl_error = '';

$sources = a_fetch_video_sources();



$subscription_id = (int) $_GET['sub_id'];



$data_source = 'youtube';



if (in_array($_COOKIE['aa_import_from'], array('youtube', 'youtube-channel', 'dailymotion', 'vimeo')))

{

	$data_source = $_COOKIE['aa_import_from'];

}



if ($_GET['data_source'] != '' || $_POST['data_source'] != '')

{

	$data_source = ($_GET['data_source'] != '') ? $_GET['data_source'] : $_POST['data_source'];

}



if ($_POST['username'] != '' && ! $subscription_id)

{

	$_POST['username'] = trim($_POST['username']);

	

	$sql = "SELECT sub_id, data

			FROM pm_import_subscriptions 

			WHERE sub_name = '". secure_sql($_POST['username']) ."'

			  AND sub_type = 'user'";

	if ( $result = @mysql_query($sql))

	{

		$row = mysql_fetch_assoc($result);

		$row['data'] = unserialize($row['data']);

		

		if ($row['data']['data_source'] == $data_source)

		{

			$subscription_id = (int) $row['sub_id'];

		}

		mysql_free_result($result);

		unset($row, $result);

	}

}



?>

<div id="adminPrimary">

    <div class="row-fluid" id="help-assist">

        <div class="span12">

        <div class="tabbable tabs-left">

          <ul class="nav nav-tabs">

            <li class="active"><a href="#help-overview" data-toggle="tab">Overview</a></li>

            <li><a href="#help-onthispage" data-toggle="tab">Filtering</a></li>

          </ul>

          <div class="tab-content">

            <div class="tab-pane fade in active" id="help-overview">

            <p>This page allows you import videos from a particular channel/user from the following websites: YouTube.com, DailyMotion.com and Vimeo.com. <br />

			Enter the desired username below and start importing.</p>

            <p>The results will also include any available playlists and favorites belonging to the user.</p>

            </div>

            <div class="tab-pane fade" id="help-onthispage">

            <p>Each result is organized in a stack containing thumbnails, the video title, category, description and tags. Data such as video duration, original URL and more will be imported automatically.</p>

            

            <p>Youtube provides three thumbnails for each video and PHP MELODY allows you to choose the best one for your site. By default, the chosen thumbnail is the largest one, but changing it will be represented by a blue border.

            You can also do a quality control by using the video preview. Just click the play button overlaying the large thumbnail image and the video will be loaded in a window.</p>

            

            <p>By default none of the results is selected for import. Clicking on the top right switch from each stack will select it for importing. This is indicated by a green highlight of the stack. If you’re satisfied with all the results and wish to import them all at once, you can do that as well by selecting the &quot;SELECT ALL VIDEOS&quot; checkbox (bottom left).</p>

            <p>Enjoy!</p>

            </div>



          </div>

        </div> <!-- /tabbable -->

        </div><!-- .span12 -->

    </div><!-- /help-assist -->

    <div class="content">

	<a href="#" id="show-help-assist">Help</a>



	<nav id="import-nav" class="tabbable" role="navigation">

	<h2 class="h2-import pull-left">Import Videos from User</h2>

		<ul class="nav nav-tabs pull-right">

			<li><a href="import.php" class="tab-pane">Import by Keyword</a></li>

			<li class="active"><a href="import_user.php" class="tab-pane">Import from User</a></li>

		</ul>

	</nav>

	<br /><br />



	<?php echo $info_msg; 

	load_categories();

	if (count($_video_categories) == 0)

	{

		echo pm_alert_error('Please <a href="edit_category.php?do=add&type=video">create a category</a> first.');

	}



	// if (empty($_GET['action']))

	// {

	// 	echo pm_alert_info('Import playlists, favorites and videos from any YouTube, DailyMotion or Vimeo user.<br /> <small>Please note that <strong>private</strong> playlists will appear as being empty.</small>');

	// }

	?>

	

<form name="search_username" action="import_user.php?action=search" method="post" class="form-inline">

<div class="input-append import-group">

<input name="username" type="text"  value="<?php if($_POST['username'] != '') echo $_POST['username']; elseif($_GET['username'] != '') echo $_GET['username']; else echo 'Enter username';?>" placeholder="Enter username" class="span5 gautocomplete" />

<select name="data_source">

	<option value="youtube" <?php echo ($data_source == 'youtube' || empty($data_source)) ? 'selected="selected"' : ''; ?>>Youtube User</option>

	<option value="youtube-channel" <?php echo ($data_source == 'youtube-channel') ? 'selected="selected"' : ''; ?>>Youtube Channel</option>

	<option value="dailymotion" <?php echo ($data_source == 'dailymotion') ? 'selected="selected"' : ''; ?>>Dailymotion</option>

	<option value="vimeo" <?php echo ($data_source == 'vimeo') ? 'selected="selected"' : ''; ?>>Vimeo</option>

</select>

<input type="hidden" name="results" value="50">

<button type="button" class="btn" data-toggle="button" id="import-options">options</button> 

<button type="submit" name="submit" class="btn" value="Find" id="searchVideos" data-loading-text="Searching...">Search</button> 

</div>

<span class="searchLoader"><img src="img/ico-loading.gif" width="16" height="16" /></span>





<?php if($_POST['username'] != '' || $_GET['username'] != '') :?>

<div class="opac7 list-choice pull-right">

<button class="btn btn-normal btn-small" data-toggle="button" id="list"><i class="icon-th"></i> </button>

<button class="btn btn-normal btn-small" data-toggle="button" id="stacks"><i class="icon-th-list"></i> </button>

</div>



<div class="pull-right">

<?php if ( ! $subscription_id) : ?>

<a href="#subscribe_user" class="btn btn-small btn-info" rel="tooltip" title="Subscribe to track this user" id="btn-subscribe"><i class="icon-star icon-white"></i> Save this user</a>

<a href="#unsubscribe" data-subscription-id="0" class="btn btn-success btn-small hide" id="btn-unsubscribe" title="Unsubscribe"><i class="icon-ok icon-white"></i> Subscribed</a>

<?php else : ?>

<a href="#modal_subscribe" data-toggle="modal" class="btn btn-info btn-small hide" title="Subscribe" id="btn-subscribe"><i class="icon-star icon-white"></i> Save this user</a>

<!--<a href="#unsubscribe" data-subscription-id="<?php echo (int) $subscription_id;?>" class="btn" id="btn-unsubscribe" title="Unsubscribe">Unsubscribe</a>-->

<a href="#unsubscribe" data-subscription-id="<?php echo (int) $subscription_id;?>" class="btn btn-success btn-small" id="btn-unsubscribe" title="Unsubscribe"><i class="icon-ok icon-white"></i> Subscribed</a>

<?php endif; ?>

<?php echo csrfguard_form('_admin_import_subscriptions'); ?>

</div>

<?php endif; ?>

<div class="clearfix"></div>

<hr />

<div id="import-opt-content">

<h4>Autocomplete Results</h4>

<label for="autofilling"><input type="checkbox" name="autofilling" id="autofilling" value="1" <?php if($_POST['autofilling'] == "1" || $_GET['autofilling'] == "1" || $post_n_get == 0) echo 'checked="checked"'; ?> />

Autocomplete the video title</label>

<br />

<label for="autodata"><input type="checkbox" name="autodata" id="autodata" value="1" <?php if($_POST['autodata'] == "1" || $_GET['autodata'] == "1" || $post_n_get == 0) echo 'checked="checked"'; ?> />

Autocomplete available data from API</label> <i class="icon-info-sign" rel="tooltip" title="Retrieve and include the video description, tags or any other information the API may provide."></i>

<br />

<label>Autocomplete results with this category</label>

<?php 

$selected_categories = array();

if (is_array($_POST['use_this_category']))

{

    $selected_categories = $_POST['use_this_category'];

}

else if (is_string($_POST['use_this_category']) && $_POST['use_this_category'] != '') 

{

    $selected_categories = (array) explode(',', $_POST['use_this_category']);

}

if ($_GET['utc'] != '')

{

    $selected_categories = (array) explode(',', $_GET['utc']);

}



	$categories_dropdown_options = array(

									'attr_name' => 'use_this_category[]',

									'attr_id' => 'main_select_category',

									'select_all_option' => false,

									'spacer' => '&mdash;',

									'selected' => $selected_categories,

									'other_attr' => 'multiple="multiple" size="3"',

									'option_attr_id' => 'check_ignore'

									);

	echo categories_dropdown($categories_dropdown_options);

?>

</div>

</form>

<?php

if (empty($_GET['action'])) 

{

	$subscriptions = get_import_subscriptions('user');

	if ($subscriptions['total_results'] > 0)

	{

		$subscriptions_count = $subscriptions['total_results'];

		$subscriptions = $subscriptions['data'];

		

		foreach ($subscriptions as $k => $sub)

		{

			$subscriptions[$k] = unserialize($sub['data']);

			$subscriptions[$k]['sub_id'] = $sub['sub_id'];

			$subscriptions[$k]['sub_name'] = $sub['sub_name'];

			$subscriptions[$k]['last_query_time'] = (int) $sub['last_query_time'];

			$subscriptions[$k]['last_query_results'] = (int) $sub['last_query_results'];

			$subscriptions[$k]['sub_user_id'] = $sub['user_id'];

			$subscriptions[$k]['sub_username'] = $sub['username'];	

			$subscriptions[$k]['page'] = 1;

			$subscriptions[$k]['action'] = 'search'; // @since v2.3.1

			unset($subscriptions[$k]['playlistid']);  // @since v2.3.1

		}

	?>

	<div class="subscriptions-response-placeholder hide"></div>



	<h3>Subscriptions</h3>

	<table class="table table-striped table-bordered pm-tables">

		<thead>

			<th width="5"></th>

			<th width="50"></th>

			<th style="text-align: left;padding:0 8px">Username</th>

			<th width="110">Saved by</th>

			<th width="220">Videos added this week</th>

			<th width="110"></th>

		</thead>

		<tbody>

			<?php foreach ($subscriptions as $k => $sub) : ?>

			<tr id="row-subscription-<?php echo $sub['sub_id']; ?>">

				<td>

					<div class="sprite <?php echo ( ! empty($sub['data_source'])) ? strtolower($sub['data_source']) : 'youtube'; ?>" rel="tooltip" title="Source: <?php echo ( ! empty($sub['data_source'])) ? ucfirst($sub['data_source']) : 'Youtube'; ?>"></div>

				</td>

				<td>

					<?php if ($sub['profile_avatar_url'] != '') : ?>

					<img src="<?php echo $sub['profile_avatar_url'];?>" width="36" height="36" />

					<?php endif; ?>

				</td>

				<td>

					<?php 

					$url_params = $sub;

					unset($url_params['profile_avatar_url'], $url_params['sub_name'], $url_params['last_query_time'], $url_params['last_query_results'], $url_params['sub_user_id'], $url_params['sub_username']);

					?>

					<strong><a href="import_user.php?<?php echo http_build_query($url_params);?>"><?php echo $sub['sub_name'];?></a></strong>

				</td>

				<td align="center" style="text-align:center">

					<a href="<?php echo _URL .'/profile.php?u='. $sub['sub_username'];?>" target="_blank"><?php echo $sub['sub_username'];?></a>

				</td>

				<td align="center" style="text-align:center">

					<?php if (import_subscription_cache_fresh($sub['last_query_time'])) : ?>

					<?php echo ($sub['last_query_results'] > 0) ? number_format($sub['last_query_results']) : '0'; ?>

					<?php else : ?>

					<span class="row-subscription-get-results" data-subscription-id="<?php echo $sub['sub_id']; ?>">

						<img src="img/ico-loading.gif" width="16" height="16" />

					</span>

					<?php endif; ?>

				</td>

				<td align="center">

					<a href="#" data-subscription-id="<?php echo $sub['sub_id'];?>" class="link-search-unsubscribe btn btn-small btn-danger pull-right" title="Unsubscribe">Unsubscribe</a>

				</td>

			</tr>

			<?php endforeach; ?>

		</tbody>

	</table>

	<?php echo csrfguard_form('_admin_import_subscriptions'); ?>

	<?php 

	} // end if ($subscriptions['total_results'] > 0)

	?>

<div id="stack-controls" style="display: none;"></div>



<?php

}

$autodata = 0;

$autofilling = 0;

$overwrite_category = array();



if(isset($_POST['submit']) && !empty($_POST['username']) && ($action == 'search'))

{

	$username = trim($_POST['username']);

	if(detect_russian($username) == true) {

		echo pm_alert_warning('Unfortunately the Youtube Search API does not support usernames containing cyrillic characters. To import videos from this user, follow these simple steps: <a href="http://help.phpmelody.com/how-to-import-from-youtube-com-users-with-russian-characters/" target="_blank">http://help.phpmelody.com/how-to-import-from-youtube-com-users-with-russian-characters/</a>');

		echo '</div></div>';

		include('footer.php');

		exit();

	}

	$import_results = $_POST['results'];

	$autofilling = ($_POST['autofilling'] == '1') ? 1 : 0;

	$autodata = ($_POST['autodata'] == '1') ? 1 : 0;

	

	if (is_array($_POST['use_this_category']))

	{

		$overwrite_category = $_POST['use_this_category'];

	}

	

}

elseif($action != '')

{	

	$username = trim($_GET['username']);

	$import_results = ($_GET['results'] != '') ? $_GET['results'] : 20;

	$autofilling = ($_GET['autofilling'] == 1) ? 1 : 0;

	$autodata = ($_GET['autodata'] == 1) ? 1 : 0;

	

	if($_GET['oc'] == 1)	//	oc = overwrite_category

	{

		$overwrite_category = (array) explode(',', $_GET['utc']);	//	utc = use_this_cateogory

	}

}



$username_display = $username;



if(($action == 'search' || $action == 'favorites' || $action == 'playlists') && ($username != ''))

{

	$exec_start = get_micro_time();

	

	//	don't allow any white spaces in the username;

	$username = str_replace(" ", "", $username);

	

	$api_data = array();



	// Get playlists

	switch ($data_source)

	{

		case 'youtube':

		case 'youtube-channel':

			

			include(ABSPATH . _ADMIN_FOLDER .'/src/youtube-sdk/autoload.php');

			

			$google_client = new Google_Client();

			$google_client->setDeveloperKey($config['youtube_api_key']);



			$youtube_api = new PhpmelodyYouTube($google_client);

			

			$args = array('pm-user-type' => ($data_source == 'youtube') ? 'user' : 'channel');

			$playlists = $youtube_api->pm_user_playlists($username, $args);

			

			$username_display = ($data_source == 'youtube') ? $username_display : $youtube_api->pm_channel_title;

			

		break;

		

		case 'dailymotion':

			

			include(ABSPATH . _ADMIN_FOLDER .'/src/dailymotion-sdk/Dailymotion.php');

		

			$dailymotion_api = new PhpmelodyDailymotion();

			

			try {

				$args = array('page' => $page,

							  'per_page' => $import_results,

							);

				

				$playlists = $dailymotion_api->pm_user_playlists($username, $args);

				

			} catch(DailymotionApiException $e) {



				if ($dailymotion_api->error)

				{

					$api_data['error']['message'] = '<strong>Dailymotion API error '. $dailymotion_api->error->code . ':</strong> '. $dailymotion_api->error->message;

				}

				else

				{

					$playlists['error']['message'] = '<strong>Dailymotion API error:</strong> '. $e->__toString(); 

				}

			}



		break;

		

		case 'vimeo':

			

			if ( ! empty($config['vimeo_api_token']))

			{

				include(ABSPATH . _ADMIN_FOLDER .'/src/vimeo-sdk/autoload.php');

				

				$vimeo_api = new PhpmelodyVimeo(null, null, $config['vimeo_api_token']);

				

				$args = array('page' => $page,

							  'per_page' => $import_results,

							);

							

				$playlists = $vimeo_api->pm_user_playlists($username, $args);

			}

			else

			{

				$playlists = array('error' => array('message' =>

					'Vimeo API requires a <em>Access Token</em> to retrieve data. This is how you can get an API key:

					<br /><br />

					<ol>

						<li><a href="https://developer.vimeo.com/apps" target="_blank" title="Vimeo Developer API">Create</a> your Vimeo developer account to generate your token.</li>

						<li>Enter the generated token in the <a href="settings.php?highlight=vimeo_api_token&view=video">Settings</a> page.</li>

					</ol>'));

			}

	

		break;

	}



	if (array_key_exists('error', $playlists))

	{

	   ?>

		<div class="alert alert-error">

			<strong>Unable to retrieve requested data.</strong>

			<br />

			<br />

			<?php echo $playlists['error']['message']; ?>

			<?php if ( ! function_exists('curl_init') && ! ini_get('allow_url_fopen')) : ?>

			Your system doesn't support remote connections.

			<br /> 

			Ask your hosting provider to enable either <strong>allow_url_fopen</strong> or the <strong>cURL extension</strong>.

			<?php endif;?>

		</div>

   </div><!-- .content -->

</div><!-- .primary -->

			<?php

			include('footer.php');

			exit();

	}

	

?>

  <div id="playlists-jump"></div>

  <nav id="import-nav" class="tabbable" role="navigation">

  <h2 class="h2-import pull-left">Results from: <em><?php echo $username_display; ?></em></h2>

      <ul class="nav nav-tabs pull-right">

      <li <?php if($action == 'search') { ?> class="active"<?php } ?>><a href="import_user.php?action=search&username=<?php echo $username. '&autofilling='.$autofilling.'&autodata='.$autodata.'&oc=1&utc='. implode(',', $overwrite_category) .'&data_source='. $data_source .'&sub_id='. $subscription_id; ?>">Latest Uploads</a></li>

      <li <?php if($action == 'playlists') { ?> class="active"<?php } ?>><a href="#playlists-jump" id="show-playlists">Playlists</a></li>

	  <li <?php if($action == 'favorites') { ?> class="active"<?php } ?>><a href="import_user.php?action=favorites&username=<?php echo $username. '&autofilling='.$autofilling.'&autodata='.$autodata.'&oc=1&utc='. implode(',', $overwrite_category) .'&data_source='. $data_source .'&sub_id='. $subscription_id; ?>">Favorites</a></li>

      </ul>

  </nav>

  <div id="import_user">

    <?php

	if ($playlists['meta']['total_results'] > 0) : ?>

	<ul class="import-playlists" id="playlists">
	

	<?php foreach ($playlists['results'] as $i => $item) : 

			if ($_GET['playlistid'] == $item['id']) : ?>

			<li class="playlist-selected">

			<?php else : ?>

			<li class="border-radius3">

			<?php endif; ?>

				<a href="import_user.php?action=playlists&username=<?php echo $username; ?>&results=<?php echo $import_results; ?>&playlistid=<?php echo $item['id']; ?>&title=<?php echo urlencode($item['title']); ?>&autofilling=<?php echo $autofilling; ?>&autodata=<?php echo $autodata; ?>&oc=1&utc=<?php echo implode(',', $overwrite_category) .'&data_source='. $data_source .'&sub_id='. $subscription_id; ?>">

				<img src="img/playlist-overlay.png" class="playlist-overlay">

				<img src="<?php echo $item['playlist_thumb_url']; ?>" class="playlist-thumb" /><h4 class="alpha60"><?php echo $item['title']; ?></h4></a>

			</li>

	<?php endforeach; ?>

	</ul>

	<div class="clearfix"></div>

	

	<?php 

	else :

		echo pm_alert_info($username . ' doesn\'t have any playlists.', array('id' => 'playlists'));

	endif; 

	?>



	<div id="content-to-hide">	

	<div class="subscriptions-response-placeholder hide"></div>

    <form name="import_videos" action="import.php?action=import" method="post">

        <?php $modframework->trigger_hook('admin_import_importopts'); ?>



    <div id="vs-grid">

	<?php

	

	switch($action)

	{

		case 'search':

			

			?><h2 class='sub-heading'><strong>Latest Uploads</strong></h2><?php

			

		break;

		

		case 'favorites':

			

			?><h2 class='sub-heading'><strong><?php echo ucfirst($username_display) ?>'s Favorite Videos</strong></h2><?php

				

		break; 

		

		case 'playlists':

			

			?><h2 class='sub-heading'><strong>Playlist: <em><?php echo urldecode($_GET['title']) ?></em></strong></h2><?php

			

		break;

	}



	// Get user videos

	switch ($data_source)

	{

		case 'youtube':

		case 'youtube-channel':



			$args = array('page' => (isset($_GET['page'])) ? $_GET['page'] : null,

						  'per_page' => $import_results

					);



			switch($action)

			{

				case 'search':



					$api_data = $youtube_api->pm_user_videos($username, $args);



					break;



				case 'favorites':



					$api_data = $youtube_api->pm_user_favorites($username, $args);



					break;



				case 'playlists':



					$api_data = $youtube_api->pm_playlist($_GET['playlistid'], $args);



					break;

			}



		break;

		

		case 'dailymotion':

			

			try {

				$args = array('page' => $page,

							  'per_page' => (int) $import_results,

							);

			

				switch($action)

				{

					case 'search':

						

						$api_data = $dailymotion_api->pm_user_videos($username, $args);

						

					break;

					

					case 'favorites':

						

						$api_data = $dailymotion_api->pm_user_favorites($username, $args);

						

					break; 

					

					case 'playlists':

						

						$api_data = $dailymotion_api->pm_playlist($_GET['playlistid'], $args);

						

					break;

				}

				

			} catch(DailymotionApiException $e) {



				if ($dailymotion_api->error)

				{

					$api_data['error']['message'] = '<strong>Dailymotion API error '. $dailymotion_api->error->code . ':</strong> '. $dailymotion_api->error->message;

				}

				else

				{

					$api_data['error']['message'] = '<strong>Dailymotion API error:</strong> '. $e->__toString();

				}

			}

			

			

		break;

		

		case 'vimeo':

			

			$args = array('page' => $page,

						  'per_page' => $import_results,

						);

						

			switch($action)

			{

				case 'search':

					

					$api_data = $vimeo_api->pm_user_videos($username, $args);

					

				break;

				

				case 'favorites':

					

					$api_data = $vimeo_api->pm_user_favorites($username, $args);



				break; 

				

				case 'playlists':

					

					$api_data = $vimeo_api->pm_playlist($_GET['playlistid'], $args);



				break;

			}

			

		break;

	}

	

	

	

	if (array_key_exists('error', $api_data))

	{

	   ?>

		<div class="alert alert-error">

			<strong>Unable to retrieve requested data.</strong>

			<br />

			<br />

			<?php echo $api_data['error']['message']; ?>

			<?php if ( ! function_exists('curl_init') && ! ini_get('allow_url_fopen')) : ?>

			Your system doesn't support remote connections.

			<br /> 

			Ask your hosting provider to enable either <strong>allow_url_fopen</strong> or the <strong>cURL extension</strong>.

			<?php endif;?>

		</div>

   </div><!-- .content -->

</div><!-- .primary -->

			<?php

			include('footer.php');

			exit();

	}

	

	

	// begin formatting

	$total_results = count($api_data['results']);

	$alt 	 	= 0;

	$counter 	= 1;

	$duplicates = 0;

	$total_search_results = $api_data['meta']['total_results'];

	

	$youtube_mirror = array();

	$youtube_mirror = $youtube;



	if ($total_results > 0)

	{

		foreach ($api_data['results'] as $i => $item)

		{

			$tmp_src_name = ($data_source == 'youtube' || $data_source == 'youtube-channel') ? 'youtube' : $data_source;

			

			$count_vids = (int) count_entries('pm_videos', 'yt_id', $item['id'] ."' AND source_id = '". $sources[$tmp_src_name]['source_id']);

			if ($count_vids == 0)

			{

				$col = ($alt % 2) ? 'table_row1' : 'table_row2';

				$alt++;		



				$col_unembed = '';

				

				if ( ! $item['embeddable'] || $item['private'])

				{

					$col_unembed = 'table_row_unembed';

					?>

					<!--<div class="css_yellow_warn"><span onMouseover="showhint('This video will not work since the owner decided to disable embedding.', this, event, '350px')">YouTube disabled embedding for this video.</span></div>-->

					<?php 

				}



				if (is_array($item['geo-restriction']))

				{

					$col_unembed = 'table_row_unembed';

					$georestriction = 'This video is ';

					$georestriction .=  ($item['geo-restriction']['type'] == 'deny') ? 'geo-restricted' : 'available only'; 

					$georestriction .= ' in the following countries: '. $item['geo-restriction']['list'];

				}



				?>

				<div class="video-stack" id="stackid-[<?php echo $counter;?>]">

					<div style="font-size: 10px; font-weight: normal">

						<div class="on_off" rel="tooltip" title="Select to import">

							<label for="video_ids[<?php echo $counter;?>]">IMPORT</label>

							<input type="checkbox" id="import-[<?php echo $counter;?>]" name="video_ids[<?php echo $counter;?>]" value="<?php echo $item['id'] .'" '; if( ! $item['embeddable'] || $item['private']) echo 'disabled="disabled" id="check_ignore"'; ?> />

						</div>

					</div>

					<a id="video-id-[<?php echo $counter;?>]"></a>

					<input id="video-title[<?php echo $counter;?>]" name="video_title[<?php echo $counter;?>]" type="text" value="<?php echo ucwords($item['title']); ?>" size="20" class="video-stack-title required_field" rel="tooltip" title="Click to edit" onClick="SelectAll('video-title[<?php echo $counter;?>]');" />

					<div class="clearfix"></div>

					<div class="video-stack-left">

						<ul class="thumbs_ul_import">

							<li class="stack-thumb-selected stack-thumb">

								<?php if (is_array($item['geo-restriction'])) : ?>

								<span class="video-stack-geo"><a href="#video-id-[<?php echo $counter;?>]" rel="tooltip" data-placement="right" title="<?php echo $georestriction; ?>"><img src="img/ico-geo-warn.png" /></a></span>

								<?php endif; ?>

								<span class="stack-thumb-text"><a href="#video-id-[<?php echo $counter;?>]" rel="tooltip" data-placement="right" title="The default thumbnail for this video."><i class="icon-ok icon-white"></i></a></span>

								<span class="stack-video-duration"><?php echo sec2hms($item['duration']); ?></span>

								<?php if ($item['embeddable']) : ?>

									<span class="stack-preview"><a href="<?php echo $item['embed_url']; ?>" rel="prettyPop[flash]" title="<?php echo str_replace('"', '&quot;', $item['title']); ?>"><div class="pm-sprite ico-playbutton"></div></a></span>

								<?php endif; ?>

								<img src="img/blank.gif" alt="Thumb 1" width="154" height="117" border="0" name="video_thumbnail" videoid="<?php echo $item['id']; ?>" rowid="<?php echo $counter;?>" class="" data-echo="<?php echo $item['thumbs'][0]['small']; ?>" />

							</li>

							<?php if ($item['total_thumbs'] > 1) : ?>

							<li class="thumbs_li_default stack-thumb-small">

								<span class="stack-thumb-text"><a href="#video-id-[<?php echo $counter;?>]" rel="tooltip" data-placement="right" title="The default thumbnail for this video."><i class="icon-ok icon-white"></i></a></span>

								<img src="img/blank.gif" alt="Thumb 2" width="71" height="53" border="0" name="video_thumbnail" videoid="<?php echo $item['id']; ?>" rowid="<?php echo $counter;?>" class="" data-echo="<?php echo $item['thumbs'][1]['small']; ?>" />

							</li>

							<?php endif; ?>

							<?php if ($item['total_thumbs'] > 2) : ?>

							<li class="thumbs_li_default stack-thumb-small">

								<span class="stack-thumb-text"><a href="#video-id-[<?php echo $counter;?>]" rel="tooltip" data-placement="right" title="The default thumbnail for this video."><i class="icon-ok icon-white"></i></a></span>

								<img src="img/blank.gif" alt="Thumb 3" width="71" height="53" border="0" name="video_thumbnail" videoid="<?php echo $item['id']; ?>" rowid="<?php echo $counter;?>" class="" data-echo="<?php echo $item['thumbs'][2]['small']; ?>" />

							</li>

							<?php endif; ?>

						</ul>

						<div class="clearfix"></div>

						<label>

							<input type="checkbox" name="featured[<?php echo $counter;?>]" id="check_ignore" value="1" /> <small>Mark as <span class="label label-featured">FEATURED</span></small>

						</label>

						<?php if ( ! $item['embeddable']) : ?>



						<?php endif; ?>

					</div><!-- .video-stack-left -->

					<div class="video-stack-right noSearch clearfix">

						<label>CATEGORY <small style="color:red;">*</small></label>

						<div class="video-stack-cats">

							<?php

							$categories_dropdown_options = array(

										'attr_name' => 'category['. $counter .'][]',

										'attr_id' => 'select_category-'. $counter,

										'select_all_option' => false,

										'spacer' => '&mdash;',

										'selected' => $overwrite_category,

										'other_attr' => 'multiple="multiple" size="3"',

										'option_attr_id' => 'check_ignore'

										);

							echo categories_dropdown($categories_dropdown_options);

							?>

						</div>

					

						<div class="clear"></div>

						<label>Mô tả</label>

						<textarea name="description[<?php echo $counter;?>]" id="description[<?php echo $counter;?>]" rows="2" class="video-stack-desc"><?php if($autodata) echo $item['description'];?></textarea>

						<label class="control-label" for="tags">TAGS</label>

						<div class="tagsinput">

							<input type="text" id="tags_addvideo_<?php echo $counter;?>" name="tags[<?php echo $counter;?>]" value="<?php if($autodata) echo $item['keywords'];?>" class="tags" />

						</div>

						<input type="hidden" id="thumb_url_<?php echo $counter;?>" name="thumb_url[<?php echo $counter;?>]" value="<?php echo ($data_source == 'youtube' || $data_source == 'youtube-channel') ? $item['thumbs'][0]['large'] : $item['thumbs'][0]['medium']; ?>" />

						

						<input type="hidden" name="duration[<?php echo $counter;?>]" value="<?php echo $item['duration']; ?>" />

						<input type="hidden" name="direct[<?php echo $counter;?>]" value="<?php echo $item['url']; ?>" />

						<input type="hidden" name="url_flv[<?php echo $counter;?>]" value="" />

						

					</div> <!-- .video-stack-right -->

				</div><!-- .video-stack -->

		<?php

				$counter++;

			}

			else

			{

				$duplicates++;

			}

		}	//	end for()

		$exec_end = get_micro_time();

	}	//	end if()

	else

	{

		echo pm_alert_warning('<p>Sorry, nothing found.</p><p>Private videos will not appear in these results.</p>');

		

		// Channels that are actually #hash-tags will have zero videos uploaded but one or more playlists

		// so we need to suggest checking them out. 

		if ($playlists['meta']['total_results'] > 0 && ! (($duplicates == $total_results && $duplicates > 0)))

		{

			echo pm_alert_info('There may be videos in the <strong>Playlists</strong> tab. See  the <strong>Playlists</strong> link on the top right area of this page.');

		}

	}

	if($duplicates == $total_results && $duplicates > 0)

	{

		//	All videos found

		echo pm_alert_info('<p>All videos found on this page are already in your database.</p><p>Load more videos by visiting the next page.</p>');

	}

?>



        	<div class="clearfix"></div>

            <div id="stack-controls" class="row-fluid">

            <div class="span4" style="text-align: left">

                <label class="checkbox import-all">

                <input type="checkbox" name="checkall" id="checkall" class="btn" onclick="checkUncheckAll(this);"/> <small>SELECT ALL VIDEOS</small>

                </label>

            </div>

			<div class="span4">

			<?php if ($total_search_results > 0) : ?>

				 <div class="pagination pagination-centered">

					<?php

					// generate smart pagination

					$filename = 'import_user.php';

					$ext = 'action='.$action.'&username='.$username.'&results='.$import_results;

					$ext.= '&autofilling='.$autofilling.'&autodata='.$autodata;

					

					$ext .= (count($overwrite_category) > 0) ? '&oc=1&utc='. implode(',', $overwrite_category) : '&oc=0&utc=';

					

					if ($action == 'playlists')

					{

						$ext .= '&playlistid='. $_GET['playlistid'] .'&title='. $_GET['title'];

					}

					

					$ext .= ($subscription_id) ? '&sub_id='. $subscription_id : '';

					$ext .= '&data_source='. $data_source;

					

					$pagination = '';



					if ($data_source == 'youtube' || $data_source == 'youtube-channel')

					{

						?>

						<ul>

							<?php if ($api_data['meta']['prev_page']) : ?>

								<li><a href="<?php echo $filename .'?page='. $api_data['meta']['prev_page'] .'&'. $ext;  ?>">Previous</a></li>

							<?php else : ?>

								<li class="disabled"><a href='#'>Previous</a></li>

							<?php endif; ?>

							<?php if ($api_data['meta']['next_page']) : ?>

								<li><a href="<?php echo $filename .'?page='. $api_data['meta']['next_page'] .'&'. $ext; ?>">Next</a></li>

							<?php else : ?>

								<li class="disabled"><a href='#'>Next</a></li>

							<?php endif; ?>

						</ul>

						<?php

					}

					else

					{

						$ext .= '&page='. $page;

						$pagination = a_generate_smart_pagination($page, $total_search_results, $import_results, 1, $filename, $ext);

					}



					echo $pagination;

					

					?>

				</div>

			<?php endif; ?>

			</div>

			<div class="span4">

			<div style="padding-right: 10px;">

            <span class="importLoader"><img src="img/ico-loader.gif" width="16" height="16" /></span>

            <button type="submit" name="submit" class="btn btn-success btn-strong" value="Import" id="submitImport" data-loading-text="Importing...">Import <span id="status"><span id="count">0</span></span> videos </button>

			</div>

			</div>

            </div><!-- #stack-controls -->

		</div><!-- #vs-grid -->

        

	<div align="right">

	<input name="yt_username" type="hidden" value="<?php echo $username; ?>"/>



	<!-- search form information -->

	<input type="hidden" name="username" value="<?php echo htmlentities($username, ENT_COMPAT); ?>" />

	<input type="hidden" name="username_display" value="<?php echo htmlentities($username_display, ENT_COMPAT); ?>" />

	<input type="hidden" name="results" value="<?php echo $import_results; ?>" />

	<input type="hidden" name="autofilling" value="<?php echo $autofilling; ?>" />

	<input type="hidden" name="autodata" value="<?php echo $autodata; ?>" />

	<input type="hidden" name="overwrite_category" value="<?php echo ($_GET['oc'] == 1 || is_array($_POST['use_this_category'])) ? '1' : '0'; ?>" />

	<input type="hidden" name="use_this_category" value="<?php echo implode(',', $overwrite_category); ?>" />

	<input type="hidden" name="data_source" value="<?php echo $data_source; ?>" />

	<input type="hidden" name="sub_id" value="<?php echo ($subscription_id > 0) ? $subscription_id : 0; ?>" />



   </form>

  </div><!-- #import-user -->

  </div><!-- #content-to-hide -->



<?php 



switch ($action)

{

	default:

	case 'search':

		

		$sub_type = 'user';

		$sub_name = $username_display;

		$sub_params = array(

							'action' => $action,

							'username' => $username,

							'results' => $import_results,

							'autofilling' => $autofilling,

							'autodata' => $autodata,

							'oc' => (count($overwrite_category)) ? 1 : 0,

							'utc' => (count($overwrite_category)) ? implode(',', $overwrite_category) : ''

						);

	break;

	

	case 'favorites':

		

		$sub_type = 'user-favorites';

		$sub_name = $username_display ."'s favorites";

		$sub_params = array(

							'action' => $action,

							'username' => $username,

							'results' => $import_results,

							'autofilling' => $autofilling,

							'autodata' => $autodata,

							'oc' => (count($overwrite_category)) ? 1 : 0,

							'utc' => (count($overwrite_category)) ? implode(',', $overwrite_category) : ''

						);

	

	break;

	

	case 'playlists':

		

		$playlist_title = urldecode($_GET['title']);

		

		$sub_type = 'user-playlist';

		$sub_name = $username_display .'/'. $playlist_title;

		$sub_params = array(

							'action' => $action,

							'username' => $username,

							'results' => $import_results,

							'autofilling' => $autofilling,

							'autodata' => $autodata,

							'oc' => (count($overwrite_category)) ? 1 : 0,

							'utc' => (count($overwrite_category)) ? implode(',', $overwrite_category) : '',

							'playlistid' => trim($_GET['playlistid']),

							'title' => $playlist_title

						);

	

	break;

}

$sub_params['data_source'] = $data_source;

$sub_params = serialize($sub_params);

?>

<!-- subscribe modal -->

<div class="modal hide fade" id="modal_subscribe" tabindex="-1" role="dialog" aria-labelledby="modal_subscribe" aria-hidden="true">



	<div class="modal-header">

		<a class="close" data-dismiss="modal">&times;</a>

        <h3>Subscribe</h3>

    </div>



	<form name="subscribe-to-search" method="post" action="">

        <div class="modal-body">

        	

			<div class="modal-response-placeholder hide"></div>

			

			<div style="padding: 10px; margin: 10px;">

					<label>Subscription label</label>

		            <input type="text" name="sub-name" value="<?php echo htmlspecialchars($sub_name);?>" size="40" />

					<input type="hidden" name="sub-params" value="<?php echo htmlspecialchars($sub_params); ?>" />

					<input type="hidden" name="sub-type" value="<?php echo $sub_type; ?>" />

			</div>

		</div>

        <div class="modal-footer">

	        <input type="hidden" name="status" value="1" />

	        <a class="btn btn-strong btn-normal" data-dismiss="modal" aria-hidden="true">Cancel</a>

	        <button type="submit" name="Submit" value="Submit" class="btn btn-success btn-strong" id="btn-subscribe-modal-save" />Save</button>

	    </div>

    </form>

</div>



<?php

}

else if ($username == '' && $action != '')

{

	echo pm_alert_error('Please enter a valid username first.');

}

?>



    </div><!-- .content -->

</div><!-- .primary -->

<?php

include('footer.php');

?>