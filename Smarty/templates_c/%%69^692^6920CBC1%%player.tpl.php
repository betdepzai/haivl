<?php /* Smarty version 2.6.20, created on 2016-03-05 11:19:55
         compiled from player.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', 'player.tpl', 429, false),)), $this); ?>
<?php if ($this->_tpl_vars['video_data']['restricted'] == '1' && ! $this->_tpl_vars['logged_in']): ?>
<div class="restricted-video border-radius4">
	<h2><?php echo $this->_tpl_vars['lang']['restricted_sorry']; ?>
</h2>
	<p><?php echo $this->_tpl_vars['lang']['restricted_register']; ?>
</p>
	<div class="restricted-login">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'user-auth-login-form.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
</div>
<?php else: ?>
<?php if ($this->_tpl_vars['page'] == 'detail'): ?>
	<?php if ($this->_tpl_vars['total_video_ads'] > 0): ?>
		<?php echo ' 
		<script type="text/javascript">
		var embed_code = '; ?>
'<?php echo $this->_tpl_vars['video_data']['embed_code']; ?>
'<?php echo ';
		</script>
		<link href="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/video-js.min.css" rel="stylesheet">
		<script type="text/javascript" src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/video.js"></script>
		<script src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/plugins/videojs.persistvolume.js"></script>
		<script src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/plugins/videojs.ads.js"></script>
		<script src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/plugins/videojs-preroll.min.js"></script>
		
		<div id="embed_Playerholder">
		 <div id="'; ?>
<?php echo $this->_tpl_vars['video_ad_hash']; ?>
<?php echo '-playerholder">
		 </div>
		</div>
		<video src="" id="video-js" class="video-js vjs-default-skin" poster="" preload="auto" data-setup=\'{ "techOrder": ["flash","html5"], "controls": true, "autoplay": true }\' width="100%" height="'; ?>
<?php echo @_PLAYER_H; ?>
<?php echo '"></video>
		<script type="text/javascript">
				var video = videojs(\'video-js\').ready(function(){
					var player = this;
					
					player.on(\'loadedmetadata\', function() {
						$(\'.vjs-big-play-button\').addClass(\'vjs-pm-show-big-play\');
						$(\'.vjs-control-bar\').css({"display": "block"});
					});

					player.ads();
					player.preroll({
						src:"'; ?>
<?php echo @_URL2; ?>
/videoads.php?h=<?php echo $this->_tpl_vars['video_ad_hash']; ?>
<?php echo '", 
						href:"'; ?>
<?php echo @_URL2; ?>
/videoads.php?h=<?php echo $this->_tpl_vars['video_ad_hash']; ?>
&tz=t<?php echo '",
						target:"'; ?>
<?php echo $this->_tpl_vars['video_ad_target']; ?>
<?php echo '", 
						skipTime: 5});

					player.src([
						{
							src: "'; ?>
<?php echo @_URL2; ?>
/videoads.php?h=<?php echo $this->_tpl_vars['video_ad_hash']; ?>
<?php echo '",
							type: "video/mp4"
						}
					]);
					player.persistvolume({
						namespace: "Melody-vjs-Volume"
					});

					player.on(\'ended\', function() {
						player.dispose(); 
						ajax_request("video", "do=getplayer&vid='; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '&aid=&player='; ?>
<?php echo $this->_tpl_vars['page']; ?>
<?php echo '&playlist='; ?>
<?php echo $this->_tpl_vars['playlist']['list_uniq_id']; ?>
<?php echo '", "#embed_Playerholder", "html");
					});
				});
		</script>
		'; ?>

	<?php else: ?>
	
	
		<?php if ($this->_tpl_vars['video_data']['video_player'] == 'flvplayer'): ?>
			<?php echo '
				<div id="Playerholder">
				<noscript>
					{$lang.enable_javascript}
				</noscript>
				<em>{$lang.please_wait}</em>
				</div>
				<script type="text/javascript">
				var clips = "[ { name: \'ClickToPlay\', overlayId: \'play\', url: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\' },";
				
				clips = clips + " { name: \''; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '\', url: \''; ?>
<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '\', '; ?>
<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['mp3']['source_id']): ?>type: 'mp3'<?php endif; ?><?php echo ' } ]";
				
				var flashvars = {
					config: "{ playList: " + clips + ", useSmoothing: true, baseURL: \'\', autoPlay: '; ?>
<?php if ($this->_tpl_vars['playlist']): ?>true<?php else: ?><?php echo $this->_tpl_vars['video_data']['video_player_autoplay']; ?>
<?php endif; ?><?php echo ', autoBuffering: '; ?>
<?php echo @_AUTOBUFF; ?>
<?php echo ', startingBufferLength: 2, bufferLength: 5, loop: false,hideControls: false,initialScale: \'fit\', showPlayListButtons: false, useNativeFullScreen: true,controlBarGloss: \'high\', controlsOverVideo: \'locked\', watermarkUrl: \''; ?>
<?php echo @_WATERMARKURL; ?>
<?php echo '\', showWatermark: \''; ?>
<?php echo @_WATERMARKSHOW; ?>
<?php echo '\', watermarkLinkUrl: \''; ?>
<?php echo @_WATERMARKLINK; ?>
<?php echo '\', controlBarBackgroundColor: \'0x'; ?>
<?php echo @_BGCOLOR; ?>
<?php echo '\', progressBarColor1: \'0xFFFFFF\', progressBarColor2: \'0x000000\', timeDisplayFontColor: \'0x'; ?>
<?php echo @_TIMECOLOR; ?>
<?php echo '\', noVideoClip: { url: \''; ?>
<?php echo @_URL; ?>
/templates/<?php echo @_TPLFOLDER; ?>
/img/notfound.jpg<?php echo '\' }, menuItems: [ false, false, true, true, true, false, false ], showStopButton: true, useHwScaling: false, showOnLoadBegin: true }"
				};
				
				var params = {
					allowfullscreen: "true",
					allowScriptAccess: "always",
					wmode: "opaque"
				};
				var attributes = {};
				swfobject.embedSWF("'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/flowplayer2/flowplayer.swf", "Playerholder", "'; ?>
<?php echo @_PLAYER_W; ?>
<?php echo '", "'; ?>
<?php echo @_PLAYER_H; ?>
<?php echo '", "9.0.115", false, flashvars, params, attributes);
	
				function onStreamNotFound(a){
				   '; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
					window.location = "'; ?>
<?php echo $this->_tpl_vars['playlist_next_url']; ?>
<?php echo '";
					'; ?>
<?php endif; ?><?php echo '
				}
				function onClipDone(clip) {
					if (clip.name != "Advertisment") {
						'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
						window.location = "'; ?>
<?php echo $this->_tpl_vars['playlist_next_url']; ?>
<?php echo '";
						'; ?>
<?php else: ?><?php echo '
							if (pm_video_data.autoplay_next && pm_video_data.autoplay_next_url != "") {
								window.location = pm_video_data.autoplay_next_url;
							}
						'; ?>
<?php endif; ?><?php echo '
					}
				}
				</script>
			'; ?>

		<?php elseif ($this->_tpl_vars['video_data']['video_player'] == 'jwplayer'): ?>
					<div id="Playerholder">
				<noscript>
					<?php echo $this->_tpl_vars['lang']['enable_javascript']; ?>

				</noscript>
				<em><?php echo $this->_tpl_vars['lang']['please_wait']; ?>
</em>
					</div>
					<?php echo '
					<script type="text/javascript" src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer5/jwplayer.js"></script>
					<script type=\'text/javascript\'>
						var flashvars = {
							"flashplayer": "'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer5/jwplayer.swf",
							"playlist": [{
							'; ?>

							<?php if ($this->_tpl_vars['video_data']['source_id'] == 0): ?>
								file: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['file']; ?>
',
								image: '<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
',
								streamer: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['streamer']; ?>
',
								<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['provider'] != ''): ?> provider: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['provider']; ?>
',<?php endif; ?>
								<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['startparam'] != ''): ?> 'http.startparam': '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['startparam']; ?>
',<?php endif; ?>
								<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['loadbalance'] != ''): ?> 'rtmp.loadbalance': '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['loadbalance']; ?>
',<?php endif; ?>
								<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['subscribe'] != ''): ?> 'rtmp.subscribe': '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['subscribe']; ?>
',<?php endif; ?>
							<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['youtube']['source_id']): ?>
								<?php echo '
								file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['direct']; ?>
<?php echo '\',
								image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
							'; ?>

						<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['gfycat']['source_id']): ?>
							<?php echo '
							file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
								'; ?>

							<?php else: ?>
								<?php echo '
								file: \''; ?>
<?php echo @_URL2; ?>
<?php echo '/videos.php?vid='; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '\',
								'; ?>
<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['mp3']['source_id']): ?><?php echo '
								type: \'audio\',
								'; ?>
<?php else: ?><?php echo '
								type: \'video\',
								'; ?>
<?php endif; ?><?php echo '
								image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
								'; ?>

							<?php endif; ?>
							<?php echo '
							}],
							"controlbar": {
								"position": "bottom",
							},
							\'wmode\': \'transparent\',
							\'allowfullscreen\': \'true\',
							\'allowscriptaccess\': \'always\',
							\'allownetworking\': \'all\',
							\'name\': \''; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '\',
							\'id\': \''; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '\',
							\'width\': "100%",
							'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
							\'height\': "401px",
							\'autostart\': "true", 
							'; ?>
<?php else: ?><?php echo '
							\'height\': "'; ?>
<?php echo @_PLAYER_H; ?>
<?php echo '",
							\'autostart\': "'; ?>
<?php echo $this->_tpl_vars['video_data']['video_player_autoplay']; ?>
<?php echo '", 
							'; ?>
<?php endif; ?><?php echo '
							\'enablejs\': "true",
							\'backcolor\': "'; ?>
<?php echo @_BGCOLOR; ?>
<?php echo '",
							\'frontcolor\': "'; ?>
<?php echo @_TIMECOLOR; ?>
<?php echo '",
							\'screencolor\': "000000",
							\'repeat\': "false",
							\'logo\': "'; ?>
<?php echo @_WATERMARKURL; ?>
<?php echo '",
							\'linktarget\': "_blank",
							\'link\': "'; ?>
<?php echo @_WATERMARKLINK; ?>
<?php echo '",
							\'image\': "'; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '", // XTRA
							\'bufferlength\': "5",
							\'shownavigation\':"true",
							\'skin\': "'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer5/skins/'; ?>
<?php echo @_JWSKIN; ?>
<?php echo '",
							\'stretching\': "fill",
							"plugins": {
								\'captions\': {
									'; ?>
<?php $_from = $this->_tpl_vars['video_subtitles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_subtitles']):
?><?php echo '
									file: "'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['filename']; ?>
<?php echo '",
									'; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '
								},
							'; ?>
<?php if (! $this->_tpl_vars['playlist']): ?><?php echo '
									\''; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer5/plugins/drelated.swf\': {
										\'dxmlpath\': \''; ?>
<?php echo @_URL2; ?>
<?php echo '/relatedclips.php?vid='; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '\',
										\'dposition\': \'center\', // center, bottom, top
										\'dskin\': \''; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer5/skins/grayskin2.swf\',
										\'dtarget\': \'_self\' // where to open the related videos when clicked on   			        			
									},
							'; ?>
<?php endif; ?><?php echo '
									//\'timeslidertooltipplugin-3\': {},
									\'sharing-3\': {
										\'link\': \''; ?>
<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
<?php echo '\',
										\'code\': encodeURIComponent(\''; ?>
<?php echo $this->_tpl_vars['embedcode']; ?>
<?php echo '\')
									}
							},
							"events": {
									onComplete: function() {
										'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
										window.location = "'; ?>
<?php echo $this->_tpl_vars['playlist_next_url']; ?>
<?php echo '";
										'; ?>
<?php else: ?>
											<?php echo '
											if (pm_video_data.autoplay_next && pm_video_data.autoplay_next_url != "") {
												window.location = pm_video_data.autoplay_next_url;
											}
											'; ?>

										<?php endif; ?><?php echo '
									},
									onError: function(object) { 
										ajax_request("video", "do=report&vid='; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '&error-message="+ object.message, "", "", false);
										'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
										window.location = "'; ?>
<?php echo $this->_tpl_vars['playlist_next_url']; ?>
<?php echo '";
										'; ?>
<?php endif; ?><?php echo '
									}
								}
				};
			'; ?>
<?php echo $this->_tpl_vars['jw_flashvars_override']; ?>
<?php echo '
			jwplayer("Playerholder").setup(flashvars);
			</script>
			'; ?>
	
		
	  <?php elseif ($this->_tpl_vars['video_data']['video_player'] == 'jwplayer6'): ?>
			<div id="Playerholder">
		<noscript>
			<?php echo $this->_tpl_vars['lang']['enable_javascript']; ?>

		</noscript>
		<em><?php echo $this->_tpl_vars['lang']['please_wait']; ?>
</em>
			</div>
			<?php echo '
			<script type="text/javascript" src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer6/jwplayer.js"></script>
			<script type="text/javascript">jwplayer.key="'; ?>
<?php echo $this->_tpl_vars['jwplayerkey']; ?>
<?php echo '";</script>
			<script type="text/javascript">
				var flashvars = {
						'; ?>

							<?php if ($this->_tpl_vars['video_data']['source_id'] == 0): ?>
								file: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['file']; ?>
',
								streamer: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['streamer']; ?>
',
								<?php echo 'rtmp: {'; ?>

								<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['provider'] != ''): ?> provider: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['provider']; ?>
',<?php endif; ?>
								<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['startparam'] != ''): ?> startparam: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['startparam']; ?>
',<?php endif; ?>
								<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['loadbalance'] != ''): ?> loadbalance: <?php echo $this->_tpl_vars['video_data']['jw_flashvars']['loadbalance']; ?>
,<?php endif; ?>
								<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['subscribe'] != ''): ?> subscribe: <?php echo $this->_tpl_vars['video_data']['jw_flashvars']['subscribe']; ?>
,<?php endif; ?>
								<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['securetoken'] != ''): ?> securetoken: "<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['securetoken']; ?>
",<?php endif; ?>
								},
							<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['localhost']['source_id']): ?>
								<?php echo '
								file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
							//image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
								'; ?>

							<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['youtube']['source_id']): ?>
								<?php echo '
								file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['direct']; ?>
<?php echo '\',
								//image: \'//img.youtube.com/vi/'; ?>
<?php echo $this->_tpl_vars['video_data']['yt_id']; ?>
<?php echo '/hqdefault.jpg\',
								'; ?>

							<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['mp3']['source_id']): ?>
								<?php echo '
								file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
								type: \'mp3\',
								//image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
',
							<?php else: ?>		
								<?php echo '
								file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
								//image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
',
							<?php endif; ?>
							<?php echo '
							flashplayer: "'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer6/jwplayer.flash.swf",                        
							primary: "html5",
							width: "100%",
							'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
							height: "401",
							autostart: true, 
							'; ?>
<?php else: ?><?php echo '
							height: "'; ?>
<?php echo @_PLAYER_H; ?>
<?php echo '",
							autostart: "'; ?>
<?php echo $this->_tpl_vars['video_data']['video_player_autoplay']; ?>
<?php echo '", 
							'; ?>
<?php endif; ?><?php echo '					
							image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
							stretching: "fill",
							events: {
								onComplete: function() {
									'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
									window.location = "'; ?>
<?php echo $this->_tpl_vars['playlist_next_url']; ?>
<?php echo '";
									'; ?>
<?php else: ?><?php echo '
										if (pm_video_data.autoplay_next && pm_video_data.autoplay_next_url != "") {
											window.location = pm_video_data.autoplay_next_url;
										}
									'; ?>
<?php endif; ?><?php echo '
								},
								onError: function(object) { 
									ajax_request("video", "do=report&vid='; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '&error-message="+ object.message, "", "", false);
									'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
									window.location = "'; ?>
<?php echo $this->_tpl_vars['playlist_next_url']; ?>
<?php echo '";
									'; ?>
<?php endif; ?><?php echo '
								}
							},
							logo: {
								file: \''; ?>
<?php echo @_WATERMARKURL; ?>
<?php echo '\',
								link: \''; ?>
<?php echo @_WATERMARKLINK; ?>
<?php echo '\',
							},
							"tracks": [
							'; ?>
<?php $_from = $this->_tpl_vars['video_subtitles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_subtitles']):
?><?php echo '
								{ file: "'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['filename']; ?>
<?php echo '", label: "'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['language']; ?>
<?php echo '", kind: "subtitles" },
							'; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '
							]
							};
							'; ?>
<?php echo $this->_tpl_vars['jw_flashvars_override']; ?>
<?php echo '
				jwplayer("Playerholder").setup(flashvars);
			</script>
			'; ?>

	<?php elseif ($this->_tpl_vars['video_data']['video_player'] == 'jwplayer7'): ?>
		<div id="Playerholder">
			<noscript>
				<?php echo $this->_tpl_vars['lang']['enable_javascript']; ?>

			</noscript>
			<em><?php echo $this->_tpl_vars['lang']['please_wait']; ?>
</em>
		</div>
		<?php echo '
		<script type="text/javascript" src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer7/jwplayer.js"></script>
		<script type="text/javascript">jwplayer.key="'; ?>
<?php echo $this->_tpl_vars['jwplayer7key']; ?>
<?php echo '";</script>
		<script type="text/javascript">
			var flashvars = {
					'; ?>

						<?php if ($this->_tpl_vars['video_data']['source_id'] == 0): ?>
							file: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['file']; ?>
',
							image: '<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
',
							streamer: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['streamer']; ?>
',
							<?php echo 'rtmp: {'; ?>

							<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['provider'] != ''): ?> provider: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['provider']; ?>
',<?php endif; ?>
							<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['startparam'] != ''): ?> startparam: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['startparam']; ?>
',<?php endif; ?>
							<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['loadbalance'] != ''): ?> loadbalance: <?php echo $this->_tpl_vars['video_data']['jw_flashvars']['loadbalance']; ?>
,<?php endif; ?>
							<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['subscribe'] != ''): ?> subscribe: <?php echo $this->_tpl_vars['video_data']['jw_flashvars']['subscribe']; ?>
,<?php endif; ?>
							<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['securetoken'] != ''): ?> securetoken: "<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['securetoken']; ?>
",<?php endif; ?>
							},
						<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['localhost']['source_id']): ?>
							<?php echo '
							file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
							image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
							'; ?>

						<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['youtube']['source_id']): ?>
							<?php echo '
							file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['direct']; ?>
<?php echo '\',
							//image: \'//img.youtube.com/vi/'; ?>
<?php echo $this->_tpl_vars['video_data']['yt_id']; ?>
<?php echo '/hqdefault.jpg\',
							'; ?>

						<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['mp3']['source_id']): ?>
							<?php echo '
							file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
							type: \'mp3\',
							//image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
',
						<?php else: ?>		
							<?php echo '
							file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
							//image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
',
						<?php endif; ?>
						<?php echo '
						flashplayer: "'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer7/jwplayer.flash.swf",                        
						primary: "html5",
						width: "100%",
						'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
						height: "401",
						autostart: true, 
						'; ?>
<?php else: ?><?php echo '
						height: "'; ?>
<?php echo @_PLAYER_H; ?>
<?php echo '",
						autostart: "'; ?>
<?php echo $this->_tpl_vars['video_data']['video_player_autoplay']; ?>
<?php echo '", 
						'; ?>
<?php endif; ?><?php echo '					
						image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
						stretching: "fill",
						events: {
							onComplete: function() {
								'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
								window.location = "'; ?>
<?php echo $this->_tpl_vars['playlist_next_url']; ?>
<?php echo '";
								'; ?>
<?php else: ?><?php echo '
									if (pm_video_data.autoplay_next && pm_video_data.autoplay_next_url != "") {
										window.location = pm_video_data.autoplay_next_url;
									}
								'; ?>
<?php endif; ?><?php echo '
							},
							onError: function(object) { 
								ajax_request("video", "do=report&vid='; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '&error-message="+ object.message, "", "", false);
								'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
								window.location = "'; ?>
<?php echo $this->_tpl_vars['playlist_next_url']; ?>
<?php echo '";
								'; ?>
<?php endif; ?><?php echo '
							}
						},
						logo: {
							file: \''; ?>
<?php echo @_WATERMARKURL; ?>
<?php echo '\',
							link: \''; ?>
<?php echo @_WATERMARKLINK; ?>
<?php echo '\',
						},
						"tracks": [
						'; ?>
<?php $_from = $this->_tpl_vars['video_subtitles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_subtitles']):
?><?php echo '
							{ file: "'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['filename']; ?>
<?php echo '", label: "'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['language']; ?>
<?php echo '", kind: "subtitles" },
						'; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '
						]
						};
						'; ?>
<?php echo $this->_tpl_vars['jw_flashvars_override']; ?>
<?php echo '
			jwplayer("Playerholder").setup(flashvars);
		</script>
		'; ?>

		<?php elseif ($this->_tpl_vars['video_data']['video_player'] == 'videojs'): ?>
		<?php echo '
	
			<link href="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/video-js.min.css" rel="stylesheet">
			<script type="text/javascript" src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/video.js"></script>
		'; ?>
<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['youtube']['source_id']): ?><?php echo '
		<script src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/plugins/youtube.js"></script>
		'; ?>
<?php endif; ?><?php echo '
			<script src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/plugins/videojs.persistvolume.js"></script>
		'; ?>
<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['dailymotion']['source_id']): ?><?php echo '
		<script src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/plugins/dailymotion.js"></script>
		<script type="text/javascript">
			player.options.flash.swf = "'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/plugins/video-js.swf";
		</script>
			'; ?>

		<?php endif; ?>

			<script src="<?php echo @_URL2; ?>
/players/video-js/plugins/videojs.socialShare.js"></script>

			<?php if (@_WATERMARKURL != ''): ?>
			<?php echo '
			<script src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/plugins/videojs.logobrand.js"></script>
			'; ?>

			<?php endif; ?>
			<?php echo '
	
			<div id="Playerholder">
		<video src="" id="video-js" class="video-js vjs-default-skin" poster="'; ?>
<?php if ($this->_tpl_vars['video_data']['source_id'] != $this->_tpl_vars['_sources']['youtube']['source_id']): ?><?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php endif; ?><?php echo '" preload="auto" data-setup=\'{ "techOrder": ['; ?>
<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['youtube']['source_id']): ?>"youtube",<?php endif; ?><?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['dailymotion']['source_id']): ?>"dailymotion",<?php endif; ?><?php echo '"html5","flash"], "controls": true, "autoplay": '; ?>
<?php echo $this->_tpl_vars['video_data']['video_player_autoplay']; ?>
<?php echo ' }\' width="100%" height="'; ?>
<?php echo @_PLAYER_H; ?>
<?php echo '">
			'; ?>
<?php $_from = $this->_tpl_vars['video_subtitles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_subtitles']):
?><?php echo '
			<track kind="captions" src="'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['filename']; ?>
<?php echo '" srclang="'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['video_subtitles']['language_tag'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
<?php echo '" label="'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['language']; ?>
<?php echo '">
			'; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '
			</video>
	
			<script type="text/javascript">
			var video = videojs(\'video-js\').ready(function(){
				var player = this;
				
				player.on(\'loadedmetadata\', function() {
					$(\'.vjs-big-play-button\').addClass(\'vjs-pm-show-big-play\');
					$(\'.vjs-control-bar\').css({"display": "block"});
				});
				
				player.on(\'error\', function(){
					var MediaError = player.error();
					
					if (MediaError.code == 4) {
						ajax_request("video", "do=report&vid='; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '&error-message="+ MediaError.message, "", "", false);
					}
				});
	
	
				'; ?>
<?php if (@_WATERMARKURL != ''): ?><?php echo '
				player.logobrand({
					image: "'; ?>
<?php echo @_WATERMARKURL; ?>
<?php echo '",
					destination: "'; ?>
<?php echo @_WATERMARKLINK; ?>
<?php echo '"
				});
				'; ?>
<?php endif; ?>
	
				<?php if ($this->_tpl_vars['video_data']['source_id'] == 0): ?>
				<?php echo '
				player.src([
					{
						src: "'; ?>
<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['streamer']; ?>
&mp4:<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['file']; ?>
<?php echo '", 
						type: "rtmp/mp4"
					}
				]);
				'; ?>

				<?php endif; ?>
	
				<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['localhost']['source_id'] || $this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['other']['source_id']): ?>
				<?php echo '
				player.src([
					{
						src: "'; ?>
<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '",
						type: '; ?>
<?php if ($this->_tpl_vars['video_data']['file_type'] != ''): ?>"<?php echo $this->_tpl_vars['video_data']['file_type']; ?>
" <?php else: ?> "video/flv" <?php endif; ?><?php echo '
					}
				]);
				'; ?>

				<?php endif; ?>
	
				<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['youtube']['source_id']): ?>
				<?php echo '
				player.src([{
					src: "'; ?>
<?php echo $this->_tpl_vars['video_data']['direct']; ?>
<?php echo '",
					type: "video/youtube"
				}]);
				'; ?>

				<?php endif; ?>

				<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['dailymotion']['source_id']): ?>
				<?php echo '
				player.src([{
					src: "'; ?>
<?php echo $this->_tpl_vars['video_data']['direct']; ?>
<?php echo '",
					type: "video/dailymotion"
				}]);
				'; ?>

				<?php endif; ?>

				<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['vimeo']['source_id']): ?>
				<?php echo '
				player.src([
					{
						src: "'; ?>
<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '",
						type: "video/mp4"
					}
				]);
				'; ?>

				<?php endif; ?>
	
				<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['mp3']['source_id']): ?>
				<?php echo '
				player.src([
					{
						src: "'; ?>
<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '",
						type: '; ?>
<?php if ($this->_tpl_vars['video_data']['file_type'] != ''): ?>"<?php echo $this->_tpl_vars['video_data']['file_type']; ?>
" <?php else: ?> "audio/mp3" <?php endif; ?><?php echo '
					}
				]);
				'; ?>

				<?php endif; ?>
				<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['imgur']['source_id'] || $this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['gfycat']['source_id']): ?>
				<?php echo '
				player.src([
					{
						src: "'; ?>
<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '",
						type: '; ?>
<?php if ($this->_tpl_vars['video_data']['file_type'] != ''): ?>"<?php echo $this->_tpl_vars['video_data']['file_type']; ?>
" <?php else: ?> "video/mp4" <?php endif; ?><?php echo '
					}
				]);
				'; ?>

				<?php endif; ?>


				<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['vbox7']['source_id']): ?>
				<?php echo '
				player.src([
					{
						src: "'; ?>
<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '",
						type: '; ?>
<?php if ($this->_tpl_vars['video_data']['file_type'] != ''): ?>"<?php echo $this->_tpl_vars['video_data']['file_type']; ?>
" <?php else: ?> "video/mp4" <?php endif; ?><?php echo '
					}
				]);
				'; ?>

				<?php endif; ?>




				<?php echo '
				player.on(\'waiting\', function() {
					$(\'.vjs-loading-spinner\').removeClass(\'vjs-hidden\');
				});

				player.persistvolume({
					namespace: "Melody-vjs-Volume"
				});

				player.socialShare({
					'; ?>
<?php if ($this->_tpl_vars['fb_app_id'] != ''): ?><?php echo '
					facebook: {},
					'; ?>
<?php endif; ?><?php echo '
					twitter: {}
				});

	
				'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
				player.play(); //autoplayback
				'; ?>
<?php endif; ?><?php echo '
				player.on(\'ended\', function() {
					'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
					window.location = "'; ?>
<?php echo $this->_tpl_vars['playlist_next_url']; ?>
<?php echo '";
					'; ?>
<?php else: ?><?php echo '
						if (pm_video_data.autoplay_next && pm_video_data.autoplay_next_url != "") {
							window.location = pm_video_data.autoplay_next_url;
						}
					'; ?>
<?php endif; ?><?php echo '
				});
				'; ?>

			});
			</script>
			</div>
	
	  <?php elseif ($this->_tpl_vars['video_data']['video_player'] == 'embed'): ?>
		<div id="Playerholder">
			<?php echo $this->_tpl_vars['video_data']['embed_code']; ?>

		</div>
	   <?php endif; ?>
	<?php endif; ?>
<?php endif; ?>


<?php if ($this->_tpl_vars['page'] == 'index'): ?>
  <?php if ($this->_tpl_vars['video_data']['video_player'] == 'flvplayer'): ?>
		<?php echo '
		<div id="Playerholder">
			<noscript>
				{$lang.enable_javascript}
			</noscript>
			<em>{$lang.please_wait}</em>
		</div>
	
		<script type="text/javascript">

		var clips = "[ { name: \'ClickToPlay\', overlayId: \'play\', url: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\' }, { name: \'\', url: \''; ?>
<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '\', '; ?>
<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['mp3']['source_id']): ?>type: 'mp3'<?php endif; ?><?php echo ' } ]";
		
		var flashvars = {
			config: "{ playList: " + clips + ", showPlayList: true,useSmoothing: true, baseURL: \'\', autoPlay: '; ?>
<?php echo $this->_tpl_vars['video_data']['video_player_autoplay']; ?>
<?php echo ', autoBuffering: '; ?>
<?php echo @_AUTOBUFF; ?>
<?php echo ', startingBufferLength: 2, bufferLength: 5, loop: false,hideControls: false,initialScale: \'fit\', showPlayListButtons: false, useNativeFullScreen: true,controlBarGloss: \'high\', controlsOverVideo: \'ease\', controlBarBackgroundColor: \'0x'; ?>
<?php echo @_BGCOLOR; ?>
<?php echo '\', progressBarColor1: \'0xFFFFFF\', progressBarColor2: \'0x000000\', timeDisplayFontColor: \'0x'; ?>
<?php echo @_TIMECOLOR; ?>
<?php echo '\', noVideoClip: { url: \''; ?>
<?php echo @_URL; ?>
/templates/<?php echo @_TPLFOLDER; ?>
/img/notfound.jpg<?php echo '\' },	useHwScaling: false,showMenu: false }"
		};
		var params = {
			allowfullscreen: "true",
			allowScriptAccess: "always",
			wmode: "transparent"
		};
		var attributes = {};
		swfobject.embedSWF("'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/flowplayer2/flowplayer.swf", "Playerholder", "'; ?>
<?php echo @_PLAYER_W_INDEX; ?>
<?php echo '", "'; ?>
<?php echo @_PLAYER_H_INDEX; ?>
<?php echo '", "9.0.115", false, flashvars, params, attributes);
		
		</script>
		'; ?>

  
  <?php elseif ($this->_tpl_vars['video_data']['video_player'] == 'jwplayer'): ?>
	   <div id="Playerholder">
			<noscript>
				<?php echo $this->_tpl_vars['lang']['enable_javascript']; ?>

			</noscript>
			<em><?php echo $this->_tpl_vars['lang']['please_wait']; ?>
</em>
		</div>
		<?php echo '
		<script type="text/javascript" src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer5/jwplayer.js"></script>
		<script type=\'text/javascript\'>
			var flashvars = {
				"flashplayer": "'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer5/jwplayer.swf",
				"playlist": [{
				'; ?>

				<?php if ($this->_tpl_vars['video_data']['source_id'] == 0): ?>
					file: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['file']; ?>
',
					streamer: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['streamer']; ?>
',
					<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['provider'] != ''): ?> provider: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['provider']; ?>
',<?php endif; ?>
					<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['startparam'] != ''): ?> 'http.startparam': '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['startparam']; ?>
',<?php endif; ?>
					<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['loadbalance'] != ''): ?> 'rtmp.loadbalance': '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['loadbalance']; ?>
',<?php endif; ?>
					<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['subscribe'] != ''): ?> 'rtmp.subscribe': '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['subscribe']; ?>
',<?php endif; ?>
				<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['youtube']['source_id']): ?>
					<?php echo '
					file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['direct']; ?>
<?php echo '\',
					image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
					'; ?>

				<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['gfycat']['source_id']): ?>
					<?php echo '
					file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
					'; ?>

				<?php else: ?>		
					<?php echo '
					file: \''; ?>
<?php echo @_URL2; ?>
<?php echo '/videos.php?vid='; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '\',
					'; ?>
<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['mp3']['source_id']): ?><?php echo '
					type: \'audio\',
					'; ?>
<?php else: ?><?php echo '
					type: \'video\',
					'; ?>
<?php endif; ?><?php echo '
					image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
					'; ?>

				<?php endif; ?>
				<?php echo '
				}],
				"controlbar": {
					"position": "bottom",
				},
				\'wmode\': \'transparent\',
				\'allowfullscreen\': \'true\',
				\'allowscriptaccess\': \'always\',
				\'allownetworking\': \'all\',
				\'name\': \''; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '\',
				\'id\': \''; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '\',
				\'width\': "100%",
				'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
				\'height\': "401px",
				\'autostart\': "true", 
				'; ?>
<?php else: ?><?php echo '
				\'height\': "'; ?>
<?php echo @_PLAYER_H_INDEX; ?>
<?php echo '",
				\'autostart\': "'; ?>
<?php echo $this->_tpl_vars['video_data']['video_player_autoplay']; ?>
<?php echo '", 
				'; ?>
<?php endif; ?><?php echo '
				\'enablejs\': "true",
				\'backcolor\': "'; ?>
<?php echo @_BGCOLOR; ?>
<?php echo '",
				\'frontcolor\': "'; ?>
<?php echo @_TIMECOLOR; ?>
<?php echo '",
				\'screencolor\': "000000",
				\'repeat\': "false",
				\'logo\': "'; ?>
<?php echo @_WATERMARKURL; ?>
<?php echo '",
				\'linktarget\': "_blank",
				\'link\': "'; ?>
<?php echo @_WATERMARKLINK; ?>
<?php echo '",
				\'image\': "'; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '", // XTRA
				\'bufferlength\': "5",
				\'shownavigation\':"true",
				\'skin\': "'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer5/skins/'; ?>
<?php echo @_JWSKIN; ?>
<?php echo '",
				\'stretching\': "fill",
					"plugins": {
						\'captions\': {
							'; ?>
<?php $_from = $this->_tpl_vars['video_subtitles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_subtitles']):
?><?php echo '
							file: "'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['filename']; ?>
<?php echo '",
							'; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '
						},
						\'sharing-3\': {
							\'link\': \''; ?>
<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
<?php echo '\',
							\'code\': encodeURIComponent(\''; ?>
<?php echo $this->_tpl_vars['embedcode']; ?>
<?php echo '\')
						},
						// \'timeslidertooltipplugin-3\': {},
					},
					"events": {
							onError: function(object) { 
								ajax_request("video", "do=report&vid='; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '&error-message="+ object.message, "", "", false);
							}
					}
			};
		'; ?>
<?php echo $this->_tpl_vars['jw_flashvars_override']; ?>
<?php echo '
		jwplayer("Playerholder").setup(flashvars);
		</script>
		'; ?>
	

  <?php elseif ($this->_tpl_vars['video_data']['video_player'] == 'jwplayer6'): ?>
		<div id="Playerholder">
			<noscript>
				<?php echo $this->_tpl_vars['lang']['enable_javascript']; ?>

			</noscript>
			<em><?php echo $this->_tpl_vars['lang']['please_wait']; ?>
</em>
		</div>
		<?php echo '
		<script type="text/javascript" src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer6/jwplayer.js"></script>
		<script type="text/javascript">jwplayer.key="'; ?>
<?php echo $this->_tpl_vars['jwplayerkey']; ?>
<?php echo '";</script>
		<script type="text/javascript">
		var flashvars = {
				'; ?>

					<?php if ($this->_tpl_vars['video_data']['source_id'] == 0): ?>
						file: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['file']; ?>
',
						streamer: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['streamer']; ?>
',
						<?php echo 'rtmp: {'; ?>

						<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['provider'] != ''): ?> provider: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['provider']; ?>
',<?php endif; ?>
						<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['startparam'] != ''): ?> startparam: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['startparam']; ?>
',<?php endif; ?>
						<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['loadbalance'] != ''): ?> loadbalance: <?php echo $this->_tpl_vars['video_data']['jw_flashvars']['loadbalance']; ?>
,<?php endif; ?>
						<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['subscribe'] != ''): ?> subscribe: <?php echo $this->_tpl_vars['video_data']['jw_flashvars']['subscribe']; ?>
,<?php endif; ?>
						<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['securetoken'] != ''): ?> securetoken: "<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['securetoken']; ?>
",<?php endif; ?>
						},
					<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['localhost']['source_id']): ?>
						<?php echo '
						file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
						image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
						'; ?>

					<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['youtube']['source_id']): ?>
						<?php echo '
						file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['direct']; ?>
<?php echo '\',
						//image: \'//img.youtube.com/vi/'; ?>
<?php echo $this->_tpl_vars['video_data']['yt_id']; ?>
<?php echo '/hqdefault.jpg\',
						'; ?>

					<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['mp3']['source_id']): ?>
						<?php echo '
						file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
						type: \'mp3\',
						//image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
',
					<?php else: ?>		
						<?php echo '
						file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
						//image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
',
					<?php endif; ?>
					<?php echo '
					flashplayer: "'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer6/jwplayer.flash.swf",                    
					primary: "html5",
					width: "100%",
					height: "'; ?>
<?php echo @_PLAYER_H_INDEX; ?>
<?php echo '",
					image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
					stretching: "fill",
					logo: {
						file: \''; ?>
<?php echo @_WATERMARKURL; ?>
<?php echo '\',
						link: \''; ?>
<?php echo @_WATERMARKLINK; ?>
<?php echo '\',
						},
					events: {
						onError: function(object) { 
						   ajax_request("video", "do=report&vid='; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '&error-message="+ object.message, "", "", false);
						}
					},
					autostart: \''; ?>
<?php echo $this->_tpl_vars['video_data']['video_player_autoplay']; ?>
<?php echo '\',
					"tracks": [
					'; ?>
<?php $_from = $this->_tpl_vars['video_subtitles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_subtitles']):
?><?php echo '
						{ file: "'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['filename']; ?>
<?php echo '", label: "'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['language']; ?>
<?php echo '", kind: "subtitles" },
					'; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '
					]
				};
			'; ?>
<?php echo $this->_tpl_vars['jw_flashvars_override']; ?>
<?php echo '
			jwplayer("Playerholder").setup(flashvars);
		</script>
		'; ?>


<?php elseif ($this->_tpl_vars['video_data']['video_player'] == 'jwplayer7'): ?>
		<div id="Playerholder">
			<noscript>
				<?php echo $this->_tpl_vars['lang']['enable_javascript']; ?>

			</noscript>
			<em><?php echo $this->_tpl_vars['lang']['please_wait']; ?>
</em>
		</div>
		<?php echo '
		<script type="text/javascript" src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer7/jwplayer.js"></script>
		<script type="text/javascript">jwplayer.key="'; ?>
<?php echo $this->_tpl_vars['jwplayer7key']; ?>
<?php echo '";</script>
		<script type="text/javascript">
		var flashvars = {
				'; ?>

					<?php if ($this->_tpl_vars['video_data']['source_id'] == 0): ?>
						file: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['file']; ?>
',
						image: '<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
',
						streamer: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['streamer']; ?>
',
						<?php echo 'rtmp: {'; ?>

						<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['provider'] != ''): ?> provider: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['provider']; ?>
',<?php endif; ?>
						<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['startparam'] != ''): ?> startparam: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['startparam']; ?>
',<?php endif; ?>
						<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['loadbalance'] != ''): ?> loadbalance: <?php echo $this->_tpl_vars['video_data']['jw_flashvars']['loadbalance']; ?>
,<?php endif; ?>
						<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['subscribe'] != ''): ?> subscribe: <?php echo $this->_tpl_vars['video_data']['jw_flashvars']['subscribe']; ?>
,<?php endif; ?>
						<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['securetoken'] != ''): ?> securetoken: "<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['securetoken']; ?>
",<?php endif; ?>
						},
					<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['localhost']['source_id']): ?>
						<?php echo '
						file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
						image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
						'; ?>

					<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['youtube']['source_id']): ?>
						<?php echo '
						file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['direct']; ?>
<?php echo '\',
						//image: \'//img.youtube.com/vi/'; ?>
<?php echo $this->_tpl_vars['video_data']['yt_id']; ?>
<?php echo '/hqdefault.jpg\',
						'; ?>

					<?php elseif ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['mp3']['source_id']): ?>
						<?php echo '
						file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
						type: \'mp3\',
						//image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
						'; ?>

					<?php else: ?>		
						<?php echo '
						file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
						//image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
						'; ?>

					<?php endif; ?>
					<?php echo '
					flashplayer: "'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer7/jwplayer.flash.swf",                    
					primary: "html5",
					width: "100%",
					height: "'; ?>
<?php echo @_PLAYER_H_INDEX; ?>
<?php echo '",
					image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
					stretching: "fill",
					logo: {
						file: \''; ?>
<?php echo @_WATERMARKURL; ?>
<?php echo '\',
						link: \''; ?>
<?php echo @_WATERMARKLINK; ?>
<?php echo '\',
						},
					events: {
						onError: function(object) { 
						   ajax_request("video", "do=report&vid='; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '&error-message="+ object.message, "", "", false);
						}
					},
					autostart: \''; ?>
<?php echo $this->_tpl_vars['video_data']['video_player_autoplay']; ?>
<?php echo '\',
					"tracks": [
					'; ?>
<?php $_from = $this->_tpl_vars['video_subtitles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_subtitles']):
?><?php echo '
						{ file: "'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['filename']; ?>
<?php echo '", label: "'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['language']; ?>
<?php echo '", kind: "subtitles" },
					'; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '
					]
				};
			'; ?>
<?php echo $this->_tpl_vars['jw_flashvars_override']; ?>
<?php echo '
			jwplayer("Playerholder").setup(flashvars);
		</script>
		'; ?>


		<?php elseif ($this->_tpl_vars['video_data']['video_player'] == 'videojs'): ?>
		<?php echo '
		<link href="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/video-js.min.css" rel="stylesheet">
		<script type="text/javascript" src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/video.js"></script>
		<script src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/plugins/videojs.persistvolume.js"></script>

		'; ?>
<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['youtube']['source_id']): ?><?php echo '
		<script src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/plugins/youtube.js"></script>
		'; ?>

		<?php endif; ?>
		<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['dailymotion']['source_id']): ?><?php echo '
		<script src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/plugins/dailymotion.js"></script>
		<script type="text/javascript">
			player.options.flash.swf = "'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/plugins/video-js.swf";
		</script>
		'; ?>

		<?php endif; ?>
		
		<script src="<?php echo @_URL2; ?>
/players/video-js/plugins/videojs.socialShare.js"></script>
		
		<?php if (@_WATERMARKURL != ''): ?>
		<?php echo '
		<script src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/video-js/plugins/videojs.logobrand.js"></script>
		'; ?>

		<?php endif; ?>
		<?php echo '

		<div id="Playerholder">
		<video src="" id="video-js" class="video-js vjs-default-skin" poster="'; ?>
<?php if ($this->_tpl_vars['video_data']['source_id'] != $this->_tpl_vars['_sources']['youtube']['source_id']): ?><?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php endif; ?><?php echo '" preload="auto" data-setup=\'{ "techOrder": ['; ?>
<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['youtube']['source_id']): ?>"youtube",<?php endif; ?><?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['dailymotion']['source_id']): ?>"dailymotion",<?php endif; ?><?php echo '"html5","flash"], "controls": true, "autoplay": '; ?>
<?php echo $this->_tpl_vars['video_data']['video_player_autoplay']; ?>
<?php echo ' }\' width="100%" height="'; ?>
<?php echo @_PLAYER_H_INDEX; ?>
<?php echo '">
		'; ?>
<?php $_from = $this->_tpl_vars['video_subtitles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_subtitles']):
?><?php echo '
		<track kind="captions" src="'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['filename']; ?>
<?php echo '" srclang="'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['video_subtitles']['language_tag'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
<?php echo '" label="'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['language']; ?>
<?php echo '">
		'; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '
		</video>

		<script type="text/javascript">
		var video = videojs(\'video-js\').ready(function(){
			var player = this;

			player.on(\'loadedmetadata\', function() {
				$(\'.vjs-big-play-button\').addClass(\'vjs-pm-show-big-play\');
				$(\'.vjs-control-bar\').css({"display": "block"});
			});
			
			player.on(\'error\', function(){
				var MediaError = player.error();
				
				if (MediaError.code == 4) {
					ajax_request("video", "do=report&vid='; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '&error-message="+ MediaError.message, "", "", false);
				}
			});

			'; ?>
<?php if (@_WATERMARKURL != ''): ?><?php echo '
			player.logobrand({
				image: "'; ?>
<?php echo @_WATERMARKURL; ?>
<?php echo '",
				destination: "'; ?>
<?php echo @_WATERMARKLINK; ?>
<?php echo '"
			});
			'; ?>
<?php endif; ?>


			<?php if ($this->_tpl_vars['video_data']['source_id'] == 0): ?>
			<?php echo '
			player.src([
				{
					src: "'; ?>
<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['streamer']; ?>
&mp4:<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['file']; ?>
<?php echo '", 
					type: "rtmp/mp4"
				}
			]);
			'; ?>

			<?php endif; ?>

			<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['localhost']['source_id'] || $this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['other']['source_id']): ?>
			<?php echo '
			player.src([
				{
					src: "'; ?>
<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '",
					type: '; ?>
<?php if ($this->_tpl_vars['video_data']['file_type'] != ''): ?>"<?php echo $this->_tpl_vars['video_data']['file_type']; ?>
" <?php else: ?> "video/flv" <?php endif; ?><?php echo '
				}
			]);
			'; ?>

			<?php endif; ?>
			
			<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['youtube']['source_id']): ?>
			<?php echo '
			player.src([{
				src: "'; ?>
<?php echo $this->_tpl_vars['video_data']['direct']; ?>
<?php echo '",
				type: "video/youtube"
			}]);
			'; ?>

			<?php endif; ?>

			<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['dailymotion']['source_id']): ?>
			<?php echo '
			player.src([{
				src: "'; ?>
<?php echo $this->_tpl_vars['video_data']['direct']; ?>
<?php echo '",
				type: "video/dailymotion"
			}]);
			'; ?>

			<?php endif; ?>

			<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['vimeo']['source_id']): ?>
			<?php echo '
			player.src([
				{
					src: "'; ?>
<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '",
					type: "video/mp4"
				}
			]);
			'; ?>

			<?php endif; ?>

			<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['mp3']['source_id']): ?>
			<?php echo '
			player.src([
				{
					src: "'; ?>
<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '",
					type: '; ?>
<?php if ($this->_tpl_vars['video_data']['file_type'] != ''): ?>"<?php echo $this->_tpl_vars['video_data']['file_type']; ?>
" <?php else: ?> "audio/mp3" <?php endif; ?><?php echo '
				}
			]);
			'; ?>

			<?php endif; ?>
			<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['imgur']['source_id'] || $this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['gfycat']['source_id']): ?>
			<?php echo '
			player.src([
				{
					src: "'; ?>
<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '",
					type: '; ?>
<?php if ($this->_tpl_vars['video_data']['file_type'] != ''): ?>"<?php echo $this->_tpl_vars['video_data']['file_type']; ?>
" <?php else: ?> "video/mp4" <?php endif; ?><?php echo '
				}
			]);
			'; ?>

			<?php endif; ?>
			
			<?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['vbox7']['source_id']): ?>
			<?php echo '
			player.src([
				{
					src: "'; ?>
<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '",
					type: '; ?>
<?php if ($this->_tpl_vars['video_data']['file_type'] != ''): ?>"<?php echo $this->_tpl_vars['video_data']['file_type']; ?>
" <?php else: ?> "video/mp4" <?php endif; ?><?php echo '
				}
			]);
			'; ?>

			<?php endif; ?>

			<?php echo '
			player.on(\'waiting\', function() {
				$(\'.vjs-loading-spinner\').removeClass(\'vjs-hidden\');
			});
			player.persistvolume({
				namespace: "Melody-vjs-Volume"
			});

			player.socialShare({
				'; ?>
<?php if ($this->_tpl_vars['fb_app_id'] != ''): ?><?php echo '
				facebook: {},
				'; ?>
<?php endif; ?><?php echo '
				twitter: {}
			});
		});
		</script>
		</div>
		'; ?>


	<?php elseif ($this->_tpl_vars['video_data']['video_player'] == 'embed'): ?>
		<div id="Playerholder">
			<?php echo $this->_tpl_vars['video_data']['embed_code']; ?>

		</div>
	<?php endif; ?>
<?php endif; ?>

<?php endif; ?>