<?php /* Smarty version 2.6.20, created on 2016-03-05 11:19:54
         compiled from video-watch.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'echo_securimage_sid', 'video-watch.tpl', 186, false),array('function', 'smarty_fewchars', 'video-watch.tpl', 303, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('p' => 'detail','tpl_name' => "video-watch")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="wrapper">
<?php if ($this->_tpl_vars['show_addthis_widget'] == '1'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'widget-socialite.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
    <div class="container-fluid">
    
    <?php if ($this->_tpl_vars['playlist']): ?>
	<div class="row-fluid">
    <div class="span12">
        <div class="pm-video-head">
        <?php if ($this->_tpl_vars['logged_in'] && $this->_tpl_vars['is_admin'] == 'yes'): ?>
        <div class="btn-action-group pull-right">
        <a href="#" onclick="return confirm_action('Are you sure you want to move this video to the Trash?', '<?php echo @_URL; ?>
/<?php echo @_ADMIN_FOLDER; ?>
/modify.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
&a=3'); return false;" rel="tooltip" class="btn btn-mini btn-danger" title="<?php echo $this->_tpl_vars['lang']['trash']; ?>
 (<?php echo $this->_tpl_vars['lang']['_admin_only']; ?>
)" target="_blank"><?php echo $this->_tpl_vars['lang']['trash']; ?>
</a> <a href="<?php echo @_URL; ?>
/<?php echo @_ADMIN_FOLDER; ?>
/modify.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
" rel="tooltip" class="btn btn-mini" title="<?php echo $this->_tpl_vars['lang']['edit']; ?>
 (<?php echo $this->_tpl_vars['lang']['_admin_only']; ?>
)" target="_blank"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a>
        </div>
        <?php endif; ?>
        <h1 class="entry-title" itemprop="name"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</h1>
        <meta itemprop="duration" content="<?php echo $this->_tpl_vars['video_data']['iso8601_duration']; ?>
" />
        <meta itemprop="thumbnailUrl" content="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" />
        <meta itemprop="contentURL" content="<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
" />
        <?php if ($this->_tpl_vars['video_data']['allow_embedding'] == 1): ?>
		<meta itemprop="embedURL" content="<?php echo $this->_tpl_vars['video_data']['embed_href']; ?>
" />
        <?php endif; ?>
        <meta itemprop="uploadDate" content="<?php echo $this->_tpl_vars['video_data']['html5_datetime']; ?>
" />
        <div class="row-fluid">
            <div class="span6">
            <?php if ($this->_tpl_vars['video_data']['featured'] == 1): ?>
                <span class="label label-featured"><?php echo $this->_tpl_vars['lang']['featured']; ?>
</span>
            <?php endif; ?>
            </div>
            <div class="span6">
            <ul class="pm-video-adjust">
                <li><a id="player_extend" href="#"><i class="icon-resize-full opac7"></i> <?php echo $this->_tpl_vars['lang']['resize']; ?>
</a></li>
            </ul>
            </div>
        </div>
        </div><!--.pm-video-head-->
    </div>
    </div>
    <?php endif; ?>
    <div class="row-fluid">
        <div class="span8">
		<div id="primary" itemprop="video" itemscope itemtype="http://schema.org/VideoObject">
        <?php if (! $this->_tpl_vars['playlist']): ?>
        <div class="row-fluid">
        <div class="span12">
            <div class="pm-video-head">
            <?php if ($this->_tpl_vars['logged_in'] && $this->_tpl_vars['is_admin'] == 'yes'): ?>
            <div class="btn-action-group pull-right">
            <a href="#" onclick="return confirm_action('Are you sure you want to move this video to the Trash?', '<?php echo @_URL; ?>
/<?php echo @_ADMIN_FOLDER; ?>
/modify.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
&a=3'); return false;" rel="tooltip" class="btn btn-mini btn-danger" title="<?php echo $this->_tpl_vars['lang']['trash']; ?>
 (<?php echo $this->_tpl_vars['lang']['_admin_only']; ?>
)" target="_blank"><?php echo $this->_tpl_vars['lang']['trash']; ?>
</a> <a href="<?php echo @_URL; ?>
/<?php echo @_ADMIN_FOLDER; ?>
/modify.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
" rel="tooltip" class="btn btn-mini" title="<?php echo $this->_tpl_vars['lang']['edit']; ?>
 (<?php echo $this->_tpl_vars['lang']['_admin_only']; ?>
)" target="_blank"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a>
            </div>
            <?php endif; ?>
            <h1 class="entry-title" itemprop="name"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</h1>
            <meta itemprop="duration" content="<?php echo $this->_tpl_vars['video_data']['iso8601_duration']; ?>
" />
            <meta itemprop="thumbnailUrl" content="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" />
            <meta itemprop="contentURL" content="<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
" />
            <?php if ($this->_tpl_vars['video_data']['allow_embedding'] == 1): ?>
			<meta itemprop="embedURL" content="<?php echo $this->_tpl_vars['video_data']['embed_href']; ?>
" />
            <?php endif; ?>
            <meta itemprop="uploadDate" content="<?php echo $this->_tpl_vars['video_data']['html5_datetime']; ?>
" />
            <div class="row-fluid">
                <div class="span6">
                <?php if ($this->_tpl_vars['video_data']['featured'] == 1): ?>
                    <span class="label label-featured"><?php echo $this->_tpl_vars['lang']['featured']; ?>
</span>
                <?php endif; ?>
                </div>
                <div class="span6">
                <ul class="pm-video-adjust">
                    <li><a id="player_extend" href="#"><i class="icon-resize-full opac7"></i> <?php echo $this->_tpl_vars['lang']['resize']; ?>
</a></li>
                </ul>
                </div>
            </div>
            </div><!--.pm-video-head-->
        </div>
        </div>
        <?php endif; ?>
<div class="row-fluid">
	<div class="span12">
        <div class="pm-player-full-width">

	   	    <div id="video-wrapper">
            <?php if ($this->_tpl_vars['display_preroll_ad'] == true): ?>
            <div id="preroll_placeholder" class="border-radius4">
				<div class="preroll_countdown">
				<?php echo $this->_tpl_vars['lang']['preroll_ads_timeleft']; ?>
 <span class="preroll_timeleft"><?php echo $this->_tpl_vars['preroll_ad_data']['timeleft_start']; ?>
</span>
				</div>
				<?php echo $this->_tpl_vars['preroll_ad_data']['code']; ?>

				<?php if ($this->_tpl_vars['preroll_ad_data']['skip']): ?>
				<div class="preroll_skip_countdown">
				   <?php echo $this->_tpl_vars['lang']['preroll_ads_skip_msg']; ?>
 <span class="preroll_skip_timeleft"><?php echo $this->_tpl_vars['preroll_ad_data']['skip_delay_seconds']; ?>
</span>
				</div>
				<div class="preroll_skip_button">
				<button class="btn btn-blue hide" id="preroll_skip_btn"><?php echo $this->_tpl_vars['lang']['preroll_ads_skip']; ?>
</button>
				</div>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['preroll_ad_data']['disable_stats'] == 0): ?>
					<img src="<?php echo @_URL; ?>
/ajax.php?p=stats&do=show&aid=<?php echo $this->_tpl_vars['preroll_ad_data']['id']; ?>
&at=<?php echo @_AD_TYPE_PREROLL; ?>
" width="1" height="1" border="0" />
				<?php endif; ?>
            </div>
            <?php else: ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "player.tpl", 'smarty_include_vars' => array('page' => 'detail')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>
	        </div><!--#video-wrapper-->


            <div class="pm-video-control">
            <div class="row-fluid">
                <div class="span4">
                    <button class="btn btn-small border-radius0 btn-video <?php if ($this->_tpl_vars['bin_rating_vote_value'] == 1): ?>active<?php endif; ?>" id="bin-rating-like" type="button"><i class="pm-vc-sprite i-vote-up"></i> <?php echo $this->_tpl_vars['lang']['_like']; ?>
</button>
                    <button class="btn btn-small border-radius0 btn-video <?php if ($this->_tpl_vars['bin_rating_vote_value'] == 0 && $this->_tpl_vars['bin_rating_vote_value'] !== false): ?>active<?php endif; ?>" id="bin-rating-dislike" type="button"><i class="pm-vc-sprite i-vote-down"></i></button>
                </div>
                
                <div class="span8">
                	<div class="pull-right">
                        <button class="btn btn-small border-radius0 btn-video" type="button" data-toggle="button" id="pm-vc-share"><i class="icon-share-alt"></i> <?php echo $this->_tpl_vars['lang']['_share']; ?>
</button>
                        <input type="hidden" name="bin-rating-uniq_id" value="<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
">
                        <?php if ($this->_tpl_vars['logged_in']): ?>
						<button class="btn btn-small border-radius0 btn-video" type="button" data-toggle="button" id="pm-vc-playlists" data-video-id="<?php echo $this->_tpl_vars['video_data']['id']; ?>
" title="<?php echo $this->_tpl_vars['lang']['add_to_playlist']; ?>
"><i class="pm-vc-sprite i-playlists"></i> <?php echo $this->_tpl_vars['lang']['add_to']; ?>
</button>
						<?php endif; ?>
                        <button class="btn btn-small border-radius0 btn-video" type="button" data-toggle="button" id="pm-vc-report" rel="tooltip" data-placement="right" title="<?php echo $this->_tpl_vars['lang']['report_video']; ?>
"><i class="pm-vc-sprite i-report"></i></button>
					</div>
                </div>
            </div>
            </div><!--.pm-video-control-->

            <div id="bin-rating-response" class="hide well well-small"></div>
            <div id="bin-rating-like-confirmation" class="hide well well-small alert alert-well">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p><?php echo $this->_tpl_vars['lang']['confirm_like']; ?>
</p>
                <div class="row-fluid">
                    <div class="span3 panel-1">
                    <a href="https://www.facebook.com/sharer.php?u=<?php echo $this->_tpl_vars['facebook_like_href']; ?>
&amp;t=<?php echo $this->_tpl_vars['facebook_like_title']; ?>
" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" rel="tooltip" title="Share on FaceBook"><i class="pm-vc-sprite facebook-icon"></i></a>
                    <a href="https://twitter.com/home?status=Watching%20<?php echo $this->_tpl_vars['facebook_like_title']; ?>
%20on%20<?php echo $this->_tpl_vars['facebook_like_href']; ?>
" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" rel="tooltip" title="Share on Twitter"><i class="pm-vc-sprite twitter-icon"></i></a>
                    <a href="https://plus.google.com/share?url=<?php echo $this->_tpl_vars['facebook_like_href']; ?>
" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" rel="tooltip" title="Share on Google+"><i class="pm-vc-sprite google-icon"></i></a>
                    </div>
                    <div class="span9 panel-3">
                    <div class="input-prepend"><span class="add-on">URL</span><input name="share_video_link" id="share_video_link" type="text" value="<?php echo $this->_tpl_vars['video_data']['video_href_urldecoded']; ?>
" class="span11" onClick="SelectAll('share_video_link');"></div>
                    </div>
                </div>
            </div>
            <div id="bin-rating-dislike-confirmation" class="hide-dislike hide well well-small">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p><?php echo $this->_tpl_vars['lang']['confirm_dislike']; ?>
</p>
            </div><!--#bin-rating-like-confirmation-->
    
			<div id="pm-vc-playlists-content" class="hide">
			<?php if ($this->_tpl_vars['logged_in']): ?>
                <h2 class="upper-blue"><?php echo $this->_tpl_vars['lang']['my_playlists']; ?>
</h2>
				<div id="playlist-ajax-response" class="hide"></div>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "video-watch-playlists.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<div id="playlist-create-ajax-response" class="hide"></div>
				
				<form class="form-inline pm-playlist-add-form">
					<input type="text" class="span7" name="playlist_name" placeholder="<?php echo $this->_tpl_vars['lang']['playlist_enter_name']; ?>
">
					<select name="visibility" class="span3">
						<option value="<?php echo @PLAYLIST_PUBLIC; ?>
"><?php echo $this->_tpl_vars['lang']['public']; ?>
</option>
						<option value="<?php echo @PLAYLIST_PRIVATE; ?>
"><?php echo $this->_tpl_vars['lang']['private']; ?>
</option>
					</select>
					<input type="hidden" name="video_id" value="<?php echo $this->_tpl_vars['video_data']['id']; ?>
" />
					<button type="submit" id="create_playlist_submit_btn" class="btn" onclick="playlist_create(this, 'video-watch'); return false;" disabled><?php echo $this->_tpl_vars['lang']['playlist_create_new']; ?>
</button>
				</form>
            <?php else: ?>
				<div class="alert alert-danger">
					<?php echo $this->_tpl_vars['lang']['playlist_msg_login_required']; ?>

				</div>
			<?php endif; ?>
			</div>  
    
            <div id="pm-vc-report-content" class="hide well well-small alert alert-well">
                <div id="report-confirmation" class="hide"></div>
                <form name="reportvideo" action="" method="POST" class="form-inline">
                  <input type="hidden" id="name" name="name" class="input-small" value="<?php if ($this->_tpl_vars['logged_in']): ?><?php echo $this->_tpl_vars['s_name']; ?>
<?php endif; ?>">
                  <input type="hidden" id="email" name="email" class="input-small" value="<?php if ($this->_tpl_vars['logged_in']): ?><?php echo $this->_tpl_vars['s_email']; ?>
<?php endif; ?>">
                
                  <select name="reason" class="input-medium inp-small">
                    <option value="<?php echo $this->_tpl_vars['lang']['report_form1']; ?>
" selected="selected"><?php echo $this->_tpl_vars['lang']['report_form1']; ?>
</option>
                    <option value="<?php echo $this->_tpl_vars['lang']['report_form4']; ?>
"><?php echo $this->_tpl_vars['lang']['report_form4']; ?>
</option>
                    <option value="<?php echo $this->_tpl_vars['lang']['report_form5']; ?>
"><?php echo $this->_tpl_vars['lang']['report_form5']; ?>
</option>
                    <option value="<?php echo $this->_tpl_vars['lang']['report_form6']; ?>
"><?php echo $this->_tpl_vars['lang']['report_form6']; ?>
</option>
                    <option value="<?php echo $this->_tpl_vars['lang']['report_form7']; ?>
"><?php echo $this->_tpl_vars['lang']['report_form7']; ?>
</option>
                  </select>
                  
                  <?php if (! $this->_tpl_vars['logged_in']): ?>
                    <input type="text" name="imagetext" class="input-small inp-small" autocomplete="off" placeholder="<?php echo $this->_tpl_vars['lang']['confirm_comment']; ?>
">
                    <button class="btn btn-small btn-link" onclick="document.getElementById('securimage-report').src = '<?php echo @_URL; ?>
/include/securimage_show.php?sid=' + Math.random(); return false;"><i class="icon-refresh"></i> </button>
                    <img src="<?php echo @_URL; ?>
/include/securimage_show.php?sid=<?php echo smarty_echo_securimage_sid(array(), $this);?>
" id="securimage-report" alt="" class="border-radius3">
                  <?php endif; ?>
                  <button type="submit" name="Submit" class="btn btn-danger" value="<?php echo $this->_tpl_vars['lang']['submit_send']; ?>
"><?php echo $this->_tpl_vars['lang']['report_video']; ?>
</button>
                  <input type="hidden" name="p" value="detail">
                  <input type="hidden" name="do" value="report">
                  <input type="hidden" name="vid" value="<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
">
                </form>
            </div><!-- #pm-vc-report-content-->
    
            <div id="pm-vc-share-content" class="alert alert-well">
                <div class="row-fluid">
                    <div class="span4 panel-1">
                    <div class="input-prepend"><span class="add-on">URL</span><input name="video_link" id="video_link" type="text" value="<?php echo $this->_tpl_vars['video_data']['video_href_urldecoded']; ?>
" class="input-medium" onClick="SelectAll('video_link');"></div>
                    </div>
                    <div class="span5 panel-2">
                    <?php if ($this->_tpl_vars['video_data']['allow_embedding'] == 1): ?>
					<button class="btn border-radius0 btn-video" type="button" id="pm-vc-embed"><?php echo $this->_tpl_vars['lang']['_embed']; ?>
</button>
                    <?php endif; ?>
                    <button class="btn border-radius0 btn-video" type="button" data-toggle="button" id="pm-vc-email"><i class="icon-envelope"></i> <?php echo $this->_tpl_vars['lang']['email_video']; ?>
</button>
                    </div>
                    <div class="span3 panel-3">
                    <a href="https://www.facebook.com/sharer.php?u=<?php echo $this->_tpl_vars['facebook_like_href']; ?>
&amp;t=<?php echo $this->_tpl_vars['facebook_like_title']; ?>
" onclick="javascript:window.open(this.href,
      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" rel="tooltip" title="Share on FaceBook"><i class="pm-vc-sprite facebook-icon"></i></a>
                    <a href="https://twitter.com/home?status=Watching%20<?php echo $this->_tpl_vars['facebook_like_title']; ?>
%20on%20<?php echo $this->_tpl_vars['facebook_like_href']; ?>
" onclick="javascript:window.open(this.href,
      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" rel="tooltip" title="Share on Twitter"><i class="pm-vc-sprite twitter-icon"></i></a>
                    <a href="https://plus.google.com/share?url=<?php echo $this->_tpl_vars['facebook_like_href']; ?>
" onclick="javascript:window.open(this.href,
      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" rel="tooltip" title="Share on Google+"><i class="pm-vc-sprite google-icon"></i></a>  
                    </div>
                </div>
    
                <?php if ($this->_tpl_vars['video_data']['allow_embedding'] == 1): ?>
                <div id="pm-vc-embed-content">
                  <hr />
                  <textarea name="pm-embed-code" id="pm-embed-code" rows="3" class="span12" onClick="SelectAll('pm-embed-code');"><?php echo $this->_tpl_vars['embedcode_to_share']; ?>
</textarea>
                </div>
                <?php endif; ?>
                <div id="pm-vc-email-content">
                    <hr />
                    <div id="share-confirmation" class="hide well well-small"></div>
                    <form name="sharetofriend" action="" method="POST" class="form-inline">
                      <input type="text" id="name" name="name" class="input-small inp-small" value="<?php echo $this->_tpl_vars['s_name']; ?>
" placeholder="<?php echo $this->_tpl_vars['lang']['your_name']; ?>
">
                      <input type="text" id="email" name="email" class="input-small inp-small" placeholder="<?php echo $this->_tpl_vars['lang']['friends_email']; ?>
">
                      <?php if (! $this->_tpl_vars['logged_in']): ?>   
                          <input type="text" name="imagetext" class="input-small inp-small" autocomplete="off" placeholder="<?php echo $this->_tpl_vars['lang']['confirm_comment']; ?>
">
                          <button class="btn btn-small btn-link" onclick="document.getElementById('securimage-share').src = '<?php echo @_URL; ?>
/include/securimage_show.php?sid=' + Math.random(); return false;"><i class="icon-refresh"></i> </button>
                          <img src="<?php echo @_URL; ?>
/include/securimage_show.php?sid=<?php echo smarty_echo_securimage_sid(array(), $this);?>
" id="securimage-share" alt="">
                      <?php endif; ?>
                      <input type="hidden" name="p" value="detail">
                      <input type="hidden" name="do" value="share">
                      <input type="hidden" name="vid" value="<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
">
                      <button type="submit" name="Submit" class="btn btn-success"><?php echo $this->_tpl_vars['lang']['submit_send']; ?>
</button>
                    </form>
                </div>
            </div><!-- #pm-vc-share-content -->
            
			<div class="row-fluid pm-author-data">
                <div class="span2">
                    <span class="pm-avatar">
                        <a href="<?php echo $this->_tpl_vars['video_data']['author_profile_href']; ?>
"><img src="<?php echo $this->_tpl_vars['video_data']['author_avatar_url']; ?>
" height="50" width="50" alt="" class="img-polaroid" border="0"></a>
                        <?php if ($this->_tpl_vars['video_data']['author_data']['channel_verified'] == 1 && @_MOD_SOCIAL): ?><a href="#" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['verified_channel']; ?>
" class="pm-verified-user"><img src="<?php echo @_URL; ?>
/templates/<?php echo @_TPLFOLDER; ?>
/img/ico-verified.png" /></a><?php endif; ?>
                    </span>
                </div>

                <div class="span7">
                	<div class="pm-submit-data"><?php echo $this->_tpl_vars['lang']['added']; ?>
 <time datetime="<?php echo $this->_tpl_vars['video_data']['html5_datetime']; ?>
" title="<?php echo $this->_tpl_vars['video_data']['full_datetime']; ?>
"><?php echo $this->_tpl_vars['video_data']['time_since_added']; ?>
 <?php echo $this->_tpl_vars['lang']['ago']; ?>
</time> <?php echo $this->_tpl_vars['lang']['_by']; ?>
 <a href="<?php echo $this->_tpl_vars['video_data']['author_profile_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['author_name']; ?>
</a> <?php echo $this->_tpl_vars['lang']['_in']; ?>
 <?php echo $this->_tpl_vars['category_name']; ?>
</div>   
                    <div class="clearfix"></div>
                    <?php if (@_MOD_SOCIAL && $this->_tpl_vars['logged_in'] == '1' && $this->_tpl_vars['video_data']['author_user_id'] != $this->_tpl_vars['s_user_id']): ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user-subscribe-button.tpl", 'smarty_include_vars' => array('profile_data' => $this->_tpl_vars['video_data'],'profile_user_id' => $this->_tpl_vars['video_data']['author_user_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php endif; ?>
                </div>

                <div class="span3 pm-video-views-count pull-right">
                    <span class="pm-vc-views">
                    <strong><?php echo $this->_tpl_vars['video_data']['site_views_formatted']; ?>
</strong>
                    <small><?php echo $this->_tpl_vars['lang']['views']; ?>
</small>
                    </span>
                    <div class="clearfix"></div>
                    <div class="progress" title="<?php echo $this->_tpl_vars['video_data']['up_vote_count_formatted']; ?>
 <?php echo $this->_tpl_vars['lang']['_likes']; ?>
, <?php echo $this->_tpl_vars['video_data']['down_vote_count_formatted']; ?>
 <?php echo $this->_tpl_vars['lang']['_dislikes']; ?>
">
                      <div class="bar bar-success" id="rating-bar-up-pct" style="width: <?php echo $this->_tpl_vars['video_data']['up_pct']; ?>
%;"></div>
                      <div class="bar bar-danger" id="rating-bar-down-pct" style="width: <?php echo $this->_tpl_vars['video_data']['down_pct']; ?>
%;"></div>
                    </div>
                </div><!--.pm-video-control-->
            </div><!--.pm-author-data-->
        </div><!--end pm-player-full-width -->
	</div>
</div>

<?php if ($this->_tpl_vars['ad_3'] != ''): ?>
<div class="pm-ad-zone" align="center"><?php echo $this->_tpl_vars['ad_3']; ?>
</div>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['video_data']['description'] )): ?>
<h2 class="upper-blue"><?php echo $this->_tpl_vars['lang']['description']; ?>
</h2>
<div class="description pm-video-description">
	<p itemprop="description"><?php echo $this->_tpl_vars['video_data']['description']; ?>
</p>
</div>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['tags'] )): ?>
<div class="video-tags">
	<strong><?php echo $this->_tpl_vars['lang']['tags']; ?>
</strong>: <?php echo $this->_tpl_vars['tags']; ?>

</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "comments.tpl", 'smarty_include_vars' => array('tpl_name' => "video-watch",'allow_comments' => $this->_tpl_vars['video_data']['allow_comments'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		</div><!-- #primary -->
        </div><!-- .span8 -->
        
        <div class="span4 pm-sidebar <?php if ($this->_tpl_vars['playlist']): ?>pm-sidebar-with-playlist<?php endif; ?>">
		<div id="secondary">

		<?php if ($this->_tpl_vars['playlist']): ?>
		<div class="pm-sidebar-playlist">

			<div class="pm-playlist-header">
				<div class="pm-playlist-name">
					<a href="#"><?php echo smarty_fewchars(array('s' => $this->_tpl_vars['playlist']['title'],'length' => 40), $this);?>
</a>
				</div>
				<div class="pm-playlist-data">
					<span class="pm-playlist-creator">
                		<?php echo $this->_tpl_vars['lang']['_by']; ?>
 <a href="<?php echo $this->_tpl_vars['playlist']['user_profile_href']; ?>
"><?php echo $this->_tpl_vars['playlist']['user_name']; ?>
</a>
					</span> 
					&ndash; 
					<span class="pm-playlist-video-count">
						<?php if ($this->_tpl_vars['playlist']['items_count'] == 1): ?>
							1 <?php echo $this->_tpl_vars['lang']['_video']; ?>

						<?php else: ?>
							<?php echo $this->_tpl_vars['playlist']['items_count']; ?>
 <?php echo $this->_tpl_vars['lang']['videos']; ?>

						<?php endif; ?>
					</span>
				</div>
			</div>
			<div class="pm-playlist-controls">
				<a href="<?php echo $this->_tpl_vars['playlist_prev_url']; ?>
" rel="nofollow"><i class="icon-fast-backward icon-white opac7" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['playlist_prev_video']; ?>
"></i></a> 
				<a href="<?php echo $this->_tpl_vars['playlist_next_url']; ?>
" rel="nofollow"><i class="icon-fast-forward icon-white opac7" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['playlist_next_video']; ?>
"></i></a> 
			</div>


            <div class="pm-video-playlist">
                <ul class="unstyled">
                	<?php $_from = $this->_tpl_vars['playlist_items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['list_video']):
?>
                	<li <?php if ($this->_tpl_vars['video_data']['id'] == $this->_tpl_vars['list_video']['id']): ?>class="pm-video-playlist-playing"<?php endif; ?>>
                    <a href="<?php echo $this->_tpl_vars['list_video']['playlist_video_href']; ?>
" class="pm-video-playlist-href" rel="nofollow"></a>

                		<span class="pm-video-index">
                		<?php if ($this->_tpl_vars['video_data']['id'] == $this->_tpl_vars['list_video']['id']): ?>
							&#9658;
						<?php else: ?>
							<?php echo $this->_tpl_vars['index']+1; ?>

						<?php endif; ?>
						</span>
						<span class="pm-video-thumb pm-thumb-80">
							<span class="pm-video-li-thumb-info">
								<span class="pm-video-li-thumb-info">
									<?php if ($this->_tpl_vars['list_video']['yt_length'] > 0): ?><span class="pm-label-duration border-radius3 opac7"><?php echo $this->_tpl_vars['list_video']['duration']; ?>
</span><?php endif; ?>
									<?php if ($this->_tpl_vars['logged_in']): ?>
									<span class="watch-later hide">
										<button class="btn btn-mini watch-later-add-btn-<?php echo $this->_tpl_vars['list_video']['id']; ?>
" onclick="watch_later_add(<?php echo $this->_tpl_vars['list_video']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['add_to']; ?>
 <?php echo $this->_tpl_vars['lang']['watch_later']; ?>
"><i class="icon-time"></i></button>
										<button class="btn btn-mini btn-remove hide watch-later-remove-btn-<?php echo $this->_tpl_vars['list_video']['id']; ?>
" onclick="watch_later_remove(<?php echo $this->_tpl_vars['list_video']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['playlist_remove_item']; ?>
"><i class="icon-ok"></i></button>
									</span>
									<?php endif; ?>
								</span>
								<a href="<?php echo $this->_tpl_vars['list_video']['playlist_video_href']; ?>
" class="pm-thumb-fix pm-thumb-80" rel="nofollow">
									<span class="pm-thumb-fix-clip">
										<img src="<?php echo $this->_tpl_vars['list_video']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['list_video']['video_title']; ?>
" width="80">
										<span class="vertical-align"></span>
									</span>
								</a>
							</span>
						</span>
						<h3><a href="<?php echo $this->_tpl_vars['list_video']['playlist_video_href']; ?>
" class="pm-title-link"  rel="nofollow"><?php echo $this->_tpl_vars['list_video']['video_title']; ?>
</a></h3>
						<div class="pm-video-attr">
							<span class="pm-video-attr-numbers">
								<small><?php echo $this->_tpl_vars['list_video']['site_views']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small></small></span>
						</div>
						<?php if ($this->_tpl_vars['list_video']['featured']): ?>
						<span class="pm-video-li-info"> 
							<span class="label label-featured"><?php echo $this->_tpl_vars['lang']['_feat']; ?>
</span>
						</span>
						<?php endif; ?>
						
                	</li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
			</div>
        </div>
        <div class="clearfix"></div>
		<?php endif; ?>
		

        <div class="widget-related widget" id="pm-related">
		<?php if (! $this->_tpl_vars['playlist'] && $this->_tpl_vars['video_data']['video_player_autoplay_next_support']): ?>
		<div class="pm-autoplay-select">
			<div class="pm-autoplay-info">
			<?php echo $this->_tpl_vars['lang']['_autoplay']; ?>
 <i class="icon-info-sign" rel="tooltip" data-original-title="<?php echo $this->_tpl_vars['lang']['autoplay_description']; ?>
"></i>
			</div>
			<div class="pm-autoplay-switch">
			    <input type="checkbox" name="pm-autoplay-switch" class="autoplayonoff-checkbox" id="autoplayonoff" <?php if ($_COOKIE['pm_autoplay_next'] == 'on'): ?>checked="checked"<?php endif; ?>>
			    <label class="autoplayonoff-label" for="autoplayonoff">
			        <span class="autoplayonoff-inner"></span>
			        <span class="autoplayonoff-switch"></span>
			    </label>
			</div>
		</div>
		<?php endif; ?>
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#bestincategory" data-target="#bestincategory" data-toggle="tab"><?php echo $this->_tpl_vars['lang']['tab_related']; ?>
</a></li>
            <li> / </li>
            <li><a href="#popular" data-target="#popular" data-toggle="tab"><?php echo $this->_tpl_vars['lang']['_popular']; ?>
</a></li>
          </ul>
 
          <div id="pm-tabs" class="tab-content">
            <div class="tab-pane fade in active" id="bestincategory">
				<ul class="pm-ul-top-videos pm-ul-sidelist-videos">
                <?php $_from = $this->_tpl_vars['related_video_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['related_video_data']):
?>
				  <li>
					<div class="pm-li-top-videos">
					<span class="pm-video-thumb pm-thumb-106 pm-thumb-top border-radius2">
					<span class="pm-video-li-thumb-info">
					<?php if ($this->_tpl_vars['related_video_data']['yt_length'] > 0): ?><span class="pm-label-duration border-radius3 opac7"><?php echo $this->_tpl_vars['related_video_data']['duration']; ?>
</span><?php endif; ?>
					<?php if ($this->_tpl_vars['logged_in']): ?>
					<span class="watch-later hide">
						<button class="btn btn-mini watch-later-add-btn-<?php echo $this->_tpl_vars['related_video_data']['id']; ?>
" onclick="watch_later_add(<?php echo $this->_tpl_vars['related_video_data']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['add_to']; ?>
 <?php echo $this->_tpl_vars['lang']['watch_later']; ?>
"><i class="icon-time"></i></button>
						<button class="btn btn-mini btn-remove hide watch-later-remove-btn-<?php echo $this->_tpl_vars['related_video_data']['id']; ?>
" onclick="watch_later_remove(<?php echo $this->_tpl_vars['related_video_data']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['playlist_remove_item']; ?>
"><i class="icon-ok"></i></button>
					</span>
					<?php endif; ?>
					</span>
                    <a href="<?php echo $this->_tpl_vars['related_video_data']['video_href']; ?>
" class="pm-thumb-fix pm-thumb-145"><span class="pm-thumb-fix-clip"><img src="<?php echo $this->_tpl_vars['related_video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['related_video_data']['attr_alt']; ?>
" width="145"><span class="vertical-align"></span></span></a>
					</span>
					<h3><a href="<?php echo $this->_tpl_vars['related_video_data']['video_href']; ?>
" class="pm-title-link"><?php echo $this->_tpl_vars['related_video_data']['video_title']; ?>
</a></h3>
                    <div class="pm-video-attr">
                    	<span class="pm-video-attr-numbers"><small><?php echo $this->_tpl_vars['related_video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small></span>
                    </div>
					<?php if ($this->_tpl_vars['related_video_data']['featured']): ?>
					<span class="pm-video-li-info">
					    <span class="label label-featured"><?php echo $this->_tpl_vars['lang']['_feat']; ?>
</span>
					</span>
					<?php endif; ?>
					</div>
				  </li>
				<?php endforeach; else: ?>
				  <?php echo $this->_tpl_vars['lang']['top_videos_msg2']; ?>

				<?php endif; unset($_from); ?>
                </ul>
            </div>
            <div class="tab-pane fade" id="popular">
                <ul class="pm-ul-top-videos">
                <?php $_from = $this->_tpl_vars['popular_video_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['popular_video_data']):
?>
				  <li>
					<div class="pm-li-top-videos">
					<span class="pm-video-thumb pm-thumb-106 pm-thumb-top border-radius2">
					<span class="pm-video-li-thumb-info">
					<?php if ($this->_tpl_vars['popular_video_data']['yt_length'] > 0): ?><span class="pm-label-duration border-radius3 opac7"><?php echo $this->_tpl_vars['popular_video_data']['duration']; ?>
</span><?php endif; ?>
					<?php if ($this->_tpl_vars['logged_in']): ?>
					<span class="watch-later hide">
						<button class="btn btn-mini watch-later-add-btn-<?php echo $this->_tpl_vars['popular_video_data']['id']; ?>
" onclick="watch_later_add(<?php echo $this->_tpl_vars['popular_video_data']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['add_to']; ?>
 <?php echo $this->_tpl_vars['lang']['watch_later']; ?>
"><i class="icon-time"></i></button>
						<button class="btn btn-mini btn-remove hide watch-later-remove-btn-<?php echo $this->_tpl_vars['popular_video_data']['id']; ?>
" onclick="watch_later_remove(<?php echo $this->_tpl_vars['popular_video_data']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['playlist_remove_item']; ?>
"><i class="icon-ok"></i></button>
					</span>
					<?php endif; ?>
					</span>
                    <a href="<?php echo $this->_tpl_vars['popular_video_data']['video_href']; ?>
" class="pm-thumb-fix pm-thumb-145"><span class="pm-thumb-fix-clip"><img src="<?php echo $this->_tpl_vars['popular_video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['popular_video_data']['attr_alt']; ?>
" width="145"><span class="vertical-align"></span></span></a>
					</span>
					<h3><a href="<?php echo $this->_tpl_vars['popular_video_data']['video_href']; ?>
" class="pm-title-link"><?php echo $this->_tpl_vars['popular_video_data']['video_title']; ?>
</a></h3>
                    <div class="pm-video-attr">
                    	<span class="pm-video-attr-numbers"><small><?php echo $this->_tpl_vars['popular_video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small></span>
                    </div>
					<?php if ($this->_tpl_vars['popular_video_data']['featured']): ?>
					<span class="pm-video-li-info">
					    <span class="label label-featured"><?php echo $this->_tpl_vars['lang']['_feat']; ?>
</span>
					</span>
					<?php endif; ?>
					</div>
				  </li>
				<?php endforeach; else: ?>
				  <?php echo $this->_tpl_vars['lang']['top_videos_msg2']; ?>

				<?php endif; unset($_from); ?>
                </ul>
            </div>
          </div>
          
        </div><!-- .shadow-div -->
        
		</div><!-- #secondary -->
        </div><!-- #sidebar -->
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array('p' => 'detail','tpl_name' => "video-watch")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>