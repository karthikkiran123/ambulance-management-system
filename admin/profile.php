<?php
	$title = "Admin Profile";
	include("header.php");
?>
<div class="main-content" style="min-height: calc(100vh - 57px);">
	<?php
		if (isset($_POST['signup'])) {
			$name = $_POST['Name'];
			$mail = $_POST['Mail'];
			$mob = $_POST['Mobile'];
			$add = $_POST['address'];
			$pwd = $_POST['Confirm'];
			require_once "../assets/php/db/config.php";
			$cond = "SELECT * FROM `user` WHERE `Mail` = '$mail'";
			$chck = mysqli_query($link, $cond);
			if($chck){
				$data = mysqli_fetch_array($chck);
				$hashed_password = $data['Password'];
				if(password_verify($pwd, $hashed_password)){
					session_start();
					$cond = "UPDATE `user` SET `Name`='$name',`Mobile`='$mob',`Address`='$add' WHERE `Mail`='$mail'";
					$chck = mysqli_query($link, $cond);
					if ($chck) {
						$_SESSION['name'] = $name;
						$_SESSION['mob'] = $mob;
						$_SESSION['Address'] = $add;
						echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your Account updated Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
					}

				}else{
					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Wrong Password!</strong> Please Verify your Password.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
				}
			}
		}
	?>
	<center><br>
	<div class="jumbotron" style="width: 40%;">
		<h5 style="text-align: center;">Update My Account</h5>
		<form action="" method="POST">
			<div class="form-group">
				<label for="Name">Name</label>
				<input type="text" name="Name" class="form-control" id="Name" required value="<?php echo $_SESSION['name']; ?>">
			</div>
			<div class="form-group">
				<label for="Mail">Mail</label>
				<input type="text" style="background: #fff" name="Mail" class="form-control" id="Mail" readonly required value="<?php echo $_SESSION['mail']; ?>">
			</div>
			<div class="form-group">
				<label for="Mobile">Mobile</label>
				<input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" name="Mobile" class="form-control" id="Mobile" required value="<?php echo $_SESSION['mob']; ?>">
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" class="form-control" id="address" required value="<?php echo $_SESSION['Address']; ?>">
			</div>
			<div class="form-group">
				<label for="Confirm">Current Password</label>
				<input type="password" name="Confirm" class="form-control" id="Confirm" required>
			</div>
			<div class="form-group">
				<input type="Submit" name="signup" class="form-control btn btn-primary" value="Update Now">
			</div>
		</form>
	</div>
</center>
</div>
<?php include("footer.php"); ?>