<?php
session_start();
unset($_SESSION["login"]);
echo "<SCRIPT LANGUAGE='JavaScript'>"; 
echo "location.href='index.php'"; 
echo "</SCRIPT>"; 
?>