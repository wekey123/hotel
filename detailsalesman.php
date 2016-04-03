<?php
include("dbcon.php");
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = mysqli_query($con,"select * from sale_users where id=$id");
	while($row = mysqli_fetch_array($sql)){
		?>
        <table width="100%;">
            <tr>
                <td align="center">Sales Executive Name</td>
                <td align="left"><?php echo $row['name']; ?></td>
            </tr>
            <tr>
                <td align="center">Location</td>
                <td align="left"><?php echo $row['location']; ?></td>
            </tr>
        </table>
        <?php
	}
}
?>