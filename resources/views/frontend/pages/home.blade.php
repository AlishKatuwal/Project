<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepal wonders</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <script defer src="{{ asset('frontend/script.js') }}"></script>
</head>

<body>
    <!-- Header starting -->
    <header>
        <div id="menu-bar" class="fas fa-bars"></div>
        <img src="{{ asset('frontend/logo.jpg') }}" class="logo">
        <nav class="navbar navbar-active">
            <a href="#" class="link">Home</a>
            <a href="#contact" class="link">Contact</a>
            <a href="#gallery" class="link">Gallery</a>
            <a href="#packages" class="link">Pacakges</a>
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
    <!-- ends -->
    <!--form-->
    <div class="login-form-container">
        <i class="fas fa-times" id="form-close"></i>

        <form action="">
            <h3>Login</h3>
            <input type="email" class="box" placeholder="enter your email">
            <input type="password" class="box" placeholder="enter your password">
            <input type="submit" value="login now" class="btn">
            <input type="checkbox" id="remember">
            <label for="remember">Remember me</label>
            <p>Forget password? <a href="#">click here</a></p>
            <p>Don't have and account? <a href="#">Create one</a></p>
        </form>
    </div>
    <!-- //home section -->
    <section class="home" id="home">
        <div class="content">
            <h3>Nepal is beautiful</h3>
            <p> discover wonders of nepal with us</p>
            <a href="#" class="btn">Discover more</a>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="{{ asset('frontend/The Soaltee Kathmandu_Five_Nepal') }}"></span>
            <span class="vid-btn" data-src="{{ asset('frontend/The Soaltee Kathmandu_Five_Nepal') }}"></span>
            <span class="vid-btn" data-src="{{ asset('frontend/The Soaltee Kathmandu_Five_Nepal') }}"></span>
            <span class="vid-btn" data-src="{{ asset('frontend/The Soaltee Kathmandu_Five_Nepal') }}"></span>

        </div>

        <div class="video-container">
            <video src="{{ asset('frontend/The Soaltee Kathmandu _ Five Star Hotel _ Nepal.mp4') }}" id="video-slider"
                loop autoplay muted></video>
        </div>
    </section>
    <!-- home section ends -->
    <!-- book section starts -->
    <section class="book" id="book">
        <h1 class="heading">
            <span>B</span>
            <span>O</span>
            <span>O</span>
            <span>K</span>
            <span class="space"></span>
            <span>N</span>
            <span>O</span>
            <span>W</span>
        </h1>
        <div class="row">
            <div class="image">
                <img src="" alt="">
            </div>
            <form action="">
                <div class="inputBox">
                    <h3>where to?</h3>
                    <input type="text" placeholder="place">
                </div>
                <div class="inputBox">
                    <h3>How many?</h3>
                    <input type="number" placeholder="Number of Guests">
                </div>
                <div class="inputBox">
                    <h3>Arrivals</h3>
                    <input type="date">
                </div>
                <div class="inputBox">
                    <h3>Leaving</h3>
                    <input type="date">
                </div>
                <input type="submit" class="btn" value="book now">
            </form>
        </div>
    </section>
    <!-- Packages Section -->
    <section class="packages" id="packages">
        <h1 style="margin-block:1rem ;" class="heading">
            <span>H</span>
            <span>O</span>
            <span>T</span>
            <span>E</span>
            <span>L</span>
            <span>S</span>
        </h1>

        <div class="box-container">
            @foreach ($hotels as $item)
                <div class="box">
                    <img src="{{ asset($item->image) }}" alt="">
                    <div class="content">
                        <h3></i>{{ $item->name }}</i></h3>
                        <p>{{ $item->description }}</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <a href="#" class="btn">View</a>
                    </div>
                </div>    
            @endforeach
        </div>
    </section>
    {{-- Packages --}}
    <section class="packages" id="packages">
        <h1 class="heading">
            <span>P</span>
            <span>A</span>
            <span>C</span>
            <span>K</span>
            <span>A</span>
            <span>G</span>
            <span>E</span>
            <span>S</span>
        </h1>
        <div class="container">
            <div class="hotel">
              <div class="hotel-details">
                <h2>Hotel A</h2>
                <p>Enjoy a luxurious stay at Hotel A and avail the following offer:</p>
                <ul>
                  <li><span class="offer">50% off</span> on all room types</li>
                  <li>Complimentary breakfast included</li>
                  <li>Access to gym and spa facilities</li>
                </ul>
                <button class="view-button">View Hotel</button>
              </div>
              <img class="hotel-image" src="https://via.placeholder.com/200" alt="Hotel A Image">
            </div>
            <div class="hotel">
              <div class="hotel-details">
                <h2>Hotel B</h2>
                <p>Experience the beauty of Hotel B with the following special offer:</p>
                <ul>
                  <li><span class="offer">Stay 3 nights, pay for 2</span></li>
                  <li>Free airport shuttle service</li>
                  <li>Complimentary welcome drink</li>
                </ul>
                <button class="view-button">View Hotel</button>
              </div>
              <img class="hotel-image" src="https://via.placeholder.com/200" alt="Hotel B Image">
            </div>
            <div class="hotel">
              <div class="hotel-details">
                <h2>Hotel C</h2>
                <p>Indulge in comfort at Hotel C and enjoy the exclusive offer:</p>
                <ul>
                  <li><span class="offer">20% off</span> on suite bookings</li>
                  <li>Complimentary Wi-Fi throughout the stay</li>
                  <li>Access to rooftop pool and bar</li>
                </ul>
                <button class="view-button">View Hotel</button>
              </div>
              <img class="hotel-image" src="https://via.placeholder.com/200" alt="Hotel C Image">
            </div>
          </div>
    </section>
    {{-- Packages End--}}
    {{-- Destination --}}
    <section class="packages" id="packages">
        <h1 class="heading">
            <span>D</span>
            <span>E</span>
            <span>S</span>
            <span>T</span>
            <span>I</span>
            <span>N</span>
            <span>A</span>
            <span>T</span>
            <span>I</span>
            <span>O</span>
            <span>N</span>
        </h1>
        <div class="box-container">
            <div class="box">
                <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/454287263.jpg?k=f32505ed61e91dcea0f896e8c2dc8a6b20d19bf8a3846155d1e33c6fcd529db4&o=&hp=1"
                    alt="">
                <div class="content">
                    <h3></i>Soaltee Hotel</i></h3>
                    <p>Discover the beauty of Nepal with us. Nepal is one of the most beautiful countries in the world
                        hahaha you think.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price">$90 <span>$120</span></div>
                    <a href="#" class="btn">Book Now</a>
                </div>
            </div>
            </div>
        {{-- Destination Ends --}}
    <section class="services" id="services">
        <h1 class="heading">
            <span>S</span>
            <span>E</span>
            <span>R</span>
            <span>V</span>
            <span>I</span>
            <span>C</span>
            <span>E</span>
            <span>S</span>
        </h1>
        <div class="box-container">
            <div class="box">
                <i class="fas fa-hotel"></i>
                <h3>Hotels</h3>
                <p>Hotels in Nepal are a popular destination for travelers.</p>
            </div>
            <div class="box">
                <i class="fas fa-utensils"></i>
                <h3>Food</h3>
                <p>Food in Nepal is a popular destination for travelers.</p>
            </div>
            <div class="box">
                <i class="fas fa-bullhorn"></i>
                <h3>Safety Guide</h3>
                <p>Safety Guide needs to be updated</p>
            </div>
            <div class="box">
                <i class="fas fa-globe-asia"></i>
                <h3>Travel Guide</h3>
                <p>Travel Guide needs to be updated</p>
            </div>
            <div class="box">
                <i class="fas fa-hiking"></i>
                <h3>Hiking</h3>
                <p>Hiking in Nepal is a popular destination for travelers.</p>
            </div>
            <div class="box">
                <i class="fas fa-plane"></i>
                <h3>Travel</h3>
                <p>Travel in Nepal is a popular destination for travelers.</p>
            </div>
        </div>
    </section>
    <!-- Service Section Ends -->
    <!-- Gallery Section Starts -->
    <section class="gallery" id="gallery">
        <h1 class="heading">
            <span>G</span>
            <span>A</span>
            <span>L</span>
            <span>L</span>
            <span>E</span>
            <span>R</span>
            <span>Y</span>
        </h1>
        <div class="box-container">
            <div class="box">
                <img src="{{ asset('frontend/hotels/hotel-ichchha.jpg') }}" alt="">
                <div class="content">
                    <h3>Amazing Places</h3>
                    <p>Discover the beauty of Nepal with us. Nepal is one of the most beautiful countries in the world
                        hahaha you think.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('frontend/hotels/454287263.jpg') }}" alt="">
                <div class="content">
                    <h3>Amazing Places</h3>
                    <p>Discover the beauty of Nepal with us. Nepal is one of the most beautiful countries in the world
                        hahaha you think.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('frontend/hotels/hotel-exterior.jpg') }}" alt="">
                <div class="content">
                    <h3>Amazing Places</h3>
                    <p>Discover the beauty of Nepal with us. Nepal is one of the most beautiful countries in the world
                        hahaha you think.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('frontend/hotels/barahi-jungle-lodge.jpg') }}" alt="">
                <div class="content">
                    <h3>Amazing Places</h3>
                    <p>Discover the beauty of Nepal with us. Nepal is one of the most beautiful countries in the world
                        hahaha you think.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
    </section>
    <!-- Gallery Section Ends -->
    <!-- Review Section Starts -->
    <section class="review" id="review">
        <h1 class="heading">
            <span>R</span>
            <span>E</span>
            <span>V</span>
            <span>I</span>
            <span>E</span>
            <span>W</span>
        </h1>
        <div class="swiper-container review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="box">
                        <img src="{{ asset('frontend/hotels/review1.jpg') }}" alt="">
                        <h3>John Deo</h3>
                        <p>Discover the beauty of Nepal with us. Nepal is one of the most beautiful countries in the
                            world
                            hahaha you think.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- contact section -->
    <section class="contact" id="contact">
        <h1 class="heading">
            <span>C</span>
            <span>O</span>
            <span>N</span>
            <span>T</span>
            <span>A</span>
            <span>C</span>
            <span>T</span>
        </h1>
        <div class="row">
            <div class="image">
                <img src="{{ asset('frontend/gh2rzjwo_4x.jpg') }}" alt="">
            </div>
            <form action="">
                <div class="inputBox">
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email">
                </div>
                <div class="inputBox">
                    <input type="number" placeholder="Number">
                    <input type="text" placeholder="Subject">
                </div>
                <textarea placeholder="Message" name="" id="" cols="30" rows="10"></textarea>
                <input type="submit" class="btn" value="send message">
            </form>
        </div>
    </section>
    <!-- footer section -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>About Us</h3>
                <p>Discover the beauty of Nepal with us. Nepal is one of the most beautiful countries in the
                    world</p>
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
    </section>
    <script defer src="{{ asset('frontend/script.js') }}"></script>
</body>

</html>
