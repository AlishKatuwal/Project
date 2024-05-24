<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .destination-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .destination-image {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .description {
            margin-bottom: 20px;
        }

        .attractions {
            margin-bottom: 20px;
        }

        .attraction {
            margin-bottom: 20px;
        }

        .attraction h2 {
            margin-bottom: 5px;
        }

        .attraction-description {
            margin-bottom: 10px;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .gallery-item {
            flex: 0 0 calc(33.33% - 10px);
            margin-bottom: 10px;
        }

        .gallery-item img {
            width: 100%;
            border-radius: 5px;
        }

        .guide-option {
            margin-bottom: 15px;
        }

        .guide-option {
            margin-bottom: 15px;
        }

        .rating {
            margin-bottom: 10px;
        }

        .rating i {
            color: #ffa500;
        }

        .review-input {
            width: 100%;
            height: 100px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }

        .submit-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="destination-container">
        <h1>{{ $destination->name }}</h1>

        <video class="destination-image" src="{{ asset($destination->video) }}" controls autoplay></video>

        <div class="description">
            {!! $destination->description !!}
        </div>
        <br><br>
        <h2>Main Attractions</h2>
        <div class="attraction">
            <h3>{{ $destination->name }} Gallery</h3>
            @php
                $images = json_decode($destination->images);
            @endphp
            <div class="gallery">
                @foreach ($images as $item)
                    <div class="gallery-item">
                        <img src="{{ asset($item->path) }}" alt="Image">
                    </div>
                @endforeach
            </div>
        </div>
        <h2>map</h2>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113965.16364660283!2d87.19370835326164!3d26.795027356337812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef419fc7271c1d%3A0x1d1300367590c002!2sDharan!5e0!3m2!1sen!2snp!4v1716480353845!5m2!1sen!2snp"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</body>

</html>
