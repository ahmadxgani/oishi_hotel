<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home page</title>

    <!-- Scripts -->
    @vite(['resources/css/feature.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container">
        <div class="p-3 mb-1 bg-body-tertiary rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Oishi Hotel</h1>
                <div class="row justify-content-between">
                    <p class="col-md-8 fs-4">
                        The perfect place to stay for lovers of Japanese culture and entertainment, especially those who
                        are "wibu." With a very seductive design and a theme centered on everything
                        related to anime, manga, and Japanese pop culture, Oishi Hotel will make you feel like you're in
                        the world of your favorite anime.
                    </p>

                    <div class="col d-flex flex-column">
                        <img src="{{ asset('/images/logo.png') }}" class="align-self-end"
                            style="width: 120px;height: 120px;" />
                    </div>
                </div>
            </div>
        </div>
        @include('components.feature')
    </div>
</body>

</html>
