<?php session_start();?>
<html>
	<head>
		<title>club4Fun</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<style type="text/css">
		<!--
			td { padding:3px; }
			div#top {position:absolute; top: 0px; left: 0px; background-color: #E4EFF3;background-position: 100px 1px;background-repeat: no-repeat; height: 60px; width:100%; padding:0px; border: none;margin: 0;}
		// -->
		</style>	
	</head>
	<body>
		<div id="top">&nbsp;<br><br>
		<table border="0" width="100%">
		<tr>
		<td width="12%"><a href="index.php">Home</a></td>
		<td width="12%"><a href="member.php"> Member</a></td>
		<td width="12%"><a href="income.php"> Income</a></td>
		<td width="12%"><a href="outcome.php"> Outcome</a></td>
		<?php if($_SESSION["login"]){?>
		<td width="52%" align="right"><a href="logout.php">Logout</a></td>
		<?php }else{?>
		<td width="52%" align="right"><a href="login.php">Login</a></td>
		<?php }?>
		</tr>
		</table>
		
		</div>
		
		<br clear="all">
		<p>&nbsp;</p>