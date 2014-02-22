<?php
  $client = new SoapClient("http://localhost:8080/TestProject/TestWSDL.wsdl");
//  print($client->GetTest("sam"));
//  print('<br />');
//	print($client->GetXML());
	echo $client->GetXML();
?>