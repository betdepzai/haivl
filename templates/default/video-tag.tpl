{include file='header.tpl' p="general"} 

<div id="wrapper">
<!-- Grid banner -->
<div >
<div class="post-list-t1 cover">
	<div class="row no-gutter">
    {get_advanced_video_list assignto="advanced_video_list" category_id=$cat_id featured="1" limit=5}
        {foreach from=$advanced_video_list key=k item=video_data}
			{if $k==0}
        		<div class="col-md-6 col-sm-12">
			<div class="badge-grid-item item hero clearfix list-headline">
				<a class="badge-evt img-container" href="{$video_data.video_href}">
					<div class="responsivewrapper" style="background: url('{$video_data.thumb_img_url}') center; background-size: cover;">
					</div>
					<div class="img-shadow">
					</div>
				</a>
				<div class="info">
					<a class="badge-evt title" href="{$video_data.video_href}">
						<h4>{$video_data.video_title}</h4>
					</a>
				</div>
			</div><!-- / item -->
		</div>
			
	        {else}    
        
		<div class="col-md-3 col-sm-6">
			<div class="badge-grid-item item clearfix list-headline">
				<a class="badge-evt img-container" href="{$video_data.video_href}">
					<div class="responsivewrapper" style="background: url('{$video_data.thumb_img_url}') center; background-size: cover;">
					</div>
					<div class="img-shadow"></div>
				</a>
				<div class="info">
				    <a class="badge-evt title" href="{$video_data.video_href}">
					    <h4>{$video_data.video_title}</h4>
				    </a>
			    </div>
		    </div><!-- / item -->
		</div>
			{/if}
         {/foreach}       
        
		

                	</div>
</div>
</div>

<!-- Grid banner -->
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span8">
		<div id="primary">
			<h1 class="niceheading sameh2"><i class="fa fa-folder-o"></i> TAG: "<span class="bg-highlight">{$searchstring}</span>"</h1>
            
            <div class="btn-group btn-group-sort">
            <button class="btn btn-small" id="list"><i class="icon-th"></i> </button>
            <button class="btn btn-small" id="grid"><i class="icon-th-list"></i> </button>
            <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" data-target="#" href="">
            {if $gv_sortby == ''}{$lang.sorting}{/if} {if $gv_sortby == 'date'}{$lang.date}{/if}{if $gv_sortby == 'views'}{$lang.views}{/if}{if $gv_sortby == 'rating'}{$lang.rating}{/if}{if $gv_sortby == 'title'}{$lang.title}{/if}
            <span class="caret"></span>
            </a>
            <ul class="dropdown-menu pull-right">
            {if $smarty.const._SEOMOD == '1'}
            <li {if $gv_sortby == 'date'}class="selected"{/if}>
            <a href="{$smarty.const._URL}/browse-{$gv_cat}-videos-{$gv_pagenumber}-date.html" rel="nofollow">{$lang.date}</a></li>
            <li {if $gv_sortby == 'views'}class="selected"{/if}>
            <a href="{$smarty.const._URL}/browse-{$gv_cat}-videos-{$gv_pagenumber}-views.html" rel="nofollow">{$lang.views}</a></li>
            <li {if $gv_sortby == 'rating'}class="active"{/if}>
            <a href="{$smarty.const._URL}/browse-{$gv_cat}-videos-{$gv_pagenumber}-rating.html" rel="nofollow">{$lang.rating}</a></li>
            <li {if $gv_sortby == 'title'}class="active"{/if}>
            <a href="{$smarty.const._URL}/browse-{$gv_cat}-videos-{$gv_pagenumber}-title.html" rel="nofollow">{$lang.title}</a></li>
            {else}
            <li {if $gv_sortby == 'date'}class="selected"{/if}>
            <a href="{$smarty.const._URL}/category.php?cat={$gv_cat}&page={$gv_pagenumber}&sortby=date" rel="nofollow">{$lang.date}</a></li>
            <li {if $gv_sortby == 'views'}class="selected"{/if}>
            <a href="{$smarty.const._URL}/category.php?cat={$gv_cat}&page={$gv_pagenumber}&sortby=views" rel="nofollow">{$lang.views}</a></li>
            <li {if $gv_sortby == 'rating'}class="selected"{/if}>
            <a href="{$smarty.const._URL}/category.php?cat={$gv_cat}&page={$gv_pagenumber}&sortby=rating" rel="nofollow">{$lang.rating}</a></li>
            <li {if $gv_sortby == 'title'}class="selected"{/if}>
            <a href="{$smarty.const._URL}/category.php?cat={$gv_cat}&page={$gv_pagenumber}&sortby=title" rel="nofollow">{$lang.title}</a></li>
			{/if}
            </ul>
            </div>
            {if $gv_category_description}
			<div class="pm-browse-desc">
            {$gv_category_description}
            <div class="clearfix"></div>
			</div>
			{/if}

     		{$problem}

            <ul class="pm-ul-browse-videos thumbnails" id="pm-grid">
			{foreach from=$results key=k item=video_data}
			  <li>
				<div class="pm-li-video">
				    <span class="pm-video-thumb pm-thumb-145 pm-thumb border-radius2">
				    <span class="pm-video-li-thumb-info">
                    {if $video_data.yt_length != 0}<span class="pm-label-duration border-radius3 opac7">{$video_data.duration}</span>{/if}
					{if $video_data.mark_new}<span class="label label-new">{$lang._new}</span>{/if}
					{if $video_data.mark_popular}<span class="label label-pop">{$lang._popular}</span>{/if}
                    {if $logged_in}
                    <span class="watch-later hide">
                        <button class="btn btn-mini watch-later-add-btn-{$video_data.id}" onclick="watch_later_add({$video_data.id}); return false;" rel="tooltip" title="{$lang.add_to} {$lang.watch_later}"><i class="icon-time"></i></button>
                        <button class="btn btn-mini btn-remove hide watch-later-remove-btn-{$video_data.id}" onclick="watch_later_remove({$video_data.id}); return false;" rel="tooltip" title="{$lang.playlist_remove_item}"><i class="icon-ok"></i></button>
                    </span>
                    {/if}
				    </span>
				    <a href="{$video_data.video_href}" class="pm-thumb-fix pm-thumb-145"><span class="pm-thumb-fix-clip"><img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" width="145"><span class="vertical-align"></span></span></a>
				    </span>
				    
				    <h3><a href="{$video_data.video_href}" class="pm-title-link " title="{$video_data.attr_alt}">{$video_data.video_title}</a></h3>
				    <div class="pm-video-attr">
				        <span class="pm-video-attr-author">{$lang.articles_by} <a href="{$video_data.author_profile_href}">{$video_data.author_name}</a></span>
				        <span class="pm-video-attr-since"><small>{$lang.added} <time datetime="{$video_data.html5_datetime}" title="{$video_data.full_datetime}">{$video_data.time_since_added} {$lang.ago}</time></small></span>
				        <span class="pm-video-attr-numbers"><small>{$video_data.views_compact} {$lang.views} / {$video_data.likes_compact} {$lang._likes}</small></span>
					</div>
				    <p class="pm-video-attr-desc">{$video_data.excerpt}</p>
					
					{if $video_data.featured}
				    <span class="pm-video-li-info">
				        <span class="label label-featured">{$lang._feat}</span>
				    </span>
					{/if}
				</div>
			  </li>
			{/foreach}
			</ul>
			
			<div class="clearfix"></div>
			{if is_array($pagination)}
			<div class="pagination pagination-centered">
              <ul>
                {foreach from=$pagination key=k item=pagination_data}
					<li{foreach from=$pagination_data.li key=attr item=attr_val} {$attr}="{$attr_val}"{/foreach}>
						<a{foreach from=$pagination_data.a key=attr item=attr_val} {$attr}="{$attr_val}"{/foreach}>{$pagination_data.text}</a>
					</li>
				{/foreach}
              </ul>
            </div>
			{/if}

		</div><!-- #primary -->
        </div><!-- #content -->
        <div class="span4">
		<div id="secondary">

		<!-- Newvideos -->
        <div class="widget-related widget" id="pm-related" >
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#" data-target="#bestincategory" data-toggle="tab"><i class="fa fa-play-circle-o"></i>Clip mới trong ngày</a></li>
            
          </ul>
 
          <div id="pm-tabs" class="tab-content">
            <div class="tab-pane fade in active" id="bestincategory2">
                <ul class="pm-ul-top-videos">
                {get_advanced_video_list assignto="advanced_video_list"  limit=7}
                {foreach from=$advanced_video_list key=k item=related_video_data}
                  <li>
                    <div class="pm-li-top-videos">
                    <span class="pm-video-thumb pm-thumb-106 pm-thumb-top border-radius2">
                    <span class="pm-video-li-thumb-info">
                    {if $related_video_data.yt_length > 0}<span class="pm-label-duration border-radius3 opac7">{$related_video_data.duration}</span>{/if}
                    {if $logged_in}
                    <span class="watch-later hide">
                        <button class="btn btn-mini watch-later-add-btn-{$related_video_data.id}" onclick="watch_later_add({$related_video_data.id}); return false;" rel="tooltip" title="{$lang.add_to} {$lang.watch_later}"><i class="icon-time"></i></button>
                        <button class="btn btn-mini btn-remove hide watch-later-remove-btn-{$related_video_data.id}" onclick="watch_later_remove({$related_video_data.id}); return false;" rel="tooltip" title="{$lang.playlist_remove_item}"><i class="icon-ok"></i></button>
                    </span>
                    {/if}
                    </span>
                    <a href="{$related_video_data.video_href}" class="pm-thumb-fix pm-thumb-145"><span class="pm-thumb-fix-clip"><img src="{$related_video_data.thumb_img_url}" alt="{$related_video_data.attr_alt}" width="145"><span class="vertical-align"></span></span></a>
                    </span>
                    <h3><a href="{$related_video_data.video_href}" class="pm-title-link">{$related_video_data.video_title}</a></h3>
                    
                    {if $related_video_data.featured}
                    <span class="pm-video-li-info">
                        <span class="label label-featured">{$lang._feat}</span>
                    </span>
                    {/if}
                    </div>
                  </li>
                {foreachelse}
                  {$lang.top_videos_msg2}
                {/foreach}
                </ul>
            </div>
            
            
          </div>
          
        </div><!-- .shadow-div -->
        <!-- End Newvideos -->


        
		</div><!-- #secondary -->
        </div><!-- #sidebar -->
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
{include file="footer.tpl" tpl_name="video-category"} 