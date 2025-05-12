@extends('layouts.app')

@section('title', 'Biz haqimizda')
@section('description', 'Iqbolshoh – tajribali full-stack dasturchi va o‘qituvchi tomonidan yaratilgan dasturlash bo‘yicha darslar, maslahatlar va veb-resurslar.')
@section('keywords', 'Iqbolshoh, Veb Dasturchi, Laravel, PHP, JavaScript, Portfolio, Onlayn Kurslar, Full-Stack Dasturlash, Dasturlash')

@section('content')
    <!-- Sahifa sarlavhasi -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Bosh sahifa</a></li>
                    <li class="current">Biz haqimizda</li>
                </ol>
            </nav>
            <h1>Biz haqimizda</h1>
        </div>
    </div>
    <!-- Sahifa sarlavhasi yakuni -->

    <!-- Biz haqimizda bo‘limi -->
    <section id="about" class="section about">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                @foreach ($aboutItems as $about)
                    <div class="col-lg-6 order-1 order-lg-2">
                        @if (!empty($about['image']))
                            <img src="{{ asset('storage/' . $about['image']) }}" class="img-fluid" alt="Biz haqimizda">
                        @endif
                    </div>
                    <div class="col-lg-6 order-2 order-lg-1 content">
                        <h3>{{ $about['title'] }}</h3>
                        <p class="fst-italic">{!!  $about['text_1'] !!}</p>
                        <h4>Xizmatlarimiz:</h4>
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
    <!-- Biz haqimizda bo‘limi yakuni -->

    <!-- Statistika bo‘limi -->
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
    <!-- Statistika bo‘limi yakuni -->
@endsection
