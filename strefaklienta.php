<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strefa klienta</title>
    <link rel="icon" href="./images/car.png" sizes="72x72" type="image/png">
    <link rel="stylesheet" type="text/css" href="./css/strefaklienta.css">
</head>
<body>
    <div class="header-left">
        <a href="menu.php"><h2 class="logo" style ="font-size:40px;">BMW</h2></a>
        
    </div>
    <div class="header-right" id="menu">
        <div class="col-md-2">
            
            <div role="group">
                <button class="menu" mup="koszyk.php" style="margin:8px;"><img src="./images/koszyk.png" style="max-width:70px; width:100%; padding:15px;"></button>
                <button class="menu" mup="shopshop.php" style="margin:8px;"><img src="./images/sklep.png" style="max-width:70px; width:100%; padding:15px;"></button>
                <button class="menu" mup="profil.php" style="margin:8px;"><img src="./images/avatar3.png" style="max-width:70px; width:100%; padding:15px;"></button>
                <a href="logout.php"  style="margin:8px;"><img src="./images/exit.png" style="max-width:70px; width:100%; padding:15px;"></a>
            </div>
        </div>
    </div>
    <div style="clear: both"></div>
    <div class="container">
        <main>
            <div class="col-md-10" id="strona">
            <header>
            <h1>Exclusivity, Innovation, Exceptional performance</h1>
            </header>
            <section id="product-gallery">
                <?php
                // Include database connection
                require_once "connect.php";
                
                // Establish connection to the database
                $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
                
                // Check if connection is successful
                if (!$connection) {
                    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
                }

                // Query to retrieve image data
                $result = mysqli_query($connection, "SELECT zdjecie_dane_samochodu FROM dane_samochodu ORDER BY id_dane_samochodu DESC"); 
                
                // Loop through each image data
                while ($data = mysqli_fetch_assoc($result)): ?>
                    <div class="col-sm-3 category">
                        <!-- Link to product.php with image as parameter -->
                        <a href="produkt.php?image=<?php echo $data['zdjecie_dane_samochodu']; ?>">
                            <img class="product-image" src="<?php echo $data['zdjecie_dane_samochodu']; ?>" alt="Car Image">
                        </a>
                    </div>
                <?php endwhile;

                // Close database connection
                mysqli_close($connection);
                ?>
            </section>
            </div>
        </main>
    </div>

    <script src="./js/jq.js"></script>
    <script src="./js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

