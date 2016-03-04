<?php
//lay HTML tu URL
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
	// lay list url page tu category
	function get_list($url)
	{
		$html=get_html($url);
		//echo $html;exit();
		preg_match_all("%/photo/[0-9]*/[^.]*.hnn%", $html,$result);
		$unique_result=array_unique($result[0]);
		//print_r($unique_result);
		return $unique_result;
	}
	//lay list video youtube tu list page
	function get_youtube_list($listpage)
	{
		$listtube=array(); $dem=0;
		foreach ($listpage as $key => $value) {
			$url="http://haynhucnhoi.tv".$value;
			$html=get_html($url);
			preg_match('%file: "(https://www.youtube.com/watch\?v=([^"]*))%', $html, $result);

			// key cua youtube url
			$tube_key=$result[2];

			//get title
			preg_match('%<title>([^<]*)</title>%', $html, $rs);
			$title=$rs[1];

			?>
			<div style="width: 410px;float: left;min-height:350px;" class="tube">
				<iframe width="400" height="225" src="https://www.youtube.com/embed/<?php echo $tube_key?>" frameborder="0" allowfullscreen></iframe>
				<h3><?php echo $title?></h3>
			</div>
			<?php
			$dem++;
			if($dem==3)exit();

		}
		return $listtube;
	}
	
	$listpage=get_list('http://haynhucnhoi.tv/video');
	$listtube=get_youtube_list($listpage);
	
?>