<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel's Facilities</title>

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

        @foreach ($facilities as $facility)
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">{{ $facility->name }}</h2>
                    <p class="lead">
                        {{ $facility->description }}
                    </p>
                </div>
                <div class="col-md-5 {{ $loop->even ? 'order-first' : 'order-last' }}">
                    <div id="carouselExample" class="carousel slide carousel-fade">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="rounded img-fluid mx-auto"
                                    src="https://pm1.aminoapps.com/8313/3921b6f7910934b0f45ebb45affcb5d07a10a688r1-500-500v2_00.jpg"
                                    alt="Desu">
                            </div>
                            <div class="carousel-item">
                                <img class="rounded img-fluid mx-auto"
                                    src="https://i.pinimg.com/564x/69/c3/be/69c3beb4c5340af60276856bf30a80a3--magical-girl-kawaii-anime.jpg"
                                    alt="Kawai">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            <hr class="featurette-divider">
        @endforeach
    </div>

</body>

</html>
