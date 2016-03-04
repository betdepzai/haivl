<?php /* Smarty version 2.6.20, created on 2016-03-04 08:13:02
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'header.tpl', 73, false),array('modifier', 'escape', 'header.tpl', 90, false),array('function', 'dropdown_menu_video_categories', 'header.tpl', 321, false),array('function', 'dropdown_menu_article_categories', 'header.tpl', 329, false),)), $this); ?>
<?php $this->_cache_serials['/var/www/html/haivl/Smarty/templates_c/%%F7^F7F^F7F34188%%header.tpl.inc'] = 'ad3fe4d5615632fe183e317437f7a934'; ?>﻿<!DOCTYPE html>
<!--[if IE 7 | IE 8]>
<html class="ie" dir="<?php if (@_IS_RTL == '1'): ?>rtl<?php else: ?>ltr<?php endif; ?>">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html dir="<?php if (@_IS_RTL == '1'): ?>rtl<?php else: ?>ltr<?php endif; ?>">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=1024,maximum-scale=1.0">
<title><?php echo $this->_tpl_vars['meta_title']; ?>
</title>
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge,chrome=1">  
<?php if ($this->_tpl_vars['no_index'] == '1' || @_DISABLE_INDEXING == '1'): ?>
<meta name="robots" content="noindex,nofollow">
<meta name="googlebot" content="noindex,nofollow">
<?php endif; ?>
<meta name="title" content="<?php echo $this->_tpl_vars['meta_title']; ?>
" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['meta_keywords']; ?>
" />
<meta name="description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
" />
<link rel="shortcut icon" href="<?php echo @_URL; ?>
/templates/<?php echo @_TPLFOLDER; ?>
/img/favicon.ico">
<?php if ($this->_tpl_vars['tpl_name'] == "video-category"): ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->_tpl_vars['meta_title']; ?>
" href="<?php echo @_URL; ?>
/rss.php?c=<?php echo $this->_tpl_vars['cat_id']; ?>
" />
<?php elseif ($this->_tpl_vars['tpl_name'] == "video-top"): ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->_tpl_vars['meta_title']; ?>
" href="<?php echo @_URL; ?>
/rss.php?feed=topvideos" />
<?php elseif ($this->_tpl_vars['tpl_name'] == "article-category"): ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->_tpl_vars['meta_title']; ?>
" href="<?php echo @_URL; ?>
/rss.php?c=<?php echo $this->_tpl_vars['cat_id']; ?>
&feed=articles" />
<?php else: ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->_tpl_vars['meta_title']; ?>
" href="<?php echo @_URL; ?>
/rss.php" />
<?php endif; ?>
<?php if ($this->_tpl_vars['comment_system_facebook'] && $this->_tpl_vars['fb_app_id'] != ''): ?>
<meta property="fb:app_id" content="<?php echo $this->_tpl_vars['fb_app_id']; ?>
" />
<?php endif; ?>
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/bootstrap.min.css">
<?php if (@_IS_RTL == '1'): ?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/bootstrap.min.rtl.css">
<?php endif; ?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/bootstrap-responsive.min.css">
<!--[if lt IE 9]>
<script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/new-style.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/uniform.default.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700&subset=all" rel="stylesheet" type="text/css">
<!--[if IE]>
<?php echo '
<link rel="stylesheet" type="text/css" media="screen" href="'; ?>
<?php echo @_URL; ?>
<?php echo '/templates/'; ?>
<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/css/new-style-ie.css">
'; ?>

<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:700italic" rel="stylesheet" type="text/css">
<![endif]-->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<?php if ($this->_tpl_vars['tpl_name'] == 'video-watch' && $this->_tpl_vars['playlist']): ?>
<link rel="canonical" href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"/>
<?php endif; ?>
<script type="text/javascript">
var MELODYURL = "<?php echo @_URL; ?>
";
var MELODYURL2 = "<?php echo @_URL2; ?>
";
var TemplateP = "<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
";
var _LOGGEDIN_ = <?php if ($this->_tpl_vars['logged_in']): ?> true <?php else: ?> false <?php endif; ?>;
 
<?php if ($this->_tpl_vars['tpl_name'] == 'index' || $this->_tpl_vars['tpl_name'] == 'video-watch'): ?>
<?php echo '
var pm_video_data = {
'; ?>
	
	uniq_id: "<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
",
	url: "<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
",
	duration: <?php echo ((is_array($_tmp=@$this->_tpl_vars['video_data']['yt_length'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,
	duration_str: "<?php echo $this->_tpl_vars['video_data']['duration']; ?>
",
	category: "<?php echo $this->_tpl_vars['video_data']['category']; ?>
".split(','),
	category_str: "<?php echo $this->_tpl_vars['video_data']['category']; ?>
",
	featured: <?php echo ((is_array($_tmp=@$this->_tpl_vars['video_data']['featured'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,
	restricted: <?php echo ((is_array($_tmp=@$this->_tpl_vars['video_data']['restricted'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,
	allow_comments: <?php echo ((is_array($_tmp=@$this->_tpl_vars['video_data']['allow_comments'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,
	allow_embedding: <?php echo ((is_array($_tmp=@$this->_tpl_vars['video_data']['allow_embedding'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,
	is_stream: <?php if ($this->_tpl_vars['video_data']['is_stream']): ?>true<?php else: ?>false<?php endif; ?>,
	views: <?php echo ((is_array($_tmp=@$this->_tpl_vars['video_data']['site_views'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,
	likes: <?php echo ((is_array($_tmp=@$this->_tpl_vars['video_data']['likes'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,
	dislikes: <?php echo ((is_array($_tmp=@$this->_tpl_vars['video_data']['dislikes'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,
	publish_date_str: "<?php echo $this->_tpl_vars['video_data']['html5_datetime']; ?>
",
	publish_date_timestamp: <?php echo ((is_array($_tmp=@$this->_tpl_vars['video_data']['added_timestamp'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,
	embed_url: "<?php echo $this->_tpl_vars['video_data']['embed_href']; ?>
",
	thumb_url: "<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
",
	preview_image_url: "<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
",
	title: '<?php echo ((is_array($_tmp=$this->_tpl_vars['video_data']['video_title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
',
	autoplay_next: <?php if ($this->_tpl_vars['video_data']['autoplay_next']): ?>true<?php else: ?>false<?php endif; ?>,
	autoplay_next_url: "<?php echo $this->_tpl_vars['video_data']['autoplay_next_url']; ?>
"
<?php echo '
}
'; ?>

<?php endif; ?>
</script>
<?php echo '
<script type="text/javascript">
 var pm_lang = {
	lights_off: "'; ?>
<?php echo $this->_tpl_vars['lang']['lights_off']; ?>
<?php echo '",
	lights_on: "'; ?>
<?php echo $this->_tpl_vars['lang']['lights_on']; ?>
<?php echo '",
	validate_name: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_name']; ?>
<?php echo '",
	validate_username: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_username']; ?>
<?php echo '",
	validate_pass: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_pass']; ?>
<?php echo '",
	validate_captcha: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_captcha']; ?>
<?php echo '",
	validate_email: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_email']; ?>
<?php echo '",
	validate_agree: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_agree']; ?>
<?php echo '",
	validate_name_long: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_name_long']; ?>
<?php echo '",
	validate_username_long: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_username_long']; ?>
<?php echo '",
	validate_pass_long: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_pass_long']; ?>
<?php echo '",
	validate_confirm_pass_long: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_confirm_pass_long']; ?>
<?php echo '",
	choose_category: "'; ?>
<?php echo $this->_tpl_vars['lang']['choose_category']; ?>
<?php echo '",
 	validate_select_file: "'; ?>
<?php echo $this->_tpl_vars['lang']['upload_errmsg10']; ?>
<?php echo '",
 	validate_video_title: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_video_title']; ?>
<?php echo '",
	please_wait: "'; ?>
<?php echo $this->_tpl_vars['lang']['please_wait']; ?>
<?php echo '",
	// upload video page
	swfupload_status_uploaded: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_status_uploaded']; ?>
<?php echo '",
	swfupload_status_pending: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_status_pending']; ?>
<?php echo '",
	swfupload_status_queued: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_status_queued']; ?>
<?php echo '",
	swfupload_status_uploading: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_status_uploading']; ?>
<?php echo '",
	swfupload_file: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_file']; ?>
<?php echo '",
	swfupload_btn_select: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_btn_select']; ?>
<?php echo '",
	swfupload_btn_cancel: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_btn_cancel']; ?>
<?php echo '",
	swfupload_status_error: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_status_error']; ?>
<?php echo '",
	swfupload_error_oversize: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_error_oversize']; ?>
<?php echo '",
	swfupload_friendly_maxsize: "'; ?>
<?php echo $this->_tpl_vars['upload_limit']; ?>
<?php echo '",
	// playlist
	playlist_delete_confirm: "'; ?>
<?php echo $this->_tpl_vars['lang']['playlist_delete_confirm']; ?>
<?php echo '",
	playlist_delete_item_confirm: "'; ?>
<?php echo $this->_tpl_vars['lang']['playlist_delete_item_confirm']; ?>
<?php echo '",
	show_more: "'; ?>
<?php echo $this->_tpl_vars['lang']['show_more']; ?>
<?php echo '",
	show_less: "'; ?>
<?php echo $this->_tpl_vars['lang']['show_less']; ?>
<?php echo '",
	delete_video_confirmation: "'; ?>
<?php echo $this->_tpl_vars['lang']['delete_video_confirmation']; ?>
<?php echo '",
	browse_all: "'; ?>
<?php echo $this->_tpl_vars['lang']['browse_all']; ?>
<?php echo '"
 }
</script>
'; ?>


<script type="text/javascript" src="<?php echo @_URL; ?>
/js/swfobject.js"></script>
<?php if ($this->_tpl_vars['facebook_image_src'] != ''): ?>
    <link rel="image_src" href="<?php echo $this->_tpl_vars['facebook_image_src']; ?>
" />
    <meta property="og:url"  content="<?php if ($this->_tpl_vars['tpl_name'] == 'article-read'): ?><?php echo $this->_tpl_vars['article']['link']; ?>
<?php else: ?><?php echo $this->_tpl_vars['video_data']['video_href']; ?>
<?php endif; ?>" />
    <?php if ($this->_tpl_vars['tpl_name'] == 'article-read'): ?>
    <meta property="og:type" content="article" />
    <?php endif; ?>
    <meta property="og:title" content="<?php echo $this->_tpl_vars['meta_title']; ?>
" />
    <meta property="og:description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
" />
    <meta property="og:image" content="<?php echo $this->_tpl_vars['facebook_image_src']; ?>
" />
    <meta property="og:image:width" content="480" />
    <meta property="og:image:height" content="360" />
    <?php if ($this->_tpl_vars['video_data']['source_id'] == $this->_tpl_vars['_sources']['localhost']['source_id']): ?>
        <link rel="video_src" href="<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
"/>
        <meta property="og:video:url" content="<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
" />
    <?php endif; ?>
<?php endif; ?>
<style type="text/css"><?php echo $this->_tpl_vars['theme_customizations']; ?>
</style>
<?php if (isset ( $this->_tpl_vars['mm_header_inject'] )): ?><?php echo $this->_tpl_vars['mm_header_inject']; ?>
<?php endif; ?>
</head>
<?php if ($this->_tpl_vars['tpl_name'] == "video-category"): ?>
<body class="video-category catid-<?php echo $this->_tpl_vars['cat_id']; ?>
 page-<?php echo $this->_tpl_vars['gv_pagenumber']; ?>
">
<?php elseif ($this->_tpl_vars['tpl_name'] == "video-watch"): ?>
<body class="video-watch videoid-<?php echo $this->_tpl_vars['video_data']['id']; ?>
 author-<?php echo $this->_tpl_vars['video_data']['author_user_id']; ?>
 source-<?php echo $this->_tpl_vars['video_data']['source_id']; ?>
<?php if ($this->_tpl_vars['video_data']['featured'] == 1): ?> featured<?php endif; ?><?php if ($this->_tpl_vars['video_data']['restricted'] == 1): ?> restricted<?php endif; ?>">
<?php elseif ($this->_tpl_vars['tpl_name'] == "article-category"): ?>
<body class="article-category catid-<?php echo $this->_tpl_vars['cat_id']; ?>
">
<?php elseif ($this->_tpl_vars['tpl_name'] == "article-read"): ?>
<body class="article-read articleid-<?php echo $this->_tpl_vars['article']['id']; ?>
 author-<?php echo $this->_tpl_vars['article']['author']; ?>
 <?php if ($this->_tpl_vars['article']['featured'] == 1): ?> featured<?php endif; ?><?php if ($this->_tpl_vars['article']['restricted'] == 1): ?> restricted<?php endif; ?>">
<?php elseif ($this->_tpl_vars['tpl_name'] == 'page'): ?>
<body class="page pageid-<?php echo $this->_tpl_vars['page']['id']; ?>
 author-<?php echo $this->_tpl_vars['page']['author']; ?>
">
<?php else: ?>
<body>
<?php endif; ?>
<?php if ($this->_tpl_vars['maintenance_mode']): ?>
	<div class="alert alert-danger" align="center"><strong>Currently running in maintenance mode.</strong></div>
<?php endif; ?>
<?php if (( $this->_tpl_vars['tpl_name'] == 'article-read' || $this->_tpl_vars['tpl_name'] == 'video-watch' ) && $this->_tpl_vars['comment_system_facebook']): ?>
<!-- Facebook Javascript SDK -->
<div id="fb-root"></div>
<?php echo '
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
	fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));
</script>
'; ?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['mm_body_top_inject'] )): ?><?php echo $this->_tpl_vars['mm_body_top_inject']; ?>
<?php endif; ?>

<header class="wide-header" id="overview">
<div class="row-fluid fixed960">
    <div class="span3">
	  <?php if ($this->_tpl_vars['_custom_logo_url'] != ''): ?>
		<div class="pm-logo-image">
			<a href="<?php echo @_URL; ?>
/index.<?php echo @_FEXT; ?>
" rel="home"><img src="<?php echo $this->_tpl_vars['_custom_logo_url']; ?>
" alt="<?php echo ((is_array($_tmp=@_SITENAME)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" title="<?php echo ((is_array($_tmp=@_SITENAME)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" border="0" /></a>
		</div>
	  <?php else: ?>
      	<h1 class="site-title"><a href="<?php echo @_URL; ?>
/index.<?php echo @_FEXT; ?>
" rel="home"><?php echo @_SITENAME; ?>
</a></h1>
	  <?php endif; ?>
   </div>
   
   <div class="span6 wide-header-pad">
    <?php if ($this->_tpl_vars['p'] == 'article'): ?>
    <form action="<?php echo @_URL; ?>
/article.php" method="get" id="search" name="search" onSubmit="return validateSearch('true');">
    <div class="controls">
      <div class="input-append">
        <input class="span10 pm-search-field" id="appendedInputButton" size="16" name="keywords" type="text" placeholder="<?php echo $this->_tpl_vars['lang']['submit_search']; ?>
..." x-webkit-speech speech onwebkitspeechchange="this.form.submit();"><button class="btn" type="submit"><i class="icon-search"></i></button>
      </div>
    </div>
    </form>
    <?php else: ?>
    <form action="<?php echo @_URL; ?>
/search.php" method="get" id="search" name="search" onSubmit="return validateSearch('true');">
    <div class="controls">
      <div class="input-append">
        <input class="span10 pm-search-field" id="appendedInputButton" size="16" name="keywords" type="text" placeholder="<?php echo $this->_tpl_vars['lang']['submit_search']; ?>
..." x-webkit-speech="x-webkit-speech" onwebkitspeechchange="this.form.submit();" <?php if (@_SEARCHSUGGEST == 1): ?>onblur="fill();" autocomplete="off"<?php endif; ?>>
        <input id="pm-video-id" size="16" name="video-id" type="hidden">
		<button class="btn" type="submit"><i class="icon-search"></i></button>
      </div>
      <div class="suggestionsBox" id="suggestions" style="display: none;">
          <ul class="suggestionList input-xlarge" id="autoSuggestionsList"></ul>
      </div>
    </div>
    </form>
    <?php endif; ?>
   </div>

    <div class="span3 hidden-phone">
    <div id="user-pane">
        <div class="user-data">
        <?php if ($this->_tpl_vars['logged_in'] != '1'): ?>
			<span class="avatar-img avatar-generic">
			<a class="primary ajax-modal" data-toggle="modal" data-backdrop="true" data-keyboard="true" href="#header-login-form" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['login']; ?>
"><img src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/img/pm-avatar.png" width="40" height="40" alt=""></a>
			</span>
			<span class="greet-links">
				<div class="ellipsis"><strong><?php echo $this->_tpl_vars['lang']['_welcome']; ?>
</strong></div>
				<span class=""><!--class="avatar-img"--><a class="primary ajax-modal" data-toggle="modal" data-backdrop="true" data-keyboard="true" href="#header-login-form"><?php echo $this->_tpl_vars['lang']['login']; ?>
</a><?php if ($this->_tpl_vars['allow_registration'] == '1'): ?> / <a href="<?php echo @_URL; ?>
/register.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['register']; ?>
</a><?php endif; ?></span>
			</span>
			</div>
        <?php else: ?>
			<span class="avatar-img">
			<a href="#" id="notification_counter" title="<?php echo $this->_tpl_vars['lang']['notifications']; ?>
">
				<?php if (@_MOD_SOCIAL && $this->_tpl_vars['logged_in'] && $this->_tpl_vars['notification_count'] > 0): ?>
					<span class="notifications"><?php echo $this->_tpl_vars['notification_count']; ?>
</span>
				<?php else: ?>
				<?php endif; ?>
				<img src="<?php echo $this->_tpl_vars['s_avatar_url']; ?>
" width="40" height="40" alt="">
			</a>
			</span>
			
			<span class="greet-links">
			<div class="ellipsis"><strong><a href="<?php echo $this->_tpl_vars['current_user_data']['profile_url']; ?>
"><?php echo $this->_tpl_vars['s_name']; ?>
</a></strong></div>
			<?php if (@_ALLOW_USER_SUGGESTVIDEO == '1'): ?><a href="<?php echo @_URL; ?>
/suggest.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['suggest']; ?>
</a><?php endif; ?><?php if (@_ALLOW_USER_UPLOADVIDEO == '1' && @_ALLOW_USER_SUGGESTVIDEO == '1'): ?> / <?php endif; ?><?php if (@_ALLOW_USER_UPLOADVIDEO == '1'): ?> <a href="<?php echo @_URL; ?>
/upload.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['upload']; ?>
</a><?php endif; ?>
			</span>
			</div>
			
			<div class="user-menu dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#"><i class="icon-chevron-down"></i></a>
				<ul class="dropdown-menu pull-right pm-ul-user-menu" role="menu" aria-labelledby="dLabel">
				<?php if ($this->_tpl_vars['is_admin'] == 'yes' || $this->_tpl_vars['is_moderator'] == 'yes' || $this->_tpl_vars['is_editor'] == 'yes'): ?>
				<li><a href="<?php echo @_URL; ?>
/<?php echo @_ADMIN_FOLDER; ?>
/index.php"><?php echo $this->_tpl_vars['lang']['admin_area']; ?>
</a></li>
				<?php endif; ?>
				<li><a tabindex="-1" href="<?php echo $this->_tpl_vars['current_user_data']['profile_url']; ?>
"><?php if (@_MOD_SOCIAL): ?> <?php echo $this->_tpl_vars['lang']['my_channel']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang']['my_profile']; ?>
 <?php endif; ?></a></li>
				<li><a tabindex="-1" href="<?php echo @_URL; ?>
/edit_profile.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['edit_profile']; ?>
</a></li>
				<?php if (@_ALLOW_USER_SUGGESTVIDEO == '1'): ?>
				<li><a tabindex="-1" href="<?php echo @_URL; ?>
/suggest.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['suggest']; ?>
</a></li>
				<?php endif; ?>
				<?php if (@_ALLOW_USER_UPLOADVIDEO == '1'): ?>
				<li><a tabindex="-1" href="<?php echo @_URL; ?>
/upload.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['upload_video']; ?>
</a></li>
				<?php endif; ?>
				<li><a tabindex="-1" href="<?php echo @_URL; ?>
/playlists.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['my_playlists']; ?>
</a></li>
				<li><a tabindex="-1" href="<?php echo @_URL; ?>
/memberlist.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['members_list']; ?>
</a></li>
				<?php if (isset ( $this->_tpl_vars['mm_menu_logged_inject'] )): ?><?php echo $this->_tpl_vars['mm_menu_logged_inject']; ?>
<?php endif; ?>
				<li class="divider"></li>
				<li><a tabindex="-1" href="<?php echo @_URL; ?>
/login.<?php echo @_FEXT; ?>
?do=logout"><?php echo $this->_tpl_vars['lang']['logout']; ?>
</a></li>
				</ul>
			</div>
        <?php endif; ?>
    
        <?php if (! $this->_tpl_vars['logged_in']): ?>
        <div class="modal hide" id="header-login-form" role="dialog" aria-labelledby="header-login-form-label"> <!-- login modal -->
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 id="header-login-form-label">Login</h3>
            </div>
            <div class="modal-body">
                <p></p>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user-auth-login-form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
        </div>
        <?php endif; ?>
	<?php if (@_MOD_SOCIAL && $this->_tpl_vars['logged_in']): ?><!--//$notification_count > 0}-->
		<div class="hide" id="notification_temporary_display_container"></div>
	<?php endif; ?>
	    </div><!--.user-data-->
    </div><!--#user-pane-->
</div>
</header>
<nav class="wide-nav">
    <div class="row-fluid fixed960">
        <span class="span12">
		<div class="navbar">
              <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <div class="nav-collapse">
                    <ul class="nav">
                    
                      <li><a href="<?php echo @_URL; ?>
/index.<?php echo @_FEXT; ?>
" class="wide-nav-link"><?php echo $this->_tpl_vars['lang']['homepage']; ?>
</a></li>
                      <li class="dropdown">
                        <?php if (@_SEOMOD): ?>
                        <a href="<?php echo @_URL; ?>
/browse.<?php echo @_FEXT; ?>
" class="dropdown-toggle wide-nav-link disabled" data-target="#" role="button" data-toggle="dropdown"><?php echo $this->_tpl_vars['lang']['category']; ?>
 <b class="caret"></b></a>
                        <?php else: ?>
                        <a href="<?php echo @_URL; ?>
/category.php" class="dropdown-toggle wide-nav-link disabled" data-target="#" role="button" data-toggle="dropdown"><?php echo $this->_tpl_vars['lang']['category']; ?>
 <b class="caret"></b></a>
                        <?php endif; ?>
                        <ul class="dropdown-menu">
                        <?php echo smarty_html_list_categories(array('max_levels' => 3), $this);?>

                        </ul>
                      </li>
                      
                      <?php if (@_MOD_ARTICLE == 1): ?>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle wide-nav-link" data-toggle="dropdown"><?php echo $this->_tpl_vars['lang']['articles']; ?>
 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <?php if ($this->caching && !$this->_cache_including): echo '{nocache:ad3fe4d5615632fe183e317437f7a934#0}'; endif;echo smarty_art_html_list_categories(array('max_levels' => 3), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:ad3fe4d5615632fe183e317437f7a934#0}'; endif;?>

                        </ul>
                      </li>
					  <?php endif; ?>
                      <li><a href="<?php echo @_URL; ?>
/topvideos.<?php echo @_FEXT; ?>
" class="wide-nav-link"><?php echo $this->_tpl_vars['lang']['top_videos']; ?>
</a></li>
                      <li><a href="<?php echo @_URL; ?>
/newvideos.<?php echo @_FEXT; ?>
" class="wide-nav-link"><?php echo $this->_tpl_vars['lang']['new_videos']; ?>
</a></li>
                      <li><a href="<?php echo @_URL; ?>
/randomizer.php" rel="nofollow" class="wide-nav-link"><?php echo $this->_tpl_vars['lang']['random_video']; ?>
</a></li>
                      <?php if (isset ( $this->_tpl_vars['mm_menu_always_inject1'] )): ?><?php echo $this->_tpl_vars['mm_menu_always_inject1']; ?>
<?php endif; ?>		
                      <li><a href="<?php echo @_URL; ?>
/contact_us.<?php echo @_FEXT; ?>
" class="wide-nav-link"><?php echo $this->_tpl_vars['lang']['contact_us']; ?>
</a></li>
                      <?php if (isset ( $this->_tpl_vars['mm_menu_always_inject2'] )): ?><?php echo $this->_tpl_vars['mm_menu_always_inject2']; ?>
<?php endif; ?>		
                      <?php if ($this->_tpl_vars['logged_in'] != 1 && isset ( $this->_tpl_vars['mm_menu_notlogged_inject'] )): ?><?php echo $this->_tpl_vars['mm_menu_notlogged_inject']; ?>
<?php endif; ?>
                    </ul>
                    <ul class="nav pull-right pm-ul-pages">
                    <?php if (is_array ( $this->_tpl_vars['header_page_links'] ) && ! empty ( $this->_tpl_vars['header_page_links'] )): ?>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle wide-nav-link" data-toggle="dropdown"><?php echo $this->_tpl_vars['lang']['pages']; ?>
 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                              <?php $_from = $this->_tpl_vars['header_page_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['page_data']):
?>
                                <li><a href="<?php echo $this->_tpl_vars['page_data']['page_url']; ?>
"><?php echo $this->_tpl_vars['page_data']['title']; ?>
</a></li>
                              <?php endforeach; endif; unset($_from); ?>
                        </ul>
                      </li>
                    <?php endif; ?>

  					<?php if ($this->_tpl_vars['logged_in'] != '1'): ?>
  					<?php if ($this->_tpl_vars['allow_registration'] == '1'): ?>
  					  <li><a href="<?php echo @_URL; ?>
/register.<?php echo @_FEXT; ?>
" class="btn-register border-radius2"><?php echo $this->_tpl_vars['lang']['register']; ?>
</a></li>
  					<?php endif; ?>
  					<?php endif; ?>
                    </ul>

                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div><!-- /navbar -->
       </span>
    </div>
</nav>
<a id="top"></a>
<?php if ($this->_tpl_vars['ad_1'] != ''): ?>
<div class="pm-ad-zone" align="center"><?php echo $this->_tpl_vars['ad_1']; ?>
</div>
<?php endif; ?>