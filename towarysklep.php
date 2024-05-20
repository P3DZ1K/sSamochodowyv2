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