<?php
	$title = "Login";
	session_start();
	if ($_SESSION['Arogyvaahan'] === true) {
		header("location:/ambulance");
	}
	include("header.php");
?>
<div class="main-content">
	<?php
		if (isset($_POST['signin'])) {
			$mailid = $_POST['Username'];
			$pwd = $_POST['Password'];
			require_once "assets/php/db/config.php";
			$cond = "SELECT * FROM `user` WHERE `Mail` = '$mailid'";
			$chck = mysqli_query($link, $cond);
			if(!filter_var($mailid, FILTER_VALIDATE_EMAIL)){
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Invalid E-mail!</strong> Please Verify your E-mail.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
			}
			elseif($chck){
				if(mysqli_num_rows($chck)>0){
					$data = mysqli_fetch_array($chck);
					$hashed_password = $data['Password'];
					if(password_verify($pwd, $hashed_password)){
						session_start();
						$_SESSION['name'] = $data['Name'];
						$_SESSION['mail'] = $data['Mail'];
						$_SESSION['mob'] = $data['Mobile'];
						$_SESSION['Acctype'] = $data['Acctype'];
						$_SESSION['Address'] = $data['Address'];
						$_SESSION['Arogyvaahan'] = true;
						if ($data['Acctype'] === 'Admin') {
							header("location: /ambulance/admin/");
						}else{
							header("location: /ambulance/");
						}
					}else{
						echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Wrong Password!</strong> Please Verify your Password.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
					}
				}else{
					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>No Account is linked with '.$mail.'!</strong> Please Create Account For Access.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
				}
			}
		}
	?><center>
	<div class="jumbotron" style="width: 40%;">
		<h5 style="text-align: center;">Login</h5>
		<form action="" method="POST">
			<div class="form-group">
				<label for="Username">Username</label>
				<input type="text" name="Username" class="form-control" id="Username" value="<?php echo $mailid; ?>">
			</div>
			<div class="form-group">
				<label for="Password">Password</label>
				<input type="password" name="Password" class="form-control" id="Password">
			</div>
			<div class="form-group">
				<input type="Submit" name="signin" class="form-control btn btn-primary" value="Login">
			</div>
			<a href="forgot.php" style="color:blue">Forgot Password?</a><br>
			Don't have an Account? <a href="register.php" style="color:blue">Create Now!</a>
		</form>
	</div>
</center>
</div>
<?php include("footer.php"); ?>