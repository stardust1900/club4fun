<?php
	if(strcmp($_POST[password],'fuckgfw')==0){
		session_start();
		$_SESSION["login"] = "fuckgfw";
		echo "<SCRIPT LANGUAGE='JavaScript'>"; 
		echo "location.href='index.php'"; 
		echo "</SCRIPT>"; 
	}else{
		echo "sorry ,wrong password!";
		echo "<br />";
		echo "<a href='login.php'>back</a>"." "."<a href='index.php'>home</a>";
	}

?>
