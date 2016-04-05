<?php
session_start();
require_once 'phplot.php';
include("dbcon.php");
/*$con = mysqli_connect("localhost","root","") or die("Could not connect");
mysqli_select_db($con,"ben");*/
extract($_POST);

switch($m1)
{
	case 01:
		$mth1 = "January";
		break;
	case 02:
		$mth1 = "February";
		break;
	case 03:
		$mth1 = "March";
		break;
	case 04:
		$mth1 = "April";
		break;
	case 05:
		$mth1 = "May";
		break;
	case 06:
		$mth1 = "June";
		break;
	case 07:
		$mth1 = "July";
		break;
	case 08:
		$mth1 = "August";
		break;
	case 09:
		$mth1 = "September";
		break;
	case 10:
		$mth1 = "October";
		break;
	case 11:
		$mth1 = "November";
		break;
	case 12:
		$mth1 = "December";
		break;
}
switch($m2)
{
	case 01:
		$mth2 = "January";
		break;
	case 02:
		$mth2 = "February";
		break;
	case 03:
		$mth2 = "March";
		break;
	case 04:
		$mth2 = "April";
		break;
	case 05:
		$mth2 = "May";
		break;
	case 06:
		$mth2 = "June";
		break;
	case 07:
		$mth2 = "July";
		break;
	case 08:
		$mth2 = "August";
		break;
	case 09:
		$mth2 = "September";
		break;
	case 10:
		$mth2 = "October";
		break;
	case 11:
		$mth2 = "November";
		break;
	case 12:
		$mth2 = "December";
		break;
}
$opt= 'purchase1';
if($opt == "purchase1")
{
	$data1 = array();
	$data2 = array();
	$sql1 = mysqli_query($con,"select * from sale_users");
	$year= date("Y");
	$chart1 ='no';$chart2 ='no';
	if(mysqli_num_rows($sql1) != 0 ){
		while($row1 = mysqli_fetch_array($sql1,MYSQLI_ASSOC)){
			$id=$row1['id'];
			$sql2 = mysqli_query($con,"select * from `sale_targets` where `created` BETWEEN '$year-$m1-01' AND '$year-$m1-31' and `sales_id` = $id ");
			if(mysqli_num_rows($sql2) != 0 ){
				$row2t=0;
				$row2c=0;
				while($row2 = mysqli_fetch_array($sql2,MYSQLI_ASSOC)){
					$row2t +=$row2['target'];
					$row2c +=$row2['completed'];
				}
				array_push($data1,array($row1['location'],$row2t,$row2c));
				$chart1 = 'yes';
				if(empty($data1))
				$chart1 = 'no';
			}
			
			$sql3 = mysqli_query($con,"select * from `sale_targets` where `created` BETWEEN '$year-$m2-01' AND '$year-$m2-31' and `sales_id` = $id ");
			if(mysqli_num_rows($sql3) != 0 ){
				$row3t=0;
				$row3c=0;
				while($row3 = mysqli_fetch_array($sql3,MYSQLI_ASSOC)){
					//echo '<pre>';print_r($row3);
					$row3t+=$row3['target'];
					$row3c+=$row3['completed'];
				}
					array_push($data2,array($row1['location'],$row3t,$row3c));	
					$chart2 = 'yes';
					if(empty($data1))
					$chart2 = 'no';
			}
		
		}
	}
	else
	$chart1 = "no1";
	
	//echo $chart1.'<br>';
	//echo $chart2;
	//echo '<pre>data2';print_r($data2);print_r($data1);exit;
		if($chart1 == "yes" and $chart2 == "yes"){
		$plot = new PHPlot(1000,800);
		$plot->SetImageBorderType('plain');
		$plot->SetPrintImage(0);
		$plot->SetTitle('Graph of Sales Executive targerts by District');
		$plot->SetPlotAreaPixels(80, 40, 740, 250);
		# Make a legend for the 3 data sets plotted:
		$plot->SetLegend(array('Actual Target', 'Completed Target'));
		$plot->SetDataType('text-data');
		$plot->SetDataValues($data1);
		$plot->SetPlotAreaWorld(NULL, 0, NULL, NULL);
		$plot->SetDataColors(array('blue','red'));
		$plot->SetYDataLabelPos('plotin');
		$plot->SetXTickLabelPos('none');
		$plot->SetXTickPos('none');
		$plot->SetYTickIncrement(10);
		$plot->SetYTitle("No. of targets for $mth1");
		$plot->SetPlotType('bars');
		$plot->DrawGraph();
		$plot->SetPlotAreaPixels(80, 300, 740, 550);
		$plot->SetDataType('text-data');
		# Make a legend for the 3 data sets plotted:
		$plot->SetLegend(array('Actual Target', 'Completed Target'));
		$plot->SetDataValues($data2);
		$plot->SetPlotAreaWorld(NULL, 0, NULL, NULL);
		$plot->SetDataColors(array('blue','red'));
		$plot->SetYDataLabelPos('plotin');
		$plot->SetXTickLabelPos('none');
		$plot->SetXTickPos('none');
		$plot->SetYTickIncrement(10);
		$plot->SetYTitle("No. of targets in $mth2");
		$plot->SetPlotType('bars');
		$plot->DrawGraph();
		$plot->PrintImage();
	 }
	else
	{
		echo "Can't Draw Graph since Months chosen is invalid";
	}



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
</body>
</html>
