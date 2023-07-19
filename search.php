<?php

//include header file
include('include/header.php');

?>
<style>
	.size {
		min-height: 0px;
		padding: 60px 0 40px 0;

	}

	.loader {
		display: none;
		width: 69px;
		height: 89px;
		position: absolute;
		top: 25%;
		left: 50%;
		padding: 2px;
		z-index: 1;
	}

	.loader .fa {
		color: #e74c3c;
		font-size: 52px !important;
	}

	.form-group {
		text-align: left;
	}

	h1 {
		color: white;
	}

	h3 {
		color: #e74c3c;
		text-align: center;
	}

	.red-bar {
		width: 25%;
	}

	span {
		display: block;
	}

	.name {
		color: #e74c3c;
		font-size: 22px;
		font-weight: 700;
	}

	.donors_data {
		background-color: white;
		border-radius: 5px;
		margin: 25px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
		-moz-box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
		box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
		padding: 20px 10px 20px 30px;
	}

	table span {
		color: white;
		font-size: 12px;
	}
</style>
<div class="container-fluid red-background size">
	<div class="row">
		<div  style="text-align:center">
			<h1 style= "margin-left:430px" class="text-center" >Want to donate blood?</h1>
			<hr  class="offset-6 white-bar">
			<br>
			<div class="form-inline text-center" style="padding: 40px 0px 0px 5px; margin-left:500px">
				<table cellpadding="4" style="table-layout: fixed; text-align: left">
					<tr>
						<th colspan="2" style= "color:white; font-size:40px" >Person information:</th>
						<!--<th></th>-->
					</tr>
					<form method="post" style="color:white" >
						<tr>
							<td>Full Name:</td>
							<td><input name="name" id="fullname"></td>
							<td><span id="fullname_msg"></span></td>
						</tr>
						<tr>
							<td>Father Name:</td>
							<td><input name="fname" id="fname"></td>
							<td><span id="father_msg"></span></td>
						</tr>
						<tr>
							<td>Phone Number:</td>
							<td><input name="number" id="number"></td>
							<td><span id="number_msg"></span></td>
						</tr>
						<tr>
							<td>City:</td>
							<td><input name="city" id="city"> </td>
							<td><span id="city_msg"></span></td>
						</tr>
						<tr>
							<td>Blood Group:</td>
							<td><input name="group" id="group"></td>
							<td><span id="group_msg"></span></td>
						</tr>
						<tr>
							<td>Blood-range:</td>
							<td><input name="range" id="range"></td>
							<td><span id="range_msg"></span></td>
						</tr>
						
						<tr>
							<td colspan="2"><input type="submit" value="Submit Detail" name="submit" id="submitbtn"></td>
							<!--<td></td>-->
						</tr>
					</form>
				</table>
			</div>

			<?php

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "bloodgroup";

			$conn = new mysqli($servername, $username, $password, $dbname);

			if (isset($_POST['submit'])) {
				$name = $_POST['name'];
				$fname = $_POST['fname'];
				$phone = $_POST['number'];
				$city = $_POST['city'];
				$group = $_POST['group'];
				$range = $_POST['range'];
				

				$insert = "INSERT INTO tabledata (Name, FatherName, Phonenumber, City, BloodGroup, BloodRange)VALUES('$name', '$fname', '$phone', '$city', '$group', '$range')";

				$run_query = mysqli_query($conn, $insert);
				echo ("record submitted");
			}

			?>



		</div>
	</div>
</div>
<div class="container" style="padding: 60px 0 60px 0;">
	<div class="row " id="data">




		<!-- Display The Search Result -->

	</div>
</div>
<div class="loader" id="wait">
	<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
</div>
<?php

//include footer file
include('include/footer.php');

?>

<script type="text/javascript">
	$('#fullname_msg').text("");
	$('#father_msg').text("");
	$('#number_msg').text("");
	$('#city_msg').text("");
	$('#group_msg').text("");
	$('#range_msg').text("");



	var fullname_err = true;
	var father_err = true;
	var number_err = true;
	var city_err = true;
	var group_err = true;
	var range_err = true;
	

	$('#fullname').keyup(function() {
		fullname_check();
	})

	function fullname_check() {
		var fullname_val = $('#fullname').val();
		if (fullname_val.length == '') {
			$('#fullname_msg').text("** PLease enter the fullname");
			$('#fullname_msg').focus();
			$('#fullname_msg').css("color", "white");
			fullname_err = false;
			return false;
		} else {
			fullname_err = true;
			$('#fullname_msg').text("");
		}
		if ((fullname_val.length < 3) || (fullname_val.length > 32)) {
			$('#fullname_msg').text("** Fullname length must be betwween 3 and 32 words");
			$('#fullname_msg').focus();
			$('#fullname_msg').css("color", "white");
			fullname_err = false;
			return false;
		} else {
			fullname_err = true;
			$('#fullname_msg').text("");
		}
		var reg = /^[a-zA-Z ]+$/;
		if (!reg.test(fullname_val)) {
			$('#fullname_msg').focus();
			$('#fullname_msg').text("** Only alphabets are allowed in fullname");
			$('#fullname_msg').css("color", "white");
			fullname_err = false;
			return false;
		} else {
			fullname_err = true;
			$('#fullname_msg').text("");
		}
		if ((fullname_val.split(" ").length - 1) > 1) {
			$('#fullname_msg').focus();
			$('#fullname_msg').text("** Only one space allowed in Fullname");
			$('#fullname_msg').css("color", "white");
			fullname_err = false;
			return false;
		} else {
			fullname_err = true;
			$('#fullname_msg').text("");
		}
	}

	$('#fname').keyup(function() {
		fname_check();
	})

	function fname_check() {
		var fname_val = $('#fname').val();
		if (fname_val.length == '') {
			$('#father_msg').text("** PLease enter the Father Name");
			$('#father_msg').focus();
			$('#father_msg').css("color", "white");
			fname_err = false;
			return false;
		} else {
			fname_err = true;
			$('#father_msg').text("");
		}
		if ((fname_val.length < 3) || (fname_val.length > 32)) {
			$('#father_msg').text("** Father Name length must be betwween 3 and 32 words");
			$('#father_msg').focus();
			$('#father_msg').css("color", "white");
			fname_err = false;
			return false;
		} else {
			fname_err = true;
			$('#father_msg').text("");
		}
		var reg = /^[a-zA-Z ]+$/;
		if (!reg.test(fname_val)) {
			$('#father_msg').focus();
			$('#father_msg').text("** Only alphabets are allowed in fname");
			$('#father_msg').css("color", "white");
			fname_err = false;
			return false;
		} else {
			fname_err = true;
			$('#father_msg').text("");
		}
		if ((fname_val.split(" ").length - 1) > 1) {
			$('#father_msg').focus();
			$('#father_msg').text("** Only one space allowed in Father Name");
			$('#father_msg').css("color", "white");
			fname_err = false;
			return false;
		} else {
			fname_err = true;
			$('#father_msg').text("");
		}
	}

	$('#number').keyup(function() {
		number_check();
	})

	function number_check() {
		var number_val = $('#number').val();
		if (number_val.length == '') {
			$('#number_msg').text("** PLease enter your Phone Number");
			$('#number_msg').focus();
			$('#number_msg').css("color", "white");
			number_err = false;
			return false;
		} else {
			number_err = true;
			$('#number_msg').text("");
		}
		if ((number_val.length < 1) || (number_val.length > 14)) {
			$('#number_msg').text("** Phone Number length must be betwween 1 and 14 words");
			$('#number_msg').focus();
			$('#number_msg').css("color", "white");
			number_err = false;
			return false
		} else {
			number_err = true;
			$('#number_msg').text("");
		}
		var reg = /^[0-9]/i;
		if (!reg.test(number_val)) {
			$('#number_msg').focus();
			$('#number_msg').text("** Please write our Phone Number in numerical from (i.e 0,1,2,3...)");
			$('#number_msg').css("color", "white");
			number_err = false;
			return false;
		} else {
			number_err = true;
			$('#number_msg').text("");
		}
	}

	$('#city').keyup(function() {
		city_check();
	})

	function city_check() {
		var city_val = $('#city').val();
		if (city_val.length == '') {
			$('#city_msg').text("** PLease enter the City");
			$('#city_msg').focus();
			$('#city_msg').css("color", "white");
			city_err = false;
			return false;
		} else {
			city_err = true;
			$('#city_msg').text("");
		}
		if ((city_val.length < 6) || (city_val.length > 28)) {
			$('#city_msg').text("** City length must be betwween 6 and 28 words");
			$('#city_msg').focus();
			$('#city_msg').css("color", "white");
			city_err = false;
			return false;
		} else {
			city_err = true;
			$('#city_msg').text("");
		}
		var reg = /^[a-zA-Z ]+$/;
		if (!reg.test(city_val)) {
			$('#city_msg').focus();
			$('#city_msg').text("** Only alphabets are allowed in City");
			$('#city_msg').css("color", "white");
			city_err = false;
			return false;
		} else {
			city_err = true;
			$('#city_msg').text("");
		}
		if ((city_val.split(" ").length - 1) > 1) {
			$('#city_msg').focus();
			$('#city_msg').text("** Only one space allowed in City");
			$('#city_msg').css("color", "white");
			city_err = false;
			return false;
		} else {
			city_err = true;
			$('#city_msg').text("");
		}
	}

	$('#group').keyup(function() {
		group_check();
	})
	function group_check() {
		var group_val = $('#group').val();
		if (group_val.length == '') {
			$('#group_msg').text("** PLease enter the Blood Group");
			$('#group_msg').focus();
			$('#group_msg').css("color", "white");
			group_err = false;
			return false;
		} else {
			group_err = true;
			$('#group_msg').text("");
		}
		if ((group_val.length < 2) || (group_val.length > 4)) {
			$('#group_msg').text("** Blood Group length must be betwween 2 and 4 words");
			$('#group_msg').focus();
			$('#group_msg').css("color", "white");
			group_err = false;
			return false;
		} else {
			group_err = true;
			$('#group_msg').text("");
		}
		// var reg = /^[a-zA-Z ]+$/;
		var reg = /^[0-9]/i;
		if (reg.test(group_val)) {
			$('#group_msg').focus();
			$('#group_msg').text("** Only alphabets and symbols are allowed in Blood Group");
			$('#group_msg').css("color", "white");
			group_err = false;
			return false;
		} else {
			group_err = true;
			$('#group_msg').text("");
		}
		if ((group_val.split(" ").length - 1) > 0) {
			$('#group_msg').focus();
			$('#group_msg').text("** No space allowed in Blood Group");
			$('#group_msg').css("color", "white");
			group_err = false;
			return false;
		} else {
			group_err = true;
			$('#group_msg').text("");
		}
	}

	$('#range').keyup(function() {
		range_check();
	})

	function range_check() {
		var range_val = $('#range').val();
		if (range_val.length == '') {
			$('#range_msg').text("** PLease enter your Blood Range");
			$('#range_msg').focus();
			$('#range_msg').css("color", "range");
			range_err = false;
			return false;
		} else {
			range_err = true;
			$('#range_msg').text("");
		}
		if ((range_val.length < 1) || (range_val.length > 12)) {
			$('#range_msg').text("** Bloog Range length must be betwween 1 and 12 words");
			$('#range_msg').focus();
			$('#range_msg').css("color", "white");
			range_err = false;
			return false
		} else {
			range_err = true;
			$('#range_msg').text("");
		}
	}

	$('#submitbtn').click(function() {
		fullname_err = true;
		fname_err = true;
		number_err = true;
		city_err = true;
		group_err = true;
		range_err = true;

		fullname_check();
		fname_check();
		number_check();
		city_check();
		group_check();
		range_check()

		if (fullname_err == true && fname_err == true && number_err == true && city_err == true && group_err == true && range_err == true) {
			return true;
		} else {
			return false;
		}
	})
</script>