@extends('layouts.app')

@section('title', 'Mahsulot Tafsilotlari')
@section('description', 'Iqbolshoh tomonidan taqdim etilgan darsliklar, kodlash maslahatlari va web dasturlash resurslari. Iqbolshoh, ixtisoslashgan full-stack dasturchi va taʼlimchi.')
@section('keywords', 'Iqbolshoh, Web Dasturchi, Laravel, PHP, JavaScript, Portfolio, Onlayn Kurslar, Full-Stack Dasturlash, Dasturlash')

@section('content')
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Bosh sahifa</a></li>
                    <li><a href="{{ route('news.index') }}">Mahsulot Tafsilotlari</a></li>
                    <li class="current">{{ Str::limit($product->product_name, 30) }}</li>
                </ol>
            </nav>
            <h1>Mahsulot Tafsilotlari</h1>
        </div>
    </div>

    <section id="portfolio-details" class="portfolio-details section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                @if ($product)
                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                                  {
                                    "loop": true,
                                    "speed": 600,
                                    "autoplay": { "delay": 5000 },
                                    "slidesPerView": "auto",
                                    "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true }
                                  }
                            </script>
                            <div class="swiper-wrapper align-items-center">
                                @foreach ($product->images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/' . $image->image_url) }}" alt="Mahsulot rasmi">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                            <h3>Mahsulot Haqida Ma'lumot</h3>
                            <ul>
                                <li><strong>Kategoriya</strong>: {{ $product->category->category_name ?? 'Nomalum' }}</li>
                                <li><strong>Mahsulot Nomi</strong>: {{ $product->product_name }}</li>
                                <li><strong>Narxi</strong>: {{ number_format($product->price, 0, '', ' ') }} $</li>
                            </ul>
                        </div>
                        <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                            <h2>Mahsulot Tavsifi</h2>
                            <p>{{ $product->product_name }} – {!! $product->description !!}</p>
                        </div>
                    </div>
                @else
                    <div class="col-12 product-not-found text-center">
                        <h3>Mahsulot Topilmadi</h3>
                        <p>Qidirayotgan mahsulotingiz mavjud emas.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
