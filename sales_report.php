<?php
session_start();
include("dbcon.php");
/*$con = mysqli_connect("localhost","root","") or die("Could not connect");
mysqli_select_db($con,"ben");*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" language="javascript">
function validate()
{
	if(document.form1.opt[0].checked == false && document.form1.opt[1].checked == false && document.form1.opt[2].checked == false)
	{
		alert("Choose whether graph is to be drawn for Purchase/Production");
		return false;
	}
	else if(document.form1.m1.selectedIndex == 0)
	{
		alert("Select the Month1");
		return false;
	}
	else if(document.form1.m2.selectedIndex == 0)
	{
		alert("Select the Month2");
		return false;
	}
	else if(document.form1.m1.selectedIndex == document.form1.m2.selectedIndex)
	{
		alert("Select different months to compare");
		return false;
	}
}
</script>
<style>
input
{
background-image:url(benito/bg201.gif);
border-color:#0000FF;
color:#3333FF;
font-family:Georgia;
font-weight:bold;
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

</head>

<body background="benito/bg201.gif">
<form id="form1" name="form1" method="post" action="sales_report1.php">
  <table width="590" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#0000EE">
    <tr>
      <th width="586" height="150" scope="col"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <th width="160" scope="col">&nbsp;</th>
          <th width="176" scope="col">&nbsp;</th>
          <th width="93" scope="col">&nbsp;</th>
          <th width="113" scope="col">&nbsp;</th>
        </tr>
        <tr>
          <th height="33" scope="col">Month1</th>
          <th align="left" scope="col"><label>
            <select name="m1" id="m1">
              <option>--select--</option>
              <option value="01">Jan</option>
              <option value="02">Feb</option>
              <option value="03">Mar</option>
              <option value="04">Apr</option>
              <option value="05">May</option>
              <option value="06">Jun</option>
              <option value="07">Jul</option>
              <option value="08">Aug</option>
              <option value="09">Sep</option>
              <option value="10">Oct</option>
              <option value="11">Nov</option>
              <option value="12">Dec</option>
            </select>
          </label></th>
          <th scope="col">Month2</th>
          <th align="left" scope="col"><label>
            <select name="m2" id="m2">
              <option>--select--</option>
              <option value="01">Jan</option>
              <option value="02">Feb</option>
              <option value="03">Mar</option>
              <option value="04">Apr</option>
              <option value="05">May</option>
              <option value="06">Jun</option>
              <option value="07">Jul</option>
              <option value="08">Aug</option>
              <option value="09">Sep</option>
              <option value="10">Oct</option>
              <option value="11">Nov</option>
              <option value="12">Dec</option>
            </select>
          </label></th>
        </tr>
        
        <?php /*?><tr>
       
            <td height="29" colspan="2" align="center"><label>Location</label>
            
              <select name="sacatlist" id="sacatlist">
                <option>Select a Location</option>
                <?php  $sql = "select * from sale_users";
					 $res = mysqli_query($con,$sql);
					 while($row = mysqli_fetch_array($res))
					 {  ?>
                <option value="<?php echo $row['location'];?>"><?php echo $row['location'];?></option>
                 <?php } ?>
              </select>
            </label></td>
         
      </tr><?php */?>
        
        
        <tr>
          <th height="28" colspan="4" scope="col"><label>
            <input name="sub" type="submit" id="sub" value="Display Graph" onclick="return validate()"/>
          </label></th>
        </tr>
      </table></th>
    </tr>
  </table>
  <p>&nbsp;</p>
  </form>

</body>
</html>
