<header>
            <h1>Exclusivity, Innovation, Exceptional performance</h1>
        </header>
<section id="product-gallery">
                <?php
                require_once "connect.php";
                $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
                if (!$connection) {
                    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
                }
                $result = mysqli_query($connection, "SELECT zdjecie_dane_samochodu FROM dane_samochodu ORDER BY id_dane_samochodu DESC"); 
                while ($data = mysqli_fetch_assoc($result)): ?>
                    <div class="col-sm-3 category">
                        <a href="produkt.php?image=<?php echo $data['zdjecie_dane_samochodu']; ?>">
                            <img class="product-image" src="<?php echo $data['zdjecie_dane_samochodu']; ?>" alt="Car Image">
                        </a>
                    </div>
                <?php endwhile;
                mysqli_close($connection);
                ?>
            </section>