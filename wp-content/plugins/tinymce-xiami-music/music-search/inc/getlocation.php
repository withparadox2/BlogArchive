<?php
	$songID = $_GET['id'];
	$xmlurl = 'http://www.xiami.com/song/playlist/id/'.$songID.'/object_name/default/object_id/0';
	$xmlContents = file_get_contents($xmlurl);
	$pos1 = strpos($xmlContents, '<location>') + strlen('<location>');
	$pos2 = strpos($xmlContents, '</location>');
	$location = substr($xmlContents, $pos1, $pos2 - $pos1);
	echo $location;
?>