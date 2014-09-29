<?php
	$memberIds = $_POST[members];
	$num = count($memberIds);
	$amount = $_POST[amount];
	$reason = $_POST[reason];
	$sql1 = "insert into outcome (amount,reason,time,personnum) values ($amount,'$reason',now(),$num)";
	$sql2 = "update depot set updatetime = now(), balance = balance-$amount";
	$mysql = new SaeMysql();
	$mysql->runSql("set names 'utf8'");

	$mysql->runSql($sql1);
	if( $mysql->errno() != 0 ){
     die( "Error:" . $mysql->errmsg() );
    }

	$autoKey = $mysql->lastId();
	$mysql->runSql($sql2);
	if( $mysql->errno() != 0 ){
     die( "Error:" . $mysql->errmsg() );
    }
	$avg =  round($amount/$num,2);
	foreach ($memberIds as $id){
		$sql3 = "update member set updatetime = now(), balance = balance-$avg where id = $id";
		$sql4 = "insert into out_member values($autoKey,$id)";
		$mysql->runSql($sql3);
		$mysql->runSql($sql4);
	}
	
    $mysql->closeDb();
    echo "<SCRIPT LANGUAGE='JavaScript'>"; 
	echo "location.href='outcome.php'"; 
	echo "</SCRIPT>"; 
?>