<?php
	$title = "Admin Merchants";
	include("header.php");
?>
<div class="main-content" style="min-height: calc(100vh - 57px);">
	<br>
	<a href="adddriver.php" class="btn btn-primary" style="margin-left:200px">Add Driver</a>
	<?php
		require_once "../assets/php/db/config.php";
		$cond = "SELECT * FROM `drivers`";
		$chck = mysqli_query($link,$cond);
		if ($chck) {
			if (mysqli_num_rows($chck)>0) {
				while ($data = mysqli_fetch_array($chck)) {
					$driver = $data['Mail'];
					$cond = "SELECT * FROM `user` WHERE `Mail`='$driver'";
					$driverdetails = mysqli_fetch_array(mysqli_query($link,$cond));
					?><center>
					<div class="jumbotron" style="width: 40%;">
						<h5><?php echo $driverdetails['Name']; ?></h5>
						Status : <?php echo $data['Status']; ?><br><br>
						<div>
							<?php if (($data['Status'] === "Applied") or ($data['Status'] === "Rejected")) {?>
							<a href="updatemerchant.php?id=<?php echo $driver . "&stat=Activated" ?>" class="btn btn-light text-success"><strong><ion-icon name="checkmark-sharp"></ion-icon></strong></a><?php } ?>
							<?php if(($data['Status'] === "Applied") or ($data['Status'] === "Activated")) {?>
							<a href="updatemerchant.php?id=<?php echo $driver . "&stat=Rejected" ?>" class="btn btn-light text-danger"><strong><ion-icon name="close-sharp"></ion-icon></strong></a><?php } ?>
						</div>
					</div></center>
					<?php
				}
			}
		}
	?>
</div>
<?php include("footer.php"); ?>