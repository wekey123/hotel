<?php
include("dbcon.php");
session_start();
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SET SALES TARGET</title>
<link rel="stylesheet" href="css/jquery-ui.css">
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script>
  $(function() {
	
	$('.datepicker').datepicker({ dateFormat: 'dd-mm-yy' });

  });
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
td,th { 
    padding: 5px;
}

</style>

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

function validation() {
   if(document.form1.targer_location.value == "")
   {
      alert("Choose Differenct Location");
	  //document.form1.p_id.focus();
	  return false;
   }else if(document.form1.from.value == ""){
      alert("Choose From Date value");
	 // document.form1.datepicker.focus();
	  return false;
   }else if(document.form1.to.value == ""){
      alert("Choose To Date value");
	 // document.form1.datepicker.focus();
	  return false;
   }else{
 	  return true;
   }
}
</script>
</head>
<body background="benito/bg201.gif">
<?php 
if(!empty($_POST) && !empty($_POST['submit'])){
	//echo "<pre>"; print_r($_POST); exit;
 	extract($_POST);
	$from = date('Y-m-d',strtotime($from)); 
	$to = date('Y-m-d',strtotime($to)); 
}
$sql2 = mysqli_query($con,"select * from sale_users");
?>

  <div align="center">
  <p style="text-align:center;"><a href="sales_target.php" target="frame2">Sales Target form</a></p>
  <form id="form1" name="form1" method="post" action="#">
 	<table  style="width: 550px;" border="0" cellpadding="0" cellspacing="0" bordercolor="#0033FF">
    <tr><td>
      <!--<select id="targer_location" name="param" onChange="city(this.selectedIndex);"> -->
      <select id="targer_location" name="param" > 
       <option value="">Select Sales Executive</option>
        <option value="all" <?php if($param == 'all' || $param == 'all'){ echo 'selected';  } ?>>ALL SALES EXECUTIVE</option>
       <?php while($row1 = mysqli_fetch_array($sql2)){ 
	 	   if(!empty($param) && $param == $row1['id']){ $selected = 'selected'; }else{ $selected =''; }
           $sid =  $row1['id'];
           $name =  $row1['name'];
            echo "<option value=$sid $selected >$name</option>";
       }
       ?>
      </select></td>
      <td><?php /*?><!--<input type="text"  id="datepicker" name="date" value="<?php if(isset($date)){ echo $date; }else{ echo date('Y-m-d',time()); }?>" />--><?php */?>
        <input type="text" name="from" id="from" class="datepicker"  placeholder="From Date" value="<?php if(isset($from)){ echo date('d-m-Y',strtotime($from)); }else{ echo ''; }?>"/>
      </td>
      <td> 
      	<input type="text" name="to" id="to"  class="datepicker" placeholder="To Date" value="<?php if(isset($to)){ echo date('d-m-Y',strtotime($to)); }else{ echo ''; }?>"/>
      </td>
      
      <td><input name="submit" type="submit" id="go" value="Go" onclick = "return validation()"/></td>
    
    </tr>
    </table>
    </form>

    <table  border="1" cellpadding="0" cellspacing="0" bordercolor="#0033FF">
      <tr>
        <th>Sno</th>
        <th>Name</th>
        <th>Exeid</th>
        <th>Location</th>
        <th>Product Name</th>
        <th>Assigned Target</th>
        <th>Complete Target</th>
        <th>Status</th>
        <th>Created</th>
      </tr>
      <?php  
	  if(!empty($param) && !empty($from) && !empty($to) && $param != 'all'){
		  //echo 'a';
		  $sql1 = mysqli_query($con,"select sale_targets.id,sale_targets.p_id,sale_targets.sales_id,sale_targets.target,sale_targets.completed,sale_targets.status,sale_targets.created,productlist.prod_name,sale_users.username,sale_users.name,sale_users.location from sale_targets LEFT JOIN productlist ON sale_targets.p_id = productlist.prod_id LEFT JOIN sale_users ON sale_targets.sales_id = sale_users.id WHERE sale_targets.sales_id=$param AND sale_targets.created between '$from' and '$to'");
	  }else if($param == 'all' && !empty($from) && !empty($to)){
		 //echo 'b';
	  $sql1 = mysqli_query($con,"select sale_targets.id,sale_targets.p_id,sale_targets.sales_id,sale_targets.target,sale_targets.completed,sale_targets.status,sale_targets.created,productlist.prod_name,sale_users.username,sale_users.name,sale_users.location from sale_targets LEFT JOIN productlist ON sale_targets.p_id = productlist.prod_id LEFT JOIN sale_users ON sale_targets.sales_id = sale_users.id  WHERE sale_targets.created between '$from' and '$to'");
	  }else{
		   //echo 'c';
		$sql1 = mysqli_query($con,"select sale_targets.id,sale_targets.p_id,sale_targets.sales_id,sale_targets.target,sale_targets.completed,sale_targets.status,sale_targets.created,productlist.prod_name,sale_users.username,sale_users.name,sale_users.location from sale_targets LEFT JOIN productlist ON sale_targets.p_id = productlist.prod_id LEFT JOIN sale_users ON sale_targets.sales_id = sale_users.id");
	  }
	  
	  $i =1;
	  while($rows = mysqli_fetch_array($sql1)){ 
		  $result[$rows['created']][] = $rows;
	  }
	  if(!empty($result)) {
	    foreach($result as $date1 => $array){//for loop A
		  $dates = date_create($date1);
		  $date = date_format($dates,"d/m/Y");
		  echo "<tr><td colspan=9 style='text-align:center; color: brown;'>$date</td></tr>";
		  foreach($array as $row){ //for loop B
	  ?>
      <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['prod_name']; ?></td>
            <td><?php echo $row['target']; ?></td>
            <td><?php echo $row['completed']; ?></td>
            <td style="color:<?php echo ($row['status'] == 1) ? 'orange' : (($row['status'] == 2) ? 'green' : 'red'); ?>"><?php echo ($row['status'] == 1) ? 'Partially' : (($row['status'] == 2) ? 'Completed' : 'Pending'); ?></td>
            <td><?php echo date_format(date_create($row['created']),"d/m/Y"); ?></td>

     </tr>
     	
     <?php  $i++; }  //for loop B
	     } //for loop A
	  }else{ echo "<tr><td colspan=9 style='text-align:center; color: brown;'>Records Not Available in the conditions</td></tr>";  } 
	  ?>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</body>
</html>