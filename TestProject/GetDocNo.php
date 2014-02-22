<?php
$db=mysql_connect('localhost','root','') or 
				die ('unable to connect db server');
mysql_select_db('dkgdb',$db) or die(mysql_error($db));

$query='select * from docnum';
$result=mysql_query($query,$db) or die(mysql_error($db));
?>

<html>
<head>
	<title>Display Doc No.</title>
	<style type="text/css">
		th {background-color:#999;}
		.odd_row {background-color: #EEE;}
		.even_row {background-color: #FFF;}
	</style >	
</head>
<body>
<table style="width:100%;">
<tr><th colspan="5">Doc No.</th></tr>
<tr><th>Comp</th><th>Type</th><th>Year</th><th>Period</th><th>Seq No.</th></tr>
<?php
$odd=true;
while ($row = mysql_fetch_assoc($result)) {
	echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row"> ';
	$odd = !$odd;
	echo '<td>';
	echo $row['DocComp'];
	echo '</td><td>';
	echo $row['DocType'];
	echo '</td><td>';
	echo $row['DocYear'];
	echo '</td><td>';
	echo $row['DocPerd'];
	echo '</td><td>';
	echo $row['DocSeqn'];
	echo '</td></tr>';
}
mysql_free_result($result);
mysql_close($db);
?>
</table>
</body>
</html>
