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

	$uname=$_POST['uname'];
	$psswd=$_POST['pass'];
	$sql="SELECT uid FROM logins WHERE uname='$uname' and upass='$psswd'";
	$res=mysql_result(mysql_query($sql),0);
	if(!$res)
	{
		header("location:login.phtml");
	}
	else
	{
		$_SESSION["name"]=$uname;
		$_SESSION["id"]=$res;
		header("location:home.phtml");
	}
	mysql_close($li);
?>
