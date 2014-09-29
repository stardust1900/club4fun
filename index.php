<?php 
    include 'header.php';
?>

<?php
	$mysql = new SaeMysql();
	$sql = "select * from depot";
	$line = $mysql->getLine($sql);
	//echo "haha";
?>
<table border="0">
 <tr>
 <td align="right">Balance:</td><td align="left"><B><?php echo $line["balance"]?></B></td>
 <td align="right">UpdateTime:</td><td align="left"><B><?php echo $line["updatetime"]?></B></td>
 </tr>
</table>
<?php 
	$mysql->closeDb();
    include 'footer.php';
?>