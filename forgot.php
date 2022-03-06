<?php
	$title = "Forgot Password";
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
			if($chck){
				if(mysqli_num_rows($chck)>0){
					$pwdhash = password_hash($pwd, PASSWORD_DEFAULT);
					$cond = "UPDATE `user` SET `Password`='$pwdhash' WHERE `Mail`='$mailid'";
					$chck = mysqli_query($link, $cond);
					echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Heyy '.$mailid.'!</strong> Password Changed Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

				}else{
					echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>No Account Exists!</strong> Please try Creating.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
				}
			}
		}
	?>
	<center>
	<div class="jumbotron" style="width: 40%;">
		<h5 style="text-align: center;">Forgot Password</h5>
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
				<input type="Submit" name="signin" class="form-control btn btn-primary" value="Change Password">
			</div>
		</form>
	</div>
</center>
</div>
<?php include("footer.php"); ?>