<?php

$db_connect=mysql_connect('localhost','root','') or die('unable to connect');
$db_database=mysql_select_db('joomla2511',$db_connect) or die(mysql_error($db_connect));

$query ="select manifest_cache from lu7m9_extensions";
$query .= " where type='language' and element='zh-TW' ";
$query .= "  and client_id=0";

$result=mysql_query($query,$db_connect);

//echo $query . '<br />';
//echo 'Result : ' . $result;

while ($row=mysql_fetch_assoc($result)){
	extract($row);
// 	echo $manifest_cache;
	echo '<br /><br />';
//	var_dump(json_decode($manifest_cache));
//	echo json_decode($manifest_cache);
	$data=json_decode($manifest_cache);
	print_r($data);
	echo '<br /><br />Language : ' . $data->name . '<br /><br />';

}

//
$query="";

$query ="select config from lu7m9_virtuemart_configs";
$query .= " where virtuemart_config_id=1 ";

$result=mysql_query($query,$db_connect);
while ($row=mysql_fetch_assoc($result)){
	extract($row);

	echo '<br /><br />';
	echo $config;
	
	
}

mysql_close();

?>
