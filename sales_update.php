<?php
include("dbcon.php");

if(!empty($_POST) && !empty($_POST['updatetarget'])){
	extract($_POST);
	$date = date("Y-m-d");
	$sql="update sale_targets set completed = completed + '$target' where id = '$targetid'";	
	if (mysqli_query($con,$sql)) {
		$flag = 1;
	} else {
		$flag = 2;
		echo "Error: " .$sq . "<br>" .  mysqli_error($conn);
	}
	header('location:salesblank.php?flag='.$flag );
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" language="javascript">
function validate()
{
    if(document.form1.completed.value > (document.form1.actual.value - document.form1.finished.value))
	{
		alert("Enter Less then Actual target");
		return false;
	}
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SET SALES TARGET</title>

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
if($_GET['id']){
	$pid=$_GET['id'];
}else{
header("Location: salesblank.php");
}
$x1 = mysqli_query($con,"select sales_id,target,completed from sale_targets where id = '$pid'");
$x2 = mysqli_fetch_array($x1,MYSQLI_ASSOC);
$x2pid=$x2['sales_id'];
$x3 = mysqli_query($con,"select prod_name from productlist where prod_id = '$x2pid'");
$ing = mysqli_fetch_array($x3);
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
             <?php echo $ing['prod_name'];?>
              </label>
            </td>
          </tr>
          <tr>  
           	<td width="240" height="41" align="center">Actual Target</td>
            <td width="183" align="center"><label>
             <?php echo $x2['target'];?>
              </label>
            </td>
          </tr>
          <tr>  
           	<td width="240" height="41" align="center">Finished Target</td>
            <td width="183" align="center"><label>
             <?php echo $x2['completed'];?>
              </label>
            </td>
          </tr>
          <tr>
            <td width="240" height="41" align="center">Completed Target</td>
            <td width="183" align="center"><label>
               <input type="text" name="target" id="completed"/>
               <input type="hidden" name="actual" id="actual" value="<?php echo $x2['target'];?>"/>
               <input type="hidden" name="finished" id="finished" value="<?php echo $x2['completed'];?>"/>
               <input type="hidden"  value="<?php echo $pid; ?>" name="targetid" />
               </label>
            </td>
          </tr>
 
            <td height="33" colspan="2"><p align="center">
                <label>
                <input name="updatetarget" type="submit" id="updatetarget" value="Submit" onclick="return validate()"/>
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
<script>

</script>
</body>
</html>
