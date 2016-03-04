<?php
// +------------------------------------------------------------------------+
// | PHP Melody
// +------------------------------------------------------------------------+
// | PHP Melody IS NOT FREE SOFTWARE
// | If you have downloaded this software from a website other
// | than www.phpsugar.com or if you have otherwise received
// | this software from someone who is not a representative of
// | this site you are involved in an illegal activity.
// | ---
// | In such case, please contact us at: support@phpsugar.com.
// +------------------------------------------------------------------------+
// | Developed by: phpSugar (www.phpsugar.com) / support@phpsugar.com
// | Copyright: (c) 2004-2016 PhpSugar.com. All rights reserved.
// +------------------------------------------------------------------------+

@set_time_limit(300);

$sql_limit = 100;	//	sql limit per iteration

$manual_jobs = array(); // things that the user has to do by hand

// Handle AJAX requests - START 
if ($_GET['do'] == 'update')
{
	session_start();
	require_once('../config.php');
	include_once(ABSPATH .'include/functions.php');
	include_once(ABSPATH .'include/user_functions.php');
	include_once(ABSPATH . _ADMIN_FOLDER .'/functions.php');
	include_once(ABSPATH .'include/islogged.php');
	
	$ajax_state = 'init';
	
	if ( ! $logged_in || ! is_admin())
	{
		$ajax_msg = ($logged_in) ? '<strong>Access denied!</strong> You need Adminstrator privileges to perform this operation.' : 'Please log in.';
		exit(json_encode(array('state' => 'error',
							   'message' => pm_alert_error($ajax_msg, false, true)
							  )));
	}
	
	$error_count = 0;
	$error_count = 0;
	$sql_start = (int) $_GET['start'];
	$items_processed = (int) $_GET['c'];
	$total_items = 1;
	
//	if ((int) $_GET['totalitems'] == 0)
//	{
//		$total_items = count_entries('pm_users', '', '');
//	}
//	else
//	{
//		$total_items = (int) $_GET['totalitems'];
//	}

//	$sql_start = (int) $_GET['start'];
//	$sql_start = ($sql_start < 0) ? 0 : $sql_start;

	if ($config['maintenance_mode'] == 0)
	{
		update_config('maintenance_mode', 1, true);
	}
	
	if ($items_processed == 0)
	{
		$sql = array();
		$errors = array();

		// configs
		add_config('allow_emojis', '1');
		add_config('allow_user_delete_video', '0');
		add_config('allow_user_edit_video', '1');
		add_config('auto_approve_suggested_videos_verified', '1');
		add_config('trashed_videos', '0');
		add_config('cron_secret_key', '');
		
		if ( ! function_exists('activity_load_options'))
		{
			include_once(ABSPATH .'include/social_functions.php');
		}
		if ( ! defined('ACT_TYPE_UPDATE_COVER'))
		{
			include_once(ABSPATH .'include/social_settings.php');
		}
		$activity_options = activity_load_options();
		$activity_options[ACT_TYPE_UPDATE_COVER] = $default_activity_options[ACT_TYPE_UPDATE_COVER];
		update_config('activity_options', serialize($activity_options));
		
		$sql[] = "UPDATE pm_config SET name = 'auto_approve_suggested_videos' WHERE name = 'auto-approve_suggested_videos'";
		
		$config['custom_logo_url'] = ($config['custom_logo_url'] != '') ? make_url_relative($config['custom_logo_url']) : '';
		$sql[] = "UPDATE pm_config SET value = '". secure_sql($config['custom_logo_url']) ."' WHERE name = 'custom_logo_url'";
		
		// create
		$sql[] = "CREATE TABLE IF NOT EXISTS pm_cron_jobs (
  job_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  type varchar(100) NOT NULL,
  status varchar(50) NOT NULL,
  state varchar(50) NOT NULL,
  exec_frequency int(10) unsigned NOT NULL DEFAULT '86400',
  last_exec_time int(10) unsigned NOT NULL DEFAULT '0',
  rel_object_id int(10) unsigned NOT NULL DEFAULT '0',
  data text NOT NULL,
  created_time int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (job_id),
  KEY status (status,state)
) ENGINE=MyISAM ;";

		$sql[] = "CREATE TABLE IF NOT EXISTS pm_cron_log (
  log_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  job_id int(10) unsigned NOT NULL DEFAULT '0',
  time int(10) unsigned NOT NULL DEFAULT '0',
  notes text NOT NULL,
  PRIMARY KEY (log_id),
  KEY job_id (job_id)
) ENGINE=MyISAM";

		$sql[] = "CREATE TABLE IF NOT EXISTS pm_internal_log (
  log_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  log_date datetime NOT NULL,
  log_info text NOT NULL,
  PRIMARY KEY (log_id)
) ENGINE=MyISAM";

		$sql[] = "ALTER TABLE  pm_users ADD  social_links TEXT NOT NULL,
ADD channel_slug varchar(255) NOT NULL,
ADD channel_cover varchar(255) NOT NULL,
ADD channel_verified enum('0','1') NOT NULL DEFAULT '0',
ADD channel_featured enum('0','1') NOT NULL DEFAULT '0',
ADD channel_settings text NOT NULL,
ADD INDEX (channel_slug),
ADD INDEX (channel_featured)";
		
		$sql[] = "ALTER TABLE  pm_videos ADD  submitted_user_id INT( 10 ) UNSIGNED NOT NULL DEFAULT  '0' AFTER  category ,  ADD INDEX (submitted_user_id)";
		
		$sql[] = "CREATE TABLE IF NOT EXISTS pm_videos_trash (
  id mediumint(6) unsigned NOT NULL,
  uniq_id varchar(10) NOT NULL DEFAULT '',
  video_title varchar(100) NOT NULL DEFAULT '',
  description text NOT NULL,
  yt_id varchar(50) NOT NULL DEFAULT '',
  yt_length mediumint(5) unsigned NOT NULL DEFAULT '0',
  yt_thumb varchar(255) NOT NULL DEFAULT '',
  yt_views int(10) NOT NULL DEFAULT '0',
  category varchar(30) NOT NULL DEFAULT '',
  submitted_user_id int(10) unsigned NOT NULL DEFAULT '0',
  submitted varchar(100) NOT NULL DEFAULT '',
  lastwatched int(10) unsigned NOT NULL DEFAULT '0',
  added int(10) unsigned NOT NULL DEFAULT '0',
  site_views int(9) NOT NULL DEFAULT '0',
  url_flv varchar(255) NOT NULL DEFAULT '',
  source_id smallint(2) unsigned NOT NULL DEFAULT '0',
  language smallint(2) unsigned NOT NULL DEFAULT '0',
  age_verification enum('0','1') NOT NULL DEFAULT '0',
  last_check int(10) unsigned NOT NULL DEFAULT '0',
  status tinyint(1) unsigned NOT NULL DEFAULT '0',
  featured enum('0','1') NOT NULL DEFAULT '0',
  restricted enum('0','1') NOT NULL DEFAULT '0',
  allow_comments enum('0','1') NOT NULL DEFAULT '1',
  allow_embedding enum('0','1') NOT NULL DEFAULT '1',
  video_slug varchar(255) NOT NULL  DEFAULT '',
  mp4 varchar(255) NOT NULL  DEFAULT '',
  direct varchar(255) NOT NULL  DEFAULT '',
  PRIMARY KEY (id),
  KEY uniq_id (uniq_id)
) ENGINE=MyISAM";
		
		$sql[] = "INSERT INTO pm_cron_jobs (name, type, status, state, exec_frequency, last_exec_time, rel_object_id, data, created_time) VALUES('Video Status Checker', 'vscheck', 'live', 'ready', 259200, 0, 9, 'a:5:{s:9:\"sql_start\";i:0;s:12:\"time_started\";i:0;s:16:\"videos_processed\";i:0;s:13:\"video_sorting\";s:11:\"most-viewed\";s:11:\"video_limit\";s:2:\"20\";}', '". time() ."');";
		
		$install_date = (int) $config['firstinstall'];
		if ($install_date)
		{
			$sql[] = "INSERT INTO pm_internal_log (log_date, log_info) VALUES ('". date('Y-m-d H:i:s', $install_date) ."', 'Installed')";
		}
		$sql[] = "INSERT INTO pm_internal_log (log_date, log_info) VALUES (NOW(), 'Update attempt from ". secure_sql($config['version']) ." to 2.6')";
		
		// update each source
		$_sources = fetch_video_sources();
		foreach ($_sources as $src_id => $src_data)
		{
			if (is_int($src_id)) // avoid double updates
			{
				$embed_code = str_replace(array('https://', 'http://'), '//', $src_data['embed_code']);
				$sql[] = "UPDATE pm_sources SET embed_code = '". secure_sql($embed_code) ."' WHERE source_id = $src_id";
				
				unset($embed_code);
			}
		}
		
		$sql_count = count($sql);
	
		for ($i = 0; $i < $sql_count; $i++)
		{
			$result =  mysql_query($sql[ $i ]);
			if ( ! $result)
			{
				if ( ! preg_match("/Duplicate column name/i", mysql_error()) )
				{
					log_error('Query #'. $i .': '. mysql_error(), 'DB Updater');
				}
			}
		}
		unset($sql);
	}
	
	$items_processed = $total_items;
	$ajax_state = 'finished';
	
//	$ajax_state = 'processing';
//	
//	if ($items_processed >= $total_items)
//	{
//		$ajax_state = 'finished';
//	}
//	
//	if ($items_processed < $total_items)
//	{
//	}
	
	switch ($ajax_state)
	{
		default:
		case 'init':
		case 'processing':
			
			$ajax_response = array('state' => $ajax_state,
								   'start' => $sql_start + $sql_limit,
								   'progress' => round(($items_processed * 100) / $total_items, 2),
								   'c' => $items_processed,
								   'totalitems' => $total_items,
								   'message' => ''
								  );

		break;
		
		case 'finished':
			
			__pm_internal_log('Updated successfully from version '. $config['version'] .' to 2.6');
	
			update_config('version', '2.6', true);
			
			// create directory for covers if one doesn't already exist
			if ( ! file_exists(ABSPATH . _UPFOLDER .'/covers'))
			{
				if (mkdir(ABSPATH . _UPFOLDER .'/covers', 0777))
				{
					@copy(_VIDEOS_DIR_PATH . 'index.html', ABSPATH . _UPFOLDER .'/covers/index.html');
				}
				else
				{
					// failed to mkdir so tell the user to manually create this directory
					$manual_jobs['covers_directory'] = true;
				}
			}
			
			// put site out of maintenance mode
			if ($config['maintenance_mode'] == '1')
			{
				update_config('maintenance_mode', 0, true);
			}
			
			// Clear SMARTY cache
			$dir = @opendir($smarty->compile_dir);
			if ($dir)
			{
				while (false !== ($file = readdir($dir)))
				{
					if(strlen($file) > 2)
					{
						$tmp_parts = explode('.', $file);
						$ext = array_pop($tmp_parts);
						$ext = strtolower($ext);
						if ($ext == 'php' && strpos($file, '%') !== false)
						{
							@unlink($smarty->compile_dir .'/'. $file);
						}
					}
				}
				@closedir($dir);
			}
			
			//	empty cache directory
			$dir = @opendir($smarty->cache_dir);
			if ($dir)
			{
				while (false !== ($file = readdir($dir)))
				{
					if(strlen($file) > 2)
					{
						$tmp_parts = explode('.', $file);
						$ext = array_pop($tmp_parts);
						$ext = strtolower($ext);
						if ($ext == 'php' && strpos($file, '%') !== false)
						{
							@unlink($smarty->cache_dir .'/'. $file);
						}
					}
				}
				@closedir($dir);
			}
			
			$ajax_msg = pm_alert_success('Your database was successfully updated to version 2.6.');
			$ajax_msg .= pm_alert_warning('<strong>Important:</strong> Delete <code>/'. _ADMIN_FOLDER .'/db_update.php</code> right now. Click here to continue to your <a href="index.php">Dashboard</a>.');
			
			if (count($manual_jobs) > 0)
			{
				if ($manual_jobs['covers_directory'] === true)
				{
					$ajax_msg .= pm_alert_warning('PHP Melody is unable to create the folder required for the "Channels" feature. Please create a new folder named "<strong>covers</strong>" in your existing <code>/uploads/</code> folder.'); 
				}
			}
			
			$ajax_response = array('state' => $ajax_state,
								   'start' => $total_items,
								   'limit' => $items_per_file,
								   'progress' => 100,
								   'c' => $items_processed,
								   'totalitems' => $total_items,
								   'message' => $ajax_msg
								  );
								  
		break;
		
		case 'error':
			
			$ajax_response = array('state' => $ajax_state,
							 	   'start' => $sql_start,
								   'limit' => $items_per_file,
								   'progress' => round(($items_processed * 100) / $total_items, 2),
								   'c' => $items_processed,
								   'totalitems' => $total_items,
								   'message' => pm_alert_error($ajax_msg, false, true)
								  );
		break;
	} // end switch();

	echo json_encode($ajax_response);
	
	exit();
}
// Handle AJAX requests - END


$showm = '1';
$hide_update_notification = 1;
$load_jquery_ui = 1;
include('header.php');

$estimated_time = $resume_update = false;
$total_users = 0;

?>

<script type="text/javascript">
	
	function run_update(start, params, html_output_sel)
	{
		$('.importLoader').css({'display' : 'inline'})
		
		$.ajax({
			url: '<?php echo _URL ."/". _ADMIN_FOLDER ."/"; ?>db_update.php',
			data: 'do=update&start='+ start +  
				  '&progress=' + params.progress +
				  '&c=' + params.c + 
				  '&resume=' + params.resume +
				  '&totalitems='+ params.totalitems,
			success: function(data){
						
						$('.bar').css({'width': data['progress'] + "%"});
						$('.bar').html(data['progress'] + "%");
						
						switch (data['state'])
						{
							case 'processing':
								$("#progressbar").show();
								//$("#progressbar").progressbar({value: data['progress']});
								params.progress = data['progress'];
								params.c = data['c'];
								params.totalitems = data['totalitems'];
								params.resume = 0;

								run_update(data['start'], params, html_output_sel);
								
							break;
							
							case 'finished':
							case 'error':
								if (data['state'] == 'finished') {
									$("#progressbar").hide();
									$('#ajax-response').html(data['message']);
									$('#more_v_details').hide();
									$('#update-btn').hide();
								} else {
									//$( "#progressbar" ).progressbar({value: data['progress'] });
									$('#ajax-response').html(data['message']);
									$('#update-btn').attr('disabled', false);
								}
								
								$('.importLoader').hide();
							break;
						}
					},
			dataType: 'json'
		});
	}

	$(document).ready(function(){
		$('#update-btn').click(function(){
			var params = new Array();
			
			$(this).attr('disabled', true);
			
			params['progress'] = 0;
			params['c'] = 0;
			params['totalitems'] = '<?php echo $total_users; ?>';
			
			<?php if ($resume_update) : ?>
			params['resume'] = 1;
			$('#progressbar').addClass('active');
			<?php else : ?>
			params['resume'] = 0;
			<?php endif; ?>
			
			run_update(0, params, '#ajax-response');
			return false;
		});
	});
</script>

<div id="adminPrimary">
	<div class="content">
		 <h2>Update from version 2.5 to 2.6</h2>
		 <div class="row-fluid">
			<form name="update-database" method="POST" action="db_update.php">


				<?php if ($config['version'] != '2.5' && $config['version'] != '2.6' && $_GET['force-update'] != 'yes') : ?>

					<div class="alert alert-help">
						<h4>Warning! Wrong update.</h4>
						<p>This update package can only be applied to installations running <strong>PHP Melody v2.5</strong>. Your site currently uses <strong>PHP Melody v<?php echo $config['version']; ?></strong></p>
						<p>To apply the correct update, log into <a href="http://www.phpsugar.com/customer/" target="_blank">your customer account</a> and download the update package released after v<?php echo $config['version']; ?>.
					</div>

				<?php elseif ($config['version'] == '2.6' && $_GET['force-update'] != 'yes') : ?>
				
					<div class="alert alert-success">
						Your MySQL database appears to be up to date. 
						<br /> <br /> 
						Delete <code>/<?php echo _ADMIN_FOLDER; ?>/db_update.php</code> from your server now.
					</div>
				
				<?php else: ?>

					<div class="well">
						<p>
							<?php if ($resume_update) : ?>
								Press the '<strong>Resume</strong>' button below to continue updating to version 2.6.
							<?php else : ?>
								Press '<strong>Update</strong>' to finish the update process. 
							<?php endif; ?>
							<br />
							<?php if ($estimated_time !== false) : ?>
							Estimated time to complete: <strong><?php echo time_since(time() - $estimated_time, true); ?></strong>.
							<?php else : ?>
							This automated process should only take a few minutes to complete.
							<?php endif; ?>
						</p>
					</div>
					
					<div style="" id="progressbar"  class="progress progress-striped progress-db-update <?php echo ($resume_update) ? '' : 'active';?>">
						<?php if ($resume_update) : ?>
						<div class="bar" style="width: <?php echo $progress_made; ?>%;"><?php echo $progress_made; ?>%</div>
						<?php else : ?>
						<div class="bar" style="width: 0%;"></div>
						<?php endif; ?>
					</div>
					
					<div id="ajax-response"></div>
					
					<button type="submit" name="Update" value="Update" id="update-btn" class="btn btn-blue btn-strong"><?php echo ($resume_update) ? 'Resume' : 'Update'; ?></button> <em class="importLoader"><small>Please wait...</small></em>
				
				<?php endif;?>
			</form>
		 </div><!-- .row-fluid -->
    </div><!-- .content -->
</div><!-- .primary -->
<?php
include('footer.php');
