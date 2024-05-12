<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa z znacznikiem - Oświęcim</title>
    <style>
        /* Styl dla kontenera mapy */
        body {
         font-family: Arial, sans-serif;
         margin: 0;
         padding: 0;
         background-color: #89d2e1;
        }
        #map {
            height: 400px; /* Wysokość mapy */
            width: 100%; /* Szerokość mapy */
        }
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





    </style>
</head>
<body>
    <div class="container">
    <a href="menu.php" style="text-decoration: none;"><span>X</span></a>

    <h1>Mapa z znacznikiem - Oświęcim</h1>

    <!-- Kontener mapy -->
    <div id="map"></div>

    <script>
        // Funkcja inicjalizująca mapę
        function initMap() {
            // Współrzędne dla Oświęcimia
            var oswiecim = { lat: 50.0349, lng: 19.2137 };

            // Tworzenie nowej mapy w kontenerze o id "map"
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12, // Poziom przybliżenia mapy
                center: oswiecim // Początkowe centrowanie mapy na Oświęcimiu
            });

            // Dodawanie znacznika na mapie dla Oświęcimia
            var marker = new google.maps.Marker({
                position: oswiecim,
                map: map,
                title: 'Oświęcim' // Tekst wyświetlany po najechaniu na znacznik
            });
        }
    </script>

    <!-- Ładowanie Google Maps API -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV8lj5goLy7PkrN8MXE15lS56YAbwWdnA">
    </script>

    </div> 
</body>
</html>