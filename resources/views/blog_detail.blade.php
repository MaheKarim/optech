@php use Modules\Blog\App\Models\Blog; @endphp
@extends('frontend.templates.main_demo_layout')

@section('title')
    <title>{{ $blog->seo_title }}</title>
    <meta name="title" content="{{ $blog->seo_title }}">
    <meta name="description" content="{{ $blog->seo_description }}">

    @php
        $tags = '';
        if($blog->tags){
            foreach (json_decode($blog->tags) as $key => $blog_tag) {
                $tags .= $blog_tag->value.', ';
            }
        }
    @endphp

    <meta name="keyword" content="{{ $tags }}">
@endsection

@section('content')
<!-- Main Start -->
<div class="optech-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumb/breadcrumb.png') }})">
    <div class="container">
        <h1 class="post__title">{{ $blog->translate?->title }}</h1>
        <nav class="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li><a href="{{ route('blogs') }}">{{ __('Blog') }}</a></li>
                <li aria-current="page">{{ $blog->translate?->title }}</li>
            </ul>
        </nav>
    </div>
</div>
<!-- End breadcrumb -->

<div class="section optech-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="optech-blog-thumb single-blog" data-aos="fade-up" data-aos-duration="800">
                    <img src="{{ asset($blog->image) }}" alt="Blog Image">
                </div>
                <div class="optech-single-post-content-wrap">
                    <div class="optech-single-post-meta">
                        <ul>
                            <li><a href=""><i class="ri-calendar-fill"></i>{{ __($blog->created_at->format('d M Y')) }}</a></li>
                            <li><a href=""><i class="ri-bookmark-fill"></i>{{ $blog->category->translate?->name }}</a></li>
                            <li><a href=""><i class="ri-chat-2-fill"></i> {{ $blog->total_comment }} {{ __('Comments') }}</a></li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <p>
                            {!! $blog->translate?->description !!}
                        </p>

                        <div class="optech-single-post-tag-wrap">
                            <div class="optech-blog-tags">
                                <ul>
                                    @if ($blog->tags)
                                        @foreach (json_decode($blog->tags) as $blog_tag)
                                        <li><a href="javascript:;">{{ $blog_tag->value }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="optech-post-navigation">
                            @if($previous)
                                <a href="{{ route('blog', $previous->slug) }}" class="nav-previous">
                                    <i class="ri-arrow-left-line"></i> {{ __('Previous Post') }}
                                </a>
                            @else
                                <span class="nav-previous disabled">
                                    <i class="ri-arrow-left-line"></i>
                                    {{ __('No Previous Post') }}
                                </span>
                            @endif
                            @if($next)
                                <a href="{{ route('blog', $next->slug) }}" class="nav-next">
                                    {{ __('Next Post') }} <i class="ri-arrow-right-line"></i>
                                </a>
                                @else
                                 <span class="nav-next disabled">
                                    {{ __('No Next Post') }}
                                    <i class="ri-arrow-right-line"></i>
                                </span>
                            @endif
                        </div>

                        <div class="optech-post-comment">
                            <h3>{{ __('Comments:') }}</h3>
                            <ul>
                                @foreach ($blog_comments as $blog_comment)
                                <li>
                                    <div class="optech-post-comment-wrap">
                                        <div class="optech-post-comment-thumb">
                                            <img src="{{ asset($general_setting->default_avatar) }}" alt="">
                                        </div>
                                        <div class="optech-post-comment-data">
                                            <p>
                                                {{ html_decode($blog_comment->comment) }}
                                            </p>
                                            <strong>{{ html_decode($blog_comment->name) }}</strong>
                                            <span>{{ $blog_comment->created_at->format('d M Y') }}</span>
                                            <a class="optech-comment-reply" href="">
                                                <i class="ri-reply-fill"></i>
                                                {{ __('Reply') }}
                                                </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="optech-comment-box">
                            <h3>{{ __('Leave a comments:') }}</h3>
                            <form action="{{ route('store-blog-comment', $blog->id) }}" method="POST">
                                @csrf
                                <div class="optech-comment-box-form">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="optech-comment-form">
                                                <input
                                                    type="text"
                                                    id="name"
                                                    name="name"
                                                    value="{{ old('name') }}"
                                                    placeholder="Name"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="optech-comment-form">
                                                <input
                                                    type="email"
                                                    id="email"
                                                    name="email"
                                                    value="{{ old('email') }}"
                                                    placeholder="Email"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="optech-comment-form">
                                       <textarea
                                           id="desc"
                                           name="comment"
                                           placeholder="Comment"
                                       >{{ old('comment') }}
                                       </textarea>
                                    </div>
                                    <div class="optech-check">
                                        <input type="checkbox" id="css">
                                        <label for="css">
                                            {{ __('Save my name, email, and website in this browser for the next time I comment') }}.
                                        </label>
                                    </div>

                                    @if($general_setting->recaptcha_status == 1)
                                        <div class="contact-form-input col-lg-12 mt-4">
                                            <div class="g-recaptcha" data-sitekey="{{ $general_setting->recaptcha_site_key }}"></div>
                                        </div>
                                    @endif

                                    <button id="optech-default-btn" type="submit" data-text="Send Message">
                                        <span class="btn-wraper">
                                            {{ __('Send Message') }}
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="optech-blog-sidebar">
                    <div class="optech-blog-widgets">
                        <h5>{{ __('Search') }}</h5>
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
                        @foreach($recent_blogs as $recentBlog)
                        <a class="optech-recent-post-item" href="{{ route('blog', $recentBlog->slug) }}">
                            <div class="optech-recent-post-thumb">
                                <img src="{{ asset($recentBlog->image) }}" alt="Recent Blog">
                            </div>
                            <div class="optech-recent-post-data">
                                <p>{{ $recentBlog->translate->title }}</p>
                                <span>{{ __($recentBlog->created_at->format('d m Y')) }}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <div class="optech-blog-widgets">
                        <h5>{{ __('Tags') }}</h5>
                        <div class="optech-blog-tags">
                            <ul>
                                @foreach($allTags as $tag)
                                    <li><a href="">{{ $tag }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- End Main Blog Details -->
@endsection

@push('js_section')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endpush
