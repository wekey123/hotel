<?php
include("dbcon.php");
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
td,th { 
    padding: 5px;
}

</style>
</head>
<body background="benito/bg201.gif">
<?php 
$sql2 = mysqli_query($con,"select * from sale_users");
?>

<form id="form1" name="form1" method="post" action="#">
  <div align="center">
 	<table  style="width: 550px;" border="0" cellpadding="0" cellspacing="0" bordercolor="#0033FF">
    <tr><td>
      <select id="targer_location" onChange="city(this.selectedIndex);"> 
       <option value="">Select Location</option>
        <option value="all" <?php if($_GET['param'] == 'all' || $_GET['param'] == 'all'){ echo 'selected';  } ?>>ALL Location</option>
       <?php while($row1 = mysqli_fetch_array($sql2)){ 
	 	   if(!empty($_GET['param']) && $_GET['param'] == $row1['id']){ $selected = 'selected'; }else{ $selected =''; }
           $sid =  $row1['id'];
           $loc =  $row1['location'];
            echo "<option value=$sid $selected >$loc</option>";
       }
       ?>
      </select></td>
    <td><a href="sales_target.php" target="frame2">Sales Target form</a></td>
    </tr>
    </table>
    <table  border="1" cellpadding="0" cellspacing="0" bordercolor="#0033FF">
      <tr>
        <th>Sno</th>
        <th>Product Name</th>
        <th>Username</th>
        <th>Name</th>
        <th>Location</th>
        <th>Target</th>
        <th>Completed</th>
        <th>Status</th>
        <th>Created</th>
      </tr>
      <?php  
	  if($_GET['param'] == 'all' || !isset($_GET['param'])){
	  $sql1 = mysqli_query($con,"select sale_targets.id,sale_targets.p_id,sale_targets.sales_id,sale_targets.target,sale_targets.completed,sale_targets.status,sale_targets.created,productlist.prod_name,sale_users.username,sale_users.name,sale_users.location from sale_targets LEFT JOIN productlist ON sale_targets.p_id = productlist.prod_id LEFT JOIN sale_users ON sale_targets.sales_id = sale_users.id");
	  }else if(!empty($_GET['param'])){
		  $sql1 = mysqli_query($con,"select sale_targets.id,sale_targets.p_id,sale_targets.sales_id,sale_targets.target,sale_targets.completed,sale_targets.status,sale_targets.created,productlist.prod_name,sale_users.username,sale_users.name,sale_users.location from sale_targets LEFT JOIN productlist ON sale_targets.p_id = productlist.prod_id LEFT JOIN sale_users ON sale_targets.sales_id = sale_users.id WHERE sale_targets.sales_id=".$_GET['param']);
	  }
	  $i =1;
	  while($rows = mysqli_fetch_array($sql1)){ 
		  $result[$rows['created']][] = $rows;
	  }
	  foreach($result as $date1 => $array){
		  $dates = date_create($date1);
		  $date = date_format($dates,"d/m/Y");
		  echo "<tr><td colspan=9 style='text-align:center; color: brown;'>$date</td></tr>";
		  foreach($array as $row){
	  ?>
      <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['prod_name']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['target']; ?></td>
            <td><?php echo $row['completed']; ?></td>
            <td style="color:<?php echo ($row['status'] == 1) ? 'orange' : (($row['status'] == 2) ? 'green' : 'red'); ?>"><?php echo ($row['status'] == 1) ? 'Partially' : (($row['status'] == 2) ? 'Completed' : 'Pending'); ?></td>
            <td><?php echo date_format(date_create($row['created']),"d/m/Y"); ?></td>

     </tr>
     <?php  $i++; }} ?>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</form>
<script>
function city() {
    var x = document.getElementById("targer_location").value;
	var sitelocation = "http://"+window.location.hostname+window.location.pathname
	console.log(sitelocation);
	if(x == ''){
		alert('Choose Differenct Location');
		return false;
	}else if(x == 'all'){
		window.location = sitelocation+"?param=all";
	}else{
		window.location = sitelocation+"?param="+x;
	}
}
</script>
</body>
</html>