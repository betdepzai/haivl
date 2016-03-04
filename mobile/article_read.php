<?php
// +-------------------------------------------------------------------------+
// | Mobile Melody Plug-in for PHP Melody ( www.phpsugar.com )
// +-------------------------------------------------------------------------+
// | MOBILE MELODY IS NOT FREE SOFTWARE
// | If you have downloaded this software from a website other
// | than www.phpsugar.com or if you have received
// | this software from someone who is not a representative of
// | phpSugar, you are involved in an illegal activity.
// | ---
// | In such case, please contact: support@phpsugar.com.
// +-------------------------------------------------------------------------+
// | Developed by: phpSugar (www.phpsugar.com) / support@phpsugar.com
// | Copyright: (c) 2004-2015 PhpSugar.com. All rights reserved.
// +-------------------------------------------------------------------------+
session_start();
$page_type = 'article';
include('settings.php');

if ( ! _MOD_ARTICLE)
{
	header("Location: ". _URL_MOBI ."/index."._FEXT);
	exit();
}
$article = array();
$id = (int) $_GET['a'];
if ($id > 0)
{
	if($config['version'] < '1.6.7' ) {
		$uniq_id = 'article-';
		$result = array();
		$result = art_load_articles(0, 1, '', 0, array($id));
		$article = $result[$id];
	} else {
		$preview = ($_GET['mode'] == 'preview') ? true : false;
		$uniq_id = 'article-';
		$result = array();
		$result = art_load_articles(0, 1, '', 0, array($id), '', $preview);
		$article = (array) $result[$id];
	}
	if ( ! array_key_exists('type', $result))
	{
		//	meta tags
		//$meta_title = htmlentities($article['title'], ENT_COMPAT, 'UTF-8');
		$meta_title = specialchars($article['title'], 1);
		$meta_title .= ' - '. _SITENAME;
		
		$meta_description = str_replace('"', '&quot;', $article['excerpt']);
		
		//	full url for sharin'
		$current_page_URL = "http://".$_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		
		//	get categories
		$categories = art_get_categories();
		$current_category = make_cats_mobi('art_categories', $article['category']);
		
		$uniq_id .= $article['id'];
		
		//	retrieve author
		$author = fetch_user_advanced($article['author']);
		$author = $author['name'];
			
		//	remove delimiter
		$article['content'] = @preg_replace('/<hr>/', '', $article['content'], 1);
		
		//	build direct link to article
		$article['link'] = art_make_link('article', $article);
		
		//	convert timestamp to date
		//$article['date'] = date('M j, Y', $article['date']);
		
		//	handle article categories - make links
		$pieces = explode(',', $article['category']);
		foreach ($pieces as $k => $cat_id)
		{
			$name = $categories[$cat_id]['name'];
			
			$article['pretty_cats'][$name] = $categories[$cat_id]['link'];
		} 
		$comments_no = ($article['allow_comments'] == 1) ? count_entries('pm_comments', 'uniq_id', $uniq_id) : 0;
		art_update_view_count_mobi($article['id']);
	}
	else
	{
		$article = $result['msg'];
	}
}
else 
{
	header("Location: ". _URL_MOBI ."/index."._FEXT);
	exit();
}
$meta_title = $article['title']." - "._SITENAME;
include('header.php');
?>
<div id="navigation"><a href="javascript: history.go(-1)">&lt; <?php translate("BACK", browse_back); ?></a></div>
<div id="content">
	<div id="article_wrapper">
	
	<h2><?php echo $article['title']; ?></h2>
	<div class="article_poster">
	<?php echo $lang['articles_by']." ".$author." - ".time_since($article['date'])." ".$lang['ago']; ?>
	</div>
	<?php if ($article['restricted'] == '1' && ! $logged_in) : ?>
	
		<?php echo $lang['article_restricted_sorry']; ?>
		<br /><br /> 
		<?php echo $lang['article_restricted_register']; ?>
		<form action="<?php echo _URL_MOBI;?>/signin.php" method="post" name="login_form" class="login" autocomplete="off">
		<input name="username" type="email" size="15" class="inputtext" placeholder="<?php echo $lang['your_username_or_email'];?>" autofocus="autofocus" />
		<input name="pass" type="password" size="15" class="inputtext" placeholder="<?php echo $lang['password'];?>" />
		<input type="hidden" name="ref" value="<?php echo '/article_read.php?a='. $article['id']; ?>" />
		<button class="submit border2" name="Login"><?php echo $lang['login']; ?></button>
		</form>
	<?php else : ?>
	
	<div id="article_social">
		<div class="article_share">
		<a href="mailto:?subject=<?php echo $article['title']; ?>&amp;body=Hi, \n\n I just read this at:\n\n <?php echo $current_page_URL; ?>\n"><img src="<?php echo _URL_MOBI; ?>/images/ico_mail.png" border="0" width="34" height="24" /></a>
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_page_URL; ?>&t=<?php echo $article['title']; ?>"><img src="<?php echo _URL_MOBI; ?>/images/ico_facebook.png" border="0" width="24" height="24" /></a>
		</div>
		<a href="#comments"><div class="comment_count"><?php echo $comments_no; ?></div></a>
	</div>
	

	
	<div class="article_content">
	<?php echo $article['content']; ?>
	</div>
	<?php endif;?> 
	<div style="clear: both;"></div>
	</div> <!--end wrapper-->
	
	<?php echo show_mm_ad("mobile_article"); // end of article ad ?>

	<div id="related_categories">
		<strong><?php echo $lang['articles_filedunder']; ?></strong> <?php echo $current_category; ?>
	</div>
	<?php if ($article['allow_comments'] == 1) : ?>
	<a name="comments" id="comments"></a>
	<div id="comment_head">
	COMMENTS
	</div>
	<div id="comments">
		<div class="post_comment">
		<?php
		if($logged_in == 1) {
		?>		
			<span class="mycommentspan" name="mycommentspan" id="mycommentspan"></span>
			<form name="myform" method="post" id="myform" action="">
			<label for="comment_txt"><?php echo $lang['post_comment']; ?></label>
			<br /> 
			<textarea name="comment_txt" id="c_comment_txt" style="width: 99%" rows="3"></textarea>
			<br />
			<input type="hidden" id="c_vid" name="vid" value="<?php echo $uniq_id; ?>" />
			<input type="hidden" id="c_user_id" name="user_id" value="<?php echo $userdata['id']; ?>" />
			<button class="submit border2" id="c_submit"><?php echo $lang['submit_comment']; ?></button>
			</form>
		<?php 
		} else { 
			translate('<a href="'._URL_MOBI.'/login.'._FEXT.'">Sign in</a> with your <strong>'._SITENAME.'</strong> account to post comments.', lmore_signin2post); 
		}
		?>
		</div>

		<ul id="video_comments">
<?php
#echo show_comments_mobi($uniq_id, $userdata['power']);
?>
		<?php
		$sql = mysql_query("SELECT * FROM pm_comments WHERE uniq_id = '". $uniq_id ."' AND approved = '1' ORDER BY id DESC LIMIT "._COMMENTS_LIMIT);
		while($row = mysql_fetch_array($sql))
		{
		$comment_id = $row['id'];
		?>
			<li>
			<img src="<?php echo getavatar($row['user_id'], $row['username']); ?>" border="0" class="comm_avatar border4" />
			<div class="comment">
				<span class="comm_name"><?php echo $row['username']; ?></span><span class="comm_date"><?php echo time_since($row['added'])." ".$lang['ago']; ?></span>
				<div class="comm_txt"><?php echo htmlentities($row['comment'], ENT_COMPAT, 'UTF-8'); ?></div>
			</div>
			</li>
		<?php
		}
		if(mysql_num_rows($sql) > 0 && mysql_num_rows($sql) >= _COMMENTS_LIMIT) { 
		?>
		<div id="morec<?php echo $comment_id; ?>" class="morecbox">
		<div class="case" id="video_comments"></div>
		<div class="extra_data" id="<?php echo $uniq_id; ?>"></div>
		<div align="center">
		<div id="loader"><img src="<?php echo _URL_MOBI; ?>/images/moreajax.gif" /></div>
		<button class="minimal morec" id="<?php echo $comment_id; ?>">
		<?php translate("Load more comments", lmore_comments); ?>
		</button>
		</div>
		</div>
		<?php
		} else {
		?>
		
		<?php
		}
		?>
		</ul><!--end comments-->
	</div>
	<?php endif;?>
</div>
<?php
include('footer.php');
?>