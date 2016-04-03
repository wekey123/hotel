<?php
session_start();
$con = mysqli_connect("localhost","root","") or die("Could not connect");
mysqli_select_db($con,"ben");
extract($_POST);
$id = $_GET['listid'];
if(isset($sub))
{
   mysqli_query($con,"update productlist set target = '$t1' where  prod_id = '$id'");	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
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

<script type="text/javascript" language="JavaScript">
function valid()
{
	if(document.form1.t1.value == "")
	{
		alert("Enter the target");
		document.form1.t1.focus();
		return false;
	}
	return true;
}
</script>
</head>

<body background="benito/bg201.gif">
<form name="form1" action="" method="post">
<table width="419" border="0" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <th colspan="2" scope="row">Enter the target for the day </th>
    </tr>
    <tr>
      <th width="305" scope="row">Target</th>
      <td width="307"><label>
        <input name="t1" type="text" id="t1" size="25" maxlength="6" />
      </label></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><label>
        <input name="sub" type="submit" id="sub" value="Set target" onclick="return valid()" />
      </label></th>
    </tr>
  </table>
  </form>
</body>
</html>
