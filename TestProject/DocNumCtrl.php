<?php
class ClsDocNum {

	private $connection;
	private static $instances=0;
	
	function __construct(){
//		parent::__contruct();
		if(ClsDocNum::$instances == 0){
			$this->connection = mysql_connect('localhost','root','') or
					die ( mysql_error(). " Error no:".mysql_errno());
			ClsDocNum::$instances = 1;
			mysql_select_db('dkgdb',$this->connection) or die(mysql_error($this->connection));
		}else{
			$msg = "Close the existing instance of the ".
					"MySQLConnect class.";
			die($msg);
		}
	
	}
	
	public function Get_Doc($pTyoe){
		$datestr=date('Ym');
		$pYear=intval(substr($datestr,0,4));
		$pPerd=intval(substr($datestr,4,2));
		$retdoc=$datestr.str_pad($this->GetDocNum($pTyoe,$pYear,$pPerd),4,'0',STR_PAD_LEFT);
		
		return $retdoc;
	}
	
	public function GetDocNum($pType, $pYear,$pPerd)
	{

		$retdoc=0;

		$query='select * from docnum 
					where DocType="'. $pType . '" and 
						  DocYear='. $pYear . ' and
						  DocPerd='. $pPerd;
		$result=mysql_query($query, $this->connection) or die(mysql_errno($this->connection));

		if (mysql_num_rows($result)==0){
			$this->InsDocNum($pType,$pYear,$pPerd);
			$retdoc=1;		
		}
		else {
			$row=mysql_fetch_array($result);
			extract($row);
			$retdoc=$DocSeqn;
			$this->UpdDocNum($pType,$pYear,$pPerd);
			}
		
		mysql_free_result($result);
		return $retdoc;
	}
	
	public function InsDocNum($pType,$pYear,$pPerd){

		$query='insert into docnum (DocComp, DocType, DocYear, DocPerd, DocSeqn) 
					Values ("0001","' . $pType .'",' .$pYear. ',' .$pPerd. ',1)';

		$result=mysql_query($query, $this->connection) or die(mysql_errno($this->connection));
		
		return $result;
		 
	}
		
	public function UpdDocNum($pType,$pYear,$pPerd){
		
		$query='update docnum set DocSeqn=DocSeqn+1
					where DocType="'. $pType . '" and 
						  DocYear='. $pYear . ' and
						  DocPerd='. $pPerd;
						
		$result=mysql_query($query, $this->connection) or die(mysql_errno($this->connection));
		
		return $result;
	}
	
	function __destruct(){
		mysql_close($this->connection);
		ClsDocNum::$instances=0;
		}
}


?>
