<?php
include("dbcon.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
a
{
font-family: cursive;
color:#330000;
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
<div style="margin:0px auto; width:1000px;">
<div style="width:1000px;">
<table border="1" cellpadding="5" cellspacing="5" width="75%">
<tr><th>SI.No</th><th>Product Name</th><th>Assigned Target</th><th>Completed Target</th></tr>

 <?php
	$sid = $_SESSION['sales']['id'];
	$x1 = mysqli_query($con,"select * from sale_targets where sales_id = '$sid'");
	$i=1;
  	while($x2 = mysqli_fetch_array($x1))
  	{
	 	$x = $x2['p_id'];
     	$x3 = mysqli_query($con,"select prod_name from productlist where prod_id = '$x'");
	 	$ing = mysqli_fetch_array($x3);
	  ?>
        <tr>
          <td scope="row"><?php echo $i;?></td>
          <td  scope="row"><?php echo $ing['prod_name'];?></td>
          <td  scope="row"><?php echo $x2['target'];?></td>
          <td  scope="row"><?php ?></td>
        </tr>
        <?php
  		$i++;}
 	 ?>
</table>
</div>
</div>
</body>
</html>
