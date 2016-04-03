<?php
session_start();
$rece = $_GET['re'];
$user = $_SESSION['userid'];
$sql = mysql_query("select max(id) maxim from greetings");
$x1 = mysql_fetch_array($sql);
$xval = $x1['maxim'] + 1;
$flname = "greet".$xval.".jpg";
$dat = date("d-m-Y h:m:s");
copy("greet.jpg","greetings/sent/$flname");
$sql = mysql_query("insert into greetings(from1,to1,flname,datime) values('$user','$rece','$flname','$dat')");
if($sql)
{
	$msg = "Greetings sent to $rece successfully";
}
else
{
	$msg = "Greeting sending failed miserably, kindly try again later";
}
unlink("greet.jpg");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
