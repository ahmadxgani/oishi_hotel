<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home page</title>
</head>

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])

<body>
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('/images/item_2.jpg') }}" class="d-block w-100" alt="Banner"
                    style="height: 350px;object-fit: cover">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/images/item_2.jpg') }}" class="d-block w-100" alt="Banner"
                    style="height: 350px;object-fit: cover">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/images/item_2.jpg') }}" class="d-block w-100" alt="Banner"
                    style="height: 350px;object-fit: cover">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        @include('components.feature')
        @include('components.about')
    </div>
</body>

</html>
