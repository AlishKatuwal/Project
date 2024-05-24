<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        .gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 5px;
           
        }
        .gallery-item img {
            width:90%;
            height: auto;
            object-fit: cover;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            margin-left: 20px;
           
        }
        .gallery-container {
            margin-top: 70px; 
        }
    </style>
</head>
<body>
    <header>
        <div id="menu-bar" class="fas fa-bars"></div>
        <img src="{{ asset('frontend/logo.jpg') }}" class="logo">
        <nav class="navbar navbar-active">
            <a href="#" class="link">Home</a>
            <a href="#contact" class="link">Contact</a>
            <a href="#gallery" class="link">Gallery</a>
            <a href="#packages" class="link">Packages</a>
        </nav>
        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <i class="fas fa-user" id="login-btn"></i>
        </div>
        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search here">
            <label for="search-bar" class="fas fa-search"></label>
        </form>
    </header>
    <div class="gallery-container">
        <h1 class="heading">
            <span>G</span>
            <span>A</span>
            <span>L</span>
            <span>L</span>
            <span>E</span>
            <span>R</span>
            <span>Y</span>
        </h1>
        <div class="gallery">
            <div class="gallery-item">
                <img src="../../../../public/frontend/hotels/Aloft Hotel.jpg" alt="Image 1">
            </div>
            <div class="gallery-item">
                <img src="../../../../public/frontend/hotels/454287263.jpg" alt="Image 2">
            </div>
            <div class="gallery-item">
                <img src="../../../../public/frontend/hotels/Aloft Hotel.jpg" alt="Image 1">
            </div>
            <div class="gallery-item">
                <img src="../../../../public/frontend/hotels/annapurna-range.jpg" alt="Image 2">
            </div>
            <div class="gallery-item">
                <img src="../../../../public/frontend/hotels/Raddison Hotel.png" alt="Image 1">
            </div>
            <div class="gallery-item">
                <img src="../../../../public/frontend/hotels/Oriental.jpg" alt="Image 2">
            </div>
            <div class="gallery-item">
                <img src="../../../../public/frontend/hotels/Hotel the Kingsbury.jpg" alt="Image 1">
            </div>
            <div class="gallery-item">
                <img src="../../../../public/frontend/hotels/Soaltee Nepalgunj.jpg" alt="Image 2">
            </div>
        </div>
    </div>
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>About Us</h3>
                <p>Discover the beauty of Nepal with us. Nepal is one of the most beautiful countries in the world</p>
            </div>
            <div class="box">
                <h3>Quick Links</h3>
                <a href="#">Home</a>
                <a href="#">Book</a>
                <a href="#">Packages</a>
                <a href="#">Gallery</a>
                <a href="#">Review</a>
                <a href="#">Contact</a>
            </div>
            <div class="box">
                <h3>Follow Us</h3>
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
            </div>
        </div>
    </section>
</body>
</html>