<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', 'UHE Media | Creative Marketing That Delivers Results')</title>
    <meta name="description" content="@yield('meta_description', 'We help brands grow with data-driven marketing, stunning content, and impactful experiences. Premium media and marketing agency in Dubai.')">
    <meta name="keywords" content="UHE Media, media agency Dubai, marketing agency, digital marketing, content production, events activations, exhibition booth design, brand strategy">
    <meta name="author" content="UHE Media">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'UHE Media | Creative Marketing That Delivers Results')">
    <meta property="og:description" content="@yield('meta_description', 'We help brands grow with data-driven marketing, stunning content, and impactful experiences. Premium media and marketing agency in Dubai.')">
    <meta property="og:image" content="{{ asset('images/hero.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'UHE Media | Creative Marketing That Delivers Results')">
    <meta property="twitter:description" content="@yield('meta_description', 'We help brands grow with data-driven marketing, stunning content, and impactful experiences. Premium media and marketing agency in Dubai.')">
    <meta property="twitter:image" content="{{ asset('images/hero.png') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts (Instrument Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vite Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <!-- Sticky Navbar -->
    @include('components.navbar')

    <!-- Page Content -->
    @yield('content')

    <!-- Footer -->
    @include('components.footer')

</body>
</html>
