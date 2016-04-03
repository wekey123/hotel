<?php
include("dbcon.php");

if(!empty($_POST) && !empty($_POST['saleusers'])){
	//print_r($_POST); exit;
	extract($_POST);
	$date = date("Y-m-d");
	$sq = "insert into sale_users(username,password,name,location,phone,email,created) values('$username','$password','$name','$location','$phone','$email','$date')";
	if (mysqli_query($con,$sq)) {
		$flag = 1;
	} else {
		$flag = 2;
		echo "Error: " .$sq . "<br>" .  mysqli_error($conn);
	}
	header('location:sale_users.php?flag='.$flag );
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
   if(document.form1.username.value == "")
   {
      alert("Enter the Username");
	  document.form1.username.focus();
	  return false;
   }else if(document.form1.password.value == "")
   {
      alert("Enter the Password");
	  document.form1.password.focus();
	  return false;
   }else if(document.form1.name.value == "")
   {
      alert("Enter the Name");
	  document.form1.name.focus();
	  return false;
   }else if(document.form1.sales_id.value == ""){
      alert("Choose Sale User Location");
	  document.form1.sales_id.focus();
	  return false;
   }
	return true;
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

<form id="form1" name="form1" method="post" action="#">
  <div align="center">
  	
    <p><a href="sale_users_list.php" target="frame2">Sales Executive List</a></p>
    <table width="455" height="177" border="1" cellpadding="0" cellspacing="0" bordercolor="#0033FF">
      <tr>
        <th width="425" scope="col"><table width="424" height="156" border="0" cellpadding="0" cellspacing="0">

          <tr>
            <td height="41" colspan="2" align="center"><span class="style1">CREATE SALES EXECUTIVE</span></td>
          </tr>
          <tr>
           <td height="41" colspan="2" align="center" style="color:#b91919 ">
				<?php
				if(isset($_GET['flag'])){ 
					$flag = $_GET['flag'];
							if($flag == 1){ echo "Successfully Sales Executive Addded";  }else{ echo "Failed to submit Sales Executive"; } 
				}
				?>
            </td>
            </tr>
            
          <tr>
            <td width="240" height="41" align="center">User Name(Employee ID)</td>
            <td width="183" align="center"><label>
            <input type="text" name="username"  id="username"/>
            	</label>
            </td>
          </tr>
          
          <tr>
            <td width="240" height="41" align="center">Password</td>
            <td width="183" align="center"><label>
              <input type="password" name="password"  id="password"/>
              </select>
              </label>
            </td>
          </tr>
          
          <tr>  
           	<td width="240" height="41" align="center">Name</td>
            <td width="183" align="center"><label>
               <input type="text" name="name" id="name"/>
               </label>
            </td>
          </tr>
          
          <tr>
            <td width="240" height="41" align="center">Location</td>
            <td width="183" align="center"><label>
               <select name="location">
               <option value="">Choose Location</option>
               <option value="Chennai">Chennai</option>
               <option value="Madurai">Madurai</option>
               <option value="Coimbatore">Coimbatore</option>
               <option value="Trichy">Trichy</option>
               </select>
               </label>
            </td>
          </tr>
          
           <tr>  
           	<td width="240" height="41" align="center">Phone</td>
            <td width="183" align="center"><label>
               <input type="text" name="phone" id="phone"/>
               </label>
            </td>
          </tr>
          <tr>
          
           <tr>  
           	<td width="240" height="41" align="center">Email</td>
            <td width="183" align="center"><label>
               <input type="text" name="email" id="email"/>
               </label>
            </td>
          </tr>
          <tr>
 
            <td height="33" colspan="2"><p align="center">
                <label>
                <input name="saleusers" type="submit" id="saleusers" value="Submit" onclick = "return valid()"/>
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