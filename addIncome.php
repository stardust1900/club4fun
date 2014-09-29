<?php
    $amount = $_POST[amount];
    $memberId = $_POST[memberId];
	//echo $amount."  ".$memberId;
    $sql1 = "insert into income (amount,time,member_id) values ($amount,now(),$memberId)";
    $sql2 = "update depot set updatetime = now(), balance = balance+$amount";
    $sql3 = "update member set updatetime = now(),balance = balance+$amount where id = $memberId";
    $mysql = new SaeMysql();

	$mysql->runSql($sql1);
	if( $mysql->errno() != 0 ){
     die( "Error:" . $mysql->errmsg() );
    }
	$mysql->runSql($sql2);
	if( $mysql->errno() != 0 ){
     die( "Error:" . $mysql->errmsg() );
    }
	$mysql->runSql($sql3);
	if( $mysql->errno() != 0 ){
     die( "Error:" . $mysql->errmsg() );
    }	
   $mysql->closeDb();
	
echo "<SCRIPT LANGUAGE='JavaScript'>"; 
echo "location.href='income.php'"; 
echo "</SCRIPT>"; 
?>