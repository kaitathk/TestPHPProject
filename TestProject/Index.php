<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Insert title here</title>
</head>
<body>
<?php 
$weather = new DOMDocument();
$weather->load("http://rss.weather.gov.hk/rss/CurrentWeather_big5.xml");
$temp=$weather->getElementsByTagName('item')->item(0)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

$temp = explode("<br/>", $temp);
$c = $temp[1];
$h = $temp[2];
echo $c . "----" . $h;
?>
</body>
</html>