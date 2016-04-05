<?php
session_start();
include("dbcon.php");
/*$con = mysqli_connect("localhost","root","") or die("Could not connect");
mysqli_select_db($con,"ben");*/
extract($_POST);
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
color:#007700;
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
  <div align="center">
    <p>&nbsp;</p>
    <table width="475" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#0000EE">
      <tr>
        <th width="471" scope="col"><table width="458" height="71" border="0" bordercolor="#ECE9D8">
          <tr>
            <td height="29" colspan="2" align="center"><label>
            <?php $_POST['sacatlist'] = isset($_POST['sacatlist']) ? $_POST['sacatlist']  : ""  ?>
              <select name="sacatlist" id="sacatlist" onchange = "this.form.submit()">
                <option>Select a catogery</option>
                <option value="Cereals" <?php if($_POST['sacatlist']=="Cereals") echo "selected"; ?>>Cereals</option>
                <option value="Pulses" <?php if($_POST['sacatlist']=="Pulses") echo "selected"; ?>>Pulses</option>
                <option value="Fruits" <?php if($_POST['sacatlist']=="Fruits") echo "selected"; ?>>Fruits</option>
                <option value="Vegetables" <?php if($_POST['sacatlist']=="Vegetables") echo "selected"; ?>>Vegetables</option>
                <option value="Grocery" <?php if($_POST['sacatlist']=="Grocery") echo "selected"; ?>>Grocery</option>
                <option value="Milk products" <?php if($_POST['sacatlist']=="Milk products") echo "selected"; ?>>Milk products</option>
                <option value="Nuts" <?php if($_POST['sacatlist']=="Nuts") echo "selected"; ?>>Nuts</option>
                <option value="Meat" <?php if($_POST['sacatlist']=="Meat") echo "selected"; ?>>Meat</option>
              </select>
            </label></td>
          </tr>
          <?php
	  if(isset($sacatlist))
	  {
	     $sql = "select * from itemlist where category = '$sacatlist'";
		 $res = mysqli_query($con,$sql);
		 while($row = mysqli_fetch_array($res))
		 {
	  ?>
          <tr>
            <td width="207" height="34" align="center"><?php echo $row['items'];?> </td>
            <td width="235" align="center"><?php
		$sql1 = "select * from stock where item_name = '$row[items]'";
		$rec_set = mysqli_query($con,$sql1);
		$ro = mysqli_fetch_array($rec_set);
		echo $ro['quantity'];
		?>
            </td>
          </tr>
          <?php }} ?>
        </table></th>
      </tr>
    </table>
    <p>&nbsp;</p>
    </div>
  <p align="center">
    <label></label>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
