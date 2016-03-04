<?php /* Smarty version 2.6.20, created on 2016-02-09 15:12:42
         compiled from video-new.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_advanced_video_list', 'video-new.tpl', 6, false),)), $this); ?>
<?php $this->_cache_serials['/home/admin/domains/hipmat.com/public_html/Smarty/templates_c/%%26^269^269879B4%%video-new.tpl.inc'] = '6ca88dd644b8874f1261724e7a2ef1f4'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('p' => 'general','tpl_name' => "video-new")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="wrapper">

<div class="post-list-t1 cover">
	<div class="row no-gutter">
    <?php if ($this->caching && !$this->_cache_including): echo '{nocache:6ca88dd644b8874f1261724e7a2ef1f4#0}'; endif;echo smarty_get_advanced_video_list(array('assignto' => 'advanced_video_list','tag' => 'Hot','limit' => 5), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:6ca88dd644b8874f1261724e7a2ef1f4#0}'; endif;?>

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

    <div class="container-fluid forceads970">
      <div class="row-fluid">
        <div class="span12 extra-space force1">
        <div id="primary">
		<h1><?php echo $this->_tpl_vars['lang']['recently_added']; ?>
</h1>
        
        <div class="btn-group btn-group-sort">
        <button class="btn btn-small" id="list"><i class="icon-th"></i> </button>
        <button class="btn btn-small" id="grid"><i class="icon-th-list"></i> </button>
        </div>

		<form class="form-inline li-dropdown-inside opac7">
		<label><?php echo $this->_tpl_vars['lang']['added']; ?>
</label>
		<select name="categories" class="inp-small" size="1" onChange="javascript:document.location=this.value;">
		<option value="" selected="selected"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
		<option value="<?php echo @_URL; ?>
/newvideos.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['any_time']; ?>
</option>
		<option value="<?php echo @_URL; ?>
/newvideos.<?php echo @_FEXT; ?>
?d=today"><?php echo $this->_tpl_vars['lang']['today']; ?>
</option>
		<option value="<?php echo @_URL; ?>
/newvideos.<?php echo @_FEXT; ?>
?d=yesterday"><?php echo $this->_tpl_vars['lang']['yesterday']; ?>
</option>
		<option value="<?php echo @_URL; ?>
/newvideos.<?php echo @_FEXT; ?>
?d=month"><?php echo $this->_tpl_vars['lang']['this_month']; ?>
</option>
		</select>
        </form>
<hr />
<?php if ($this->_tpl_vars['ad_13'] != ''): ?>
<div class="ads970x90">
	<?php echo $this->_tpl_vars['ad_13']; ?>

</div>
<?php endif; ?>
<ul class="pm-ul-new-videos thumbnails force2" id="pm-grid">
<?php $_from = $this->_tpl_vars['results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
  <li>
	<div class="pm-li-video">
	    <span class="pm-video-thumb pm-thumb-138 pm-thumb border-radius2">
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

<?php if ($this->_tpl_vars['empty_results']): ?>
	<p class="alert"><?php echo $this->_tpl_vars['lang']['nv_page_sorry_msg']; ?>
</p>
<?php endif; ?>

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
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array('tpl_name' => "video-new")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>