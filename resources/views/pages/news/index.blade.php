@extends('layouts.app')

@section('title', 'News')
@section('description', 'Discover tutorials, coding tips, and web development resources by Iqbolshoh, a passionate full-stack developer and educator.')
@section('keywords', 'Iqbolshoh, Web Developer, Laravel, PHP, JavaScript, Portfolio, Online Courses, Full-Stack Development, Programming')

@section('content')
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">News</li>
                </ol>
            </nav>
            <h1>News</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <section id="blog-posts" class="blog-posts section">
                    <div class="container">
                        <div class="row gy-4" id="post-results">
                            @foreach ($news as $new)
                                <div class="col-lg-12">
                                    <article>
                                        <div class="post-img">
                                            <img src="{{ $new->image ? asset('storage/' . $new->image) : asset('images/placeholder.jpg') }}"
                                                alt="{{ $new->title }}" class="img-fluid">
                                        </div>
                                        <h2 class="title">
                                            <a href="{{ route('news.show', $new->id) }}">{{ $new->title }}</a>
                                        </h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li><i class="bi bi-eye"></i> {{ $new->views }} Views</li>
                                                <li><i class="bi bi-clock"></i> {{ $new->created_at->format('F j, Y') }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="content">
                                            <p>{!!  Str::limit($new->description, 400) !!}</p>
                                            <div class="read-more">
                                                <a href="{{ route('news.show', $new->id) }}">Read More</a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                <section id="blog-pagination" class="blog-pagination section">
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            {{ $news->links('components.custom') }}
                        </div>
                    </div>
                </section>

            </div>

            <div class="col-lg-4 sidebar">
                <div class="widgets-container">

                    <div class="recent-posts-widget widget-item" id="recent-posts" aria-live="polite">
                        <h3 class="widget-title" style="color: var(--heading-color);">Recent News</h3>
                        @if($recentNews->isEmpty())
                            <div class="alert alert-info"
                                style="background-color: var(--surface-color); color: var(--default-color); border-color: var(--accent-color);">
                                No recent posts available.
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
                                                        {{ $recent->views }} views
                                                    </span>
                                                </div>
                                                <a href="{{ route('news.show', $recent->id) }}" class="btn btn-sm mt-1"
                                                    style="background-color: var(--accent-color); color: var(--contrast-color); border-color: var(--accent-color);">
                                                    Read More <i class="bi bi-arrow-right ms-1"></i>
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