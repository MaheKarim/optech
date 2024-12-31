@extends('frontend.templates.main_demo_layout')
@section('title')
<title>{{ $seo_setting->seo_title }}</title>
<meta name="title" content="{{ $seo_setting->seo_title }}" />
<meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}" />
@endsection
@section('content')
<!-- Main Start -->
<div class="optech-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumb/breadcrumb.png') }})">
    <div class="container">
        <h1 class="post__title">Blogs</h1>
        <nav class="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li aria-current="page"> Blogs</li>
            </ul>
        </nav>

    </div>
</div>
<!-- End breadcrumb -->

<div class="section optech-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach($blogs as $blog)
                    <div data-aos="fade-up" data-aos-duration="600">
                    <div class="optech-blog-wrap">
                        <a href="single-blog.html">
                            <div class="optech-blog-thumb">
                                <img src="{{ asset($blog->image) }}" alt="Blog Image">
                            </div>
                        </a>
                        <div class="optech-blog-content">
                            <div class="optech-blog-meta">
                                <ul>
                                    <li><a href="{{ route('blog', $blog->slug) }}">{{ $blog->category->translate?->name }}</a></li>
                                    <li><a href="{{ route('blog', $blog->slug) }}">{{ $blog->created_at->format('d F Y') }}</a></li>
                                </ul>
                            </div>
                            <a href="{{ route('blog', $blog->slug) }}">
                                <h2>{{ $blog->translate->title }}</h2>
                            </a>
                            <p>
                                @php echo Str::limit($blog->translate->description, 180, '...') @endphp
                            </p>
                            <a class="optech-icon-btn" href="{{ route('blog', $blog->slug) }}"><i class="icon-show ri-arrow-right-line"></i>
                                <span>{{ __('Learn More') }}</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

                    @if($blogs->hasPages())
                        <div class="optech-navigation">
                            <nav class="navigation pagination" aria-label="Posts">
                                <div class="nav-links">
                                    {{-- Previous Page Link --}}
                                    @if($blogs->onFirstPage())
                                        <span class="next page-numbers disabled">
                        <i class="ri-arrow-left-s-line"></i>
                    </span>
                                    @else
                                        <a class="next page-numbers" href="{{ $blogs->previousPageUrl() }}">
                                            <i class="ri-arrow-left-s-line"></i>
                                        </a>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @php
                                        $start = max($blogs->currentPage() - 2, 1);
                                        $end = min($start + 4, $blogs->lastPage());
                                        $start = max(min($start, $blogs->lastPage() - 4), 1);
                                    @endphp

                                    @if($start > 1)
                                        <a class="page-numbers" href="{{ $blogs->url(1) }}">1</a>
                                        @if($start > 2)
                                            <span class="page-numbers dots">...</span>
                                        @endif
                                    @endif

                                    @for($i = $start; $i <= $end; $i++)
                                        @if($i == $blogs->currentPage())
                                            <span aria-current="page" class="page-numbers current">{{ $i }}</span>
                                        @else
                                            <a class="page-numbers" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                        @endif
                                    @endfor

                                    @if($end < $blogs->lastPage())
                                        @if($end < $blogs->lastPage() - 1)
                                            <span class="page-numbers dots">...</span>
                                        @endif
                                        <a class="page-numbers" href="{{ $blogs->url($blogs->lastPage()) }}">{{ $blogs->lastPage() }}</a>
                                    @endif

                                    {{-- Next Page Link --}}
                                    @if($blogs->hasMorePages())
                                        <a class="next page-numbers" href="{{ $blogs->nextPageUrl() }}">
                                            <i class="ri-arrow-right-s-line"></i>
                                        </a>
                                    @else
                                        <span class="next page-numbers disabled">
                        <i class="ri-arrow-right-s-line"></i>
                    </span>
                                    @endif
                                </div>
                            </nav>
                        </div>
                    @endif

            </div>
            <div class="col-lg-4">
                <div class="optech-blog-sidebar">
                    <div class="optech-blog-widgets">
                        <h5>Search</h5>
                        <form action="#">
                            <div class="optech-search-box">
                                <input type="search" placeholder="Type to search...">
                                <button id="optech-search-btn" type="button"><i class="ri-search-line"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="optech-blog-widgets">
                        <h5>{{ __('Categories') }}</h5>
                        <div class="optech-blog-categorie">
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="">{{ $category->translate->name }}<span>({{ $category->blogs_count }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="optech-blog-widgets">
                        <h5>{{ __('Recent Posts') }}</h5>
                        @forelse($recent_blogs as $recent_blog)
                            <a class="optech-recent-post-item" href="{{ route('blog', $recent_blog->slug) }}">
                                <div class="optech-recent-post-thumb">
                                    @if($recent_blog->image)
                                        <img src="{{ asset($recent_blog->image) }}" alt="{{ $recent_blog->title }}">
                                    @else
                                        <img src="{{ asset('assets/images/blog/default-blog.png') }}" alt="{{ $recent_blog->title }}">
                                    @endif
                                </div>
                                <div class="optech-recent-post-data">
                                    <p>{{ Str::limit($recent_blog->title, 60) }}</p>
                                    <span>{{ $recent_blog->created_at->format('d F Y') }}</span>
                                </div>
                            </a>
                        @empty
                            <div class="no-posts">
                                <p>{{ __('No recent posts available') }}</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="optech-blog-widgets">
                        <h5>Tags</h5>
                        <div class="optech-blog-tags">
                            <ul>
                                <li><a href="">Business</a></li>
                                <li><a href="">Digital</a></li>
                                <li><a href="">IT Solution</a></li>
                                <li><a href="">Technology</a></li>
                                <li><a href="">Cyber Security</a></li>
                                <li><a href="">Digital</a></li>
                                <li><a href="">Finance</a></li>
                                <li><a href="">Software</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main End -->

@endsection
