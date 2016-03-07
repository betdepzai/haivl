<?php /* Smarty version 2.6.20, created on 2016-03-05 11:01:49
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'footer.tpl', 53, false),)), $this); ?>
<a id="back-top" class="hidden-phone hidden-tablet" title="<?php echo $this->_tpl_vars['lang']['top']; ?>
">
    <i class="icon-chevron-up"></i>
    <span></span>
</a>
<div class="floating_ad_left sticky_ads">
<?php echo $this->_tpl_vars['ad_6']; ?>

</div>

<div class="floating_ad_right sticky_ads">
<?php echo $this->_tpl_vars['ad_7']; ?>

</div>
</div><!-- end wrapper -->

<div class="row-fluid fixed960">
    <div class="row-fluid">
    <?php if ($this->_tpl_vars['tpl_name'] == "video-category"): ?>
    <a href="<?php echo @_URL; ?>
/rss.php?c=<?php echo $this->_tpl_vars['cat_id']; ?>
" title="<?php echo $this->_tpl_vars['meta_title']; ?>
 RSS" class="pm-rss-link"><i class="pm-vc-sprite ico_rss"></i> RSS</a>
    <?php elseif ($this->_tpl_vars['tpl_name'] == "video-new"): ?>
    <a href="<?php echo @_URL; ?>
/rss.php" title="<?php echo $this->_tpl_vars['meta_title']; ?>
 RSS" class="pm-rss-link"><i class="pm-vc-sprite ico_rss"></i> RSS</a>
    <?php elseif ($this->_tpl_vars['tpl_name'] == "video-top"): ?>
    <a href="<?php echo @_URL; ?>
/rss.php?feed=topvideos" title="<?php echo $this->_tpl_vars['meta_title']; ?>
 RSS" class="pm-rss-link"><i class="pm-vc-sprite ico_rss"></i> RSS</a>
    <?php elseif ($this->_tpl_vars['tpl_name'] == "article-category" || $this->_tpl_vars['tpl_name'] == "article-read"): ?>
    <a href="<?php echo @_URL; ?>
/rss.php?c=<?php echo $this->_tpl_vars['cat_id']; ?>
&feed=articles" title="<?php echo $this->_tpl_vars['meta_title']; ?>
 RSS" class="pm-rss-link"><i class="pm-vc-sprite ico_rss"></i> RSS</a>
    <?php else: ?>
    <a href="<?php echo @_URL; ?>
/rss.php" title="<?php echo $this->_tpl_vars['meta_title']; ?>
 RSS" class="pm-rss-link"><i class="pm-vc-sprite ico_rss"></i> RSS</a>
    <?php endif; ?>
    </div>
</div>

<?php if ($this->_tpl_vars['ad_2'] != ''): ?>
<div class="pm-ad-zone" align="center"><?php echo $this->_tpl_vars['ad_2']; ?>
</div>
<?php endif; ?>
    
<footer>
<div class="row-fluid fixed960">
	<div class="span8">
    <ul>
    	<?php if (@MOBILE_MELODY && @USER_DEVICE == 'mobile'): ?>
			<li><a href="<?php echo $this->_tpl_vars['_footer_switch_ui_link']; ?>
" rel="nofollow"><?php echo $this->_tpl_vars['lang']['switch_to_mobile_ui']; ?>
</a></li>
    	<?php endif; ?>
		<li><a href="<?php echo @_URL; ?>
/index.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['homepage']; ?>
</a></li>
        <li><a href="<?php echo @_URL; ?>
/contact_us.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['contact_us']; ?>
</a></li>
        <?php if ($this->_tpl_vars['logged_in'] != '1' && $this->_tpl_vars['allow_registration'] == '1'): ?><li><a href="<?php echo @_URL; ?>
/register.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['register']; ?>
</a></li><?php endif; ?>
        <?php if ($this->_tpl_vars['logged_in'] == '1' && $this->_tpl_vars['s_power'] == '1'): ?><li><a href="<?php echo @_URL; ?>
/<?php echo @_ADMIN_FOLDER; ?>
/"><?php echo $this->_tpl_vars['lang']['admin_area']; ?>
</a></li><?php endif; ?>
        <?php if (is_array ( $this->_tpl_vars['footer_page_links'] )): ?>
          <?php $_from = $this->_tpl_vars['footer_page_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['page_data']):
?>
            <li><a href="<?php echo $this->_tpl_vars['page_data']['page_url']; ?>
"><?php echo $this->_tpl_vars['page_data']['title']; ?>
</a></li>
          <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
    </ul>
    <p>
    <?php if (@_POWEREDBY == 1): ?><?php echo $this->_tpl_vars['lang']['powered_by']; ?>
<br /><?php endif; ?>
    &copy; <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')); ?>
 <?php echo @_SITENAME; ?>
. <?php echo $this->_tpl_vars['lang']['rights_reserved']; ?>

    </p>
    </div>
    <div class="span3">
	 
    </div>
    <div class="span1">
    <?php if (count ( $this->_tpl_vars['langs_array'] ) > 0): ?>
     <div id="lang_selector">
      <div class="btn-group dropup lang-selector hidden-phone" id="lang-selector">
      <a class="btn btn-link dropdown-toggle" data-toggle="dropdown" href="#"><img src="<?php echo $this->_tpl_vars['langs_array'][$this->_tpl_vars['current_lang_id']]['ico']; ?>
" width="16" height="10" alt="<?php echo $this->_tpl_vars['langs_array'][$this->_tpl_vars['current_lang_id']]['title']; ?>
" title="<?php echo $this->_tpl_vars['langs_array'][$this->_tpl_vars['current_lang_id']]['title']; ?>
" align="texttop"> <span class="hide"><?php echo $this->_tpl_vars['langs_array'][$this->_tpl_vars['current_lang_id']]['title']; ?>
</span> <span class="caret"></span></a>

      <ul class="dropdown-menu border-radius0 pullleft lang_submenu">
      <?php $_from = $this->_tpl_vars['langs_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['language']):
?>
       <?php if ($this->_tpl_vars['k'] != $this->_tpl_vars['current_lang_id']): ?>
       <li><a href="#" title="<?php echo $this->_tpl_vars['language']['title']; ?>
" name="<?php echo $this->_tpl_vars['k']; ?>
" id="lang_select_<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['language']['title']; ?>
</a></li>
       <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
      </ul>
     </div>
    <?php endif; ?>
    </div>
</div>
</footer>
<div id="lights-overlay"></div>

<?php echo '
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/bootstrap.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.cookee.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.validate.min.js" type="text/javascript"></script>
'; ?>


<?php if (@_EU_WARNING == '1'): ?>
<?php echo '
<script type="text/javascript"> 
window.cookieconsent_options = {"message":"'; ?>
<?php echo $this->_tpl_vars['lang']['eu_cookie_warn_message']; ?>
<?php echo '","dismiss":"'; ?>
<?php echo $this->_tpl_vars['lang']['i_agree']; ?>
<?php echo '","learnMore":"'; ?>
<?php echo $this->_tpl_vars['lang']['more_info']; ?>
<?php echo '","link":null,"theme":"cookieconsent-'; ?>
<?php echo @_EU_WARNING_POSITION; ?>
<?php echo '"};
</script>
<script type="text/javascript" src="'; ?>
<?php echo @_URL; ?>
/js/cookieconsent.min.js"></script>
<?php endif; ?>

<?php if ($this->_tpl_vars['p'] == 'index'): ?>
<?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.carouFredSel.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.touchwipe.min.js" type="text/javascript"></script>
'; ?>

<?php endif; ?>
<?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.maskedinput-1.3.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.tagsinput.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.uniform.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.ba-dotimeout.min.js" type="text/javascript"></script>
'; ?>
<?php if ($this->_tpl_vars['tpl_name'] == 'upload' || $this->_tpl_vars['tpl_name'] == "video-edit"): ?><?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/swfupload.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/swfupload.queue.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/jquery.swfupload.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/upload.js" type="text/javascript"></script>
'; ?>
<?php endif; ?>
<?php if (@_SEARCHSUGGEST == 1): ?><?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/jquery.typewatch.js" type="text/javascript"></script>
'; ?>
<?php endif; ?><?php echo '
<script type="text/javascript" src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/bootstrap-notify.min.js"></script>
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/melody.dev.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/melody.dev.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/lightbox.min.js" type="text/javascript"></script>
<script type="text/javascript">
// Global settings for notifications
$.notifyDefaults({
	// settings
	element: \'body\',
	position: null,
	type: "info",
	allow_dismiss: true,
	newest_on_top: true,
	showProgressbar: false,
	placement: {
		from: "top", // top, bottom
		align: "right" // left, right, center
	},
	offset: {
	    x: 20,
	    y: 100
	  },
	spacing: 10,
	z_index: 1031,
	delay: 10000,
	timer: 1000,
	url_target: \'_blank\',
	mouse_over: null,
	animate: {
		enter: \'animated fadeInDown\',//\'animated fadeIn\',
		exit: \'animated fadeOutUpBig\',//\'animated fadeOut\'
	},
	onShow: null,
	onShown: null,
	onClose: null,
	onClosed: null,
	template: \'<div data-notify="container" class="growl alert alert-{0}" role="alert">\' +
				\'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">&times;</button>\' +
				\'<span data-notify="icon"></span> \' +
				\'<span data-notify="title">{1}</span> \' +
				\'<span data-notify="message">{2}</span>\' +
				\'<div class="progress" data-notify="progressbar">\' +
					\'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>\' +
				\'</div>\' +
				\'<a href="{3}" target="{4}" data-notify="url"></a>\' +
			\'</div>\',
	PM_exitAnimationTimeout: 0 // PHP Melody custom settings
});
</script>
'; ?>



<?php if (@_SEARCHSUGGEST == 1): ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function () {
	// live search
	$(\'#appendedInputButton\').typeWatch({
		callback: function() {
			$.ajax({
				type: "POST",
	            url: MELODYURL2 + "/ajax_search.php",
	            data: {
					"queryString": $(\'#appendedInputButton\').val()
	            },
	            dataType: "html",
	            success: function(b) {
					if (b.length > 0) {
						$("#autoSuggestionsList").html(b);
						
	                    $(".suggestionsBox").show(function() {
							
							var $listItems = $(\'#autoSuggestionsList\').find(\'li\');
							
							$(\'#appendedInputButton\').keydown(function(e) {
								var key = e.keyCode,
									$selected = $listItems.filter(\'.selected\'),
									$current;

								if(key == 38 || key == 40) {
									e.preventDefault();
								}

								if ( key != 40 && key != 38 ) return;

								$listItems.removeClass(\'selected\');

								if ( key == 40 ) // Down key
								{
									if ( ! $selected.length || $selected.is(\':last-child\') ) {
										$current = $listItems.eq(0);
									}
									else {
										$current = $selected.next();
									}
								}
								else if ( key == 38 ) // Up key
								{
									if ( ! $selected.length || $selected.is(\':first-child\') ) {
										$current = $listItems.last();
									}
									else {
										$current = $selected.prev();
									}
								}

								$current.addClass(\'selected\');
								$selected_url = $current.find(\'a\').attr(\'href\');

								$selected_id = $current.attr(\'data-video-id\');

								($(\'#pm-video-id\').val($selected_id));
							});
						});
					} else {
						$(".suggestionsBox").hide();
					}
				}
			});
		},
		wait: 400,
		highlight: true,
		captureLength: 3
	});
});
</script>
'; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['tpl_name'] == 'video-watch' || $this->_tpl_vars['tpl_name'] == 'article-read'): ?>

<?php if ($this->_tpl_vars['show_addthis_widget'] == '1'): ?>
<?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.socialite.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(\'#pm-socialite\').one(\'mouseenter\', function()
	{
		Socialite.load($(this)[0]);
	});
});
</script>                
'; ?>

<?php endif; ?>

<?php echo '
<script type="text/javascript">
$(document).ready(function(){
	$(\'#nav-link-comments-native\').click(function(){
		$.cookie(\'pm_comment_view\', \'native\', { expires: 180, path: \'/\' });
	});
	$(\'#nav-link-comments-facebook\').click(function(){
		$.cookie(\'pm_comment_view\', \'facebook\', { expires: 180, path: \'/\' });
	});
	$(\'#nav-link-comments-disqus\').click(function(){
		$.cookie(\'pm_comment_view\', \'disqus\', { expires: 180, path: \'/\' });
	});
});
</script>
'; ?>

<?php endif; ?> 

<?php if ($this->_tpl_vars['p'] == 'detail' && $this->_tpl_vars['playlist']): ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function () {
	$(\'.pm-video-playlist\').animate({
	    scrollTop: $(\'.pm-video-playlist-playing\').offset().top - $(\'.pm-video-playlist\').offset().top + $(\'.pm-video-playlist\').scrollTop()
	});
});
</script>
'; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['p'] == 'detail'): ?>
<?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.readmore.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
	var pm_elastic_player = $.cookie(\'pm_elastic_player\');
	if (pm_elastic_player == null) {
		$.cookie(\'pm_elastic_player\', \'normal\');
	}
	else if (pm_elastic_player == \'wide\') {
		$(\'#player_extend\').find(\'i\').addClass(\'icon-resize-small\');
		$(\'#secondary\').addClass(\'secondary-wide\');
		$(\'#video-wrapper\').addClass(\'video-wrapper-wide\');
		$(\'.pm-video-head\').addClass(\'pm-video-head-wide\');
		$(\'.entry-title\').addClass(\'ellipsis\');
	} else {
		$(\'#secondary\').removeClass(\'secondary-wide\');
		$(\'#video-wrapper\').removeClass(\'video-wrapper-wide\');
		$(\'.pm-video-head-wide\').removeClass(\'pm-video-head-wide\');
		$(\'.entry-title\').removeClass(\'ellipsis\');
	}

	$("#player_extend").click(function() {	
		if ($(this).find(\'i\').hasClass("icon-resize-full")) {
			$(this).find(\'i\').removeClass("icon-resize-full").addClass("icon-resize-small");
		} else {
			$(this).find(\'i\').removeClass("icon-resize-small").addClass("icon-resize-full");
		}
		$(\'#secondary\').animate({
			}, 10, function() {
				$(\'#secondary\').toggleClass("secondary-wide");
		});
		$(\'#video-wrapper\').animate({
			}, 150, function() {
				$(\'#video-wrapper\').toggleClass("video-wrapper-wide");
				$(\'.pm-video-head\').toggleClass(\'pm-video-head-wide\');
		});
		if ($.cookie(\'pm_elastic_player\') == \'normal\') {
			$.cookie(\'pm_elastic_player\',\'wide\');
			$(\'#player_extend\').find(\'i\').removeClass(\'icon-resize-full\').addClass(\'icon-resize-small\');
		} else {
			$.cookie(\'pm_elastic_player\', \'normal\');
			$(\'#player_extend\').find(\'i\').removeClass(\'icon-resize-small\').addClass(\'icon-resize-full\');
		}
		return false;
	});

	$(\'.pm-video-description\').readmore({
		speed: 275,
		maxHeight: 100,
		moreLink: \'<p class="show-more-description"><a href="#" class="show-now">\'+ pm_lang.show_more +\'</a></p>\',
		lessLink: \'<p class="show-more-description"><a href="#" class="show-now">\'+ pm_lang.show_less +\'</a></p>\',
	});

});
</script>
'; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['p'] == 'index'): ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function() {

	$("ul[class^=\'pm-ul-carousel-videos\']").each(
	function() {
	
		var id = $(this).data("slider-id");
		var slides = $(this).data("slides");
		var video_carousel = $(\'#pm-carousel_\' + id);

		if(slides == null) {
			var slides = 4;
		}
		
		video_carousel.carouFredSel({
			items				: slides,
			circular			: false,
			direction			: "left",
			height				: null,
			width       		: null,
			infinite			: false,
			responsive			: true,
			prev	: {
				button	: "#pm-slide-prev_" + id,
				key		: "left"
			},
			next	: {
				button	: "#pm-slide-next_" + id,
				key		: "right",
			},
			scroll		: {
				items			: 1,		//	items.visible
				fx				: "scroll",
				easing			: "swing",
				duration		: 500,
				wipe			: true,
				event			: "click",
			},
			auto: false
		});
	});



	$("#pm-ul-wn-videos").carouFredSel({
		items				: 4,
		circular			: false,
		direction			: "left",
		height				: null,
		width       		: null,
		infinite			: false,
		responsive			: true,
		prev	: {	
			button	: "#pm-slide-prev",
			key		: "left"
		},
		next	: { 
			button	: "#pm-slide-next",
			key		: "right"
		},
	scroll		: {
		items			: null,		//	items.visible
		fx				: "scroll",
		easing			: "swing",
		duration		: 500,
		wipe			: true,
		event			: "click",
	},
	auto: false
				
	});	
});

$(document).ready(function() {
	$("#pm-ul-top-videos").carouFredSel({
	items: 5,
	direction: "up",
	width: "variable",
	height:  "variable",
	circular: false,
	infinite: false,
	scroll: {
		fx: "fade",
		event: "click",
		wipe: true,
		duration: 150
	},
	auto: false,
		prev	: {	
			button	: "#pm-slide-top-prev",
			key		: "left"
		},
		next	: { 
			button	: "#pm-slide-top-next",
			key		: "right"
		}
	});	
});
</script>
'; ?>

<?php endif; ?>
<?php if (! $this->_tpl_vars['logged_in']): ?>
    <?php echo '
    <script type="text/javascript">
    
        $(\'#header-login-form\').on(\'shown\', function () {
            $(\'.hocusfocus\').focus();
        });
    
    </script>
    '; ?>

<?php endif; ?>
<?php if (@_MOD_SOCIAL == '1'): ?>
<?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/waypoints.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/melody.social.dev.js" type="text/javascript"></script> 
'; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['display_preroll_ad'] == true): ?>
<?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/jquery.timer.min.js" type="text/javascript"></script>
<script type="text/javascript">

function timer_pad(number, length) {
	var str = \'\' + number;
	while (str.length < length) {str = \'0\' + str;}
	return str;
}

var preroll_timer;
var preroll_player_called = false;
var skippable = '; ?>
<?php if ($this->_tpl_vars['preroll_ad_data']['skip'] != 1): ?>0<?php else: ?>1<?php endif; ?><?php echo '; 
var skippable_timer_current = '; ?>
<?php if ($this->_tpl_vars['preroll_ad_data']['skip_delay_seconds']): ?><?php echo $this->_tpl_vars['preroll_ad_data']['skip_delay_seconds']; ?>
<?php else: ?>0<?php endif; ?><?php echo ' * 1000;
var preroll_disable_stats = '; ?>
<?php if ($this->_tpl_vars['preroll_ad_data']['disable_stats'] == 1): ?>1<?php else: ?>0<?php endif; ?><?php echo ';
	
$(document).ready(function(){
	if (skippable == 1) {
		$(\'#preroll_skip_btn\').hide();
	}
	
	var preroll_timer_current = '; ?>
<?php echo $this->_tpl_vars['preroll_ad_data']['duration']; ?>
<?php echo ' * 1000;
	
	preroll_timer = $.timer(function(){
	
		var seconds = parseInt(preroll_timer_current / 1000);
		var hours = parseInt(seconds / 3600);
		var minutes = parseInt((seconds / 60) % 60);
		var seconds = parseInt(seconds % 60);
		
		var output = "00";
		if (hours > 0) {
			output = timer_pad(hours, 2) +":"+ timer_pad(minutes, 2) +":"+ timer_pad(seconds, 2);
		} else if (minutes > 0) { 
			output = timer_pad(minutes, 2) +":"+ timer_pad(seconds, 2);
		} else {
			output = timer_pad(seconds, 1);
		}
		
		$(\'.preroll_timeleft\').html(output);
		
		if (preroll_timer_current == 0 && preroll_player_called == false) {

			$.ajax({
		        type: "GET",
		        url: MELODYURL2 + "/ajax.php",
			dataType: "html",
		        data: {
					"p": "video",
					"do": "getplayer",
					"vid": "'; ?>
<?php echo $this->_tpl_vars['preroll_ad_player_uniq_id']; ?>
<?php echo '",
					"aid": "'; ?>
<?php echo $this->_tpl_vars['preroll_ad_data']['id']; ?>
<?php echo '",
					"player": "'; ?>
<?php echo $this->_tpl_vars['preroll_ad_player_page']; ?>
<?php echo '",
					"playlist": "'; ?>
<?php echo $this->_tpl_vars['playlist']['list_uniq_id']; ?>
<?php echo '"
		        },
		        success: function(data){
					$(\'#preroll_placeholder\').replaceWith(data);
		        }
			});
			
			preroll_player_called = true;
			preroll_timer.stop();
		} else {
			preroll_timer_current -= 1000;
			if(preroll_timer_current < 0) {
				preroll_timer_current = 0;
			}
		}
	}, 1000, true);
	
	if (skippable == 1) {
		
		skippable_timer = $.timer(function(){
	
			var seconds = parseInt(skippable_timer_current / 1000);
			var hours = parseInt(seconds / 3600);
			var minutes = parseInt((seconds / 60) % 60);
			var seconds = parseInt(seconds % 60);
			
			var output = "00";
			if (hours > 0) {
				output = timer_pad(hours, 2) +":"+ timer_pad(minutes, 2) +":"+ timer_pad(seconds, 2);
			} else if (minutes > 0) { 
				output = timer_pad(minutes, 2) +":"+ timer_pad(seconds, 2);
			} else {
				output = timer_pad(seconds, 1);
			}
			
			$(\'.preroll_skip_timeleft\').html(output);
			
			if (skippable_timer_current == 0 && preroll_player_called == false) {
				$(\'#preroll_skip_btn\').show();
				$(\'.preroll_skip_countdown\').hide();
				skippable_timer.stop();
			} else {
				skippable_timer_current -= 1000;
				if(skippable_timer_current < 0) {
					skippable_timer_current = 0;
				}
			}
		}, 1000, true);
		
		$(\'#preroll_skip_btn\').click(function(){
			preroll_timer_current = 0;
			skippable_timer_current = 0;

			if (preroll_disable_stats == 0) {
				$.ajax({
			        type: "GET",
			        url: MELODYURL2 + "/ajax.php",
					dataType: "html",
			        data: {
						"p": "stats",
						"do": "skip",
						"aid": "'; ?>
<?php echo $this->_tpl_vars['preroll_ad_data']['id']; ?>
<?php echo '",
						"at": "'; ?>
<?php echo @_AD_TYPE_PREROLL; ?>
<?php echo '",
			        },
			        dataType: "html",
			        success: function(data){}
				});
			}
			return false;
		});
	}
});
</script>
'; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['allow_emojis'] && ( $this->_tpl_vars['tpl_name'] == 'article-read' || $this->_tpl_vars['tpl_name'] == 'video-watch' || $this->_tpl_vars['tpl_name'] == 'channel' )): ?> 
<!-- Emoji provided free by http://emojione.com -->
<script src="<?php echo @_URL; ?>
/js/jquery.textcomplete.min.js"></script>
<script src="<?php echo @_URL; ?>
/js/melody.emoji.js"></script>
<div id="modalEmojiList" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel"><?php echo $this->_tpl_vars['lang']['emoji_help']; ?>
</h3>
	</div>
	<div class="modal-body">
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo $this->_tpl_vars['lang']['close']; ?>
</button>
	</div>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['profile_data']['id'] == $this->_tpl_vars['s_user_id']): ?>
<?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.cropit.js" type="text/javascript"></script>
<script type="text/javascript"> 
$(function() {
	var cropit_avatar_notify = null;
	var cropit_cover_notify = null;
	var cropit_notify_type = \'info\';
	
	// Avatar
	$(\'.pm-profile-avatar-pic\').cropit({
		smallImage: \'allow\',
		width: 120,
		height: 120,
		preview: \'.pm-profile-avatar-preview\',
		onImageLoading: function(){
			cropit_avatar_notify = $.notify({message: pm_lang.please_wait}, {type: cropit_notify_type});
		},
		onImageLoaded: function() {
			cropit_avatar_notify.close();
		},
		onImageError: function(){
			cropit_avatar_notify.close();
		}
	});

	$(\'#btn-edit-avatar\').click(function() {
	  $(\'#cropit-avatar-input\').click();
	  $(\'#cropit-avatar-form\').css(\'visibility\', \'visible\');
	  $(\'.cropit-image-preview\').removeClass(\'animated fadeIn\');
	});

	$(\'.btn-cancel-avatar\').click(function() {
		$(\'.pm-profile-avatar-pic .cropit-image-preview\').removeClass(\'cropit-image-loaded\').addClass(\'animated fadeIn\');
		$(\'#cropit-avatar-form\').css(\'visibility\', \'hidden\');
		return false;
	});

	$(\'form#cropit-avatar-form\').submit(function() {
		
		var image_data = $(\'.pm-profile-avatar-pic\').cropit(\'export\', {
			type: \'image/jpeg\',
			quality: .9,
			fillBg: \'#333\'
		});
		
		// Move cropped image data to hidden input
		$(\'.hidden-avatar-data-img\').val(image_data);
		
		$.ajax({
			url: MELODYURL2 + "/ajax.php",
		    type: "POST",
			dataType: "json",
		    data: $(\'#cropit-avatar-form\').serialize(),
			beforeSend: function(jqXHR, settings) {
				// clean error message container
				//cropit_avatar_notify.close();
				$.notifyClose();
				cropit_avatar_notify = $.notify({message: pm_lang.swfupload_status_uploading}, {type: cropit_notify_type});
			},
		})
		.done(function(data){
			cropit_avatar_notify.close();
			if (data.success) { 
				// hide form action buttons 
				$(\'#cropit-avatar-form\').css(\'visibility\', \'hidden\');
				
				// reset background with uploaded image 
				$(\'.pm-profile-avatar-pic .cropit-image-preview img\').attr(\'src\', data.file_url);
				
				// stop image movement ability
				$(\'.pm-profile-avatar-pic .cropit-image-preview\').addClass(\'animated fadeIn\');
				// timeout required to allow time for the uploaded image to load before removing the current image obj (and avoid a image-swapping \'glitch\')
				setTimeout(function(){
					$(\'.pm-profile-avatar-pic .cropit-image-preview\').removeClass(\'cropit-image-loaded\')
				}, 700);
				
				// unload selected image to let the user re-select the same image
				$(\'.pm-profile-avatar-pic input.cropit-image-input\')[0].value = null;
			}
			cropit_avatar_notify = $.notify({message: data.msg}, {type: data.alert_type});
		});

		return false;
	});
	
	var cropit_cover_height = parseInt($(\'.pm-profile-cover-preview\').attr(\'data-cropit-height\'));
	if ( ! cropit_cover_height) {
		cropit_cover_height = 200;
	}
		
	// Cover
	$(\'.pm-profile-cover-preview\').cropit({
		smallImage: \'allow\',
		height: cropit_cover_height,
		onImageLoading: function(){
			cropit_cover_notify = $.notify({message: pm_lang.please_wait}, {type: cropit_notify_type});
		},
		onImageLoaded: function() {
			cropit_cover_notify.close();
		},
		onImageError: function(){
			cropit_cover_notify.close();
		}
	});

	$(\'#btn-edit-cover\').click(function() {
	  $(\'#cropit-cover-input\').click();
	  $(\'#cropit-cover-form\').css(\'visibility\', \'visible\');
	  $(\'.cropit-image-preview\').removeClass(\'animated fadeIn\');
	});

	$(\'.btn-cancel\').click(function() {
		$(\'.pm-profile-cover-preview .cropit-image-preview\').removeClass(\'cropit-image-loaded\').addClass(\'animated fadeIn\');
		$(\'#cropit-cover-form\').css(\'visibility\', \'hidden\');
		return false;
	});

    $(\'form#cropit-cover-form\').submit(function() {
		
		var image_data = $(\'.pm-profile-cover-preview\').cropit(\'export\', {
			type: \'image/jpeg\',
			quality: .9,
			fillBg: \'#333\'
		});
		
		// Move cropped image data to hidden input
		$(\'.hidden-cover-data-img\').val(image_data);
		
		$.ajax({
			url: MELODYURL2 + "/ajax.php",
		    type: "POST",
			dataType: "json",
		    data: $(\'#cropit-cover-form\').serialize(),
			beforeSend: function(jqXHR, settings) {
				// clean error message container
				//cropit_cover_notify.close();
				$.notifyClose();
				cropit_cover_notify = $.notify({message: pm_lang.swfupload_status_uploading}, {type: cropit_notify_type});
			},
		})
		.done(function(data){
			cropit_cover_notify.close();
			if (data.success) { 
				// hide form action buttons 
				$(\'#cropit-cover-form\').css(\'visibility\', \'hidden\');
				
				// reset background with uploaded image 
				$(\'.pm-profile-cover-preview .cropit-image-preview img\').attr(\'src\', data.file_url);
				
				// stop image movement ability
				$(\'.pm-profile-cover-preview .cropit-image-preview\').addClass(\'animated fadeIn\');
				// timeout required to allow time for the uploaded image to load before removing the current image obj (and avoid a image-swapping \'glitch\')
				setTimeout(function(){
					$(\'.pm-profile-cover-preview .cropit-image-preview\').removeClass(\'cropit-image-loaded\')
				}, 700);
				
				// unload selected image to let the user re-select the same image
				$(\'.pm-profile-cover-preview input.cropit-image-input\')[0].value = null;
			}
			cropit_cover_notify = $.notify({message: data.msg}, {type: data.alert_type});
		});

		return false;
	});
});
</script>
'; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['tpl_name'] == 'channel' && $_GET['view'] == 'playlists'): ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
	$(\'.pm-pro-playlists-btn\').trigger(\'click\');
});
</script>
'; ?>

<?php endif; ?>
<?php echo @_HTMLCOUNTER; ?>

</body>
</html>