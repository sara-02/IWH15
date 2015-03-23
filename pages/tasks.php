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
	$Name=$_POST['Name'];
	$Hours=$_POST['Hours'];
	$sql="select max(group_id) from group_tasks where uid=$v1";
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	$row=mysql_fetch_row(mysql_query($sql));
	$v1=$row[0];
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}


			 foreach($Name as $a => $b)
					{
						$v3=$Name[$a];
						$v4=(int)$Hours[$a];
						$sql="Insert into tasks(task_name,group_id,num_of_hours,performance,today_date,hours_given) values('$v3',$v1,'$v4',0,CURDATE(),0)";
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
}
	header("location:home.phtml");

	mysql_close($li);
?>

