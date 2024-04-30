

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
	<title>Pierwszy projekt bazy danych -sklep-</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="./css/menu.css">-->
	<script src="./js/bootstrap.min.js"></script>
    <script src="./js/jq.js"></script>
    <script src="./js/app.js"></script>
    <style>
		@import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');
*
{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
header
{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  padding: 40px 100px;
  z-index: 1000;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
header .logo
{
  color: #fff;
  text-transform: uppercase;
  cursor: pointer;
}
.toggle
{
  position: relative;
  width: 60px;
  height: 60px;
  background: url(https://i.ibb.co/HrfVRcx/menu.png);
  background-repeat: no-repeat;
  background-size: 30px;
  background-position: center;
  cursor: pointer;
}
.toggle.active
{
  background: url(https://i.ibb.co/rt3HybH/close.png);
  background-repeat: no-repeat;
  background-size: 25px;
  background-position: center;
  cursor: pointer;
}
.showcase
{
  position: absolute;
  right: 0;
  width: 100%;
  min-height: 100vh;
  padding: 100px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #111;
  transition: 0.5s;
  z-index: 2;
}
.showcase.active
{
  right: 300px;
}

.showcase video
{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0.8;
}
.overlay
{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #03a9f4;
  mix-blend-mode: overlay;
}
.text
{
  position: relative;
  z-index: 10;
}

.text h2
{
  font-size: 5em;
  font-weight: 800;
  color: #fff;
  line-height: 1em;
  text-transform: uppercase;
}
.text h3
{
  font-size: 4em;
  font-weight: 700;
  color: #fff;
  line-height: 1em;
  text-transform: uppercase;
}
.text p
{
  font-size: 1.1em;
  color: #fff;
  margin: 20px 0;
  font-weight: 400;
  max-width: 700px;
}
.text a
{
  display: inline-block;
  font-size: 1em;
  background: #fff;
  padding: 10px 30px;
  text-transform: uppercase;
  text-decoration: none;
  font-weight: 500;
  margin-top: 10px;
  color: #111;
  letter-spacing: 2px;
  transition: 0.2s;
}
.text a:hover
{
  letter-spacing: 6px;
}
.social
{
  position: absolute;
  z-index: 10;
  bottom: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.social li
{
  list-style: none;
}
.social li a
{
  display: inline-block;
  margin-right: 20px;
  filter: invert(1);
  transform: scale(0.5);
  transition: 0.5s;
}
.social li a:hover
{
  transform: scale(0.5) translateY(-15px);
}
.menu
{
  position: absolute;
  top: 0;
  right: 0;
  width: 300px;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column
  
  
}

.menu ul
{
  position: relative;
}
.menu ul li
{
  list-style: none;
}
.menu ul li a
{
  text-decoration: none;
  font-size: 24px;
  color: #111;
}
.menu ul li a:hover
{
  color: #03a9f4; 
}

@media (max-width: 991px)
{
  .showcase,
  .showcase header
  {
    padding: 40px;
  }
  .text h2
  {
    font-size: 3em;
  }
  .text h3
  {
    font-size: 2em;
  }
}

/* Style dla przycisku */
.dropbtn {
  background-color: #3498db;
  color: white;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Kontener dla elementów rozwijanych (lista) */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Zawartość listy rozwijanej (ukryta początkowo) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Opcje w liście rozwijanej */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Opcje w liście rozwijanej po najechaniu myszką */
.dropdown-content a:hover {
  background-color: #f1f1f1;
}

/* Pokazanie listy rozwijanej po kliknięciu */
.show {
  display: block;
}

#prawemenu{
  float: left;
}
#lewemenu{
  float: left;
  clear: both;
}

	</style>
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
      <a href="#">Explore</a>
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
    echo "<p>Witaj ".$_SESSION['imie_klienta'];
    ?> 
  </div>
</div>


<?php
    echo "<h1>Witaj ".$_SESSION['imie_klienta']."</h1>";
    ?>


    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="profil.php">Profile</a></li>
      <li><a href="#">Destination</a></li>
      <li><a href="#">Blog</a></li>
      <li><a href="#">Contact</a></li>
      <li><?php
    echo '<a href="logout.php" style="text-decoration: none;">Wyloguj się!</a>';
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