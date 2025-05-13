@extends('layouts.app')

@section('title', 'Mahsulotlar')
@section('description', 'Sam Ecobench tomonidan taqdim etilgan ekologik mahsulotlar: quyosh panellari, smart skameykalar, quyosh ustunlari va boshqa innovatsion yechimlar. Mahsulotlarimiz bilan tanishing!')

@section('keywords', 'mahsulotlar, ekologik mahsulotlar, quyosh paneli, smart skameyka, quyosh ustuni, Sam Ecobench mahsulotlari, yashil texnologiyalar, ekologik yechimlar')

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

    <style>
        .product-link {
            background-color: var(--accent-color);
            color: var(--contrast-color);
            padding: 5px 20px;
            margin-top: 10px;
            width: 100%;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .product-link:hover {
            color: var(--hover-text-color);
            transform: scale(1.05);
        }
    </style>

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
                                            <a href="{{ route('products.show', ['id' => $product->id]) }}" class="product-link">
                                                Batafsil
                                            </a>
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