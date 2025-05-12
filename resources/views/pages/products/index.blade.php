@extends('layouts.app')

@section('title', 'Mahsulotlar')
@section('description', 'Iqbolshoh tomonidan taqdim etilgan darsliklar, kodlash maslahatlari va web dasturlash resurslari. Iqbolshoh, ixtisoslashgan full-stack dasturchi va taʼlimchi.')
@section('keywords', 'Iqbolshoh, Web Dasturchi, Laravel, PHP, JavaScript, Portfolio, Onlayn Kurslar, Full-Stack Dasturlash, Dasturlash')

@section('content')
    <!-- Sahifa nomi -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="./">Bosh sahifa</a></li>
                    <li class="current">Mahsulotlar</li>
                </ol>
            </nav>
            <h1>Mahsulotlar</h1>
        </div>
    </div><!-- Sahifa nomi tugadi -->


    <!-- Mahsulotlar bo'limi -->
    <section id="portfolio" class="portfolio section">
        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <!-- Mahsulotlar kategoriyasi -->
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">Hammasi</li>
                    @foreach ($categories as $category)
                        <li data-filter=".filter-category-{{ $category->id }}">{{ $category->name }}</li>
                    @endforeach
                </ul>
                <!-- Mahsulotlar kategoriyasi tugadi -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($groupedProducts as $category_id => $products)
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-category-{{ $category_id }}">
                                <div class="portfolio-content h-100">
                                    <a href="{{ route('products.show', ['id' => $product->id]) }}">
                                        @php
                                            $imageUrl = optional($product->images->first())->image_url;
                                          @endphp
                                        <img src="{{ asset('storage/' . $imageUrl) }}" class="img-fluid" alt="">
                                        <div class="portfolio-info">
                                            <h4>{{ $product->product_name }}</h4>
                                            <p>{!!  Str::limit($product->description, 400) !!}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div><!-- Portfolio konteyneri tugadi -->

            </div>
        </div>
    </section><!-- /Mahsulotlar bo'limi -->

@endsection