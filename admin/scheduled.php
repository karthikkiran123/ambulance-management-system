<?php
	$title = "Scheduled Ambulance";
	include("header.php");
?>
<div class="main-content" style="min-height: calc(100vh - 57px);">
	<center>
	<?php
		require_once "../assets/php/db/config.php";
		if (isset($_POST['update'])) {
			$mail = $_POST['mail'];
			$driverid = $_POST['driver'];
			$cond = "UPDATE `bookings` SET `driver`='$driverid',`price`='900',`status`='Booked' WHERE `patient`='$mail'";
			$confirm = mysqli_query($link, $cond);
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Assigned!</strong>Booking Assigned Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
		}
		$cond = "SELECT * FROM `bookings` WHERE `status`='Scheduled'";
		$chck = mysqli_query($link,$cond);
		if ($chck) {
			if (mysqli_num_rows($chck)>0) {
				while($data = mysqli_fetch_array($chck)){
					$patient = $data['patient'];
					?>
					<div class="jumbotron" style="width:60%">
						Pick up Location : <?php echo $data['address']; ?><br> 
						Drop Location : <?php echo $data['droploc']; ?><br>
						Scheduled on : <?php echo $data['travelon']; ?><br>
						<form action="" method="POST">
							<input type="hidden" name="mail" value="<?php echo $patient; ?>">
							<select name="driver" class="form-control">
								<?php
									$cond = "SELECT * FROM `drivers`";
									$chck1 = mysqli_query($link,$cond);
									if ($chck1) {
										if (mysqli_num_rows($chck1)>0) {
											while($driver = mysqli_fetch_array($chck1)){
												$drivermail = $driver['Mail'];
												echo '<option value="'.$drivermail.'">'.$drivermail.'</option>';
											}
										}
									}
								?>
							</select>
							<input type="Submit" name="update" class="form-control btn btn-primary" value="Assign">
						</form>
					</div>
					<?php
					
				}
			}else{
				echo "No Schedules Available!!";
			}
		}
	?>
</center>
</div>
<?php include("footer.php"); ?>