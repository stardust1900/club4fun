<?php 
    include 'header.php';
?>
<?php
	$mysql = new SaeMysql();
	$mysql->runSql("set names 'utf8'");
	$sql = "select * from member";
	$members = $mysql->getData($sql);
	echo "<table>\n";
	foreach($members as $member){
	
?>
 <tr>
 <td align="right">name:</td><td align="left"><B><?php echo $member["name"];?></B></td>
 <td align="right">updateTime:</td><td align="left"><B><?php echo $member["updatetime"]?></B></td>
 </tr>
 <tr>
 <td colspan="2">balance:<FONT <?php if($member["balance"]<0){ echo "color=\"red\"";}?> ><?php echo $member["balance"]?></FONT></td>
 </tr>

<?php 		
	}
	$mysql->closeDb();
	echo "</table>\n";

	if($_SESSION["login"]){
		echo "<a href=\"newMember.php\"> add Member</a>";
	}
    include 'footer.php';
?>