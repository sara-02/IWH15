<?php require 'dbms_basic.php'; ?>
<?php

	session_start();
	$li = mysql_connect($dbhost, $dbuser, $dbpass);
	if(!$li )
	{
		  die('Could not connect: ' . mysql_error());
	}

	$conc = mysql_select_db($dbdata,$li);
	if(!$conc )
	{
 		 die('Could not connect to db: ' . mysql_error());
	}
	$v1=(int)$_SESSION["id"];
	$v2=$_POST["group_nm"];
	$v3=(int)$_POST["options"];
	$v4=$_POST["descp"];
	$v5=$_POST["s_date"];
	$v6=$_POST["e_date"];
	$sql="insert into group_tasks(group_name,uid,descrip,start_date,end_date,type_ana) values('$v2',$v1,'$v4','$v5','$v6',$v3)";

	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	header("location:tasks.phtml");
	mysql_close($link);
	mysql_close($li);
?>

