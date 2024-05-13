<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nazwa Twojego Produktu</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #89d2e1;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            
        }
        h1 {
            font-size: 32px;
            color: #333;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
        }
        
        .product-image {
            width: 40%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .gallery-container {
            width: 40%;
            max-width: 800px;
            float:left;
            padding:20px;
            
        }

        .gallery {
            position: relative;
            text-align: center;
        }

        .gallery-image {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navigation {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .prev-btn,
        .next-btn {
            font-size: 24px;
            padding: 10px 20px;
            border: none;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .prev-btn:hover,
        .next-btn:hover {
            background-color: rgba(255, 255, 255, 0.8);
        }
        .bottomside{
            clear: both;
        }
       .rightside{
        
       }
    </style>
</head>
<body>

<div class="container">
    <h1>Nazwa Twojego Produktu</h1>

    <div class="gallery-container">
    <div class="gallery">
        <img src="./images/samochód1.jpg" alt="Zdjęcie 1" class="gallery-image">
        <div class="navigation">
            <button class="prev-btn" onclick="
                const galleryImage = document.querySelector('.gallery-image');
                const imagePaths = ['./images/samochód1.jpg'];
                let currentImageIndex = imagePaths.indexOf(galleryImage.src);
                currentImageIndex = (currentImageIndex - 1 + imagePaths.length) % imagePaths.length;
                galleryImage.src = imagePaths[currentImageIndex];
            ">&lt;</button>
            <button class="next-btn" onclick="
                const galleryImage = document.querySelector('.gallery-image');
                const imagePaths = ['./images/samochód1.1.jpg'];
                let currentImageIndex = imagePaths.indexOf(galleryImage.src);
                currentImageIndex = (currentImageIndex + 1) % imagePaths.length;
                galleryImage.src = imagePaths[currentImageIndex];
            ">&gt;</button>
        </div>
    </div>
</div>
<div class="rightside">
<h2>Cena: 100,00 zł</h2> 
<p>To jest opis Twojego produktu. Możesz tutaj opisać jego cechy, zalety,
 funkcje i inne istotne informacje. Pamiętaj, aby podać także ceny i szczegóły dotyczące zakupu.</p>
</div>
<div class="bottomside">
    <p>
        <strong>Dostępność:</strong> W magazynie<br>
        <strong>Kolor:</strong> Czarny<br>
        <strong>Rozmiar:</strong> M, L, XL
    </p>
</div>
    <button>Dodaj do koszyka</button>
</div>

</body>
</html>
