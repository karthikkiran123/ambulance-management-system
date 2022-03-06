<?php 
	$title = "Contact Us";
	include("header.php") ?>
<div class="main-content">
	<?php
		require_once "assets/php/db/config.php";
		if (isset($_POST['send'])) {
			$name = $_POST['name'];
			$mail = $_POST['mail'];
			$mob = $_POST['mob'];
			$msg = $_POST['msg'];
			$cond = "INSERT INTO `message`(`Name`, `Mail`, `Mobile`, `Message`) VALUES ('$name','$mail','$mob','$msg')";
			$chck = mysqli_query($link, $cond);
			if ($chck) {
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Thanks for reaching us out!</strong> We will get back to you soon.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
			}
		}
	?>
	<div class="jumbotron" style="width: 50%;margin-left: 25%;">
		<h4>Contact Us</h4>
		<form action="" method="POST">
		<div class="form-group">
			<input type="text" name="name" value="<?php echo $_SESSION['name'] ?>" placeholder="Name" class="form-control" required />
		</div>
		<div class="form-group">
			<input type="text" name="mail" value="<?php echo $_SESSION['mail'] ?>" placeholder="Email" class="form-control" required />
		</div>
		<div class="form-group">
			<input type="text" name="mob" value="<?php echo $_SESSION['mob'] ?>" placeholder="Mobile No" class="form-control" required />
		</div>
		<div class="form-group">
			<textarea name="msg" value="" placeholder="Message" class="form-control" required /></textarea>
		</div>
		<div class="form-group">
			<input type="submit" name="send" value="Send" class="btn btn-success form-control">
		</div>
		</form>
	</div>
</div>
<?php include("footer.php") ?>