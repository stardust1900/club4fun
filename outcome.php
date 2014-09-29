<?php 
    include 'header.php';
?>
<?php
	$mysql = new SaeMysql();
	$mysql->runSql("set names 'utf8'");
	//echo $link;
	$pagesize=10;

	$sql = "select count(*) as num from outcome";
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
	 $rs=$mysql->getData("select t.* from (select * from outcome order by time desc)t limit $offset,$pagesize");
	 echo "<table>\n";
	 if(is_array($rs)){
	  foreach($rs as $data){
	  	
?>
<tr>
 <td align="right">amount:</td><td align="left"><B><?php echo $data["amount"]?></B></td>
 <td align="right">reason:</td><td align="left"><B><?php echo $data["reason"]?></B></td>
 <td align="right">personNum:</td><td align="left"><B><?php echo $data["personnum"]?></B></td>
 <td align="right">time:</td><td align="left"><B><?php echo $data["time"]?></B></td>
 <td align="right">average:</td><td align="left"><B><?php echo round($data["amount"]/$data["personnum"],2);?></B></td>
 </tr>
 <tr>
  <td>
 person:
 </td>
 <td colspan="4">
 <?php 
 $members = $mysql->getData("select * from out_member a,member b where a.member_id = b.id and a.out_id ={$data['id']}");

 foreach ($members as $m){
 	echo $m["name"];
 	echo "/ ";
 }
 ?>
 </td>
 </tr>
<?php 	  	
	  }
	 }
	  echo "</table>\n";
	  $mysql->closeDb();

	if($_SESSION["login"]){
		echo "<a href=\"newOutcome.php\"> add Outcome</a>";
	}
	echo "<br/>";
	echo "<br/>";
	
	$first=1;
	$prev=$page-1;
	$next=$page+1;
	$last=$pages;
	if ($page > 1){
		echo "<a href='outcome.php?page=".$first."'>first</a> ";
		echo "<a href='outcome.php?page=".$prev."'>prev</a> ";
	}
	if ($page < $pages){
		echo "<a href='outcome.php?page=".$next."'>next</a> ";
		echo "<a href='outcome.php?page=".$last."'>last</a>";
	}

    include 'footer.php';
?>