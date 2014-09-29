<?php 
    include 'header.php';

	$mysql = new SaeMysql();
	$sql = "select * from member";
	$result = $mysql->getData($sql);
?>
<P>
<H2>New Income:</H2>
<P>
<form method="post" action="addOutcome.php">
<table border="0">
<tr>
<td>amount:</td>
<td><input type="text" maxlength="255" size="30" name="amount" /><font color="red">(*number only)</font></td>
</tr>
<tr>
<td>reason:</td>
<td>
<input type="text" maxlength="255" size="30" name="reason" />
</td>
</tr>
<tr>
<td>select members:</td>
<td>
<?php foreach($result as $member){?>
<input type="checkbox" name="members[]" value="<?php echo $member[id]?>"/><?php echo $member[name]?>
<?php }?>
</td>
</tr>
<input type = "submit" value="Add Outcome"  />
</table>
</form>
<?php 		
	$mysql->closeDb();
    include 'footer.php';
?>