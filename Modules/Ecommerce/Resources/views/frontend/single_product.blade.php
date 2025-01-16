@extends('master_layout')
@section('title')
    <title>{{ $product->translate?->seo_title }}</title>
    <meta name="title" content="{{ $product->translate?->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($product->translate?->seo_description)) !!}">
@endsection

@section('new-layout')
    <div class="optech-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumb/breadcrumb.png')  }})">
        <div class="container">
            <h1 class="post__title">{{ __($pageTitle) }}</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('product.shop') }}">{{ __('Shop') }}</a></li>
                    <li aria-current="page">{{ __($pageTitle) }}</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="section optech-section-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="optech-tab-slider" data-aos="fade-up" data-aos-duration="800">
                        @if(count($product->galleries) > 0)
                            <div class="optech-tabs-container">
                                <div class="optech-tabs-wrapper">
                                    @foreach($product->galleries as $gallery)
                                        <div id="item{{ $loop->index + 1 }}" class="tabContent">
                                            <img src="{{ asset($gallery->image) }}" alt="Image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <ul class="optech-tabs-menu">
                                @foreach($product->galleries as $gallery)
                                    <li {{ $loop->first ? 'class=active' : '' }}>
                                        <a href="#item{{ $loop->index + 1 }}">
                                            <img src="{{ asset($gallery->image) }}" alt="Image">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="optech-tabs-container">
                                <div class="optech-tabs-wrapper">
                                    <div id="item1" class="tabContent active">
                                        <img src="{{ asset($product->thumbnail_image) }}" alt="Default Image">
                                    </div>
                                </div>
                            </div>
                            <ul class="optech-tabs-menu">
                                <li class="active">
                                    <a href="#item1">
                                        <img src="{{ asset($product->thumbnail_image) }}" alt="Default Image">
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="optech-details-content">
                        <h2>{{ html_decode($pageTitle) }}</h2>
                        <h6>{!! $product->price_display !!}</h6>
                        <p>{!! $product->translate?->description !!}</p>
                        <div class="optech-product-wrap">
                            <div class="optech-product-number">
                                <span class="optech-product-minus quantity__minus"><i class="ri-subtract-line"></i></span>
                                    <input type="text" value="1" name="quantity" class="quantity__input"/>
                                <span class="optech-product-plus quantity__plus"><i class="ri-add-line"></i></span>
                            </div>
                            <a class="optech-product-btn cart-add-btn" href="javascript;" data-product-id="{{ $product->id }}" data-text="{{ __('Add to Cart') }}">
                                <span class="btn-wraper">{{ __('Add to Cart') }}</span>
                            </a>
                        </div>
                        <div class="optech-product-info">
                            <h5>{{ __('Quick info') }}</h5>
                            <ul>
                                <li><span>{{ __('Category') }}: </span>
                                    <a href="">{{ $product->category?->translate->name }}</a>
                                </li>
                                <li>
                                    <span>{{ __('Tags') }}: </span>
                                    @if (!is_null($product->tags) && is_array($product->tags))
                                        @foreach ($product->tags as $tag)
                                        <a href="#">{{ $tag }}</a>@if(!$loop->last), @endif
                                        @endforeach
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section optech-section-padding">
        <div class="container">
            <div class="optech-product-tab">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                                type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ __('Description') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                                type="button" role="tab" aria-controls="pills-contact" aria-selected="false">{{ __('Reviews') }} (0)</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                         tabindex="0">
                        {!! $product->translate?->description !!}
                    </div>

                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                         tabindex="0">

                        <div class="review_box">
                            @foreach($reviews as $review)
                                <div class="review_box_main">
                                    <div class="review_box_item">
                                        <div class="review_box_thumb">
                                            @if($review->user && $review->user->image)
                                                <img src="{{ asset($review->user->image) }}" alt="thumb">
                                            @else
                                                <img src="{{ asset('default-user-image.jpg') }}" alt="thumb">
                                            @endif
                                        </div>
                                        <div class="review_box_inner">
                                            <div class="review_box_text">
                                                @if($review->user)
                                                    <a href="#">{{ __($review->user->name) }}</a>
                                                @else
                                                    <a href="#">{{ __('Anonymous') }}</a>
                                                @endif
                                                <p>
                                                    {{ Str::limit($review->reviews, 200) }}
                                                </p>
                                                <div class="review_box_btm">
                                                    <ul>
                                                        @for($i = 0; $i < $review->rating; $i++)
                                                            <li>
                                                                <i class="fa-solid fa-star"></i>
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                    <div class="review_box_btm_btn">
                                                        <a href="#" class="reply_btn">{{ __('Reply') }}</a>
                                                        <span class="dots"></span>
                                                        <span class="days">{{ $review->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if($reviews->isNotEmpty())
                                <a class="optech-default-btn" href="#" data-text="More Reviews">
                                    <span class="btn-wraper">{{ __('More Reviews') }}</span>
                                </a>
                            @endif
                        </div>
                        <!-- Write Your Review  -->
                        @if(auth()->user())
                            <div class="write_review_box">
                                <div class="write_review_box_heading">
                                    <h4>{{ __('Write Your Review') }}</h4>
                                    <form class="write_review_box_form" method="POST" action="{{ route('user-order.reviewSubmit') }}" id="review-form">
                                        @csrf
                                        <input type="hidden" name="rating" id="product_rating" value="0">
                                        <input type="hidden" name="product_id" id="product_rating" value="{{ $product->id }}">
                                        <ul class="write_review_box_icon">
                                            @for($i = 1; $i <= 5; $i++)
                                                <li>
                                                    <i class="fa-regular fa-star listing_rat" data-rating="{{ $i }}" onclick="listingReview({{ $i }})"></i>
                                                </li>
                                            @endfor
                                            <li>
                                                <span id="rating_visible">(0.0)</span>
                                            </li>
                                        </ul>


                                <div class="write_review_box_form_item">
                                    <div class="write_review_box_form_inner">
                                        <div class="optech-checkout-field mb-0">
                                            <label>{{ __('Write your message') }}</label>
                                            <textarea name="reviews" id="reviews" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="optech-default-btn" id="submit-review"
                                        data-text="{{ __('Submit Review') }}">
                                        <span class="btn-wraper">
                                            {{ __('Submit Review') }}
                                        </span>
                                </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->
    @if($relatedProducts->isNotEmpty())
        <div class="optech-related-product-section">
        <div class="container">
            <div class="optech-section-title center">
                <h2>{{ __('Related products') }}</h2>
            </div>
            <div class="row">
                @foreach($relatedProducts as $product)
                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="400">
                    <div class="optech-shop-wrap">
                        <div class="optech-shop-thumb">
                            <a href="{{ route('product.view', $product->slug) }}">
                                <img src="{{ asset($product->thumbnail_image) }}" alt="">
                            </a>
                            <a href="#" class="wishlist_icon">
                                <span>
                                  <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.765 2.70229L11 3.52422L10.235 2.70229C8.12233 0.432572 4.69709 0.43257 2.58447 2.70229C0.471845 4.972 0.471844 8.65194 2.58447 10.9217L9.4699 18.3191C10.315 19.227 11.685 19.227 12.5301 18.3191L19.4155 10.9217C21.5282 8.65194 21.5282 4.972 19.4155 2.70229C17.3029 0.432571 13.8777 0.432571 11.765 2.70229Z"
                                        stroke-width="1.3" stroke-linejoin="round" />
                                  </svg>
                                </span>
                            </a>
                            <a class="optech-shop-btn" href="my-cart.html" data-text="Add to Cart"><span class="btn-wraper">{{ __('Add to
                  Cart') }}</span></a>
                        </div>
                        <div class="optech-shop-data">
                            <a href="{{ route('product.view', $product->slug) }}">
                                <h5>{{ $pageTitle }}</h5>
                            </a>
                            <h6>$39.00 <del>$39.00</del></h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!-- End section -->
@endsection


@push('js_section')

  <script>
    function listingReview(rating){
        $(".listing_rat").each(function(){
            var listing_rat = $(this).data('rating')
            if(listing_rat > rating){
                $(this).removeClass('fa-solid fa-star').addClass('fa-regular fa-star');
            }else{
                $(this).removeClass('fa-regular fa-star').addClass('fa-solid fa-star');
            }
        })

        $("#product_rating").val(rating);
        $("#rating_visible").html(`(${rating}.0)`);
    }
  </script>

  <script>
      function listingReview(rating) {
          $(".listing_rat").each(function(){
              var listing_rat = $(this).data('rating');
              if(listing_rat <= rating){
                  $(this).removeClass('fa-regular fa-star').addClass('fa-solid fa-star');
              } else {
                  $(this).removeClass('fa-solid fa-star').addClass('fa-regular fa-star');
              }
          });

          $("#product_rating").val(rating);
          $("#rating_visible").html(`(${rating}.0)`);
      }

      document.getElementById('submit-review').addEventListener('click', function () {
          const reviewForm = document.getElementById('review-form');
          const reviews = document.getElementById('reviews').value;
          const rating = document.getElementById('product_rating').value;

          if (!reviews.trim()) {
              alert('{{ __("Please write your review before submitting.") }}');
              return;
          }

          if (rating === '0') {
              alert('{{ __("Please select a rating before submitting.") }}');
              return;
          }

          // Create FormData object
          const formData = new FormData(reviewForm);

          // Send form data using fetch
          fetch(reviewForm.action, {
              method: 'POST',
              headers: {
                  'X-Requested-With': 'XMLHttpRequest'  // Add this to indicate AJAX request
              },
              body: formData
          })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      alert('{{ __("Your review has been submitted successfully.") }}');
                      reviewForm.reset();
                      listingReview(0); // Reset stars
                  } else {
                      alert(data.message || '{{ __("An error occurred. Please try again.") }}');
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
                  alert('{{ __("An error occurred. Please try again later.") }}');
              });
      });
  </script>
@endpush
