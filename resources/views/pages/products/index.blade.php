@extends('layouts.app')

@section('title', 'Products')
@section('description', 'Discover tutorials, coding tips, and web development resources by Iqbolshoh, a passionate full-stack developer and educator.')
@section('keywords', 'Iqbolshoh, Web Developer, Laravel, PHP, JavaScript, Portfolio, Online Courses, Full-Stack Development, Programming')

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="./">Home</a></li>
                    <li class="current">Products</li>
                </ol>
            </nav>
            <h1>Products</h1>
        </div>
    </div><!-- End of Page Title -->


    <!-- Products Section -->
    <section id="portfolio" class="portfolio section">
        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <!-- Products Category -->
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach ($categories as $category)
                        <li data-filter=".filter-category-{{ $category->id }}">{{ $category->name }}</li>
                    @endforeach
                </ul>
                <!-- End Products Category -->

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
                </div><!-- End Portfolio Container -->

            </div>
        </div>
    </section><!-- /Portfolio Section -->

@endsection