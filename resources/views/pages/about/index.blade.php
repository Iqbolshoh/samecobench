@extends('layouts.app')

@section('title', 'About Us')
@section('description', 'Discover tutorials, coding tips, and web development resources by Iqbolshoh, a passionate full-stack developer and educator.')
@section('keywords', 'Iqbolshoh, Web Developer, Laravel, PHP, JavaScript, Portfolio, Online Courses, Full-Stack Development, Programming')

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">About Us</li>
                </ol>
            </nav>
            <h1>About Us</h1>
        </div>
    </div>
    <!-- End Page Title -->

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
    <!-- End About Section -->

    <!-- Statistics Section -->
    <section id="stats" class="stats section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">

                @foreach ($statistics as $stat)
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="{{ $stat['icon'] }}"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $stat['count'] }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>{{ $stat['title'] }}</strong> <span>{!! $stat['description'] !!}</span></p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Statistics Section -->
@endsection