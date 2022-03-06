<!DOCTYPE html>
<html>
<head>
  <?php session_start(); 
    if (!($_SESSION['Acctype'] === 'Admin')) {
      header("location:/ambulance");
    }
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo "Ambulance | ".$title; ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="icon" href="../assets/img/favicon.png">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
  <div style="height:150px; background-color: #fff;" class="text-dark">
    <div class="container" style="padding: 50px 0 0 0;">
    <a href="/ambulance" style="text-decoration: none;" class="text-dark"><img src="../assets/img/logo.jpeg" style="margin-top: -40px;" width="150px"></a>
    <div style="margin-left:300px;margin-top: -80px;">
      <ion-icon name="mail-sharp" style="font-size: 30px;"></ion-icon><div style="margin-left: 40px;margin-top: -40px;">
      <b>For Support Mail Us:</b><br><a href="mailto:basavaraj.rakshith17@gmail.com" class="text-dark">basavaraj.rakshith17@gmail.com</a></div>
      
    </div>
    <div style="margin-left:650px;margin-top: -45px;"><ion-icon name="call-sharp" style="font-size: 30px;"></ion-icon><div style="margin-left: 40px;margin-top: -40px;"><b>Service HelpLine Call Us:</b><br><a href="tel:7975145901" class="text-dark">+91 79751 45901</a></div></div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav" style="width:100%;margin-left:170px">
      <li class="nav-item <?php if($title === "Admin Dashboard"){echo "active";} ?>">
        <a class="nav-link" href="/ambulance/admin" style="color:#fff" onmouseover="this.style.color='#ccc'" onmouseout="this.style.color='#fff'">Dashboard</a>
      </li>
      <li class="nav-item <?php if($title === "Admin Bookings"){echo "active";} ?>">
        <a class="nav-link" href="booking.php" style="color:#fff" onmouseover="this.style.color='#ccc'" onmouseout="this.style.color='#fff'">Bookings</a>
      </li>
      <li class="nav-item <?php if($title === "Scheduled Ambulance"){echo "active";} ?>">
        <a class="nav-link" href="scheduled.php" style="color:#fff" onmouseover="this.style.color='#ccc'" onmouseout="this.style.color='#fff'">Scheduled</a>
      </li>
      <li class="nav-item <?php if($title === "Admin Merchants"){echo "active";} ?>">
        <a class="nav-link" href="merchant.php" style="color:#fff" onmouseover="this.style.color='#ccc'" onmouseout="this.style.color='#fff'">Merchants</a>
      </li>
      <?php
        if (!$_SESSION['Arogyvaahan'] === true) {
          ?>
            <li class="nav-item <?php if($title === "Login"){echo "active";} ?>" style="margin-left: 44%;" id="logbtn">
              <a class="nav-link" href="../login.php">Login / Register</a>
            </li>
          <?php
        }else{
      ?>
      <li class="nav-item dropdown <?php if($title === "Profile"){echo "active";} ?>" style="margin-left: 44%;" id="logbtn">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false" style="color:#fff" onmouseover="this.style.color='#ccc'" onmouseout="this.style.color='#fff'">
          <ion-icon name="person-circle" style="font-size: 20px; margin: 2px 0 0 -25px;position: absolute;"></ion-icon><?php echo $_SESSION['name']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="profile.php">My Profile</a>
          <a class="dropdown-item" href="../signout.php" style="color:red;">Signout</a>
        </div>
      </li>
    <?php } ?>
    </ul>
  </div>
  
</nav>