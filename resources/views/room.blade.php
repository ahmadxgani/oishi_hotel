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

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Superior King</h2>
                <p class="text-body-secondary">Start from Rp 400,000 per day</p>
                <p class="lead">
                    Experience unparalleled luxury and comfort in our Superior King rooms. These elegantly appointed
                    accommodations offer spacious interiors, a king-sized bed fit for royalty, and a host of modern
                    amenities to ensure your stay is nothing short of extraordinary. Whether you're here for business or
                    leisure, our Superior King rooms provide the perfect sanctuary for relaxation and rejuvenation.
                </p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" /><text x="50%"
                        y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                </svg>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading fw-normal lh-1">Superior Twin</h2>
                <p class="text-body-secondary">Start from Rp 400,000 per day</p>
                <p class="lead">
                    Experience the ultimate comfort and space with our Superior Twin rooms. Designed for those who
                    appreciate both style and functionality, these rooms offer a perfect blend of modern amenities and
                    contemporary design. Whether you're traveling with a friend or family member, our Superior Twin
                    rooms provide two comfortable twin beds, ensuring a peaceful night's sleep. Enjoy the elegant decor
                    and thoughtful touches that make your stay truly memorable, while also relishing in the convenience
                    of our well-appointed facilities. Discover relaxation and convenience at its finest in our Superior
                    Twin rooms.
                </p>
            </div>
            <div class="col-md-5 order-md-1">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" /><text x="50%"
                        y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                </svg>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Deluxe King</h2>
                <p class="text-body-secondary">Start from Rp 400,000 per day</p>
                <p class="lead">
                    Experience the epitome of luxury and comfort in our Deluxe King room. Unwind in spacious elegance as
                    you indulge in the plush amenities and modern conveniences of this exquisite accommodation. With a
                    generously sized king bed, a tastefully designed interior, and a range of thoughtful extras, our
                    Deluxe King room is the perfect retreat for those seeking a superior stay. Whether you're here for
                    business or leisure, this room offers a haven of relaxation and style that will exceed your
                    expectations.
                </p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" /><text x="50%"
                        y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                </svg>
            </div>
        </div>

        <hr class="featurette-divider">
    </div>

</body>

</html>
