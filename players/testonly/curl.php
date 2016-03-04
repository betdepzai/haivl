<?php
	function get_html($url)
	{
		        // create curl resource 
	        $ch = curl_init(); 

	        // set url 
	        curl_setopt($ch, CURLOPT_URL, $url); 

	        //return the transfer as a string 
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

	        // $output contains the output string 
	        $output = curl_exec($ch); 

	        // close curl resource to free up system resources 
	        curl_close($ch);  
	return $output;		
	}
	function get_list($url)
	{
		$html=get_html($url);
		$result=preg_match("http:\/\/haynhucnhoi.tv\/photo\/[0-9]*/[^\.]*\.hnn", subject);
		print_r($result[0]) ;
	}
	get_list(http://haynhucnhoi.tv/video);
	
?>
<!DOCTYPE html>
<html>
<head>
<style>
</style>
<meta charset="UTF-8" />
	<title></title>
</head>
<body>
test
</body>
</html>
