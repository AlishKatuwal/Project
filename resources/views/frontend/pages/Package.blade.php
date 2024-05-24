<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .hotel {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        .hotel:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .hotel-description {
            margin-bottom: 10px;
        }

        .hotel-image {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .facilities {
            margin-bottom: 10px;
        }

        .facility {
            display: inline-block;
            background-color: #f0f0f0;
            padding: 5px 10px;
            border-radius: 5px;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .check-in-out {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .check-in-out label {
            margin-right: 10px;
        }

        .select-box {
            padding: 5px;
            margin-right: 10px;
        }

        .room {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .room:last-child {
            margin-bottom: 0;
        }

        .room-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .room-details {
            margin-bottom: 10px;
        }


        .gallery {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .gallery-item {
            flex: 0 0 30%;
            margin-bottom: 10px;
            padding: 0 5px;
        }

        .gallery-item img {
            width: 100%;
            border-radius: 5px;
        }

        .book-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .book-button:hover {
            background-color: #0056b3;
        }

        .price {
            margin-right: 10px;
            font-weight: bold;
        }

        .amenities {
            margin-bottom: 20px;
        }

        .amenities h3,
        .room-features h3 {
            margin-bottom: 10px;
        }

        .amenities ul,
        .room-features ul {
            list-style: none;
            padding: 0;
        }

        .amenities li,
        .room-features li {
            margin-bottom: 5px;
        }

        .about {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<html>

<body class="container">
    <div class="hotel">
        <div class="gallery">
            <div class="gallery-item">
                <img class="hotel-image" src="{{ asset($package->image) }}" alt="Hotel Image 1">
            </div>
        </div>
        <div class="hotel-description">
            <div><strong>{{ $package->name }}</strong></div>
            <div>{!! $package->description !!}</div>
        </div>
        <h3>Book Now</h3>
        <form action="/bookroom" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="hotel_id" value="{{ $package->hotel_id }}">
            <input type="hidden" name="package_id" value="{{ $package->id }}">
            <input type="hidden" name="total_amount" value="{{ $package->price }}">
            <label for="">Select Check In Date</label>
            <input type="date" name="check_in_date">
            <label for="">Select Check Out Date</label>
            <input type="date" name="check_out_date">
            <div class="room">
                <div class="room-details">
                    <div class="room-name">{{ $package->name }}</div>
                </div>
                <div class="price">Nrs. {{ $package->price }}</div>
                <button class="book-button">Book Now</button>
            </div>
        </form>
    </div>
</body>

</html>
