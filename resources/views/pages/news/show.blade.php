@extends('layouts.app')

@section('title', 'Yangiliklar Tafsilotlari')
@section('description', 'Sam Ecobench kompaniyasining so‘nggi yangiliklari, ekologik texnologiyalardagi yangiliklar, loyiha boshlanishlari va muvaffaqiyatli ishlar haqida bilib oling.')

@section('keywords', 'yangiliklar, so‘nggi yangiliklar, ekologik yangiliklar, Sam Ecobench, ekologik texnologiyalar, loyihalar, yashil energiya, yangiliklar Samarqand')

<style>
.content img,
.content svg {
    vertical-align: middle !important;
    width: 100% !important;
    height: auto !important;
}
.attachment__name, .attachment__size{
    display: none;
}
</style>

@section('content')
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Bosh sahifa</a></li>
                    <li><a href="{{ route('news.index') }}">Yangiliklar</a></li>
                    <li class="current">{{ Str::limit($newsItem->title, 30) }}</li>
                </ol>
            </nav>
            <h1>Yangiliklar Tafsilotlari</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <!-- Blog Tafsilotlari Bo'limi -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">

                        <article class="article">
                            <div class="post-img">
                                <img src="{{ $newsItem->image ? asset('storage/' . $newsItem->image) : asset('images/placeholder.jpg') }}"
                                    alt="{{ $newsItem->title }}" class="img-fluid">
                            </div>
                            <h2 class="title" style="color: var(--heading-color);">
                                {{ $newsItem->title }}
                            </h2>
                            <div class="meta-top">
                                <ul>
                                    <li>
                                        <i class="bi bi-eye" style="color: var(--accent-color);"></i>
                                        {{ $newsItem->views }} Ko'rish
                                    </li>
                                    <li>
                                        <i class="bi bi-clock" style="color: var(--accent-color);"></i>
                                        {{ $newsItem->created_at->format('F j, Y') }}
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <p style="color: var(--default-color); ">{!! $newsItem->description !!}</p>
                            </div>
                        </article>
                    </div>
                </section>

            </div>

            <div class="col-lg-4 sidebar">
                <div class="widgets-container">

                    <div class="recent-posts-widget widget-item" id="recent-posts" aria-live="polite">
                        <h3 class="widget-title" style="color: var(--heading-color);">So'nggi Yangiliklar</h3>
                        @if($recentNews->isEmpty())
                            <div class="alert alert-info"
                                style="background-color: var(--surface-color); color: var(--default-color); border-color: var(--accent-color);">
                                So'nggi postlar mavjud emas.
                            </div>
                        @else
                            <div class="recent-news-list">
                                @foreach($recentNews as $recent)
                                    <div class="recent-news-item mb-3 p-3 border rounded"
                                        style="background-color: var(--surface-color); border-color: rgba(233, 107, 86, 0.2);">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0 me-3">
                                                <img src="{{ $recent->image ? asset('storage/' . $recent->image) : asset('images/placeholder.jpg') }}"
                                                    alt="{{ $recent->title }}" class="rounded" width="80"
                                                    style="border: 1px solid rgba(233, 107, 86, 0.1);">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1" style="color: var(--heading-color);">
                                                    <a href="{{ route('news.show', $recent->id) }}" class="text-decoration-none"
                                                        style="color: var(--heading-color);">
                                                        {{ Str::limit($recent->title, 50) }}
                                                    </a>
                                                </h5>
                                                <div class="d-flex justify-content-between align-items-center small mb-1"
                                                    style="color: var(--default-color);">
                                                    <time datetime="{{ $recent->created_at->format('Y-m-d') }}">
                                                        <i class="bi bi-calendar me-1" style="color: var(--accent-color);"></i>
                                                        {{ $recent->created_at->format('M j, Y') }}
                                                    </time>
                                                    <span>
                                                        <i class="bi bi-eye me-1" style="color: var(--accent-color);"></i>
                                                        {{ $recent->views }} ko'rish
                                                    </span>
                                                </div>
                                                <a href="{{ route('news.show', $recent->id) }}" class="btn btn-sm mt-1"
                                                    style="background-color: var(--accent-color); color: var(--contrast-color); border-color: var(--accent-color);">
                                                    Batafsil <i class="bi bi-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection