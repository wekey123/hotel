<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
input
{
background-image:url(benito/bg201.gif);
border-color:#0000FF;
color:#3333FF;
font-family:Georgia;
font-weight:bold;
border-style:groove;
}
select
{
background-image:url(benito/bg201.gif);
border-color:#0000FF;
color:#3333FF;
font-family:Georgia;
font-weight:bold;
border-style:groove;
}
th
{
font-family: georgia;
color:#0066FF;
text-decoration:none;
}
td
{
font-family: georgia;
color:#0066FF;
text-decoration:none;
}
img
{
opacity:0.6;
filter:alpha(opacity=40)
border-style:none;
}
a
{
font-family: cursive;
color:#0033FF;
text-decoration:none;
}
a:hover
{
font-family: cursive;
color:red;
text-decoration:underline;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body background="benito/bg201.gif">
<table width="900" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <th scope="col"><a href="Purchase.php" target="frame2"><img src="benito/purchase.gif" onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100" onmouseout="this.style.opacity=0.6;this.filters.alpha.opacity=40" /></a></th>
    <th scope="col"><a href="stockin.php" target="frame2"><img src="benito/inhand.gif" onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100" onmouseout="this.style.opacity=0.6;this.filters.alpha.opacity=40"  /></a></th>
    <th scope="col"><a href="stockcon1.php" target="frame2"><img src="benito/consumed.gif" onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100" onmouseout="this.style.opacity=0.6;this.filters.alpha.opacity=40"  /></a></th>
  </tr>
  <tr>
    <th scope="col"><a href="stockin.php" target="frame2"></a> <a href="work1.php" target="frame2"><img src="benito/progress.gif" onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100" onmouseout="this.style.opacity=0.6;this.filters.alpha.opacity=40" /></a></th>
    <th scope="col"><a href="ex.php" target="frame2"><img src="benito/projection.gif" onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100" onmouseout="this.style.opacity=0.6;this.filters.alpha.opacity=40" /></a><a href="report.php" target="frame2"></a><a href="stockcon1.php" target="frame2"></a></th>
    <th scope="col"><a href="report.php" target="frame2"><img src="benito/report.gif" onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100" onmouseout="this.style.opacity=0.6;this.filters.alpha.opacity=40" /></a><a href="work1.php" target="frame2"></a></th>
  </tr>
  <tr>
    <th colspan="3" scope="col"><a href="signout.php" target="_top">Sign Out</a></th>
  </tr>
</table>
</body>
</html>
