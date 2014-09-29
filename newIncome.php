<?php 
    include 'header.php';

	$mysql = new SaeMysql();
	$sql = "select * from member";
	$result =$mysql->getData($sql);
?>
<P>
<H2>New Income:</H2>
<P>
<form method="post" action="addIncome.php">
<table border="0">
<tr>
<td>amount:</td>
<td><input type="text" maxlength="255" size="30" name="amount" /><font color="red">(*number only)</font></td>
</tr>
<tr>
<td>from:</td>
<td>
<select name="memberId">
<?php foreach($result as $member){?>
<option value="<?php echo $member[id]?>"/><?php echo $member[name]?></option>
<?php }?>
</select>
</td>
</tr>
<input type = "submit" value="Add Income"  />
</table>
</form>
<?php 		
	$mysql->closeDb();
    include 'footer.php';
?>