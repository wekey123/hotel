<?php 
session_start();
include("dbcon.php");
/*$con = mysqli_connect("localhost","root","") or die("Could not connect");
mysqli_select_db($con,"ben");*/
$iid = $_GET['listid'];
$sql = mysqli_query($con,"select * from productlist where prod_id = '$iid'");
$sql1 = mysqli_fetch_array($sql);
$prod_name = $sql1['prod_name'];
$prodname = $prod_name;
$x1 = mysqli_query($con,"select * from ingredients where prod_id = '$iid'");
extract($_POST);
$dat = date("Y-m-d");
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
<?php
$msg ='';
if(isset($sub))
{
	$x1 = mysqli_query($con,"select * from ingredients where prod_id = '$iid'");
	$flag = 0;
	while($x2 = mysqli_fetch_array($x1))
	{
		$req = $num * $x2['quantity'];
		$idd = $x2['ingredient_id'];
		$stoc = mysqli_query($con,"select * from stock where id = '$idd'");
		$sto = mysqli_fetch_array($stoc);
		$itemname = $sto['item_name'];
		if($sto['quantity'] == 0)
		{
			$msg = "$itemname unavailable for producing $prodname";
			$flag = 0;
			break;
		}
		elseif($sto['quantity'] <= 10)
		{
			$msg = "Stock in demand! Kindly purchase $itemname";
			$flag = 0;
			break;
		}	
		elseif($sto['quantity'] < $req)
		{
		    $msg = "Insufficient stock for $itemname! Unable to produce $prodname";
			$flag = 0;
			break;
		}
		else
		{
			$sq = "update stock set quantity = quantity - $req where id = '$idd'";
			$r1 = mysqli_query($con,$sq);
			$flag = 1;
		}
	}
	if($flag == 1)
	{
		$sq3 = "insert into consume(prod_name,quantity,dat) values('$prod_name','$num','$dat')";
		mysqli_query($con,$sq3);		
	}
}
?>
<body background="benito/bg201.gif">
<?php
if(isset($_GET['listid']))
{
?>
<form id="form2" name="form2" method="post" action="">
  <p>&nbsp;</p>
  <table width="404" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#0000EE">
    <tr>
      <th width="400" scope="col"><table width="394" border="0" align="center" cellpadding="5" cellspacing="5">
        <tr>
          <th height="43" colspan="2" scope="col"><?php echo $msg;?></th>
        </tr>
        <tr>
          <th height="43" colspan="2" scope="col"><?php echo $sql1['prod_name'];?></th>
        </tr>
        <tr>
          <th height="37" colspan="2" scope="row">Ingredients</th>
        </tr>
        <?php
	$x1 = mysqli_query($con,"select * from ingredients where prod_id = '$iid'");
  	while($x2 = mysqli_fetch_array($x1))
  	{
	 	$x = $x2['ingredient_id'];
     	$x3 = mysqli_query($con,"select item_name from stock where id = '$x'");
	 	$ing = mysqli_fetch_array($x3);
	  ?>
        <tr>
          <th  scope="row"><?php echo $ing['item_name'];?></th>
          <th  scope="row"><?php echo $x2['quantity'];?></th>
        </tr>
        <?php
  		}
 	 ?>
        <tr>
          <th width="195" align="right" scope="row">No of packets </th>
          <th width="199" align="left" scope="row"> <input name="num" type="text" id="num" size="30" />
          </th>
        </tr>
        <tr>
          <th colspan="2" scope="row"><label>
            <input name="sub" type="submit" id="sub" value="Okey" />
          </label></th>
        </tr>
      </table></th>
    </tr>
  </table>
  <p>&nbsp;</p>
  </form>
<?php
}
?>
<p>&nbsp;</p>
</body>
</html>
			

