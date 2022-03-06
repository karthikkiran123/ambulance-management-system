<?php
	echo $driver = $_GET['id'];
	echo $status = $_GET['stat'];
	require_once "assets/php/db/config.php";
	if ($status === "Booked") {
		$cond = "UPDATE `bookings` SET `status`='Picked' WHERE `driver`='$driver' AND `status`='$status'";
		$chck = mysqli_query($link, $cond);
	}
	if ($status === "Picked") {
		$cond = "UPDATE `bookings` SET `status`='Completed' WHERE `driver`='$driver' AND `status`='$status'";
		$chck = mysqli_query($link, $cond);
	}
	header("location:merchant.php");
?>