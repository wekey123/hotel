<?php
session_start();
$con = mysqli_connect("localhost","root","") or die("Could not connect");
mysqli_select_db($con,"ben");
$id = $_GET['prodid'];
$sql = mysqli_query($con,"select * from productlist where prod_id = '$id'");
$row = mysqli_fetch_array($sql);
$prodname = $row['prod_name'];
$datt = date("Y-m-d");
$sql1 = mysqli_query($con,"select * from consume where prod_name = '$prodname' and dat = '$datt'");
$row1 = mysqli_fetch_array($sql1);
$produce = $row['target'] - $row1['quantity'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
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
<form id="form1" name="form1" method="post" action="">
  <table width="394" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#0033FF">
    <tr>
      <th width="390" scope="col"><table width="385" border="0" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <th height="27" colspan="2" scope="row"><?php echo $row['prod_name'];?></th>
        </tr>
        <tr>
          <th colspan="2" scope="row"> <?php if($produce < 0)
	  		{
				echo "There is an over-production";
			}
			elseif($produce > 0)
			{
				echo "There is an under-production";
			}
			else
			{
				echo "Production completed";
			}
	  ?></th>
        </tr>
        <tr>
          <th width="226" scope="row">Target Set </th>
          <td width="225" align="center"><?php echo $row['target'];?></td>
        </tr>
        <tr>
          <th scope="row">Completed</th>
          <td align="center"><?php echo $row1['quantity'];?></td>
        </tr>
        <tr>
          <th scope="row">Yet to go </th>
          <td align="center"><?php echo $produce;?></td>
        </tr>
      </table></th>
    </tr>
  </table>
  <p>&nbsp;</p>
  </form>
</body>
</html>
