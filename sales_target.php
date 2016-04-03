<?php
include("dbcon.php");

if(!empty($_POST) && !empty($_POST['saletarget'])){
	extract($_POST);
	$date = date("Y-m-d");
	$sq = "insert into sale_targets(p_id,sales_id,target,created) values($p_id,$sales_id,'$target','$date')";
	if (mysqli_query($con,$sq)) {
		$flag = 1;
	} else {
		$flag = 2;
		echo "Error: " .$sq . "<br>" .  mysqli_error($conn);
	}
	header('location:sales_target.php?flag='.$flag );
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SET SALES TARGET</title>
<script type="text/javascript" language="javascript">
function valid()
{
   if(document.form1.p_id.value == "")
   {
      alert("Choose Product List");
	  document.form1.p_id.focus();
	  return false;
   }else if(document.form1.sales_id.value == ""){
      alert("Choose sale Executive");
	  document.form1.sales_id.focus();
	  return false;
   }else if(document.form1.target.value == ""){
      alert("Enter the Target value");
	  document.form1.target.focus();
	  return false;
   }
	return true;
}


function showSalesman(str) {
    if (str != 0) { 
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("showSalesman").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "detailsalesman.php?id=" + str, true);
        xmlhttp.send();
    } else {
        document.getElementById("showSalesman").innerHTML = "empty";
        return;
    }
}

</script>
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
$sql1 = mysqli_query($con,"select * from productlist");
$sql2 = mysqli_query($con,"select * from sale_users");
?>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <p>&nbsp;</p>
    <table width="455" height="177" border="1" cellpadding="0" cellspacing="0" bordercolor="#0033FF">
      <tr>
        <th width="425" scope="col"><table width="424" height="156" border="0" cellpadding="0" cellspacing="0">

          <tr>
            <td height="41" colspan="2" align="center"><span class="style1">SET SALES TARGET</span></td>
          </tr>
          <tr>
            <td height="41" colspan="2" align="center">
				<?php
				if(isset($_GET['flag'])){ 
					$flag = $_GET['flag'];
							if($flag == 1){ echo "Successfully Sales Target Addded";  }else{ echo "Failed to submit Sales Target"; } 
				}
				?>
            </td>
            </tr>
            
          <tr>
            <td width="240" height="41" align="center">Product Name</td>
            <td width="183" align="center"><label>
              <select name="p_id" id="p_id"> 
               <option value="">Choose Product</option>
               <?php while($row = mysqli_fetch_array($sql1)){
				   $pid =  $row['prod_id'];
				   $pname =  $row['prod_name'];
               echo "<option value=$pid>$pname</option>";
			  	 }
               ?>
              </select>
              </label>
            </td>
          </tr>
          
          <tr>
            <td width="240" height="41" align="center">Sales Team</td>
            <td width="183" align="center"><label>
              <select name="sales_id" id="sales_id" onChange="showSalesman(this.selectedIndex);"> 
               <option value="">Choose Sales Executive </option>
               <?php while($row1 = mysqli_fetch_array($sql2)){
				   $sid =  $row1['id'];
				   $sname =  $row1['username'];
               		echo "<option value=$sid>$sname</option>";
			   }
               ?>
              </select>
              </label>
            </td>
          </tr>
          <tr>  
           	<td colspan="2" width="240" id="showSalesman"></td>
          </tr>
          <tr>
            <td width="240" height="41" align="center">Target</td>
            <td width="183" align="center"><label>
               <input type="text" name="target" id="target"/>
               </label>
            </td>
          </tr>
 
            <td height="33" colspan="2"><p align="center">
                <label>
                <input name="saletarget" type="submit" id="saletarget" value="Submit" onclick = "return valid()"/>
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
<?php } ?>