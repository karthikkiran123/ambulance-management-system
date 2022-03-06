<?php
	$title = "Admin Bookings";
	include("header.php");
?>
<div class="main-content" style="min-height: calc(100vh - 57px);"><br><center>
	<?php
		require_once "../assets/php/db/config.php";
		$cond = "SELECT * FROM `bookings`";
		$chck = mysqli_query($link,$cond);
		if ($chck) {
			if (mysqli_num_rows($chck)>0) {
				while($data = mysqli_fetch_array($chck)){
					$patient = $data['patient'];
					$driver = $data['driver'];
					$cond = "SELECT * FROM `user` WHERE `Mail`='$patient'";
					$patientdetails = mysqli_fetch_array(mysqli_query($link,$cond));
					$cond = "SELECT * FROM `user` WHERE `Mail`='$driver'";
					$driverdetails = mysqli_fetch_array(mysqli_query($link,$cond));
					?>
					<div class="jumbotron" style="width: 40%;">
						Patient : <?php echo $patientdetails['Name']; ?> <a href="tel:<?php echo $patientdetails['Mobile']; ?>" class="btn btn-success" style="border-radius: 50%;margin-left: 30px;"><ion-icon name="call"></ion-icon></a> <a href="mailto:<?php echo $patient; ?>" class="btn btn-primary" style="border-radius: 50%;"><ion-icon name="send"></ion-icon></a><br><br>
						Driver : <?php echo $driverdetails['Name']; ?> <a href="tel:<?php echo $driverdetails['Mobile']; ?>" class="btn btn-success" style="border-radius: 50%;margin-left: 30px;"><ion-icon name="call"></ion-icon></a> <a href="mailto:<?php echo $driver; ?>" class="btn btn-primary" style="border-radius: 50%;"><ion-icon name="send"></ion-icon></a><br><br>
					</div>
					<?php
				}
			}
		}
	?></center>
</div>
<?php include("footer.php"); ?>