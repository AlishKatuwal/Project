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
            <span style="color: white; font-size: 16px">{{ Auth::check() ? Auth::user()->name : '' }}</span>
        </div>
        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search here">
            <label for="search-bar" class="fas fa-search"></label>
        </form>
    </header>
    <!-- ends -->
    <!--form-->
    @if (!Auth::check())
        <div class="login-form-container">
            <i class="fas fa-times" id="form-close"></i>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h3>Login</h3>
                <input type="email" name="email" class="box" placeholder="enter your email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" name="password" class="box" placeholder="enter your password">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="submit" value="login now" class="btn">
                <input type="checkbox" type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
                <p>Forget password? <a href="#">click here</a></p>
                <p>Don't have and account? <a href="#">Create one</a></p>
            </form>
        </div>
    @endif
    @yield('content')
    <script defer src="{{ asset('frontend/script.js') }}"></script>
</body>

</html>
