<?php 
    include 'header.php';
?>
<?php
	$mysql = new SaeMysql();
	$pagesize=10;
	$sql = "select count(*) as num from income";
	
	$myrow = $mysql->getLine($sql);

	$num=$myrow["num"];
	$pages=intval($num/$pagesize);
	if($num%$pagesize){
		$pages++;
	}
	if (empty($_GET['page'])){
		$page=1;
	}else{
		$page=intval($_GET['page']);
	}
	 $offset=$pagesize*($page - 1);
	 $datas = $mysql->getData("select t.* from (select a.id,a.amount,a.member_id,a.time,b.name from income a ,member b where a.member_id = b.id order by a.time desc)t limit $offset,$pagesize");
	 echo "<table>\n";
	 if(is_array($datas)){
	 foreach ($datas as $data){
?>
	<tr>
	 <td align="right">amount:</td><td align="left"><B><?php echo $data["amount"]?></B></td>
	 <td align="right">from:</td><td align="left"><B><?php echo $data["name"]?></B></td>
	 <td align="right">time:</td><td align="left"><B><?php echo $data["time"]?></B></td>
	</tr>
<?php 	  	
	 }
	 }
	 echo "</table>\n";
	$mysql->closeDb();

	if($_SESSION["login"]){
		echo "<a href=\"newIncome.php\"> add Income</a>";
	}
	echo "<br/>";
	echo "<br/>";
	$first=1;
	$prev=$page-1;
	$next=$page+1;
	$last=$pages;
	if ($page > 1){
		echo "<a href='income.php?page=".$first."'>first</a> ";
		echo "<a href='income.php?page=".$prev."'>prev</a> ";
	}
	if ($page < $pages){
		echo "<a href='income.php?page=".$next."'>next</a> ";
		echo "<a href='income.php?page=".$last."'>last</a>";
	}

    include 'footer.php';
?>