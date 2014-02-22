<?php

$weather = new DOMDocument();
$weather->load("http://rss.weather.gov.hk/rss/CurrentWeather_big5.xml");
$temp=$weather->getElementsByTagName('item')->item(0)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

$temp = explode("<br/>", $temp);
$hr= $temp[0];
$c = $temp[1];
$h = $temp[2];
echo $c . "----" . $h;

?>