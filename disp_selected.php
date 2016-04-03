<?php
session_start();
$con = mysqli_connect("localhost","root","") or die("Could not connect");
mysqli_select_db($con,"ben");
$sql = mysqli_query($con,"select * from productlist where target != '0'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<strong>
<style>
th
{
font-family: georgia;
color:#0066FF;
text-decoration:none;
}
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
td
{
font-family: georgia;
color:#0066FF;
text-decoration:none;
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
</strong>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body background="benito/bg201.gif">
<table width="200" height="33" border="0" cellpadding="0" cellspacing="0">
<?php
while($row = mysqli_fetch_array($sql))
{
?>
  <tr>
    <th width="902" scope="row"><a href="disp_progress.php?prodid=<?php echo $row['prod_id'];?>" target="frame3"><?php echo $row['prod_name']; ?></a></th>
  </tr>
  <?php
  }
  ?>
</table>
</body>
</html>
