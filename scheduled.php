<?php
	$title = "Scheduled Ambulance";
	session_start();
	if (!$_SESSION['Arogyvaahan'] === true) {
		header("location:login.php");
	}
	include("header.php");
?>
<div class="main-content">
	<center>
	<?php
		require_once "assets/php/db/config.php";
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