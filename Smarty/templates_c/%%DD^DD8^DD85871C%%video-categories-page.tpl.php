<?php /* Smarty version 2.6.20, created on 2016-03-05 11:29:05
         compiled from video-categories-page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'smarty_fewchars', 'video-categories-page.tpl', 17, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('p' => 'general','tpl_name' => "video-categories-page")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
			<div id="primary">
				<h1><?php echo $this->_tpl_vars['lang']['_categories']; ?>
</h1>
				<ul class="pm-ul-browse-categories thumbnails">
				<?php $_from = $this->_tpl_vars['categories_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['category_data']):
?>
					<?php if ($this->_tpl_vars['category_data']['parent_id'] == 0): ?>
					<li>
						<div class="pm-li-category">
						<a href="<?php echo $this->_tpl_vars['category_data']['url']; ?>
">
							<span class="pm-video-thumb pm-thumb-234 pm-thumb">
								<div class="pm-thumb-fix pm-thumb-234"><span class="pm-thumb-fix-clip"><img src="<?php echo $this->_tpl_vars['category_data']['image_url']; ?>
" alt="<?php echo $this->_tpl_vars['category_data']['attr_alt']; ?>
" width="234"><span class="vertical-align"></span></span></div>
							</span>
							<h3><?php echo smarty_fewchars(array('s' => $this->_tpl_vars['category_data']['name'],'length' => 32), $this);?>
</h3>
						</a>
						</div>
					</li>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				</ul>	
			</div><!-- #primary -->
			</div><!-- #content -->
		</div><!-- .row-fluid -->
	</div><!-- .container-fluid -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array('tpl_name' => "video-categories-page")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 