<?php
	$title = "Admin Merchants";
	include("header.php");
?>
<div class="main-content" style="min-height: calc(100vh - 57px);">
	<br>
	<?php
		if (isset($_POST['add'])) {
			$mail = $_POST['mail'];
			$name = $_POST['name'];
			$pwd = $_POST['pwd'];
			$mob = $_POST['mob'];
			$vehicle = $_POST['vehicle'];
			$price = $_POST['price'];
			require_once "../assets/php/db/config.php";
			$cond = "SELECT * FROM `user` WHERE `Mail`='$mail'";
			$chck = mysqli_query($link,$cond);
			if ($chck) {
				if (mysqli_num_rows($chck) > 0) {
					$cond = "SELECT * FROM `drivers` WHERE `Mail`='$mail'";
					$chck1 = mysqli_query($link,$cond);
					if ($chck1) {
						if (mysqli_num_rows($chck1) > 0) {
							echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Already Exists!</strong> Driver Already Exists.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
						}else{
							$cond = "INSERT INTO `drivers`(`Mail`, `Vehicle`, `Status`, `Price`) VALUES ('$mail','$vehicle','Activated','$price')";
							$chck = mysqli_query($link, $cond);
						}
					}
				}else{
					$pwdhash = password_hash($pwd, PASSWORD_DEFAULT);
					$cond = "INSERT INTO `user`(`Name`, `Mail`, `Mobile`, `Acctype`, `Password`) VALUES ('$name','$mail','$mob','User', '$pwdhash')";
					$chck = mysqli_query($link, $cond);
					$cond = "INSERT INTO `drivers`(`Mail`, `Vehicle`, `Status`, `Price`) VALUES ('$mail','$vehicle','Activated','$price')";
					$chck = mysqli_query($link, $cond);
					echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Driver Added Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
				}
			}
		}
		
	?>
	<center>
	<div class="jumbotron" style="width:40%">
		<h5>Add Driver</h5>
		<form action="" method="POST">
			<div class="form-group">
				<input type="text" name="name" placeholder="Enter Name" onchange="validate_name();" id="Name" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="text" name="mail" placeholder="Enter Mail ID" onchange="validate_mail();" class="form-control" id="Mail" required>
			</div>
			<div class="form-group">
				<input type="number" name="mob" onchange="validate_mob();" maxlength="10" placeholder="Enter Mobile Number" id="Mobile" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="text" name="vehicle" placeholder="Enter Vehicle Number" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="text" name="price" placeholder="Enter Price" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="password" name="pwd" placeholder="Enter Password" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="Submit" name="add" class="btn btn-primary" value="Add Driver">
			</div>
		</form>
	</div>
	<script>
			function validate_name(){
				var name = document.getElementById('Name').value;
				var exp = /^[a-zA-Z]+ [a-zA-Z]+$/;
				var exp1 = /^[a-zA-z]+[a-zA-Z]+$/;
				if(!exp.test(name) && !exp1.test(name)){
					document.getElementById('Name').value = "";
				}
			}
			function validate_mob(){
				var num = document.getElementById('Mobile');
				if ((num.value.length < num.maxLength) || (num.value.length > num.maxLength)){
					num.value = "";
				}
			}
			function validate_mail(){
				var regexp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				var mail = document.getElementById('Mail').value;
				if (!regexp.test(String(mail).toLowerCase())){
					document.getElementById('Mail').value = "";
				}
			}
		</script>
	</center>
</div>
<?php include("footer.php"); ?>