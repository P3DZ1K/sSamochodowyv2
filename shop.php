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
        }

        .product-image:hover {
            transform: scale(1.05);
        }
        a {
            text-decoration: none;
            color: inherit;
            transition: transform 0.3s ease;
        }
        a:hover{
            transform: scale(1.05);
        }


       

    </style>
</head>
<body>
    <div class="container">
        <a href="menu.php" style="text-decoration: none;"><span>X</span></a>

        <header>
            <h1>Exclusivity, Innovation, Exceptional performance</h1>
        </header>

        <main>
            <section id="product-gallery">
                <!-- Tutaj będzie galeria zdjęć produktów -->
            </section>
        </main>
    </div>

    <script>
       document.addEventListener('DOMContentLoaded', function() {
    const productGallery = document.getElementById('product-gallery');

    // Tablica obiektów zawierających ścieżki obrazków i odnośniki
    const imageLinks = [
        {
            imageUrl: './images/samochód1.jpg',
            linkUrl: 'produkt.php',
            caption: '30 000$ ~ 50 000$'
        },
        {
            imageUrl: './images/samochód2.jfif',
            linkUrl: 'link_do_strony_2',
            caption: 'Opis samochodu 2'
        },
        {
            imageUrl: './images/samochód3.jfif',
            linkUrl: 'link_do_strony_3',
            caption: 'Opis samochodu 3'
        },
        {
            imageUrl: './images/samochód1.jpg',
            linkUrl: 'menu.php',
            caption: '30 000$ ~ 50 000$'
        },
        {
            imageUrl: './images/samochód2.jfif',
            linkUrl: 'link_do_strony_2',
            caption: 'Opis samochodu 2'
        },
        {
            imageUrl: './images/samochód3.jfif',
            linkUrl: 'link_do_strony_3',
            caption: 'Opis samochodu 3'
        }
        // Dodaj więcej obiektów dla dodatkowych obrazków
    ];

    // Generowanie elementów dla każdego obrazka z odnośnikiem
    imageLinks.forEach(imageInfo => {
        const a = document.createElement('a');
        a.href = imageInfo.linkUrl;
        a.target = '_blank'; // Otwórz w nowej karcie

        const div = document.createElement('div');

        const img = document.createElement('img');
        img.src = imageInfo.imageUrl;
        img.alt = 'Produkt';
        img.classList.add('product-image');

        const caption = document.createElement('p');
        caption.textContent = imageInfo.caption;
        caption.style.textAlign = 'center'; // Wyśrodkuj tekst
        caption.style.marginTop = '10px'; // Dodaj odstęp od obrazka

        div.appendChild(img); // Dodaj obrazek do div
        div.appendChild(caption); // Dodaj ustalony tekst do div

        a.appendChild(div); // Dodaj div do odnośnika
        productGallery.appendChild(a); // Dodaj odnośnik do galerii
    });
});

    </script>
</body>
</html>
