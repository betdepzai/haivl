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
 * @copyright All rights reserved - 2013-2015
 * @package com.melodymods.youtube_autoimport
 * @version 2.0.0
 *
 * Contact: dirkjan@sanoweb.nl
 */
class mod_youtube_autoimport extends mm_plugin {
	protected $sqlinstall = array("INSERT INTO mm_plugins (plugin,plugin_name,active,priority,backend_only) VALUES ('mod_youtube_autoimport','YouTube Autoimport',1,10,1)",
			"INSERT INTO `mm_settings` (`plugin` ,`setting` ,`value` ,`editable` ,`description` ,`valid`) VALUES ('mod_youtube_autoimport','menu2','YouTube AutoImport|youtube_autoimporter.php','0','','string'),('mod_youtube_autoimport','version','200','0','','string'),('mod_youtube_autoimport','apikey','%s','1','Your YouTube API key. This is required for the plugin to work. See <a href=\"https://developers.google.com/youtube/registering_an_application\">this site</a> for information on how to get one, or <a href=\"https://www.youtube.com/watch?v=zOYW7FO9rzA\">watch this video demo</a>.','string')",
			"CREATE TABLE IF NOT EXISTS `mm_youtubesources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel` varchar(200) NOT NULL,
  `channeltype` ENUM( 'channel', 'playlist', 'feed' ) NOT NULL DEFAULT 'channel',
  `playlistId` VARCHAR(200) NOT NULL DEFAULT '',
  `channel_label` varchar(200) NOT NULL,
  `filtertype` enum('all','pattern','regex') NOT NULL,
  `filter` varchar(100) NOT NULL,
  `minlength` int(11) NOT NULL DEFAULT '0',
  `lastchecked` int(11) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `categories` varchar(50) NOT NULL,
  `copydesc` enum('blank','copy','title') NOT NULL DEFAULT 'copy',
  `removelinks` tinyint(1) NOT NULL DEFAULT '0',
  `checkfrequency` int(5) NOT NULL DEFAULT '5',
  `post_tw` TINYINT(1) NOT NULL DEFAULT 0,
  `post_fb` TINYINT(1) NOT NULL DEFAULT 0,
  `download_yt` TINYINT(1) NOT NULL DEFAULT 0,
  `require_approval` TINYINT(1) NOT NULL DEFAULT 0,
  `submitted` VARCHAR(50) NOT NULL DEFAULT 'admin',
  `tags` VARCHAR(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"
	);
	public $ignoresqlerrors = array(1060,1062);
	public $licence = 'mm_os';
	public $install_steps = 2;
	public $error = '';
	const plugin_version = 200;
	public function __construct($autorun=true){
		if(!$autorun) return;
		$this->load_config();
		if(!isset($this->config['version'])){
			$this->run_update(100);
		}elseif(self::plugin_version > (int) $this->config['version']){
			$this->run_update($this->config['version']);
		}
		return true;
	}
	public function install($step,&$error){
		//Ask for API key and install the mod
		if($step == 2){
			if(!isset($_POST['apikey']) || $_POST['apikey'] == ''){
				$error = 'The API key is required!';
				$step = 1;
			}else{
				$tmp = sprintf($this->sqlinstall[1],secure_sql($_POST['apikey']));
				$this->sqlinstall[1]=$tmp;
				if($this->install_sql($error)){
					$error = '</div><div class="info_msg">To complete the installation, please make sure you add a cron job in your cpanel with the following command:<br /><strong>php -f '.ABSPATH.((defined('_ADMIN_FOLDER'))? _ADMIN_FOLDER:'admin').'/importcron.php &gt;/dev/null 2&gt;&amp;1</strong><br />We recommend you execute this cronjob every 5 minutes for the best result.';
					return true;
				}else{
					return false;
				}
			}
		}
		if($step == 1){
			$terror = '<h2>Installation</h2>Please enter your YouTube API key below. This is required for the plugin to work.<br />
					See <a href=\"https://developers.google.com/youtube/registering_an_application\">this site</a> for information on how to get one, or <a href=\"https://www.youtube.com/watch?v=zOYW7FO9rzA\">watch this video demo</a><br /><br />';
			if($error!='') $terror.='<div class="info_msg_err">'.$error.'</div>';
			$terror .='
			<strong>YouTube API Key</strong><br /><input type="text" name="apikey" required /><br />';
			$error = $terror;
			$step = 2;
		}
		return $step;
	}
	public function run_update($oldversion){
		switch ((int) $oldversion){
			case 100:
				mysql_query("INSERT IGNORE INTO `mm_settings` (`plugin` ,`setting` ,`value` ,`editable` ,`description` ,`valid`) VALUES ('mod_youtube_autoimport','version','120','0','','string') ON DUPLICATE KEY UPDATE value = '120'");
				mysql_query("ALTER TABLE `mm_youtubesources` ADD `channeltype` ENUM( 'channel', 'playlist', 'feed' ) NOT NULL DEFAULT 'channel' AFTER `channel`");
				mysql_query("ALTER TABLE `mm_youtubesources` ADD `post_tw` TINYINT(1) NOT NULL DEFAULT 0");
				mysql_query("ALTER TABLE `mm_youtubesources` ADD `post_fb` TINYINT(1) NOT NULL DEFAULT 0");
				mysql_query("ALTER TABLE `mm_youtubesources` CHANGE `channel` `channel` varchar(200) NOT NULL");
			case 110:
				mysql_query("UPDATE mm_settings SET `value` = 120 WHERE `plugin` = 'mod_youtube_autoimport' AND `setting` = 'version'");
			case 120:
				mysql_query("UPDATE mm_settings SET `value` = 130 WHERE `plugin` = 'mod_youtube_autoimport' AND `setting` = 'version'");
				mysql_query("ALTER TABLE `mm_youtubesources` ADD `download_yt` TINYINT(1) NOT NULL DEFAULT 0");
				mysql_query("ALTER TABLE `mm_youtubesources` ADD `channel_label` VARCHAR(200) NOT NULL DEFAULT ''");
				mysql_query("ALTER TABLE `mm_youtubesources` ADD `require_approval` TINYINT(1) NOT NULL DEFAULT 0");
			case 130:
				mysql_query("UPDATE mm_settings SET `value` = 140 WHERE `plugin` = 'mod_youtube_autoimport' AND `setting` = 'version'");
				mysql_query("ALTER TABLE `mm_youtubesources` ADD `submitted` VARCHAR(50) NOT NULL DEFAULT 'admin'");
				mysql_query("ALTER TABLE `mm_youtubesources` ADD `tags` VARCHAR(500) NOT NULL DEFAULT ''");
			case 140:
				mysql_query("UPDATE mm_settings SET `value` = 150 WHERE `plugin` = 'mod_youtube_autoimport' AND `setting` = 'version'");
			case 150:
				mysql_query("ALTER TABLE `mm_youtubesources` ADD `playlistId` VARCHAR(200) NOT NULL DEFAULT '' AFTER `channeltype`");
				mysql_query("UPDATE mm_settings SET `value` = 200 WHERE `plugin` = 'mod_youtube_autoimport' AND `setting` = 'version'");
				mysql_query("INSERT IGNORE INTO `mm_settings` (`plugin` ,`setting` ,`value` ,`editable` ,`description` ,`valid`) VALUES ('mod_youtube_autoimport','apikey','','1','Your YouTube API key. This is required for the plugin to work. See <a href=\"https://developers.google.com/youtube/registering_an_application\">this site</a> for information on how to get one, or <a href=\"https://www.youtube.com/watch?v=zOYW7FO9rzA\">watch this video demo</a>.','string') ON DUPLICATE KEY UPDATE description = VALUES(description)");
				//Delete "device support" video
				if($this->videoExists('UKY3scPIMd8')){
					mysql_query("DELETE FROM pm_videos WHERE yt_id = 'UKY3scPIMd8'");
					mysql_query("DELETE FROM pm_temp WHERE yt_id = 'UKY3scPIMd8'");
				}
				break;
		}
	}
	//Manage functions
	public function fetchList(){
		$sql = 'SELECT * FROM mm_youtubesources ORDER BY enabled DESC, priority DESC';
		$res = mysql_query($sql);
		$out = array();
		while($obj = mysql_fetch_object($res,'channel_source')){
			$out[] = $obj;
		}
		return $out;
	}
	public function fetchSource($id){
		$sql = 'SELECT * FROM mm_youtubesources WHERE id = '.(int) $id.' LIMIT 1';
		$res = mysql_query($sql);
		if(mysql_num_rows($res)==0) return false;
		return mysql_fetch_object($res,'channel_source');
	}
	public function deleteSource($id){
		$sql = 'DELETE FROM mm_youtubesources WHERE id = '.(int) $id.' LIMIT 1';
		$res = mysql_query($sql);
	}
	public function findChannel($input){
		//Channel url
		if(preg_match('/youtube\.com\/user\/([a-z0-9_\-]+)\/?/i',$input,$matches)){
			return array('channel',$matches[1]);
		}
		//Channel url
		if(preg_match('/youtube\.com\/channel\/([a-z0-9_\-]+)\/?/i',$input,$matches)){
			return array('channel',$matches[1]);
			//This also works but not needed for now since treating them as user works
			//return array('feed','channels/'.$matches[1]);
		}
		//Playlist url
		if(preg_match('/youtube\.com\/playlist\?list=(PL)?([a-z0-9_\-]+)/i',$input,$matches)){
			return array('playlist',$matches[2]);
		}
		//RSS/gdata url (playlist)
		if(preg_match('/youtube\.com\/feeds\/api\/playlists\/(PL)?([a-z0-9_\-]+)/i',$input,$matches)){
			return array('playlist',$matches[2]);
		}
		//RSS/gdata url (channel)
		if(preg_match('/youtube\.com\/feeds\/api\/users\/([a-z0-9_\-]+)\//i',$input,$matches)){
			return array('channel',$matches[1]);
		}
		//Other GData urls (feed)
		if(preg_match('/youtube\.com\/feeds\/api\/([a-z0-9_\-\/]+)/i',$input,$matches)){
			return array('feed',$matches[1]);
		}
		//Channel name
		if(preg_match('/^[a-z0-9_\-]+$/i',$input)){
			return array('channel',$input);
		}
		//Unknown?
		return false;
	}
	public function checkFeed($feed,$params){
		$data = $this->getGData($feed,$params);
		if($data === false || $data === null || !is_array($data)){
			return false;
		}
		return true;
	}
	public function isValidPlaylistId($playlistid){
		$data = $this->getGData('playlists',array('id'=>$playlistid,'fields'=>'pageInfo'));
		if($data === false || $data === null || !is_array($data) || $data['pageInfo']['totalResults'] == 0){
			return false;
		}
		return true;
	}
	public function getGData($path,$p=array()){
		$baseurl = 'https://www.googleapis.com/youtube/v3/';
		$p['alt'] = 'json';
		if(!isset($p['part'])){
			$p['part'] = 'contentDetails';
		}
		//$p['v'] = 2;
		if(isset($this->config['apikey']) && $this->config['apikey']!='') $p['key'] = $this->config['apikey'];
		$url = $baseurl.$path."?".http_build_query($p);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')) {
			curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
		}
		$out = curl_exec($ch);
		$error = curl_error($ch);
		if($error != ''){
			$this->error = $error;
			//return false;
		}
		return json_decode($out,true);
	}
	public function getChannelUploadsPlaylistId($channel){
		//Check if it is a username (default)
		$data = $this->getGData('channels',array('forUsername'=>$channel));
		if($data === false || !isset($data['items']) || count($data['items']) == 0){
			//Check if it is a channel ID
			$data = $this->getGData('channels',array('id'=>$channel));
			if($data === false || !isset($data['items']) || count($data['items']) == 0){
				$this->error = 'This channel does not exist or could not be found: '.$channel;
				return false;
			}
		}
		//Otherwise, we have a valid channel, see if we have a playlist with the uploads
		if(!isset($data['items'][0]['contentDetails']['relatedPlaylists']['uploads'])){
			$this->error = 'Could not find a playlist with uploaded videos for this channel: '.$channel;
			return false;
		}
		$playlistId = $data['items'][0]['contentDetails']['relatedPlaylists']['uploads'];
		return $playlistId;
	}
	public function editSource($action='add'){
		if(!isset($_POST['channel']) || $_POST['channel'] ==''){
			$this->error = 'Source URL cannot be empty!';
			return false;
		}
		if($action == 'add' || $_POST['channel'] != $_POST['oldchannel']){
			$channeldata = $this->findChannel($_POST['channel']);
			if($channeldata === false){
				$this->error = 'Invalid Channel name or URL';
				return false;
			}
			list($channeltype,$channel) = $channeldata;
		}else{
			$channeltype = $_POST['channeltype'];
			$channel = $_POST['oldchannel'];
		}
		switch($channeltype){
			case 'channel':
				//Find the playlistId for this channel				
				$playlistId = $this->getChannelUploadsPlaylistId($channel);
				if($playlistId===false)	return false;
			break;
			case 'playlist':
				if(!$this->isValidPlaylistId($channel)){
					$this->error = 'This playlist does not exist or could not be found: '.$channel;
					return false;
				}
				$playlistId = $channel;
			break;
			case 'feed':
				//We need to fix this one day if possible
				$this->error = 'Sorry, feed urls are not supported in this version of the YouTube API';
				return false;
				//This is old code and will never run
				if(!$this->checkFeed($channel)){
					$this->error = 'This feed does not exist or could not be found: '.$channel;
					return false;
				}
			break;
			default:
				//This should never happen but because the type is ENUM we want to prevent DB errors so lets stop it here already
				$this->error = 'Unknown channel type detected. Could not save channel with type: '.$channeltype;
				return false;
			break;
		}
		if((int) $_POST['checkfrequency'] <= 5) $_POST['checkfrequency'] = 5;
		if((int) $_POST['minlength'] <= 0) $_POST['minlength'] = 0;
		$enabled = isset($_POST['enabled'])? (int) (bool) $_POST['enabled']:1;
		$removelinks = isset($_POST['removelinks'])? (int) (bool) $_POST['removelinks']:0;
		$validdescopts = array('copy','blank','title');
		$post_fb = (isset($_POST['post_fb']) && $_POST['post_fb'] == 1)? 1:0;
		$post_tw = (isset($_POST['post_tw']) && $_POST['post_tw'] == 1)? 1:0;
		$download_yt = (isset($_POST['download_yt']) && $_POST['download_yt'] == 1)? 1:0;
		$require_approval = (isset($_POST['require_approval']) && $_POST['require_approval'] == 1)? 1:0;
		$channel_label = htmlspecialchars($_POST['channel_label']);
		if(username_to_id($_POST['submitted']) == 0){
			$this->error = 'The username in the "Added by" field does not exist';
			return false;
		}else{
			$submitted = $_POST['submitted'];
		}
		$tags = $_POST['tags'];
		if(in_array($_POST['copydesc'],$validdescopts)){
			$copydesc = $_POST['copydesc'];
		}else{
			$copydesc = 'copy';
		}
		if( is_array($_POST['category']) ){
			$categories = implode(",", $_POST['category']);
		}
		else
			$categories = $_POST['category'];
		if($categories == ''){
			$this->error = 'You must select at least 1 category to import to';
			return false;
		}
		if($_POST['filter'] == ''){
			$filtertype = 'all';
			$filter = '';
		}else{
			$filtertype = 'pattern';
			$filter = $_POST['filter'];
		}
		$priority = (int) $_POST['priority'];
		if($action == 'add'){
			$sql = "INSERT INTO mm_youtubesources (channel,channeltype,playlistId,channel_label,filtertype,filter,minlength,lastchecked,priority,enabled,categories,copydesc,removelinks,checkfrequency,post_fb,post_tw,download_yt,require_approval,submitted,tags) VALUES (";
			$sql.= "'".secure_sql($channel)."','".secure_sql($channeltype)."','".secure_sql($playlistId)."','".secure_sql($channel_label)."','".$filtertype."','".secure_sql($filter)."',".(int) $_POST['minlength'].",0,".(int) $priority;
			$sql.= ",".$enabled.",'".secure_sql($categories)."','".$copydesc."',".$removelinks.','.(int) $_POST['checkfrequency'].','.(int) $post_fb.','.(int) $post_tw.','.(int) $download_yt.','.(int) $require_approval.',"'.secure_sql($submitted).'","'.secure_sql($tags).'")';
			if(mysql_query($sql)){
				$_GET['sid'] = mysql_insert_id();
				return true;
			}else{
				$this->error = mysql_error();
				return false;
			}
		}else{
			$sql = "UPDATE mm_youtubesources SET channel = '".secure_sql($channel)."',
					channeltype = '".secure_sql($channeltype)."',
					playlistId = '".secure_sql($playlistId)."',
					channel_label = '".secure_sql($channel_label)."',
					filtertype = '".$filtertype."',
					filter = '".secure_sql($filter)."',
					minlength = '".(int) $_POST['minlength']."',
					priority = ".$priority.",
					enabled = ".$enabled.",
					categories = '".secure_sql($categories)."',
					copydesc = '".$copydesc."',
					removelinks = ".$removelinks.',
					checkfrequency = '.(int) $_POST['checkfrequency'].',
					post_fb = '.(int) $post_fb.',
					post_tw = '.(int) $post_tw.',
					download_yt = '.(int) $download_yt.',
					require_approval = '.(int) $require_approval.",
					submitted = '".secure_sql($submitted)."',
					tags = '".secure_sql($tags)."'";
			$sql.= 'WHERE id = '.(int) $_POST['sid'].' LIMIT 1';
			$res = mysql_query($sql);
			if(!$res){
				$this->error = mysql_error();
				return false;
			}else{
				return true;
			}
		}
	}
	//Run functions
	/**
	 * Force CLI usage
	 * This doesn't seem to be working properly (some command line return "cgi" anyway), so we don't use it
	 */
	function forceCLI(){
		if (PHP_SAPI != 'cli')
			exit('Web access denied');
	}
	function getFeedURL($channel,$channeltype){
		//We don't need this function at the moment
		switch($channeltype){
			case 'channel':
				return array('channels',array('id'=>$channel));
				break;
			case 'playlist':
				return 'feeds/api/playlists/'.$channel;
				break;
			case 'feed':
				return 'feeds/api/'.$channel;
				break;
		}
	}
	function getPlaylistIdFromSource(channel_source $src){
		if($src->playlistId != ''){
			return $src->playlistId;
		}else{
			//It isnt yet set. This probably is an old source
			if($src->channeltype == 'feed'){
				//Feeds are not supported in the v3 api
				$src->disable();
				return false;
			}
			if($src->channeltype == 'playlist'){
				//Check if the playlist ID is valid
				if(!$this->isValidPlaylistId($src->channel)){
					$src->disable();
					return false;
				}else{
					$src->setPlaylistId($src->channel);
					return $src->channel;
				}
			}
			if($src->channeltype == 'channel'){
				//Convert channel name (or ID) to an ID
				$id = $this->getChannelUploadsPlaylistId($src->channel);
				if($id === false){
					$src->disable();
					return false;
				}else{
					$src->setPlaylistId($id);
					return $id;
				}
			}
		}
		
	}
	function run(){
		if(!isset($this->config['apikey']) || $this->config['apikey'] == ''){
			exit('The API key is not set - This is a required setting for the autoimport plugin');
		}
		$sql = 'SELECT count(*) FROM mm_youtubesources WHERE enabled = 1 AND lastchecked + checkfrequency*60 < '.time();
		$res = mysql_query($sql);
		list($num) = mysql_fetch_row($res);
		if($num == 0) return; //Nothing to do

		//Fetch profiles for checking
		$sql = 'SELECT * FROM mm_youtubesources WHERE channel IN(SELECT channel FROM mm_youtubesources WHERE enabled = 1 AND lastchecked + checkfrequency*60 < '.time().') AND enabled = 1 ORDER BY priority DESC';
		$res = mysql_query($sql);
		$sources = array();
		while($src = mysql_fetch_object($res,'channel_source')){
			if(isset($sources[strtolower($src->channel)]))
				$sources[strtolower($src->channel)][] = $src;
			else
				$sources[strtolower($src->channel)] = array($src);
			//Dont do this yet
			//$src->setUpdated();
		}
		foreach($sources as $channel => $filters){
			$channel = $filters[0]->channel; //This is case sensitive for user IDs
			$channeltype = $filters[0]->channeltype;
			$playlistId = $this->getPlaylistIdFromSource($filters[0]);
			if($playlistId === false) continue;
			$feed = $this->getFeedURL($channel,$channeltype);
			$params = array('playlistId'=>$playlistId,'maxResults'=>50);

			$cdata = $this->getGData('playlistItems',$params);
			if($cdata == false || !is_array($cdata)){
				echo 'Could not get info for '.$channel.': '.$this->error."\n";
				continue;
			}
			if(count($cdata['items'])==0){
				echo "Empty video list ".$channel."\n";
				continue;
			}
			$utime = $filters[0]->lastchecked;
			//Now check the videos
			foreach($cdata['items'] as $entry){
				//$vtime = max(strtotime($entry['published']['$t']),strtotime($entry['updated']['$t']));
				$vid = $entry['contentDetails']['videoId'];
				//if($vtime < $utime && $channeltype != 'playlist') continue 2; //Next channel
				if($vid == ''){
					echo "Video ID not found\n";
					continue; //Next Video
				}
				if($this->videoExists($vid)){
					//echo 'Video exists'.$vid."\n";
					if($channeltype != 'playlist'){
						$this->setUpdated($filters);
						continue 2; //Next channel
					}else
						continue; //Next video
				}
				$vlistdata = $this->getGData('videos',array('part'=>'contentDetails,snippet','id'=>$vid));
				if(!isset($vlistdata['items']) || count($vlistdata['items']) == 0){
					echo 'No video data found for video: '.$vid;
					continue; //Next video
				}
				$vdata = $vlistdata['items'][0];
				//Calculate duration
				$di = new DateInterval($vdata['contentDetails']['duration']);
				//Convert duration to seconds
				$vdata['duration'] = $di->d*24*3600+$di->h*3600+$di->i*60+$di->s;
				//echo 'Checking video '.$vid."\n";
				//Now check the source entries (filters)
				foreach($filters as $f){
					//check if filter accepts this video
					if(!$f->matches($vdata))
						continue; //Next YAI source
					//accepted, lets add
					$this->insertVideo($vdata,$vid,$f);
					continue 2; //Next video
				}
				//echo 'No filters matched '.$vid."\n";
			}
			//Now set all sources that have this channel as updated
			$this->setUpdated($filters);
		}
	}
	/**
	 * Set update time on all sources of this chan
	 * @param unknown $filters
	 */
	public function setUpdated($sources){
		foreach($sources as $s){
			$s->setUpdated();
		}
	}
	public function getBestVideoThumb($thumbs){
		if(isset($thumbs['maxres'])){
			return $thumbs['maxres']['url'];
		}
		if(isset($thumbs['standard'],$thumbs['high']) && $thumbs['standard']['height'] > $thumbs['high']['height']){
			return $thumbs['standard']['url'];
		}
		if(isset($thumbs['high'])){
			return $thumbs['high']['url'];
		}
		if(isset($thumbs['medium'])){
			return $thumbs['medium']['url'];
		}
		if(isset($thumbs['default'])){
			return $thumbs['default']['url'];
		}
	}
	public function insertVideo($video,$ytid,channel_source $src){
		global $modframework,$uniq_id,$video_details;
		$video_details = array(	'uniq_id' => '',
				'video_title' => $video['snippet']['title'],
				'description' => '',
				'artist' => '', //For 1.6
				'yt_id' => $ytid,
				'yt_length' => $video['duration'], //This was calculated in the run function
				'category' => $src->categories,
				'submitted' => (($src->submitted!='')? $src->submitted:'admin'),
				'source_id' => 3,
				'language' => '',
				'age_verification' => '',
				'url_flv' => '',
				'yt_thumb' => str_replace('https','http',$this->getBestVideoThumb($video['snippet']['thumbnails']))  ,
				'mp4' => '',
				'direct' => 'http://www.youtube.com/watch?v='. $ytid,
				'tags' => $src->tags,
				'enable_comments' => 1, //Since 2.0
				'featured' => '0',
				'added' => time(),
				'restricted' => 0
		);
		if($src->copydesc == 'title'){
			$video_details['description'] = $video_details['video_title'];
		}
		if($src->copydesc =='copy'){
			$desc = $video['snippet']['description'];
			if($src->removelinks == 1){
				$desc = preg_replace('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#','', $desc);
				$desc = preg_replace('/\n+/',"\n",$desc);
			}
			$video_details['description'] = strip_tags($desc);
			$video_details['description'] = str_replace(array('\n',"\n"),'<br />',$video_details['description']);
			$video_details['description'] = nl2br($video_details['description']);
		}
		$uniq_id = $this->getUID();
		$video_details['uniq_id'] = $uniq_id;
		$img = $this->download_thumb($video_details['yt_thumb'], _THUMBS_DIR_PATH, $uniq_id);
		//Social sharing
		$_POST['post_fb'] = $src->post_fb;
		$_POST['post_tw'] = $src->post_tw;
		//YouTube download
		$_POST['yt_dl'] = $src->download_yt;
		
		if($src->require_approval == 1){
			$new_video = $this->insertTempVideo($video_details);
		}else{
			$modframework->trigger_hook('admin_addvideo_step3_pre_video');
			$new_video = insert_new_video($video_details, $new_video_id);
			$modframework->trigger_hook('admin_addvideo_step3_post_video');
			$modframework->trigger_hook('admin_addvideo_step3_final');
			if(trim($video_details['tags']) != '')
			{
				$tags = explode(",", $video_details['tags']);
				foreach($tags as $k => $tag)
				{
					$tags[$k] = stripslashes(trim($tag));
				}
				//	remove duplicates and 'empty' tags
				$temp = array();
				for($i = 0; $i < count($tags); $i++)
				{
					if($tags[$i] != '')
						if($i <= (count($tags)-1))
						{
							$found = 0;
							for($j = $i + 1; $j < count($tags); $j++)
							{
								if(strcmp($tags[$i], $tags[$j]) == 0)
									$found++;
							}
							if($found == 0)
								$temp[] = $tags[$i];
						}
				}
				$tags = $temp;
				//	insert tags
				if(count($tags) > 0)
					insert_tags($uniq_id, $tags);
			}
		}
		
		if($new_video){
			echo 'New video inserted. '.$uniq_id."\n";
		}else{
			echo 'Error inserting. '.$uniq_id."\n";
		}
	}
	function getUID(){
		$found = 0;
		$uniq_id = '';
		$i = 0;
		do
		{
			$found = 0;
			if(function_exists('microtime'))
				$str = microtime();
			else
				$str = time();
			$str = md5($str);
			$uniq_id = substr($str, 0, 9);
			if(count_entries('pm_videos', 'uniq_id', $uniq_id) > 0)
				$found = 1;
		} while($found === 1);
		return $uniq_id;
	}
	public function insertTempVideo($video){
		$sql = 'INSERT INTO pm_temp (url,video_title,description,yt_length,tags,category,username,user_id,source_id,language,thumbnail,yt_id,url_flv,mp4,added) VALUES ';
		$sql.= "('".secure_sql($video['direct'])."','".secure_sql($video['video_title'])."','"
				.secure_sql($video['description'])."','".(int) $video['yt_length']."','"
				.secure_sql($video['tags'])."','".secure_sql($video['category'])."','"
				.secure_sql($video['submitted'])."','".username_to_id($video['submitted'])."',3,1,'"
				.secure_sql($video['yt_thumb'])."','".secure_sql($video['yt_id'])."','"
				.secure_sql($video['direct'])."','',".time().")";
		 return mysql_query($sql);
		 
	}
	/**
	 * Checks whether the given YouTube video is already in the database
	 * @param string $ytid
	 * @return boolean
	 */
	function videoExists($ytid){
		$url = 'http://www.youtube.com/watch?v='. $ytid;
		$sql = "SELECT uniq_id FROM pm_videos_urls
			WHERE direct = '". $url ."'";
		$result = @mysql_query($sql);
		if(mysql_num_rows($result) > 0)
			return true;
		$sql = "SELECT uniq_id FROM pm_videos WHERE yt_id = '".$ytid."' AND source_id = 3";
		$result = @mysql_query($sql);
		if(mysql_num_rows($result) > 0)
			return true;
		$sql = "SELECT id FROM pm_temp WHERE yt_id = '".$ytid."' AND source_id = 3";
		$result = @mysql_query($sql);
		if(mysql_num_rows($result) > 0)
			return true;
		return false;
	}
	/*
	 * This function id copied from the youtube source in PHP Melody to make our life easier.
	 */
	public function download_thumb($url,$path,$uid){
		global $modframework;
		$target = $path.$uid.'-1.jpg';
		$this->cDl($url,$target);
		if(file_exists($target)){
			require_once(ABSPATH.((defined('_ADMIN_FOLDER'))? _ADMIN_FOLDER:'admin').'/img.resize.php');
			if($modframework->is_loaded('theme_essence')){
				//Save HD thumb if Essence is loaded
				$img = new resize_img();
				$img->sizelimit_x = theme_essence::essence_player_w;
				$img->sizelimit_y = theme_essence::essence_player_h;
				$img->resize_image($target);
				$img->save_resizedimage(_THUMBS_DIR_PATH.'hd/', $uid.'-1');
				$img->destroy_resizedimage();
			}
			$img = new resize_img();
			$img->sizelimit_x = THUMB_W_VIDEO;
			$img->sizelimit_y = THUMB_H_VIDEO;
			$img->resize_image($target);
			$img->save_resizedimage(_THUMBS_DIR_PATH, $uid.'-1');
		}
	}
	//Curl download wrapper
	public function cDl($url,$saveto){
		$fp = fopen($saveto,'wb');
		if(!$fp) return false;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch,CURLOPT_BINARYTRANSFER,true);
		$out = curl_exec($ch);
		$info = curl_getinfo($ch);
		if($info['http_code'] != 200) return false;
		fclose($fp);
		return true;
	}
	//Mod hooks
}
class channel_source {
	public $id;
	public $channel;
	public $channeltype;
	public $channel_label;
	public $filtertype;
	public $filter;
	public $minlength;
	public $lastchecked;
	public $priority;
	public $enabled;
	public $categories;
	public $copydesc;
	public $removelinks;
	public $checkfrequency;
	public $post_tw;
	public $post_fb;
	public $require_approval;
	public $tags;
	public $submitted;
	public $download_yt;
	private $filtercompiled;
	public function isEnabled(){
		return (bool) $this->enabled;
	}
	public function disable(){
		mysql_query('UPDATE mm_youtubesources SET enabled = 0 WHERE id = '.$this->id.' LIMIT 1');
	}
	public function compilefilter(){
		if($this->filtertype=='regex'){
			$this->filtercompiled = $this->filter;
		}
		if($this->filtertype == 'pattern'){
			$f = preg_quote($this->filter);
			$f = str_replace('\*','.*',$f);
			$this->filtercompiled = '/'.$f.'/i';
		}
	}
	public function matches($video){
		if($this->filtertype != 'all' && $this->filter != ''){
			if($this->filtercompiled == '')
				$this->compilefilter();
			if(!preg_match($this->filtercompiled,$video['snippet']['title']))
				return false;
		}
		if($this->minlength != 0 && $video['duration'] < $this->minlength)
			return false;
		return true;
	}
	public function setUpdated(){
		mysql_query('UPDATE mm_youtubesources SET lastchecked = '.time().' WHERE id = '.$this->id.' LIMIT 1');
	}
	public function setPlaylistId($playlistId){
		mysql_query("UPDATE mm_youtubesources SET playlistId = '".secure_sql($playlistId)."' WHERE id = ".$this->id.' LIMIT 1');
	}
}
?>