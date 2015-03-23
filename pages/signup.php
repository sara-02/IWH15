<?php require 'dbms_basic.php' ; ?>
<?php

	$link=mysql_connect($dbhost,$dbuser,$dbpass);
	if(!$link)
	{
		 die('Could not connect:' . mysql_error());
	}
	$conc = mysql_select_db($dbdata,$link);
	if(!$conc )
	{
 		 die('Could not connect to db:' . mysql_error());
	}
	$v1=$_POST['uname'];
	$v2=$_POST['upswd1'];
	$v3=$_POST['mailid'];

	$sql="Insert into logins(uname,upass,mailid) values('$v1','$v2','$v3')";
	$res=mysql_query($sql);
	if(!$res)
	{
		die('sql error'.mysql_error());
	}
	header("location:login.phtml");
	mysql_close($link);
?>
