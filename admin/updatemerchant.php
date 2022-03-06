<?php
	require_once "../assets/php/db/config.php";
	$mail = $_GET['id'];
	$stat = $_GET['stat'];
	$cmd = "UPDATE `drivers` SET `Status`='$stat' WHERE `Mail`='$mail'";
	$chck = mysqli_query($link, $cmd);
	if ($chck) {
		header("location:merchant.php");
	}
?>