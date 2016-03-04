<script type="text/javascript" src="<?php echo _URL; ?>/players/jwplayer6/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key="<?php echo $config['jwplayerkey']; ?>";</script>

<div id="Playerholder" class="videoWrapper">
<noscript>
You need to have the <a href="http://www.macromedia.com/go/getflashplayer">Flash Player</a> installed and
a browser with JavaScript support.
</noscript>

<?php if($video['video_player'] == "embed") : ?>
<?php echo $video['embed_code']; ?>
<?php else : ?>
<script type="text/javascript">
	var flashvars = {
        <?php 
        if($video['source_id'] == 0 || $video['source_id'] == 0) :
        ?>
        file: '<?php echo $video['jw_flashvars']['file']; ?>',
        streamer: '<?php echo $video['jw_flashvars']['streamer']; ?>',
        rtmp: {
        <?php if($video['jw_flashvars']['provider'] != '') : ?>
        provider: '<?php echo $video['jw_flashvars']['provider']; ?>',
        <?php endif; ?>
        <?php if($video['jw_flashvars']['startparam'] != '') : ?>
        startparam: '<?php echo $video['jw_flashvars']['startparam']; ?>',
        <?php endif; ?>

        <?php if($video['jw_flashvars']['loadbalance'] != '') : ?>
        loadbalance: '<?php echo $video['jw_flashvars']['loadbalance']; ?>',
        <?php endif; ?>

        <?php if($video['jw_flashvars']['subscribe'] != '') : ?>
        subscribe: '<?php echo $video['jw_flashvars']['subscribe']; ?>',
        <?php endif; ?>

        <?php if($video['jw_flashvars']['securetoken'] != '') : ?>
        securetoken: '<?php echo $video['jw_flashvars']['securetoken']; ?>'
        <?php endif; ?>
        },
        <?php elseif($video['source_id'] == 3) : ?>			
        <?php				
        if ($video['fetch'] == 0)
        {					
            echo "file: '{$video['direct']}'";				
        } else				
        {	
            echo "sources: {$video['direct']}";				
        }			
        ?>,
        <?php elseif($video['source_id'] == 1) : ?>
            file: '<?php echo $video['url_flv']; ?>',
        <?php else: ?>
            file: '<?php echo $video['url_flv']; ?>',
        <?php endif; ?>
        flashplayer: "<?php echo _URL2; ?>/players/jwplayer6/jwplayer.flash.swf",                        
        width: "100%",
    	<?php if($playlist) : ?>
        
    	<?php else: ?>
       // height: "<?php echo _PLAYER_H; ?>",  
    	autostart: "<?php echo _AUTOPLAY; ?>", 
    	<?php endif; ?>
        image: '<?php echo $video['preview_image']; ?>',
        stretching: "fill",
		primary: "flash",
        logo: {
        	file: '<?php echo _WATERMARKURL; ?>',
        	link: '<?php echo _WATERMARKLINK; ?>',
        }
        };
        // {$jw_flashvars_override}
    jwplayer("Playerholder").setup(flashvars);
</script>
<?php endif; ?>
</div>