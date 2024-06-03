<?php
    require_once "connect.php";
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Menu-</title>
  <link rel="icon" href="./images/car.png" sizes="72x72" type="image/png">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="./css/menu.css">-->
	<script src="./js/bootstrap.min.js"></script>
    <script src="./js/jq.js"></script>
    <script src="./js/app.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/menu.css">	
	</head>
	
	<body>
 <!-- Video Source -->
  <!-- https://www.pexels.com/video/aerial-view-of-beautiful-resort-2169880/ -->
  <section class="showcase">
    <header>
      <h2 class="logo">BMW</h2>
      <div class="toggle"></div>
    </header>
    <video src="./images/7441154-hd_1920_1080_25fps.mp4" muted loop autoplay></video>
    <div class="overlay"></div>
    <div class="text">
      <h2>Never Stop To </h2> 
      <h3>Exploring The World</h3>
      <p>The BMW XD surprises with its blend of elegance and reliability. The collaboration between the legendary BMW brand
         and the renowned off-road vehicle manufacturer brings an innovative vehicle that conquers both the city and off-road terrain.
          The new model combines the distinctive BMW style with the reliability and versatility of Jeep.</p>
          <a href="http://localhost/Ssamochodowy/sSamochodowy/sSamochodowyv2/produkt.php?image=./images/samoch%C3%B3d4.jfif">View product</a>
    </div>
    <ul class="social">
      <li><a href="#"><img src="https://i.ibb.co/x7P24fL/facebook.png"></a></li>
      <li><a href="#"><img src="https://i.ibb.co/Wnxq2Nq/twitter.png"></a></li>
      <li><a href="#"><img src="https://i.ibb.co/ySwtH4B/instagram.png"></a></li>
    </ul>
  </section>
  <div class="menu">

  <div class="dropdown" onmouseover="showDropdown()" onmouseout="hideDropdown()" style="justify-content: flex-start;">
  
  <div id="lewemenu" class="dropdown-content">
  <?php
    echo "<p>Hi ".$_SESSION['imie_klienta'];
    ?> 
  </div>
</div>


<?php
    echo "<h1>Hi ".$_SESSION['imie_klienta']."</h1>";
    ?>


    <ul>
     <br><br>
      <li><a href="strefaklienta.php">Customer zone</a></li>
      <br>
      <li><?php
    echo '<a href="logout.php" style="text-decoration: none;">Log out!</a>';
    ?></li>
    </ul>
  </div>
  <script>
	const menuToggle = document.querySelector('.toggle');
      const showcase = document.querySelector('.showcase');

      menuToggle.addEventListener('click', () => {
        menuToggle.classList.toggle('active');
        showcase.classList.toggle('active');
      })
	  </script>
	  
</body>
  </html>