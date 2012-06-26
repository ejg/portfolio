<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"  "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<!--Meta Tags-->
<meta http-equiv="content-type" content="text/html;charset=uti-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<!--End Meta Tags-->
<title>Welcome</title>
<style type="text/css">
h4 { margin: 0 0 10px 0;}
.thumb {
     float:left;
     padding-right:10px;
     }
.clear {
	clear:both;
	margin-bottom: 10px;
	overflow:hidden;
	}
</style>

</head>
<body>

<h1>test of youtube api</h1>
<?php
$xml = simplexml_load_file("http://gdata.youtube.com/feeds/api/videos/-/shmuley");

foreach ($xml->entry as $entry)
{

	//All the media namespaced items under a YouTube video entry
	$media = $entry->children('http://search.yahoo.com/mrss/');
	echo '<div class="clear">';
		$attrs = $media->group->thumbnail[0]->attributes();
		$thumbnail = $attrs['url'];
		echo '<div class="thumb">';
			echo "<a href=\"". $media->group->player->attributes(). "\"><img src=\"$thumbnail\" alt=\"oops\"></a>";
		echo '</div>';
		echo '<h4>' . $media->group->title . '</h4>';
		echo '<p>' . $media->group->description . '</p>';
	echo '</div>';
}
?>
</body>