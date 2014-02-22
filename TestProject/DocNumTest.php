<?php
require 'DocNumCtrl.php';

$doccls=new ClsDocNum;

$retdoc=$doccls->Get_Doc('OD');
echo $retdoc;

$doccls=null;

?>