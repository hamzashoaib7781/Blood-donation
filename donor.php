<?php	
	
	include ('include/header.php');


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodgroup";

$conn = new mysqli($servername, $username, $password, $dbname);
$result = mysqli_query($conn, "SELECT * FROM tabledata");

if (isset($_POST['delete'])) {
    $id = $_POST['Namee'];
  
    echo "Record deleted";
}
?>

<style>
	.size{
		min-height: 0px;
		padding: 60px 0 40px 0;
		
	}
	.loader{
		display:none;
		width:69px;
		height:89px;
		position:absolute;
		top:25%;
		left:50%;
		padding:2px;
		z-index: 1;
	}
	.loader .fa{
		color: #e74c3c;
		font-size: 52px !important;
	}
	.form-group{
		text-align: left;
	}
	h1{
		color: white;
	}
	h3{
		color: #e74c3c;
		text-align: center;
	}
	.red-bar{
		width: 25%;
	}
	span{
		display: block;
	}
	.name{
		color: #e74c3c;
		font-size: 22px;
		font-weight: 700;
	}
	.donors_data{
		background-color: white;
		border-radius: 5px;
		margin:20px 5px 0px 5px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		-moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		padding: 20px;
	}
</style>
<div class="container-fluid red-background size">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1 class="text-center">Donors</h1>
			<hr class="white-bar">
		</div>
	</div>
</div>


     <br>
<?php

if(mysqli_num_rows($result) > 0) {

?>
    <table border="1" style="table-layout: fixed; width: 100%">
    	<tr style="text-align: center">
    		<th>Name</th>
    		<th>Father Name</th>
    		<th>City</th>
    		<th>Phone Number</th>
    		<th>Blood Group</th>
    		<th>Blood Range (lr)</th>
    	</tr>
    	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)){
		?>
		<tr>
			<td name="Namee"><?php echo $row["Name"]; ?></td>
			<td><?php echo $row["FatherName"]; ?></td>
			<td><?php echo $row["City"]; ?></td>
			<td><?php echo $row["Phonenumber"]; ?></td>
			<td><?php echo $row["BloodGroup"]; ?></td>
			<td><?php echo $row["BloodRange"]; ?></td>
			<td> <a href="delete.php?id=<?php echo $row['ID'] ?>">Delete</a>  </td>
			
		</tr>
		<?php
		$i++;
	}
	?>
	
    </table>
    <?php
}
else{
	echo "No result found";
}
?>

<div class="container" style="padding: 60px 0;">
	<div class="row data">
		


	</div>
</div>
<div class="loader" id="wait">
	<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
</div>

<?php	

	include ('include/footer.php'); 

?>
