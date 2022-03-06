<?php
	$title = "Bookings";
	session_start();
	if (!$_SESSION['Arogyvaahan'] === true) {
		header("location:login.php");
	}
	include("header.php");
?>
<div class="main-content">
	<div class="jumbotron">
		<h5>Current Booking</h5>
		<?php
			$mail = $_SESSION['mail'];
			require_once "assets/php/db/config.php";
			$cond = "SELECT * FROM `bookings` WHERE `patient`='$mail'";
			$chck = mysqli_query($link, $cond);
			if ($chck) {
				while ($book = mysqli_fetch_array($chck)) {
					if ($book['status'] != "Completed") {
						$drivermail = $book['driver'];
						$cond = "SELECT * FROM `user` WHERE `Mail` = '$drivermail'";
						$driver = mysqli_fetch_array(mysqli_query($link, $cond));
						$cond = "SELECT * FROM `drivers` WHERE `Mail`='$drivermail'";
						$driverdet = mysqli_fetch_array(mysqli_query($link, $cond));
						?>
						<div class="jumbotron bg-light text-dark" style="color:#fff">
							<img src="assets/img/favicon.png" style="width: 250px;">
							<div style="float:right;width: 500px;">
								<h5>Driver : <?php echo $driver['Name']; ?></h5>
								Vehicle Number : <?php echo $driverdet['Vehicle']; ?><br><br>
								<a href="tel:<?php echo $driver['Mobile']; ?>" class="btn btn-primary" style="border-radius: 50%;"><ion-icon name="call"></ion-icon></a><br><br>
								<button onclick="showstatus();" class="btn btn-primary" id="showbtn">Show Status</button>
								
							</div>
							<ol class="progtrckr" data-progtrckr-steps="5" id="statuscontainer" style="display:none;">
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
		
		<h5>Recent Bookings</h5>
	<?php
		require_once "assets/php/db/config.php";
		$cond = "SELECT * FROM `bookings` WHERE `patient`='$mail'";
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
						<h4><?php echo $_SESSION['name']; ?></h4>
						Status : <?php echo $book['status']; ?><br>
						Price : 590/-
					</div>
				</div>
				<?php
			}
		}
	?>
	</div>
</div>
<?php include("footer.php"); ?>