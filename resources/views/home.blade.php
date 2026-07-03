@extends('layouts.app')

@section('title', 'UHE Media | Creative Marketing That Delivers Results')
@section('meta_description', 'We help brands grow with data-driven marketing, stunning content, and impactful experiences. Premium media and marketing agency in Dubai.')

@section('content')
    <!-- Hero Section -->
    @include('components.hero')

    <!-- Trusted Clients Section -->
    @include('components.clients')

    <!-- Services Section -->
    @include('components.services')

    <!-- Why Choose Us Section -->
    @include('components.why-choose')

    <!-- Our Process Section -->
    @include('components.process')

    <!-- Statistics Section -->
    @include('components.statistics')

    <!-- Portfolio Section -->
    @include('components.portfolio')

    <!-- Call To Action Section -->
    @include('components.cta')

    <!-- Contact Section -->
    @include('components.contact')
@endsection
