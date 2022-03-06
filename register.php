<?php
	$title = "Register";
	session_start();
	if ($_SESSION['Arogyvaahan'] === true) {
		header("location:/ambulance");
	}
	include("header.php");
?>
<div class="main-content">
	<?php
		if (isset($_POST['signup'])) {
			$name = $_POST['Name'];
			$mail = $_POST['Mail'];
			$mob = $_POST['Mobile'];
			$pwd = $_POST['Password'];
			$cpwd = $_POST['Confirm'];
			require_once "assets/php/db/config.php";
			if ($pwd === $cpwd) {
				$cond = "SELECT * FROM `user` WHERE `Mail` = '$mail'";
				$chck = mysqli_query($link, $cond);
				if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  <strong>Invalid E-mail!</strong> Please Verify your E-mail.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>';
				}
				elseif($chck){
					if(mysqli_num_rows($chck)>0){
						echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Account Already Exists!</strong> Please try logging in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
					}else{
						$pwdhash = password_hash($pwd, PASSWORD_DEFAULT);
						$query = "INSERT INTO `user`(`Name`, `Mail`, `Mobile`, `Acctype`, `Password`) VALUES ('$name','$mail','$mob','User','$pwdhash')";
						$result = mysqli_query($link, $query);
						if($result){
							echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Heyy '.$name.'!</strong> Account Created Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
						}else{
							echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Something Went Wrong!</strong> Please try after sometime.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
						}
					}
				}
			}
			else{
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Password Mismatch!</strong> Please Verify your Password.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
			}
		}
	?>
	<center>
	<div class="jumbotron" style="width: 40%;">
		<h5 style="text-align: center;">Register an Account</h5>
		<form action="" method="POST">
			<div class="form-group">
				<label for="Name">Name</label>
				<input type="text" name="Name" class="form-control" onchange="validate_name();" id="Name" required value="<?php echo $name; ?>">
			</div>
			<div class="form-group">
				<label for="Mail">Mail</label>
				<input type="text" name="Mail" class="form-control" id="Mail" required value="<?php echo $mail; ?>">
			</div>
			<div class="form-group">
				<label for="Mobile">Mobile</label>
				<input type="number" onchange="validate_mob()" maxlength="10" name="Mobile" class="form-control" id="Mobile" required value="<?php echo $mob; ?>">
			</div>
			<div class="form-group">
				<label for="Password">Password</label>
				<input type="password" name="Password" class="form-control" id="Password" required>
			</div>
			<div class="form-group">
				<label for="Confirm">Confirm Password</label>
				<input type="password" name="Confirm" class="form-control" id="Confirm" required>
			</div>
			<div class="form-group">
				<input type="Submit" name="signup" class="form-control btn btn-primary" value="Create Now">
			</div>
			Already have an Account? <a href="login.php" style="color:blue">Login!</a>
		</form>
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
				if (num.value.length < num.maxLength){
					num.value = "";
				}
			}
		</script>
	</div>
</center>
</div>
<?php include("footer.php"); ?>