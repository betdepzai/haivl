<?php /* Smarty version 2.6.20, created on 2016-02-09 14:06:17
         compiled from comments.tpl */ ?>
<?php if ($this->_tpl_vars['allow_comments'] == '1'): ?>

	<h2 class="upper-blue niceheading"><i class="fa fa-commenting"></i> Ý kiến của bạn?</h2>
	<?php if (( $this->_tpl_vars['comment_system_native'] + $this->_tpl_vars['comment_system_facebook'] + $this->_tpl_vars['comment_system_disqus'] ) > 1): ?>
	<ul class="nav nav-tabs nav-comments">
		<?php if ($this->_tpl_vars['comment_system_native']): ?>
			<li <?php if ($this->_tpl_vars['comment_system_primary'] == 'native'): ?>class="active"<?php endif; ?>><a href="#comments-native" id="nav-link-comments-native" data-toggle="tab"><?php echo $this->_tpl_vars['lang']['comments']; ?>
</a></li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['comment_system_facebook']): ?>
			<li <?php if ($this->_tpl_vars['comment_system_primary'] == 'facebook'): ?>class="active"<?php endif; ?>><a href="#comments-facebook" id="nav-link-comments-facebook" data-toggle="tab">Facebook</a></li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['comment_system_disqus']): ?>
			<li <?php if ($this->_tpl_vars['comment_system_primary'] == 'disqus'): ?>class="active"<?php endif; ?>><a href="#comments-disqus" id="nav-link-comments-disqus" data-toggle="tab">Disqus</a></li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>
	<div class="tab-content">
	<?php if ($this->_tpl_vars['comment_system_native']): ?>
		<div class="tab-pane fade <?php if ($this->_tpl_vars['comment_system_primary'] == 'native'): ?>in active<?php endif; ?>" id="comments-native">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'comment-form.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php if (! $this->_tpl_vars['logged_in'] && ! $this->_tpl_vars['guests_can_comment']): ?>
				<?php echo $this->_tpl_vars['must_sign_in']; ?>

			<?php endif; ?>
			
			<h2 class="upper-blue"><i class="fa fa-comments-o"></i> <?php echo $this->_tpl_vars['lang']['comments']; ?>
</h2>
			
			<div class="pm-comments comment_box">
				<?php if ($this->_tpl_vars['comment_count'] == 0): ?>
				    <ul class="pm-ul-comments">
				    	<li id="preview_comment"></li>
				    </ul>
				    <div id="be_the_first"><?php echo $this->_tpl_vars['lang']['be_the_first']; ?>
</div>
				<?php else: ?>
				    <span id="comment-list-container">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "comment-list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						<!-- comment pagination -->
						<?php if ($this->_tpl_vars['comment_pagination_obj'] != ''): ?>
							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "comment-pagination.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						<?php endif; ?>
					</span>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['comment_system_facebook']): ?>
		<div class="tab-pane fade <?php if ($this->_tpl_vars['comment_system_primary'] == 'facebook'): ?>in active<?php endif; ?> pm-comments comment_box" id="comments-facebook">
			<?php echo '
			<div class="fb-comments" data-href="'; ?>
<?php if ($this->_tpl_vars['tpl_name'] == 'article-read'): ?><?php echo $this->_tpl_vars['article']['link']; ?>
<?php else: ?><?php echo $this->_tpl_vars['video_data']['video_href']; ?>
<?php endif; ?><?php echo '" data-numposts="'; ?>
<?php echo $this->_tpl_vars['fb_comment_numposts']; ?>
<?php echo '" data-order-by="'; ?>
<?php echo $this->_tpl_vars['fb_comment_sorting']; ?>
<?php echo '" data-colorscheme="light" data-width="652"></div>
			'; ?>

		</div>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['comment_system_disqus']): ?>
		<div class="tab-pane fade <?php if ($this->_tpl_vars['comment_system_primary'] == 'disqus'): ?>in active<?php endif; ?> pm-comments comment_box" id="comments-disqus">
			<div id="disqus_thread"></div> 
			<?php echo '
			<script type="text/javascript">
			    var disqus_shortname = \''; ?>
<?php echo $this->_tpl_vars['disqus_shortname']; ?>
<?php echo '\'; 
				var disqus_identifier = '; ?>
<?php if ($this->_tpl_vars['tpl_name'] == 'article-read'): ?> 'article-<?php echo $this->_tpl_vars['article']['id']; ?>
' <?php else: ?> 'video-<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
' <?php endif; ?><?php echo ';
			    /* * * DON\'T EDIT BELOW THIS LINE * * */
			    (function() {
			        var dsq = document.createElement(\'script\'); dsq.type = \'text/javascript\'; dsq.async = true;
			        dsq.src = \'//\' + disqus_shortname + \'.disqus.com/embed.js\';
			        (document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(dsq);
			    })();
			</script>
			'; ?>

		</div>
	<?php endif; ?>
	</div>
<?php else: ?>
	<div><?php echo $this->_tpl_vars['lang']['comments_disabled']; ?>
</div>
<?php endif; ?>