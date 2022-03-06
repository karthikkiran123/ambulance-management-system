<?php
	$title = "Home";
	include("header.php");
?>
<div class="main-content">
	<?php
		if ($_GET['id'] === "signedout") {
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your Account has been Signed out Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

		}
		if (isset($_POST['book'])) {
			session_start();
			if (!$_SESSION['Arogyvaahan'] === true) {
				header("location:login.php");
			}else{
				$driver = $_POST['driver'];
				$patient = $_SESSION['mail'];
				$add = $_SESSION['Address'];
				$price = $_POST['price'];
				if ($add === "") {
					header("location:profile.php");
				}else{
					require_once "assets/php/db/config.php";
					$bookcond = "SELECT * FROM `bookings` WHERE `patient` = '$patient'";
					$chck1 = mysqli_query($link, $bookcond);
					if (mysqli_num_rows($chck1)>0) {
						$booked = false;
						while ($book = mysqli_fetch_array($chck1)) {
							if (!($book['status'] === "Completed")) {
								$booked = false;
								break;
							}else{
								$booked = true;
							}
						}
					}else{
						$booked = true;
					}
					if ($booked) {
						$cond = "INSERT INTO `bookings`(`patient`, `driver`, `address`, `price`, `status`) VALUES ('$patient','$driver','$add','$price','Booked')";
						$chck = mysqli_query($link, $cond);
						if ($chck) {
							echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Ambulance Booked Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
						}else{
							echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your Account has been Signed out Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
						}
					}else{
						echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Warning!</strong> You have Already booked an Ambulance.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
					}
				}
			}
		}
	?><br>
	<center>

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="width: 800px;height: 400px; overflow: hidden;">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/img1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block" style="margin-bottom: 200px; background-color: rgba(0, 0, 0, 0.6);">
        <h5>Our Mission</h5>
        <p>is to provide the best Ambulance Services to everyone.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/img2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block" style="margin-bottom: 330px; background-color: rgba(0, 0, 0, 0.6);">
        <h5>Our Vision</h5>
        <p>Making it a easier way to book Ambulance.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/img3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block" style="margin-bottom: 170px; background-color: rgba(0, 0, 0, 0.6);">
        <h5>Our Drivers</h5>
        <p>Are well trained and skilled drivers.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>
</center>
<div class="container">
	<br><br>
	<h4 id="about">ABOUT</h4>
<p>
As we listened the word Ambulance the first thing comes to mind is the rescue process. In the modern era where the population is increasing day by day, people feel uncomfortable and frightened due to danger aspects of road accidents, some known and unknown disease which required the quickly treatment but unfortunately due to couple of minute delay some important lives are lost. Therefore, to give the quick first-aid to the patient rescue system is maintained and trained well for the betterment of human beings and to avoid the deaths which occur due to delay in rescue process. This project is aimed to develop Public Health Services. The system will revolutionize the delivery of emergency medical services. This project deals with development of Health Services Booking System. The system will providing ambulances and staff to deal with medical emergencies services. This system can be used as an application for the Medical service centers to manage the ambulance information as well as the immediate responses for needed people. User will properly sign up in the application with his mobile and otp number for authentication so that irrelevant person will not use this application without any reason. In case of emergency he will request for an ambulance made from his phone that will be directly updated on database will automatically check his request, calculate coordinates and will check the availability of ambulance in very nearly station, if there is no ambulance available in that station, then server will check up next near station and response back to the user that request is in progress and how much time it takes to reach, and from which station. All this process and management will be handled virtually. The whole history will maintain on server side. When task is done then status and number of ambulance will be updated on sever.
</p>
</div>
</div>
<?php include("footer.php"); ?>