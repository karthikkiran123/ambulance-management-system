<?php
	$title = "Schedule an Ambulance";
	session_start();
	if (!$_SESSION['Arogyvaahan'] === true) {
		header("location:login.php");
	}
	include("header.php");
?>
<div class="main-content">
	<?php
	if (isset($_POST['book'])) {
		$mail = $_POST['mail'];
		$pick = $_POST['pick'];
		$droploc = $_POST['droploc'];
		$dat = $_POST['dat'];
		require_once "assets/php/db/config.php";
		$cond = "INSERT INTO `bookings`(`patient`, `address`, `status`, `travelon`, `droploc`) VALUES ('$mail','$pick','Scheduled','$dat','$droploc')";
		$chck = mysqli_query($link, $cond);
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Heyy '.$_SESSION['name'].'!</strong>Booking Scheduled Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

	}
		
	?>
	<a href="scheduled.php" class="btn btn-primary">My Schedules</a>
	<center>
	<div class="jumbotron" style="width:550px">
		<h5>Schedule An Ambulance</h5>
		<form action="" method="POST">
			<div class="form-group">
				<input type="text" name="mail" placeholder="" class="form-control" readonly value="<?php echo $_SESSION['mail']; ?>">
			</div>
			<div class="form-group">
				<input type="text" name="pick" placeholder="Enter Pickup Location" class="form-control">
			</div>
			<div class="form-group">
				<input type="datetime-local" name="dat" placeholder="" class="form-control">
			</div>
			<div class="form-group">
				<input type="text" name="droploc" placeholder="Enter Drop Location" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" name="book" value="Schedule Now" class="form-control btn btn-success">
			</div>
		</form>
	</div>
</center>
</div>
<?php include("footer.php"); ?>