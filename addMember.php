<?php
	$memberName = $_POST["name"];

	$sql = "insert into member (name,jointime,status) values ('$memberName',now(),1)";
	$mysql = new SaeMysql();
	$mysql->runSql("set names 'utf8'");
	$mysql->runSql($sql);
	// ¹Ø±ÕÁ¬½Ó
	$mysql->closeDb();
	
echo "<SCRIPT LANGUAGE='JavaScript'>"; 
echo "location.href='member.php'"; 
echo "</SCRIPT>"; 
?>
