@extends('layouts.app')

@section('title', 'Home | Iqbolshoh - Full-Stack Developer')
@section('description', 'Discover tutorials, coding tips, and web development resources by Iqbolshoh, a passionate full-stack developer and educator.')
@section('keywords', 'Iqbolshoh, Web Developer, Laravel, PHP, JavaScript, Portfolio, Online Courses, Full-Stack Development, Programming')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            @foreach ($banners as $banner)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $banner['image']) }}" alt="{{ $banner['title'] }}">
                    <div class="carousel-container">
                        <h2>
                            <span>{{ explode(' ', $banner['title'])[0] }}</span>
                            {{ implode(' ', array_slice(explode(' ', $banner['title']), 1)) }}
                        </h2>
                        <p>{!! $banner['description'] !!}</p>
                        <a href="{{ $banner['button_link'] }}" class="btn-get-started">{{ $banner['button_text'] }}</a>
                    </div>
                </div>
            @endforeach

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
        </div>

        <div class="featured container">
            <div class="row gy-4">
                @foreach ($features as $index => $feature)
                    <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="featured-item position-relative">
                            <div class="icon"><i class="{{ $feature['icon'] }} icon"></i></div>
                            <h4><a href="#" class="stretched-link">{{ $feature['title'] }}</a></h4>
                            <p>{!! $feature['description'] !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>

    <!-- About Section -->
    <section id="about" class="section about">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                @foreach ($aboutItems as $about)
                    <div class="col-lg-6 order-1 order-lg-2">
                        @if (!empty($about['image']))
                            <img src="{{ asset('storage/' . $about['image']) }}" class="img-fluid" alt="About Us">
                        @endif
                    </div>
                    <div class="col-lg-6 order-2 order-lg-1 content">
                        <h3>{{ $about['title'] }}</h3>
                        <p class="fst-italic">{!!  $about['text_1'] !!}</p>
                        <h4>Our Services:</h4>
                        @if (!empty($about['list_items']))
                            <ul>
                                @foreach ($about['list_items'] as $item)
                                    <li><i class="bi bi-check2-all"></i> {!! $item !!}</li>
                                @endforeach
                            </ul>
                        @endif
                        <p>{!!  $about['text_2'] !!}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services section">
        <div class="container">
            <div class="row gy-4">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($service['id'] - 1) * 100 }}">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="{{ $service['icon'] }}"></i></div>
                            <a href="#" class="stretched-link">
                                <h3>{{ $service['title'] }}</h3>
                            </a>
                            <p>{!! $service['description'] !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection