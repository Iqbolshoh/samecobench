@extends('layouts.app')

@section('title', 'Product Details')
@section('description', 'Discover tutorials, coding tips, and web development resources by Iqbolshoh, a passionate full-stack developer and educator.')
@section('keywords', 'Iqbolshoh, Web Developer, Laravel, PHP, JavaScript, Portfolio, Online Courses, Full-Stack Development, Programming')

@section('content')
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('news.index') }}">Product Details</a></li>
                    <li class="current">{{ Str::limit($product->product_name, 30) }}</li>
                </ol>
            </nav>
            <h1>Product Details</h1>
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
                                        <img src="{{ asset('storage/' . $image->image_url) }}" alt="Product image">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                            <h3>Product Information</h3>
                            <ul>
                                <li><strong>Category</strong>: {{ $product->category->category_name ?? 'Unknown' }}</li>
                                <li><strong>Product Name</strong>: {{ $product->product_name }}</li>
                                <li><strong>Price</strong>: {{ number_format($product->price, 0, '', ' ') }} $</li>
                            </ul>
                        </div>
                        <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                            <h2>Product Description</h2>
                            <p>{{ $product->product_name }} – {!! $product->description !!}</p>
                        </div>
                    </div>
                @else
                    <div class="col-12 product-not-found text-center">
                        <h3>Product Not Found</h3>
                        <p>The product you are looking for does not exist.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection