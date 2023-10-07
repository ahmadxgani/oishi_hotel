<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Room and Suite</title>

    <!-- Scripts -->
    @vite(['resources/css/carousel.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container">
        <div>
            <a href="/" class="link-underline-opacity-0 link-body-emphasis">
                <h1 class="bi bi-arrow-left-circle"> Back to home</h1>
            </a>
        </div>

        @foreach ($rooms as $room)
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">{{ $room->name }}</h2>
                    <p class="text-body-secondary">Start from Rp {{ $room->publish_rate }} per day</p>
                    <p class="lead">
                        {{ $room->description }}
                    </p>
                </div>
                <div class="col-md-5 {{ $loop->even ? 'order-first' : 'order-last' }}">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img"
                        aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" /><text x="50%"
                            y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                    </svg>
                </div>
            </div>

            <hr class="featurette-divider">
        @endforeach
    </div>

</body>

</html>
