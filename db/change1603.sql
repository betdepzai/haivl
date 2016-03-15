ALTER TABLE  `pm_videos` ADD  `title_tag` VARCHAR( 255 ) NULL AFTER  `video_slug` ,
ADD  `meta_description` VARCHAR( 500 ) NULL AFTER  `title_tag` ;
ALTER TABLE  `pm_videos` ADD  `allow_index` BOOLEAN NOT NULL DEFAULT TRUE AFTER  `meta_description` ;