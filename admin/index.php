<?php
	$title = "Admin Dashboard";
	include("header.php");
?>
<div class="main-content" style="min-height: calc(100vh - 57px);"><br>
	<center>
	<h5>Messages</h5>
	<?php
		require_once "../assets/php/db/config.php";
		$cmd = "SELECT * FROM `message`";
		$chck = mysqli_query($link, $cmd);
		if ($chck) {
			if (mysqli_num_rows($chck)>0) {
				while ($data = mysqli_fetch_array($chck)) {
					?>
					
					<div class="jumbotron" style="width:40%">
						<h5><?php echo $data['Name']; ?></h5>
						<p><?php echo $data['Message']; ?></p><br>
						<a href="mailto:<?php echo $data['Mail'] ?>" class="btn btn-primary">Reply Now</a>
					</div>
					<?php
				}
			}else{
				echo "No Feedbacks/Messages";
			}
		}
	?>
	</center>
</div>
<?php include("footer.php"); ?>