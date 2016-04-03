<?php
include("dbcon.php");
extract($_POST);
if(isset($ms1))
{
   $dat = date("d/m/Y");
   $amt = $mrpt * $mqty;
   $sql = "insert into purchase_monthly(item_name,quantity,units,rate,amount,category,purchase_date) values('$mitems','$mqty','$munits','$mrpt','$amt','$mcatlist','$dat')";
   mysqli_query($con,$sql);
   $sql1 = "update stock set quantity = quantity + $mqty where item_name = '$mitems'";
   mysqli_query($con,$sql1);
}
elseif(isset($ds1))
{
   $dat = date("d/m/Y");
   $amt = $drpt * $dqty;
   $sql = "insert into purchase_daily(item_name,quantity,units,rate,amount,category,purchase_date) values('$ditems','$dqty','$dunits','$drpt','$amt','$dcatlist','$dat')";
   mysqli_query($con,$sql);
   $sql1 = "update stock set quantity = quantity + $dqty where item_name = '$ditems'";
   mysqli_query($con,$sql1);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
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
-->
</style>
<script language="javascript" type="text/javascript">
function ben()
{
	if(document.form1.mcatlist.value == "")
	{
		alert("Select the category");
		return false;
	}
	else if(document.form1.mitems.value == "")
	{
		alert("Select the item");
		return false;
	}
	else if(document.form1.mqty.value == "")
	{
		alert("Input the quantity");
		return false;
	}
	else if(document.form1.munits.value == "")
	{
		alert("Select the units");
		return false;
	}
	else if(document.form1.mrpt.value == "")
	{
		alert("Enter the rate per unit");
		return false;
	}
	return true;
}
function ben1()
{
	if(document.form1.dcatlist.value == "")
	{
		alert("Select the category");
		return false;
	}
	else if(document.form1.ditems.value == "")
	{
		alert("Select the item");
		return false;
	}
	else if(document.form1.dqty.value == "")
	{
		alert("Input the quantity");
		return false;
	}
	else if(document.form1.dunits.value == "")
	{
		alert("Select the units");
		return false;
	}
	else if(document.form1.drpt.value == "")
	{
		alert("Enter the rate per unit");
		return false;
	}
	return true;
}
</script>
</head>
<body background="benito/bg201.gif">
<form id="form1" name="form1" method="post" action="">
  <table width="698" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#0000EE">
    <tr>
      <th width="694" height="389" scope="col"><table width="638" height="165" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="27" colspan="3" align="center"><strong>MONTHLY </strong></td>
        </tr>
        <tr>
          <td width="179" height="59" align="center"><strong>
            <label> CATOGERY</label>
            <br />
            <?php $_POST['mcatlist'] = isset($_POST['mcatlist']) ? $_POST['mcatlist'] : '';?>
            <select name="mcatlist" id="mcatlist" onchange="this.form.submit()">
              <option>Select a catogery</option>
              <option value="Cereals" <?php if($_POST['mcatlist']=="Cereals") echo "selected"; ?>>Cereals</option>
              <option value="Pulses" <?php if($_POST['mcatlist']=="Pulses") echo "selected"; ?>>Pulses</option>
              <option value="Grocery" <?php if($_POST['mcatlist']=="Grocery") echo "selected"; ?>>Grocery</option>
              <option value="Nuts" <?php if($_POST['mcatlist']=="Nuts") echo "selected"; ?>>Nuts</option>
            </select>
          </strong></td>
          <td width="266" align="center">QUANTITY</td>
          <td width="193" align="center">RATE PER UNIT</td>
        </tr>
        <tr>
          <td height="34" align="center"> ITEM
            <select name="mitems" id="mitems">
                <option>Select an item</option>
                <?php $_POST['items'] = isset($_POST['items']) ? $_POST['items'] : '';?>
                <?php
		  $s1="select * from itemlist where category='$_POST[mcatlist]'";
		  $s2=mysqli_query($con,$s1);
		  while($s3=mysqli_fetch_array($s2))
		  {
		  ?>
                <option <?php if($_POST['items']==$s3['items']) echo "selected"; ?> value = "<?php echo $s3['items']; ?>"><?php echo $s3['items']; ?></option>
                <?php
		  }
		  ?>
              </select>
          </td>
          <td align="center"><label>
            <input name="mqty" type="text" id="mqty" />
            <select name="munits" id="munits">
              <option value="units">Units</option>
              <option value="kgs">Kgs</option>
              <option value="ltrs">Ltrs</option>
              <option value="gms">gms</option>
            </select>
          </label></td>
          <td align="center"><label>
            <input name="mrpt" type="text" id="mrpt" />
          </label></td>
        </tr>
        <tr>
          <td height="39" colspan="3" align="center"><label>
            <input name="ms1" type="submit" id="ms1" value="Submit" onclick="return ben()"/>
          </label></td>
        </tr>
      </table>
        <hr />
        <table width="643" height="172" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr align="center">
            <td height="24" colspan="3"><strong>DAILY</strong></td>
          </tr>
          <tr align="center">
            <td width="188" height="55"><strong>CATOGERY<br />
             <?php $_POST['dcatlist'] = isset($_POST['dcatlist']) ? $_POST['dcatlist'] : '';?>
                  <select name="dcatlist" id="dcatlist" onchange="this.form.submit()">
                    <option>Select a catogery</option>
                    <option value="Fruits" <?php if($_POST['dcatlist']=="Fruits") echo "selected"; ?>>Fruits</option>
                    <option value="Vegetables" <?php if($_POST['dcatlist']=="Vegetables") echo "selected"; ?>>Vegetables</option>
                    <option value="Grocery" <?php if($_POST['dcatlist']=="Grocery") echo "selected"; ?>>Grocery</option>
                    <option value="Milk products" <?php if($_POST['dcatlist']=="Milk products") echo "selected"; ?>>Milk products</option>
                    <option value="Meat" <?php if($_POST['dcatlist']=="Meat") echo "selected"; ?>>Meat</option>
                  </select>
            </strong></td>
            <td width="261"><strong>QUANTITY</strong></td>
            <td width="194"><strong>RATE PER UNIT</strong></td>
          </tr>
          <tr align="center">
            <td height="59">ITEM
              <select name="ditems" id="ditems">
                  <option>Select an item</option>
                  <?php
		  $s1="select * from itemlist where category='$_POST[dcatlist]'";
		  $s2=mysqli_query($con,$s1);
		  while($s3=mysqli_fetch_array($s2))
		  {
		  ?>
                  <option <?php if($_POST['items']==$s3['items']) echo "selected"; ?> value="<?php echo $s3['items']; ?>"><?php echo $s3['items']; ?></option>
                  <?php
		  }
		  ?>
                </select>
            </td>
            <td><label>
              <input name="dqty" type="text" id="dqty" />
              </label>
                <select name="dunits" id="dunits">
                  <option value="units">Units</option>
                  <option value="kgs">Kgs</option>
                  <option value="ltrs">Ltrs</option>
                  <option value="gms">gms</option>
                </select>
            </td>
            <td><label>
              <input name="drpt" type="text" id="drpt" />
              </label>
            </td>
          </tr>
          <tr>
            <td height="34" colspan="3" align="center"><label>
              <input name="ds1" type="submit" id="ds1" value="Submit" onclick="return ben1()"/>
              </label>
            </td>
          </tr>
        </table>
      </th>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p align="center"></p>
</form>
</html>
