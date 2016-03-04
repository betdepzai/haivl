<?php
if (isset($_GET['url']))
{
	$content = file_get_contents($_GET['url']);
	
	/*
	preg_match("%http:\/\/i.ytimg.com\/vi\/([^/]*)%", $_GET['url'], $matches, PREG_OFFSET_CAPTURE);
	$name_before_ext=$matches[1][0];
	echo $name_before_ext;exit();
	*/
	
	//Store in the filesystem.
	$fp = fopen("facebook.jpg", "w");
	fwrite($fp, $content);
	fclose($fp);
}


	



// Load the stamp and the photo to apply the watermark to
$stamp = imagecreatefrompng('play.png');
$im = imagecreatefromjpeg('facebook.jpg');

//tao resource image minh muon crop , chieu dai va chieu rong sau khi drop
$croped_im = imagecreatetruecolor(480, 260);

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 215;
$marge_bottom = 95;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

//copy ảnh gốc sang Resource ảnh mới bắt đầu từ tọa độ 0,0 của ảnh mới sẽ chép từ tọa độ 0,50 của anh cũ sang voi do dai x rong = 480,260
imagecopy($croped_im, $im, 0, 0, 0, 50, 480, 260);

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 

//copy ảnh watermark sang đè lên ảnh gốc 
imagecopy($croped_im, $stamp, imagesx($croped_im) - $sx - $marge_right, imagesy($croped_im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

// Output and free memory
header('Content-type: image/png');
imagejpeg($croped_im);
imagedestroy($croped_im);
imagedestroy($stamp);imagedestroy($im);

?>