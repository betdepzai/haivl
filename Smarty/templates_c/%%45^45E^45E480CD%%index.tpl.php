<?php /* Smarty version 2.6.20, created on 2016-02-09 14:05:07
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_advanced_video_list', 'index.tpl', 9, false),array('function', 'smarty_fewchars', 'index.tpl', 62, false),array('function', 'dropdown_menu_video_categories', 'index.tpl', 461, false),)), $this); ?>
<?php $this->_cache_serials['/home/admin/domains/hipmat.com/public_html/Smarty/templates_c/%%45^45E^45E480CD%%index.tpl.inc'] = 'b17fcafdb2c35e27cf99d10184ddf27c'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('p' => 'index')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 

<div id="wrapper">

<!-- Start 9gag grid -->
<div >
<div class="post-list-t1 cover">
	<div class="row no-gutter">
    <?php if ($this->caching && !$this->_cache_including): echo '{nocache:b17fcafdb2c35e27cf99d10184ddf27c#0}'; endif;echo smarty_get_advanced_video_list(array('assignto' => 'advanced_video_list','tag' => 'Hot','limit' => 9), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:b17fcafdb2c35e27cf99d10184ddf27c#0}'; endif;?>

        <?php $_from = $this->_tpl_vars['advanced_video_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
			<?php if ($this->_tpl_vars['k'] == 0): ?>
        		<div class="col-md-6 col-sm-12">
			<div class="badge-grid-item item hero clearfix list-headline">
				<a class="badge-evt img-container" href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
">
					<div class="responsivewrapper" style="background: url('<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
') center; background-size: cover;">
					</div>
					<div class="img-shadow">
					</div>
				</a>
				<div class="info">
					<a class="badge-evt title" href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
">
						<h4><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</h4>
					</a>
				</div>
			</div><!-- / item -->
		</div>
			
	        <?php else: ?>    
        
		<div class="col-md-3 col-sm-6">
			<div class="badge-grid-item item clearfix list-headline">
				<a class="badge-evt img-container" href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
">
					<div class="responsivewrapper" style="background: url('<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
') center; background-size: cover;">
					</div>
					<div class="img-shadow"></div>
				</a>
				<div class="info">
				    <a class="badge-evt title" href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
">
					    <h4><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</h4>
				    </a>
			    </div>
		    </div><!-- / item -->
		</div>
			<?php endif; ?>
         <?php endforeach; endif; unset($_from); ?>       
        
		

                	</div>
</div>
</div>
<!-- ENd 9gag grid -->



    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span8">
			<div id="primary">
				<?php if ($this->_tpl_vars['featured_videos_total'] == 1): ?>
					<div id="pm-featured" class="border-radius3">
					<h2 class="upper-blue"><?php echo $this->_tpl_vars['lang']['featured']; ?>
: <a href="<?php echo $this->_tpl_vars['featured_videos']['0']['video_href']; ?>
"><?php echo smarty_fewchars(array('s' => $this->_tpl_vars['featured_videos']['0']['video_title'],'length' => 55), $this);?>
</a></h2>
					<?php if ($this->_tpl_vars['display_preroll_ad'] == true): ?>
						<div id="preroll_placeholder">
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
							<br />
							<a href="#" class="btn btn-blue hide" id="preroll_skip_btn"><?php echo $this->_tpl_vars['lang']['preroll_ads_skip']; ?>
</a>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "player.tpl", 'smarty_include_vars' => array('page' => 'index','video_data' => $this->_tpl_vars['featured_videos']['0'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php endif; ?>
					</div>
				<?php elseif ($this->_tpl_vars['featured_videos_total'] > 1): ?>
				<div id="pm-featured" class="border-radius3">
					<h2 class="upper-blue"><i class="fa fa-thumbs-o-up"></i> <?php echo $this->_tpl_vars['lang']['homefeatured']; ?>
</h2>
						<div class="row-fluid row-featured">
							<div class="pm-featured-highlight">
								<a href="<?php echo $this->_tpl_vars['featured_videos']['0']['video_href']; ?>
" class="play-button"></a>
								<div class="pm-featured-highlight-title">
									<h3><a href="<?php echo $this->_tpl_vars['featured_videos']['0']['video_href']; ?>
"><?php echo smarty_fewchars(array('s' => $this->_tpl_vars['featured_videos']['0']['video_title'],'length' => 55), $this);?>
</a></h3>
								</div>
								<a href="<?php echo $this->_tpl_vars['featured_videos']['0']['video_href']; ?>
">
									<img src="<?php echo $this->_tpl_vars['featured_videos']['0']['thumb_img_url']; ?>
" width="100%" height="100%" class="pm-featured-highlight-img" />
								</a>
							</div>

							<div class="pm-featured-sidelist">
								<ul class="pm-ul-featured-videos" id="pm-ul-featured">
									<?php $_from = $this->_tpl_vars['featured_videos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['featured_video_data']):
?>
										<?php if ($this->_tpl_vars['k'] > 0): ?>
											<li>
												<span class="pm-video-thumb pm-thumb-120 pm-thumb-top border-radius2">
													<span class="pm-video-li-thumb-info">
														<?php if ($this->_tpl_vars['featured_video_data']['yt_length'] > 0): ?>
															<span class="pm-label-duration border-radius3 opac7"><?php echo $this->_tpl_vars['featured_video_data']['duration']; ?>
</span>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['logged_in']): ?>
														<span class="watch-later hide">
															<button class="btn btn-mini watch-later-add-btn-<?php echo $this->_tpl_vars['featured_video_data']['id']; ?>
" onclick="watch_later_add(<?php echo $this->_tpl_vars['featured_video_data']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['add_to']; ?>
 <?php echo $this->_tpl_vars['lang']['watch_later']; ?>
"><i class="icon-time"></i></button>
															<button class="btn btn-mini btn-remove hide watch-later-remove-btn-<?php echo $this->_tpl_vars['featured_video_data']['id']; ?>
" onclick="watch_later_remove(<?php echo $this->_tpl_vars['featured_video_data']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['playlist_remove_item']; ?>
"><i class="icon-ok"></i></button>
														</span>
														<?php endif; ?>
													</span>
													<a href="<?php echo $this->_tpl_vars['featured_video_data']['video_href']; ?>
" class="pm-thumb-fix pm-thumb-120"><span class="pm-thumb-fix-clip"><img src="<?php echo $this->_tpl_vars['featured_video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['featured_video_data']['attr_alt']; ?>
" width="120"><span class="vertical-align"></span></span></a>
												</span>
												<h3><a href="<?php echo $this->_tpl_vars['featured_video_data']['video_href']; ?>
" class="pm-title-link"><?php echo smarty_fewchars(array('s' => $this->_tpl_vars['featured_video_data']['video_title'],'length' => 60), $this);?>
</a></h3>
											</li>
										<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?>
								</ul>
								<div class="clearfix"></div>
							</div>
						</div>
				</div>
				<?php endif; ?>

				<?php if ($this->_tpl_vars['total_playingnow'] > 0): ?>
				<div id="pm-wn">
					<h2 class="upper-blue"><?php echo $this->_tpl_vars['lang']['vbwrn']; ?>
</h2>
					<div class="btn-group btn-group-sort pm-slide-control">
					<button class="btn btn-mini prev" id="pm-slide-prev"><i class="pm-vc-sprite arr-l"></i></button>
					<button class="btn btn-mini next" id="pm-slide-next"><i class="pm-vc-sprite arr-r"></i></button>
					</div>
					<div id="pm-slide">
					<!-- Carousel items -->
					<ul class="pm-ul-wn-videos clearfix" id="pm-ul-wn-videos">
					<?php $_from = $this->_tpl_vars['playingnow']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
					  <li>
						<div class="pm-li-wn-videos">
						<span class="pm-video-thumb pm-thumb-145 pm-thumb-top border-radius2">
						<span class="pm-video-li-thumb-info">
							<?php if ($this->_tpl_vars['logged_in']): ?>
							<span class="watch-later hide">
								<button class="btn btn-mini watch-later-add-btn-<?php echo $this->_tpl_vars['video_data']['id']; ?>
" onclick="watch_later_add(<?php echo $this->_tpl_vars['video_data']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['add_to']; ?>
 <?php echo $this->_tpl_vars['lang']['watch_later']; ?>
"><i class="icon-time"></i></button>
								<button class="btn btn-mini btn-remove hide watch-later-remove-btn-<?php echo $this->_tpl_vars['video_data']['id']; ?>
" onclick="watch_later_remove(<?php echo $this->_tpl_vars['video_data']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['playlist_remove_item']; ?>
"><i class="icon-ok"></i></button>
							</span>
							<?php endif; ?>
						</span>
						<a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-thumb-fix pm-thumb-145"><span class="pm-thumb-fix-clip"><img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" width="145"><span class="vertical-align"></span></span></a>
						</span>
						<h3><a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-title-link"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a></h3>
						</div>
					  </li>
					<?php endforeach; endif; unset($_from); ?>
					</ul>
					</div><!-- #pm-slide -->
				</div>
				<hr />
				<div class="clear-fix"></div>
		        <?php endif; ?>


<!-- start homeblock -->
				<div class="element-videos">

            <h2 class="upper-blue niceheading">EM BÉ SIÊU DỄ THƯƠNG</h2>
            <ul class="pm-ul-browse-videos thumbnails" id="pm-grid">
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:b17fcafdb2c35e27cf99d10184ddf27c#1}'; endif;echo smarty_get_advanced_video_list(array('assignto' => 'advanced_video_list','category_id' => 4,'limit' => 6), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:b17fcafdb2c35e27cf99d10184ddf27c#1}'; endif;?>

            <?php $_from = $this->_tpl_vars['advanced_video_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
              <li>
               <div class="pm-li-video">
                  <span class="pm-video-thumb pm-thumb-145 pm-thumb border-radius2">
                  <span class="pm-video-li-thumb-info">
                  <?php if ($this->_tpl_vars['video_data']['yt_length'] != 0): ?><span class="pm-label-duration border-radius3 opac7"><?php echo $this->_tpl_vars['video_data']['duration']; ?>
</span><?php endif; ?>
                  <?php if ($this->_tpl_vars['video_data']['mark_new']): ?><span class="label label-new"><?php echo $this->_tpl_vars['lang']['_new']; ?>
</span><?php endif; ?>
                  <?php if ($this->_tpl_vars['video_data']['mark_popular']): ?><span class="label label-pop"><?php echo $this->_tpl_vars['lang']['_popular']; ?>
</span><?php endif; ?>
                  </span>
                  <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-thumb-fix pm-thumb-145"><span class="pm-thumb-fix-clip"><img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" width="145"><span class="vertical-align"></span></span></a>
                  </span>
                  <h3 dir="ltr"><a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-title-link" title="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a></h3>
                  <div class="pm-video-attr">
                     <span class="pm-video-attr-author"><?php echo $this->_tpl_vars['lang']['articles_by']; ?>
 <a href="<?php echo $this->_tpl_vars['video_data']['author_profile_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['author_name']; ?>
</a></span>
                     <span class="pm-video-attr-since"><small><?php echo $this->_tpl_vars['lang']['added']; ?>
 <time datetime="<?php echo $this->_tpl_vars['video_data']['html5_datetime']; ?>
" title="<?php echo $this->_tpl_vars['video_data']['full_datetime']; ?>
"><?php echo $this->_tpl_vars['video_data']['time_since_added']; ?>
 <?php echo $this->_tpl_vars['lang']['ago']; ?>
</time></small></span>
                     <span class="pm-video-attr-numbers"><small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
 / <?php echo $this->_tpl_vars['video_data']['likes_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['_likes']; ?>
</small></span>
                  </div>
                  <p class="pm-video-attr-desc"><?php echo $this->_tpl_vars['video_data']['excerpt']; ?>
</p>
                  <?php if ($this->_tpl_vars['video_data']['featured']): ?>
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
         </div><!-- .element-videos -->
<!-- .widget -->
<!-- End homeblock -->

<!-- start homeblock -->
				<div class="element-videos">

            <h2 class="upper-blue niceheading">CHANNEL VIỆT NAM SIÊU BỰA</h2>
            <ul class="pm-ul-browse-videos thumbnails" id="pm-grid">
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:b17fcafdb2c35e27cf99d10184ddf27c#2}'; endif;echo smarty_get_advanced_video_list(array('assignto' => 'advanced_video_list','category_id' => 10,'limit' => 6), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:b17fcafdb2c35e27cf99d10184ddf27c#2}'; endif;?>

            <?php $_from = $this->_tpl_vars['advanced_video_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
              <li>
               <div class="pm-li-video">
                  <span class="pm-video-thumb pm-thumb-145 pm-thumb border-radius2">
                  <span class="pm-video-li-thumb-info">
                  <?php if ($this->_tpl_vars['video_data']['yt_length'] != 0): ?><span class="pm-label-duration border-radius3 opac7"><?php echo $this->_tpl_vars['video_data']['duration']; ?>
</span><?php endif; ?>
                  <?php if ($this->_tpl_vars['video_data']['mark_new']): ?><span class="label label-new"><?php echo $this->_tpl_vars['lang']['_new']; ?>
</span><?php endif; ?>
                  <?php if ($this->_tpl_vars['video_data']['mark_popular']): ?><span class="label label-pop"><?php echo $this->_tpl_vars['lang']['_popular']; ?>
</span><?php endif; ?>
                  </span>
                  <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-thumb-fix pm-thumb-145"><span class="pm-thumb-fix-clip"><img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" width="145"><span class="vertical-align"></span></span></a>
                  </span>
                  <h3 dir="ltr"><a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-title-link" title="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a></h3>
                  <div class="pm-video-attr">
                     <span class="pm-video-attr-author"><?php echo $this->_tpl_vars['lang']['articles_by']; ?>
 <a href="<?php echo $this->_tpl_vars['video_data']['author_profile_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['author_name']; ?>
</a></span>
                     <span class="pm-video-attr-since"><small><?php echo $this->_tpl_vars['lang']['added']; ?>
 <time datetime="<?php echo $this->_tpl_vars['video_data']['html5_datetime']; ?>
" title="<?php echo $this->_tpl_vars['video_data']['full_datetime']; ?>
"><?php echo $this->_tpl_vars['video_data']['time_since_added']; ?>
 <?php echo $this->_tpl_vars['lang']['ago']; ?>
</time></small></span>
                     <span class="pm-video-attr-numbers"><small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
 / <?php echo $this->_tpl_vars['video_data']['likes_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['_likes']; ?>
</small></span>
                  </div>
                  <p class="pm-video-attr-desc"><?php echo $this->_tpl_vars['video_data']['excerpt']; ?>
</p>
                  <?php if ($this->_tpl_vars['video_data']['featured']): ?>
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
         </div><!-- .element-videos -->
<!-- .widget -->
<!-- End homeblock -->

<!-- start homeblock -->
<div class="element-videos">

            <h2 class="upper-blue niceheading">CLIP ĐỘNG VẬT CÓ KHIẾU HÀI</h2>
            <ul class="pm-ul-browse-videos thumbnails" id="pm-grid">
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:b17fcafdb2c35e27cf99d10184ddf27c#3}'; endif;echo smarty_get_advanced_video_list(array('assignto' => 'advanced_video_list','category_id' => 7,'limit' => 6), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:b17fcafdb2c35e27cf99d10184ddf27c#3}'; endif;?>

            <?php $_from = $this->_tpl_vars['advanced_video_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
              <li>
               <div class="pm-li-video">
                  <span class="pm-video-thumb pm-thumb-145 pm-thumb border-radius2">
                  <span class="pm-video-li-thumb-info">
                  <?php if ($this->_tpl_vars['video_data']['yt_length'] != 0): ?><span class="pm-label-duration border-radius3 opac7"><?php echo $this->_tpl_vars['video_data']['duration']; ?>
</span><?php endif; ?>
                  <?php if ($this->_tpl_vars['video_data']['mark_new']): ?><span class="label label-new"><?php echo $this->_tpl_vars['lang']['_new']; ?>
</span><?php endif; ?>
                  <?php if ($this->_tpl_vars['video_data']['mark_popular']): ?><span class="label label-pop"><?php echo $this->_tpl_vars['lang']['_popular']; ?>
</span><?php endif; ?>
                  </span>
                  <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-thumb-fix pm-thumb-145"><span class="pm-thumb-fix-clip"><img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" width="145"><span class="vertical-align"></span></span></a>
                  </span>
                  <h3 dir="ltr"><a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-title-link" title="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a></h3>
                  <div class="pm-video-attr">
                     <span class="pm-video-attr-author"><?php echo $this->_tpl_vars['lang']['articles_by']; ?>
 <a href="<?php echo $this->_tpl_vars['video_data']['author_profile_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['author_name']; ?>
</a></span>
                     <span class="pm-video-attr-since"><small><?php echo $this->_tpl_vars['lang']['added']; ?>
 <time datetime="<?php echo $this->_tpl_vars['video_data']['html5_datetime']; ?>
" title="<?php echo $this->_tpl_vars['video_data']['full_datetime']; ?>
"><?php echo $this->_tpl_vars['video_data']['time_since_added']; ?>
 <?php echo $this->_tpl_vars['lang']['ago']; ?>
</time></small></span>
                     <span class="pm-video-attr-numbers"><small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
 / <?php echo $this->_tpl_vars['video_data']['likes_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['_likes']; ?>
</small></span>
                  </div>
                  <p class="pm-video-attr-desc"><?php echo $this->_tpl_vars['video_data']['excerpt']; ?>
</p>
                  <?php if ($this->_tpl_vars['video_data']['featured']): ?>
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
         </div><!-- .element-videos -->
<!-- .widget -->
<!-- End homeblock -->

<!-- start homeblock -->
<div class="element-videos">

            <h2 class="upper-blue niceheading">CLIP BÁ ĐẠO, HÀI ĐỠ KHÔNG NỔI</h2>
            <ul class="pm-ul-browse-videos thumbnails" id="pm-grid">
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:b17fcafdb2c35e27cf99d10184ddf27c#4}'; endif;echo smarty_get_advanced_video_list(array('assignto' => 'advanced_video_list','category_id' => 9,'limit' => 6), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:b17fcafdb2c35e27cf99d10184ddf27c#4}'; endif;?>

            <?php $_from = $this->_tpl_vars['advanced_video_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
              <li>
               <div class="pm-li-video">
                  <span class="pm-video-thumb pm-thumb-145 pm-thumb border-radius2">
                  <span class="pm-video-li-thumb-info">
                  <?php if ($this->_tpl_vars['video_data']['yt_length'] != 0): ?><span class="pm-label-duration border-radius3 opac7"><?php echo $this->_tpl_vars['video_data']['duration']; ?>
</span><?php endif; ?>
                  <?php if ($this->_tpl_vars['video_data']['mark_new']): ?><span class="label label-new"><?php echo $this->_tpl_vars['lang']['_new']; ?>
</span><?php endif; ?>
                  <?php if ($this->_tpl_vars['video_data']['mark_popular']): ?><span class="label label-pop"><?php echo $this->_tpl_vars['lang']['_popular']; ?>
</span><?php endif; ?>
                  </span>
                  <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-thumb-fix pm-thumb-145"><span class="pm-thumb-fix-clip"><img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" width="145"><span class="vertical-align"></span></span></a>
                  </span>
                  <h3 dir="ltr"><a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-title-link" title="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a></h3>
                  <div class="pm-video-attr">
                     <span class="pm-video-attr-author"><?php echo $this->_tpl_vars['lang']['articles_by']; ?>
 <a href="<?php echo $this->_tpl_vars['video_data']['author_profile_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['author_name']; ?>
</a></span>
                     <span class="pm-video-attr-since"><small><?php echo $this->_tpl_vars['lang']['added']; ?>
 <time datetime="<?php echo $this->_tpl_vars['video_data']['html5_datetime']; ?>
" title="<?php echo $this->_tpl_vars['video_data']['full_datetime']; ?>
"><?php echo $this->_tpl_vars['video_data']['time_since_added']; ?>
 <?php echo $this->_tpl_vars['lang']['ago']; ?>
</time></small></span>
                     <span class="pm-video-attr-numbers"><small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
 / <?php echo $this->_tpl_vars['video_data']['likes_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['_likes']; ?>
</small></span>
                  </div>
                  <p class="pm-video-attr-desc"><?php echo $this->_tpl_vars['video_data']['excerpt']; ?>
</p>
                  <?php if ($this->_tpl_vars['video_data']['featured']): ?>
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
         </div><!-- .element-videos -->
<!-- .widget -->
<!-- End homeblock -->
				
<!-- 			<div class="element-videos">

				<h2 class="upper-blue niceheading"><?php echo $this->_tpl_vars['lang']['new_videos']; ?>
</h2>
				<ul class="pm-ul-browse-videos thumbnails" id="pm-grid">
				<?php $_from = $this->_tpl_vars['new_videos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
				  <li>
					<div class="pm-li-video">
						<span class="pm-video-thumb pm-thumb-145 pm-thumb border-radius2">
						<span class="pm-video-li-thumb-info">
						<?php if ($this->_tpl_vars['video_data']['yt_length'] != 0): ?><span class="pm-label-duration border-radius3 opac7"><?php echo $this->_tpl_vars['video_data']['duration']; ?>
</span><?php endif; ?>
						<?php if ($this->_tpl_vars['video_data']['mark_new']): ?><span class="label label-new"><?php echo $this->_tpl_vars['lang']['_new']; ?>
</span><?php endif; ?>
						<?php if ($this->_tpl_vars['video_data']['mark_popular']): ?><span class="label label-pop"><?php echo $this->_tpl_vars['lang']['_popular']; ?>
</span><?php endif; ?>
						<?php if ($this->_tpl_vars['logged_in']): ?>
						<span class="watch-later hide">
							<button class="btn btn-mini watch-later-add-btn-<?php echo $this->_tpl_vars['video_data']['id']; ?>
" onclick="watch_later_add(<?php echo $this->_tpl_vars['video_data']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['add_to']; ?>
 <?php echo $this->_tpl_vars['lang']['watch_later']; ?>
"><i class="icon-time"></i></button>
							<button class="btn btn-mini btn-remove hide watch-later-remove-btn-<?php echo $this->_tpl_vars['video_data']['id']; ?>
" onclick="watch_later_remove(<?php echo $this->_tpl_vars['video_data']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['playlist_remove_item']; ?>
"><i class="icon-ok"></i></button>
						</span>
						<?php endif; ?>
						</span>
						<a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-thumb-fix pm-thumb-145"><span class="pm-thumb-fix-clip"><img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" width="145"><span class="vertical-align"></span></span></a>
						</span>
						<h3><a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-title-link" title="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a></h3>
						<div class="pm-video-attr">
							<span class="pm-video-attr-author"><?php echo $this->_tpl_vars['lang']['articles_by']; ?>
 <a href="<?php echo $this->_tpl_vars['video_data']['author_profile_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['author_name']; ?>
</a></span>
							<span class="pm-video-attr-since"><small><?php echo $this->_tpl_vars['lang']['added']; ?>
 <time datetime="<?php echo $this->_tpl_vars['video_data']['html5_datetime']; ?>
" title="<?php echo $this->_tpl_vars['video_data']['full_datetime']; ?>
"><?php echo $this->_tpl_vars['video_data']['time_since_added']; ?>
 <?php echo $this->_tpl_vars['lang']['ago']; ?>
</time></small></span>
							<span class="pm-video-attr-numbers"><small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
 / <?php echo $this->_tpl_vars['video_data']['likes_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['_likes']; ?>
</small></span>
						</div>
						<p class="pm-video-attr-desc"><?php echo $this->_tpl_vars['video_data']['excerpt']; ?>
</p>
						<?php if ($this->_tpl_vars['video_data']['featured']): ?>
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
			</div> -->
			<!-- .element-videos -->

			<div class="clearfix"></div>
			</div><!-- #primary -->
        </div><!-- .span8 -->

        <div class="span4" id="secondary">
        <?php if ($this->_tpl_vars['ad_5'] != ''): ?>
		<div class="widget">
        	<div class="pm-ad-zone" align="center">
        	<div class="homeads"><?php echo $this->_tpl_vars['ad_5']; ?>
</div>
        	</div>
        </div><!-- .widget -->
        <?php endif; ?>

<!-- Newvideos -->
        <div class="widget-related widget" id="pm-related" >
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#" data-target="#bestincategory" data-toggle="tab"><i class="fa fa-play-circle-o"></i>Hot trong tháng</a></li>
            
          </ul>
 
          <div id="pm-tabs" class="tab-content">
            <div class="tab-pane fade in active" id="bestincategory2">
                <ul class="pm-ul-top-videos">
                <?php if ($this->caching && !$this->_cache_including): echo '{nocache:b17fcafdb2c35e27cf99d10184ddf27c#5}'; endif;echo smarty_get_advanced_video_list(array('assignto' => 'advanced_video_list','category_id' => $this->_tpl_vars['category_id_anhtai'],'order_by' => 'site_views','days_ago' => 30,'limit' => 12), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:b17fcafdb2c35e27cf99d10184ddf27c#5}'; endif;?>

                <?php $_from = $this->_tpl_vars['advanced_video_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
					
                    	<span class="pm-video-attr-numbers">
                        <small><i class="fa fa-eye"></i> <?php echo $this->_tpl_vars['related_video_data']['views_compact']; ?>
</small>
                        
                        </span>
                    
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
            
            
          </div>
          
        </div><!-- .shadow-div -->
        <!-- End Newvideos -->

<!-- Start Original Hotvideo -->
    <!--     <div class="widget topvideo">
            <div class="btn-group btn-group-sort pm-slide-control">
            <button class="btn btn-mini prev" id="pm-slide-top-prev"><i class="pm-vc-sprite arr-l"></i></button>
            <button class="btn btn-mini next" id="pm-slide-top-next"><i class="pm-vc-sprite arr-r"></i></button>
            </div>
            <h4><?php echo $this->_tpl_vars['lang']['top_m_videos']; ?>
</h4>
            <ul class="pm-ul-top-videos" id="pm-ul-top-videos">
			<?php $_from = $this->_tpl_vars['top_videos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
			  <li>
				<div class="pm-li-top-videos">
				<span class="pm-video-thumb pm-thumb-106 pm-thumb-top border-radius2">
				<span class="pm-video-li-thumb-info">
				<?php if ($this->_tpl_vars['video_data']['yt_length'] != 0): ?><span class="pm-label-duration border-radius3 opac7"><?php echo $this->_tpl_vars['video_data']['duration']; ?>
</span><?php endif; ?>
				<?php if ($this->_tpl_vars['logged_in']): ?>
				<span class="watch-later hide">
					<button class="btn btn-mini watch-later-add-btn-<?php echo $this->_tpl_vars['video_data']['id']; ?>
" onclick="watch_later_add(<?php echo $this->_tpl_vars['video_data']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['add_to']; ?>
 <?php echo $this->_tpl_vars['lang']['watch_later']; ?>
"><i class="icon-time"></i></button>
					<button class="btn btn-mini btn-remove hide watch-later-remove-btn-<?php echo $this->_tpl_vars['video_data']['id']; ?>
" onclick="watch_later_remove(<?php echo $this->_tpl_vars['video_data']['id']; ?>
); return false;" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['playlist_remove_item']; ?>
"><i class="icon-ok"></i></button>
				</span>
				<?php endif; ?>
				</span>
				<a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-thumb-fix pm-thumb-106"><span class="pm-thumb-fix-clip"><img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" width="150"><span class="vertical-align"></span></span></a>
				</span>
				<h3><a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="pm-title-link"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a></h3>
				<span class="pm-video-attr-numbers"><small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small></span>
				</div>
			  </li>
			<?php endforeach; endif; unset($_from); ?>
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- END Original Hotvideo -->
        
		<div class="widget">
			<h4><?php echo $this->_tpl_vars['lang']['_categories']; ?>
</h4>
		<ul class="pm-browse-ul-subcats">
			<?php echo smarty_html_list_categories(array('max_levels' => 0), $this);?>

        </ul>
        </div><!-- .widget -->
        
        <?php if (( $this->_tpl_vars['show_tags'] == 1 ) && ( count ( $this->_tpl_vars['tags'] ) > 0 )): ?>
		<div class="widget">
			<h4><?php echo $this->_tpl_vars['lang']['tags']; ?>
</h4>
            <?php $_from = $this->_tpl_vars['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['tag']):
?>
                <?php echo $this->_tpl_vars['tag']['href']; ?>

            <?php endforeach; endif; unset($_from); ?>
        </div><!-- .widget -->
        <?php endif; ?>
        
        <?php if ($this->_tpl_vars['show_stats'] == 1): ?>
        <div class="widget">
        	<h4><?php echo $this->_tpl_vars['lang']['site_stats']; ?>
</h4>
        <ul class="pm-stats-data">
        	<li><a href="<?php echo @_URL; ?>
/memberlist.<?php echo @_FEXT; ?>
?do=online"><?php echo $this->_tpl_vars['lang']['online_users']; ?>
</a> <span class="pm-stats-count"><?php echo $this->_tpl_vars['stats']['online_users']; ?>
</span></li>
            <li><a href="<?php echo @_URL; ?>
/memberlist.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['total_users']; ?>
</a> <span class="pm-stats-count"><?php echo $this->_tpl_vars['stats']['users']; ?>
</span></li>
            <li><?php echo $this->_tpl_vars['lang']['total_videos']; ?>
 <span class="pm-stats-count"><?php echo $this->_tpl_vars['stats']['videos']; ?>
</span></li>
        	<li><?php echo $this->_tpl_vars['lang']['videos_added_lw']; ?>
 <span class="pm-stats-count"><?php echo $this->_tpl_vars['stats']['videos_last_week']; ?>
</span></li>
        </ul>
		</div><!-- .widget -->
        <?php endif; ?>
        
        <?php if (@_MOD_ARTICLE == 1): ?>
        <div class="widget">
			<h4><?php echo $this->_tpl_vars['lang']['articles_latest']; ?>
</h4>
            <ul class="pm-ul-home-articles" id="pm-ul-home-articles">
            <?php $_from = $this->_tpl_vars['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['article']):
?>
				<li <?php if ($this->_tpl_vars['article']['featured'] == '1'): ?>class="sticky-article"<?php endif; ?>>
				<article>
				<?php if ($this->_tpl_vars['article']['meta']['_post_thumb_show'] != ''): ?>
				<div class="pm-article-thumb">
					<a href="<?php echo $this->_tpl_vars['article']['link']; ?>
" class="pm-title-link" title="<?php echo $this->_tpl_vars['article']['title']; ?>
"><img src="<?php echo @_ARTICLE_ATTACH_DIR; ?>
/<?php echo $this->_tpl_vars['article']['meta']['_post_thumb_show']; ?>
" align="left" width="55" height="55" border="0" alt="<?php echo $this->_tpl_vars['article']['title']; ?>
"></a>
				</div>
				<?php endif; ?>
				<h6 dir="ltr" class="ellipsis"><a href="<?php echo $this->_tpl_vars['article']['link']; ?>
" class="pm-title-link" title="<?php echo $this->_tpl_vars['article']['title']; ?>
"><?php echo smarty_fewchars(array('s' => $this->_tpl_vars['article']['title'],'length' => 92), $this);?>
</a></h6>
				<p class="pm-article-preview">
					<?php if ($this->_tpl_vars['article']['meta']['_post_thumb_show'] == ''): ?>
						<span class="minDesc"><?php echo smarty_fewchars(array('s' => $this->_tpl_vars['article']['excerpt'],'length' => 130), $this);?>
</span>
					<?php else: ?>
						<span class="minDesc"><?php echo smarty_fewchars(array('s' => $this->_tpl_vars['article']['excerpt'],'length' => 100), $this);?>
</span>
					<?php endif; ?>
				</p>
				</article>
				</li>
            <?php endforeach; endif; unset($_from); ?>
            </ul>
        </div><!-- .widget -->
        <?php endif; ?>
		</div><!-- .span4 -->
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array('p' => 'index')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 