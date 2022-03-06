<?php
	$title = "Merchant";
	session_start();
	if (!$_SESSION['Arogyvaahan'] === true) {
		header("location:login.php");
	}
	include("header.php");
?>
<div class="main-content">
	<?php
		require_once "assets/php/db/config.php";
		$mail = $_SESSION['mail'];
		if (isset($_POST['apply'])) {
			$vehicle = $_POST['vehicle'];
			$cost = $_POST['cost'];
			$query = "INSERT INTO `drivers`(`Mail`, `Vehicle`, `Status`, `Price`) VALUES ('$mail','$vehicle','Applied','$cost')";
			$result = mysqli_query($link, $query);
			if($result){
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Heyy '.$_SESSION['name'].'!</strong> Merchant Account Applied.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
			}
		}
		$cond = "SELECT * FROM `drivers` WHERE `Mail` = '$mail'";
		$chck = mysqli_query($link, $cond);
		if ($chck) {
			if(mysqli_num_rows($chck)>0){
				$data = mysqli_fetch_array($chck);
				?><center>
					<div class="jumbotron" style="width:40%">
						<h5>Hello, <?php echo $_SESSION['name']; ?></h5>
						Status of your Merchant Application is <strong style="color:<?php if( $data['Status'] === "Rejected" ){ echo "red"; }else{ echo "green"; } ?>;"><?php echo $data['Status']; ?></strong>
					</div></center>
				<?php
				if ($data['Status'] === "Activated") {
					?>
						<div class="jumbotron">
							<h5>Current Booking</h5>
							<?php
			require_once "assets/php/db/config.php";
			$cond = "SELECT * FROM `bookings` WHERE `driver`='$mail'";
			$chck = mysqli_query($link, $cond);
			if ($chck) {
				while ($book = mysqli_fetch_array($chck)) {
					if ($book['status'] != "Completed") {
						$drivermail = $book['patient'];
						$cond = "SELECT * FROM `user` WHERE `Mail` = '$drivermail'";
						$driver = mysqli_fetch_array(mysqli_query($link, $cond));
						?>
						<div class="jumbotron bg-light text-dark" style="color:#fff">
							<img src="assets/img/favicon.png" style="width: 250px;">
							<div style="float:right;width: 500px;">
								<h4><?php echo $driver['Name']; ?></h4>
									Status : <?php echo $book['status']; ?><br>
									<a href="tel:<?php echo $driver['Mobile']; ?>" class="btn btn-primary" style="border-radius: 50%;"><ion-icon name="call"></ion-icon></a>
									<a href="http://maps.google.com/?q=<?php echo rawurlencode($driver['Address']); ?>" target="_blank" class="btn btn-success" style="margin-left:10px"><ion-icon name="location-sharp"></ion-icon> Locate Now</a><br><br>
									<?php if ($book['status'] === "Booked") {
										echo '<a href="updatebooking.php?id='.$book['driver'].'&stat=' . $book['status'] . '" class="btn btn-success">Confirm Pickup</a>';
									}
									if ($book['status'] === "Picked") {
										echo '<a href="updatebooking.php?id='.$book['driver'].'&stat=' . $book['status'] . '" class="btn btn-success">Complete Booking</a>';
									}
									?>
							</div>
							<ol class="progtrckr" data-progtrckr-steps="5">
    							<li class="<?php if($book['status'] === "Booked"){ echo "progtrckr-done"; }elseif($book['status'] === "Picked"){ echo "progtrckr-done"; }elseif($book['status'] === "Completed"){ echo "progtrckr-done"; }else{ echo "progtrckr-todo"; } ?>">Booked</li><!--
								--><li class="<?php if($book['status'] === "Picked"){ echo "progtrckr-done"; }elseif($book['status'] === "Completed"){ echo "progtrckr-done"; }else{ echo "progtrckr-todo"; } ?>">Picked</li><!--
 								--><li class="<?php if($book['status'] === "Completed"){ echo "progtrckr-done"; }else{ echo "progtrckr-todo"; } ?>">Completed</li>
							</ol>
						</div>
						<?php
					}
					$bookavail = false;
					if (($book['status'] != "Completed")) {
						$bookavail = true;
						break;
					}else{
						$bookavail = false;
					}
				}
				if (!$bookavail) {
					echo '<h6 style="margin:20px">No Bookings Available!</h6>';
				}
			}
		?>
							<!--<div class="jumbotron bg-secondary" style="color:#fff">
								<img src="assets/img/favicon.png" style="width: 250px;">
								<div style="float:right;width: 500px;">
									<h4>Neeraj</h4>
									Status : Booked<br>
									<a href="tel:8746084205" class="btn btn-primary" style="border-radius: 50%;"><ion-icon name="call"></ion-icon></a>
									<a href="http://maps.google.com/?q=612+6th+cross+ck+nagar+Hosa+road+bangalore+560100" target="_blank" class="btn btn-success" style="margin-left:10px"><ion-icon name="location-sharp"></ion-icon> Locate Now</a><br><br>
									<form>
										<select class="form-control" name="status">
											<option value="Picked">Picked</option>
											<option value="Completed">Completed</option>
											<option value="Canceled">Canceled</option>
										</select>
										<input type="Submit" name="statusupdate" value="Update" class="form-control btn btn-primary">
									</form>
								</div>
							</div>-->
							<h5>Recent Bookings</h5>
							<?php
		require_once "assets/php/db/config.php";
		$cond = "SELECT * FROM `bookings` WHERE `driver`='$mail'";
		$chck = mysqli_query($link, $cond);
		if ($chck) {
			while ($book = mysqli_fetch_array($chck)) {
				?>
				<div class="jumbotron <?php if($book['status'] === "Completed"){
					echo "bg-success";
				}elseif($book['status'] === "Canceled"){
					echo "bg-danger";
				}else{
					echo "bg-warning";
				} ?>" style="color:#fff">
					<img src="assets/img/favicon.png" style="width: 250px;">
					<div style="float:right;width: 500px;">
						<h4><?php echo $book['patient']; ?></h4>
						Status : <?php echo $book['status']; ?><br>
						Price : <?php echo $book['price']; ?>/-
					</div><br><br>
					
				</div>
				<?php
			}
		}
	?>
						</div>
					<?php
				}
			}else{
				?>
				<center>
	<div class="jumbotron" style="width: 60%;">
		<h5 style="text-align: center;">Become a Merchant</h5>
		<form action="" method="POST">
			<div class="form-group">
				<label for="Username">Username</label>
				<input type="text" name="Username" class="form-control" id="Username" readonly value="<?php echo $_SESSION['mail']; ?>">
			</div>
			<div class="form-group">
				<label for="vehicle">Vehicle Number</label>
				<input type="text" name="vehicle" class="form-control" id="vehicle" required onchange="validate(vehicle.value)" placeholder="Format : KA12BC1234" value="<?php echo $vehicle; ?>">
			</div>
			<div class="form-group">
				<label for="cost">Cost per hour</label>
				<input type="number" name="cost" class="form-control" id="cost" required value="<?php echo $cost; ?>">
			</div>
			<div class="form-group">
				<input type="Submit" name="apply" class="form-control btn btn-primary" value="Apply Now">
			</div>
		</form>
	</div>
</center>
	<?php
			}
		}
	?>
	<script type="text/javascript">
		var temp;
		function validate(vehicle){
			var pattern = /^[A-Z]{2}\d{2}[A-Z]{2}\d{4}$/;
			var pattern1 = /^[a-z]{2}\d{2}[a-z]{2}\d{4}$/;
			if ((vehicle.match(pattern)) || (vehicle.match(pattern1))){
				
			}
			else{
				document.getElementById('vehicle').value = "";
			}
		}
	</script>
</div>
<?php include("footer.php"); ?>