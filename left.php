<?php
session_start();
if($_SESSION['user'] == "")
{
	header("Location: Homepage.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<frameset rows="158,*" cols="*" framespacing="0" frameborder="no" border="0">
  <frame src="tabs.php" name="frame1" scrolling="No" noresize="noresize" id="frame1" title="leftFrame" />
  <frame src="stockin.php" name="frame2" id="frame2" title="mainFrame" />
</frameset>
<noframes><body>
</body>
</noframes></html>
