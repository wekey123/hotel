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

if($opt == "purchase1")
{
	$data1 = array();
	$sql = mysqli_query($con,"select item_name,sum(quantity) quan,purchase_date from purchase_daily where purchase_date like '%/$m1/%' group by(item_name) ");
	if(mysqli_num_rows($sql) != 0 )
	{
		while($row = mysqli_fetch_array($sql))
		{
   			array_push($data1,array($row['item_name'],$row['quan']));	
		}
		$chart1 = "yes";
	}
	else
	{
		$chart1 = "no";
	}
	$data2 = array();
	$sql = mysqli_query($con,"select item_name,sum(quantity) quan,purchase_date from purchase_daily where purchase_date like '%/$m2/%' group by(item_name) ");
	if(mysqli_num_rows($sql) != 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
   			array_push($data2,array($row['item_name'],$row['quan']));	
		}
		$chart2 = "yes";
	}
	else
	{
		$chart2 = "no";
	}
	if($chart1 == "yes" and $chart2 == "yes")
	{
		$plot = new PHPlot(2000,1800);
		$plot->SetImageBorderType('plain');
		$plot->SetPrintImage(0);
		$plot->SetTitle('Graph of Daily Purchase');
		$plot->SetPlotAreaPixels(80, 40, 1040, 250);
		$plot->SetDataType('text-data');
		$plot->SetDataValues($data1);
		$plot->SetPlotAreaWorld(NULL, 0, NULL, NULL);
		$plot->SetDataColors(array('blue'));
		$plot->SetYDataLabelPos('plotin');
		$plot->SetXTickLabelPos('none');
		$plot->SetXTickPos('none');
		$plot->SetYTickIncrement(10);
		$plot->SetYTitle("No. of Units purchased for $mth1");
		$plot->SetPlotType('bars');
		$plot->DrawGraph();
		$plot->SetPlotAreaPixels(80, 300, 1040, 550);
		$plot->SetDataType('text-data');
		$plot->SetDataValues($data2);
		$plot->SetPlotAreaWorld(NULL, 0, NULL, NULL);
		$plot->SetDataColors(array('red'));
		$plot->SetYDataLabelPos('plotin');
		$plot->SetXTickLabelPos('none');
		$plot->SetXTickPos('none');
		$plot->SetYTickIncrement(10);
		$plot->SetYTitle("No. of Units purchased in $mth2");
		$plot->SetPlotType('bars');
		$plot->DrawGraph();
		$plot->PrintImage();
	}
	else
	{
		echo "Can't Draw Graph since Months chosen is invalid";
	}
}
if($opt == "purchase2")
{
	$data1 = array();
	$sql = mysqli_query($con,"select item_name,sum(quantity) quan,purchase_date from purchase_monthly where purchase_date like '%/$m1/%' group by(item_name) ");
	if(mysqli_num_rows($sql) != 0 )
	{
		while($row = mysqli_fetch_array($sql))
		{
   			array_push($data1,array($row['item_name'],$row['quan']));	
		}
		$chart1 = "yes";
	}
	else
	{
		$chart1 = "no";
	}
	$data2 = array();
	$sql = mysqli_query($con,"select item_name,sum(quantity) quan,purchase_date from purchase_monthly where purchase_date like '%/$m2/%' group by(item_name) ");
	if(mysqli_num_rows($sql) != 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
   			array_push($data2,array($row['item_name'],$row['quan']));	
		}
		$chart2 = "yes";
	}
	else
	{
		$chart2 = "no";
	}
	if($chart1 == "yes" and $chart2 == "yes")
	{
		$plot = new PHPlot(1000,800);
		$plot->SetImageBorderType('plain');
		$plot->SetPrintImage(0);
		$plot->SetTitle('Graph of Monthly Purchase');
		$plot->SetPlotAreaPixels(80, 40, 740, 250);
		$plot->SetDataType('text-data');
		$plot->SetDataValues($data1);
		$plot->SetPlotAreaWorld(NULL, 0, NULL, NULL);
		$plot->SetDataColors(array('blue'));
		$plot->SetYDataLabelPos('plotin');
		$plot->SetXTickLabelPos('none');
		$plot->SetXTickPos('none');
		$plot->SetYTickIncrement(10);
		$plot->SetYTitle("No. of Units purchased for $mth1");
		$plot->SetPlotType('bars');
		$plot->DrawGraph();
		$plot->SetPlotAreaPixels(80, 300, 740, 550);
		$plot->SetDataType('text-data');
		$plot->SetDataValues($data2);
		$plot->SetPlotAreaWorld(NULL, 0, NULL, NULL);
		$plot->SetDataColors(array('red'));
		$plot->SetYDataLabelPos('plotin');
		$plot->SetXTickLabelPos('none');
		$plot->SetXTickPos('none');
		$plot->SetYTickIncrement(10);
		$plot->SetYTitle("No. of Units purchased in $mth2");
		$plot->SetPlotType('bars');
		$plot->DrawGraph();
		$plot->PrintImage();
	}
	else
	{
		echo "Can't Draw Graph since Months chosen is invalid";
	}
}

if($opt == "production")
{
	$data1 = array();
	$sql = mysqli_query($con,"select * from consume where dat like '%-$m1-%'");
	if(mysqli_num_rows($sql) != 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
   			array_push($data1,array($row['prod_name'],$row['quantity']));
		}
		$chart1 = "yes";
	}
	else
	{
		$chart1 = "no";
	}
	$data2 = array();
	$sql = mysqli_query($con,"select * from consume where dat like '%-$m2-%'");
	if(mysqli_num_rows($sql) != 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
   			array_push($data2,array($row['prod_name'],$row['quantity']));
		}
		$chart2 = "yes";
	}
	else
	{
		$chart2 = "no";
	}
	if($chart1 == "yes" and $chart2 == "yes")
	{
		$plot = new PHPlot(2000,1800);
		$plot->SetImageBorderType('plain');
		$plot->SetPrintImage(0);
		$plot->SetTitle('Graph of Monthly Production');
		$plot->SetPlotAreaPixels(80, 40, 1040, 250);
		$plot->SetDataType('text-data');
		$plot->SetDataValues($data1);
		$plot->SetPlotAreaWorld(NULL, 0, NULL, NULL);
		$plot->SetDataColors(array('blue'));
		$plot->SetYDataLabelPos('plotin');
		$plot->SetXTickLabelPos('none');
		$plot->SetXTickPos('none');
		$plot->SetYTickIncrement(1);
		$plot->SetYTitle("No of packets produced for $mth1");
		$plot->SetPlotType('bars');
		$plot->DrawGraph();
		$plot->SetPlotAreaPixels(80, 300, 1040, 550);
		$plot->SetDataType('text-data');
		$plot->SetDataValues($data2);
		$plot->SetPlotAreaWorld(NULL, 0, NULL, NULL);
		$plot->SetDataColors(array('red'));
		$plot->SetYDataLabelPos('plotin');
		$plot->SetXTickLabelPos('none');
		$plot->SetXTickPos('none');
		$plot->SetYTickIncrement(1);
		$plot->SetYTitle("No of packets produced for $mth2");
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
