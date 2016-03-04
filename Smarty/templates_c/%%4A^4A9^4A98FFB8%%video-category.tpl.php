<?php /* Smarty version 2.6.20, created on 2016-02-09 14:05:08
         compiled from video-category.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_advanced_video_list', 'video-category.tpl', 8, false),)), $this); ?>
<?php $this->_cache_serials['/home/admin/domains/hipmat.com/public_html/Smarty/templates_c/%%4A^4A9^4A98FFB8%%video-category.tpl.inc'] = '5012a5fa4efe4a979f3fd07a8834fc76'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('p' => 'general','tpl_name' => "video-category")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="wrapper">
<!-- Grid banner -->
<div >
<div class="post-list-t1 cover">
	<div class="row no-gutter">
    <?php if ($this->caching && !$this->_cache_including): echo '{nocache:5012a5fa4efe4a979f3fd07a8834fc76#0}'; endif;echo smarty_get_advanced_video_list(array('assignto' => 'advanced_video_list','category_id' => $this->_tpl_vars['cat_id'],'featured' => '1','limit' => 5), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5012a5fa4efe4a979f3fd07a8834fc76#0}'; endif;?>

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

<!-- Grid banner -->
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span8">
		<div id="primary">
			<h1 class="niceheading sameh2"><i class="fa fa-folder-o"></i> <?php echo $this->_tpl_vars['gv_category_name']; ?>
</h1>
            
            <div class="btn-group btn-group-sort">
            <button class="btn btn-small" id="list"><i class="icon-th"></i> </button>
            <button class="btn btn-small" id="grid"><i class="icon-th-list"></i> </button>
            <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" data-target="#" href="">
            <?php if ($this->_tpl_vars['gv_sortby'] == ''): ?><?php echo $this->_tpl_vars['lang']['sorting']; ?>
<?php endif; ?> <?php if ($this->_tpl_vars['gv_sortby'] == 'date'): ?><?php echo $this->_tpl_vars['lang']['date']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['gv_sortby'] == 'views'): ?><?php echo $this->_tpl_vars['lang']['views']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['gv_sortby'] == 'rating'): ?><?php echo $this->_tpl_vars['lang']['rating']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['gv_sortby'] == 'title'): ?><?php echo $this->_tpl_vars['lang']['title']; ?>
<?php endif; ?>
            <span class="caret"></span>
            </a>
            <ul class="dropdown-menu pull-right">
            <?php if (@_SEOMOD == '1'): ?>
            <li <?php if ($this->_tpl_vars['gv_sortby'] == 'date'): ?>class="selected"<?php endif; ?>>
            <a href="<?php echo @_URL; ?>
/browse-<?php echo $this->_tpl_vars['gv_cat']; ?>
-videos-<?php echo $this->_tpl_vars['gv_pagenumber']; ?>
-date.html" rel="nofollow"><?php echo $this->_tpl_vars['lang']['date']; ?>
</a></li>
            <li <?php if ($this->_tpl_vars['gv_sortby'] == 'views'): ?>class="selected"<?php endif; ?>>
            <a href="<?php echo @_URL; ?>
/browse-<?php echo $this->_tpl_vars['gv_cat']; ?>
-videos-<?php echo $this->_tpl_vars['gv_pagenumber']; ?>
-views.html" rel="nofollow"><?php echo $this->_tpl_vars['lang']['views']; ?>
</a></li>
            <li <?php if ($this->_tpl_vars['gv_sortby'] == 'rating'): ?>class="active"<?php endif; ?>>
            <a href="<?php echo @_URL; ?>
/browse-<?php echo $this->_tpl_vars['gv_cat']; ?>
-videos-<?php echo $this->_tpl_vars['gv_pagenumber']; ?>
-rating.html" rel="nofollow"><?php echo $this->_tpl_vars['lang']['rating']; ?>
</a></li>
            <li <?php if ($this->_tpl_vars['gv_sortby'] == 'title'): ?>class="active"<?php endif; ?>>
            <a href="<?php echo @_URL; ?>
/browse-<?php echo $this->_tpl_vars['gv_cat']; ?>
-videos-<?php echo $this->_tpl_vars['gv_pagenumber']; ?>
-title.html" rel="nofollow"><?php echo $this->_tpl_vars['lang']['title']; ?>
</a></li>
            <?php else: ?>
            <li <?php if ($this->_tpl_vars['gv_sortby'] == 'date'): ?>class="selected"<?php endif; ?>>
            <a href="<?php echo @_URL; ?>
/category.php?cat=<?php echo $this->_tpl_vars['gv_cat']; ?>
&page=<?php echo $this->_tpl_vars['gv_pagenumber']; ?>
&sortby=date" rel="nofollow"><?php echo $this->_tpl_vars['lang']['date']; ?>
</a></li>
            <li <?php if ($this->_tpl_vars['gv_sortby'] == 'views'): ?>class="selected"<?php endif; ?>>
            <a href="<?php echo @_URL; ?>
/category.php?cat=<?php echo $this->_tpl_vars['gv_cat']; ?>
&page=<?php echo $this->_tpl_vars['gv_pagenumber']; ?>
&sortby=views" rel="nofollow"><?php echo $this->_tpl_vars['lang']['views']; ?>
</a></li>
            <li <?php if ($this->_tpl_vars['gv_sortby'] == 'rating'): ?>class="selected"<?php endif; ?>>
            <a href="<?php echo @_URL; ?>
/category.php?cat=<?php echo $this->_tpl_vars['gv_cat']; ?>
&page=<?php echo $this->_tpl_vars['gv_pagenumber']; ?>
&sortby=rating" rel="nofollow"><?php echo $this->_tpl_vars['lang']['rating']; ?>
</a></li>
            <li <?php if ($this->_tpl_vars['gv_sortby'] == 'title'): ?>class="selected"<?php endif; ?>>
            <a href="<?php echo @_URL; ?>
/category.php?cat=<?php echo $this->_tpl_vars['gv_cat']; ?>
&page=<?php echo $this->_tpl_vars['gv_pagenumber']; ?>
&sortby=title" rel="nofollow"><?php echo $this->_tpl_vars['lang']['title']; ?>
</a></li>
			<?php endif; ?>
            </ul>
            </div>
            <?php if ($this->_tpl_vars['gv_category_description']): ?>
			<div class="pm-browse-desc">
            <?php echo $this->_tpl_vars['gv_category_description']; ?>

            <div class="clearfix"></div>
			</div>
			<?php endif; ?>

     		<?php echo $this->_tpl_vars['problem']; ?>


            <ul class="pm-ul-browse-videos thumbnails" id="pm-grid">
			<?php $_from = $this->_tpl_vars['results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
			  <li <?php if ($this->_tpl_vars['k'] == 0): ?>class="firtli"<?php endif; ?> >
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
" class="pm-title-link " title="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
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
			<?php endforeach; endif; unset($_from); ?>
			</ul>
			
			<div class="clearfix"></div>
			<?php if (is_array ( $this->_tpl_vars['pagination'] )): ?>
			<div class="pagination pagination-centered">
              <ul>
                <?php $_from = $this->_tpl_vars['pagination']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['pagination_data']):
?>
					<li<?php $_from = $this->_tpl_vars['pagination_data']['li']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['attr'] => $this->_tpl_vars['attr_val']):
?> <?php echo $this->_tpl_vars['attr']; ?>
="<?php echo $this->_tpl_vars['attr_val']; ?>
"<?php endforeach; endif; unset($_from); ?>>
						<a<?php $_from = $this->_tpl_vars['pagination_data']['a']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['attr'] => $this->_tpl_vars['attr_val']):
?> <?php echo $this->_tpl_vars['attr']; ?>
="<?php echo $this->_tpl_vars['attr_val']; ?>
"<?php endforeach; endif; unset($_from); ?>><?php echo $this->_tpl_vars['pagination_data']['text']; ?>
</a>
					</li>
				<?php endforeach; endif; unset($_from); ?>
              </ul>
            </div>
			<?php endif; ?>

		</div><!-- #primary -->
        </div><!-- #content -->
        <div class="span4">
		<div id="secondary">

  <!-- googleads -->
        <?php if ($this->_tpl_vars['ad_12'] != ""): ?>
        
           <h2 class="upper-blue niceheading"><i class="fa fa-gamepad"></i> <?php echo $this->_tpl_vars['lang']['googleads']; ?>
</h2>
           <div class="googleads">
<?php echo $this->_tpl_vars['ad_12']; ?>

</div>
<?php endif; ?>
<!-- End googelads -->

		<!-- Xem nhiều trong tuần -->
        <div class="widget-related widget" id="pm-related" >
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#" data-target="#bestincategory" data-toggle="tab"><i class="fa fa-play-circle-o"></i> Xem nhiều trong tuần</a></li>
            
          </ul>
 
          <div id="pm-tabs" class="tab-content">
            <div class="tab-pane fade in active" id="bestincategory2">
                <ul class="pm-ul-top-videos">
                <?php if ($this->caching && !$this->_cache_including): echo '{nocache:5012a5fa4efe4a979f3fd07a8834fc76#1}'; endif;echo smarty_get_advanced_video_list(array('assignto' => 'advanced_video_list','category_id' => $this->_tpl_vars['cat_id'],'order_by' => 'site_views','days_ago' => 12,'limit' => 6), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5012a5fa4efe4a979f3fd07a8834fc76#1}'; endif;?>

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
                    <span class="pm-video-attr-numbers">
                        <small><i class="fa fa-eye"></i> <?php echo $this->_tpl_vars['related_video_data']['views_compact']; ?>
</small>
                        
                        </span>
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


        
		</div><!-- #secondary -->
        </div><!-- #sidebar -->
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array('tpl_name' => "video-category")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 