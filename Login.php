<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" language="javascript">
function valid()
{
   if(document.form1.manpass.value == "")
   {
      alert("Enter the password");
	  document.form1.manpass.focus();
	  return false;
   }
	return true;
}
</script>
<title>Untitled Document</title>
<style type="text/css">
<!--
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
.style1 {font-size: 24px}
.style2 {font-size: 16px}
-->
</style></head>
<body background="benito/bg201.gif">
<?php
include("dbcon.php");
extract($_POST);
$datt = date("Y-m-d");
if(isset($plog))
{
$p1= "select * from login where password = '$manpass'";
$p2 = mysqli_query($con,$p1);
$n = mysqli_fetch_array($p2);
if($n['password'] == $manpass)
{
	$_SESSION['user'] = 1;
   if($n['dat'] != $datt)
   {
   		mysqli_query($con,"update login set dat = '$datt'");
		mysqli_query($con,"update productlist set target = '0'");
		header("Location: target.php");
   }
   elseif($n['dat'] == $datt)
   {
		header("Location: left.php");
   }
}
else
{
  $msg = "Incorrect Password";
}
}  
else
   $msg = "You are requested to enter the password";
?>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <p>&nbsp;</p>
    <table width="455" height="177" border="1" cellpadding="0" cellspacing="0" bordercolor="#0033FF">
      <tr>
        <th width="425" scope="col"><table width="424" height="156" border="0" cellpadding="0" cellspacing="0">

          <tr>
            <td height="41" colspan="2" align="center"><span class="style1">MANAGER'S LOGIN</span></td>
          </tr>
          <tr>
            <td height="41" colspan="2" align="center"><?php echo $msg;?></td>
            </tr>
          <tr>
            <td width="240" height="41" align="center">MANAGER'S PASSWORD</td>
            <td width="183" align="center"><label>
              <input name="manpass" type="password" id="manpass" />
            </label></td>
          </tr>
          <tr>
            <td height="33" colspan="2"><p align="center">
                <label>
                <input name="plog" type="submit" id="plog" value="LOGIN" onclick = "return valid()"/>
                </label>
            </p></td>
          </tr>
        </table></th>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</form>
</body>
</html>
