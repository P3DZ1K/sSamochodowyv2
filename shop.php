<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa z znacznikiem - Oświęcim</title>
    <style>
        /* Resetowanie stylów */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #89d2e1;
        }

        /* Styl kontenera mapy */
        .container {
            max-width: 70%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            overflow-x: auto;
        }

        /* Styl nagłówka */
        header {
            background-color: #89d2e1;
            color: #fff;
            padding: 10px;
            margin: auto;
            text-align: center;
            border-radius: 10px;
        }

        /* Styl sekcji galerii */
        #product-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .product-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer; /* Make the cursor change to indicate clickable element */
        }

        .product-image:hover {
            transform: scale(1.05);
        }
        a {
            text-decoration: none;
            color: inherit;
            transition: transform 0.3s ease;
        }
        a:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Exclusivity, Innovation, Exceptional performance</h1>
        </header>

        <main>
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
        </main>
    </div>
</body>
</html>
