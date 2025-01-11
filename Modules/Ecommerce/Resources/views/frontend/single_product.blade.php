@extends('layout')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('body-content')
    <main>
        <!-- inner-bg  part start  -->
        <div class="inner-bg"
             style="background-image:  url({{ asset($breadcrumb) }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="inner-bg-txt">
                            <h1>{{ __('translate.Product Details') }}</h1>
                            <ul>
                                <li><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                                <li><span>
                                        <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.633816 2.7705e-08C0.446997 0.0532405 0.28353 0.143084 0.158011 0.319443C-0.0492418 0.618921 -0.0550799 1.0515 0.155092 1.35098C0.195958 1.40755 0.239744 1.46411 0.286449 1.51735C1.56499 2.97481 2.84645 4.4356 4.125 5.89306C4.15419 5.92633 4.18922 5.95295 4.24176 6.03281C4.20673 6.0561 4.16295 6.06941 4.13375 6.10269C2.84062 7.57346 1.5504 9.04755 0.257258 10.5183C0.0295721 10.7779 -0.0579994 11.0773 0.0412483 11.4367C0.187201 11.9591 0.776848 12.1721 1.16216 11.8427C1.20595 11.8061 1.24682 11.7628 1.28768 11.7196C2.7764 10.0225 4.26511 8.32881 5.75091 6.63177C6.02238 6.32231 6.07492 5.92966 5.89394 5.57361C5.85015 5.4871 5.78594 5.41056 5.72464 5.34069C4.27971 3.69356 2.83478 2.04976 1.39277 0.399304C1.23222 0.216289 1.06875 0.0532405 0.838149 3.66367e-08C0.771011 3.3702e-08 0.703873 3.07673e-08 0.633816 2.7705e-08Z" />
                                        </svg>

                                    </span></li>
                                <li><a href="#">{{ __('translate.Product Details') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- inner-bg  part end  -->
        <!-- product-details start  -->
        <section class="prodcut-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="prodcut-details-slick-main">
                            <div class="prodcut-details-slick-df">
                                <div class="prodcut-details-slick-nav">
                                    @forelse($product->galleries as $index => $gallery1)
                                        <div class="prodcut-details-slick-nav-thumb-item">
                                            <div class="prodcut-details-slick-nav-thumb">
                                                <!-- First gallery image or fallback to products thumbnail image -->
                                                <img src="{{ getImageOrPlaceholder($gallery1->image ?? '', '696x713') }}" alt="Product thumbnail">
                                            </div>
                                        </div>
                                    @empty
                                        <!-- No gallery images, fallback to products thumbnail image -->
                                        <div class="prodcut-details-slick-nav-thumb-item">
                                            <div class="prodcut-details-slick-nav-thumb">
                                                <img src="{{ getImageOrPlaceholder($product->thumbnail_image, '696x713') }}" alt="Product thumbnail">
                                            </div>
                                        </div>
                                    @endforelse
                                </div>


                                <div class="prodcut-details-slick-for">
                                    @forelse($product->galleries as $gallery)
                                        <div class="prodcut-details-slick-for-thumb-item">
                                            <div class="prodcut-details-slick-for-thumb">
                                                <img src="{{ getImageOrPlaceholder($gallery->image ?? '', '696x713') }}" alt="Product image">
                                            </div>
                                        </div>
                                    @empty
                                        <div class="prodcut-details-slick-for-thumb-item">
                                            <div class="prodcut-details-slick-for-thumb">
                                                <img src="{{ getImageOrPlaceholder($product->thumbnail_image ?? '', '696x713') }}" alt="Product image">
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 pl-40px">
                        <span class="prodcut-catagory-txt">{{ __($product->subCategory->translate->name) }}</span>
                        <h3 class="prodcut-catagory-headline">{{ $product->translate->name }}</h3>
                        @if($product->reviews->isNotEmpty())
                            @php
                                $avgRating = $product->reviews->avg('rating');
                            @endphp
                            <div class="prodcut-catagory-rating-item">
                                <ul class="rating-icon">
                                    @for($i = 1; $i <= 5; $i++)
                                        <li><i class="fa-{{ ($i <= $avgRating) ? 'solid' : 'regular' }} fa-star"></i></li>
                                    @endfor
                                </ul>
                                <span class="rating-txt">({{ $product->reviews->count() }} Reviews)</span>
                            </div>
                        @endif


                        <span class="prodcut-catagory-price">
                             {!! $product->price_display !!}
                        </span>

                        <p class="deception-regular">
                            {{ __($product->small_description) }}
                        </p>

                        <ul class="prodcut-aditinal-info">
                            <li> <span>{{ __('translate.SKU') }}:</span> {{ @$product->sku }}</li>
                        </ul>
                        <div class="prodcut-quantity-item">
                            <h6 class="prodcut-quantity-txt">{{ __('translate.Quantity') }}</h6>
                            <div class="prodcut-quantity-inner">
                                <div class="quantity">
                                    <a href="#" class="quantity__minus"><span>
                                            <svg width="13" height="2" viewBox="0 0 13 2" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.8" y1="1.2" x2="12.2" y2="1.2" stroke="#636973"
                                                      stroke-width="1.6" stroke-linecap="round" />
                                            </svg>

                                        </span></a>
                                    <input name="quantity" type="text" class="quantity__input" value="1">
                                    <a href="#" class="quantity__plus"><span>
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M1.5 7.1875C1.1203 7.1875 0.8125 6.8797 0.8125 6.5C0.8125 6.1203 1.1203 5.8125 1.5 5.8125L6.3125 5.8125L6.3125 1C6.3125 0.620304 6.6203 0.3125 7 0.3125C7.3797 0.3125 7.6875 0.620304 7.6875 1L7.6875 5.8125L12.5 5.8125C12.8797 5.8125 13.1875 6.1203 13.1875 6.5C13.1875 6.8797 12.8797 7.1875 12.5 7.1875L7.6875 7.1875L7.6875 12C7.6875 12.3797 7.3797 12.6875 7 12.6875C6.6203 12.6875 6.3125 12.3797 6.3125 12L6.3125 7.1875L1.5 7.1875Z"
                                                      fill="#28303F" />
                                            </svg>

                                        </span></a>
                                </div>

                                <a class="main-btn cart-add-btn" href="javascript;"  data-product-id="{{ $product->id }}">
                                    <div class="btn_m">
                                        <div class="btn_c">
                                            <div class="btn_t1">{{ __('translate.Add to cart') }}</div>
                                            <div class="btn_t2">{{ __('translate.Add to cart') }}</div>
                                        </div>
                                    </div>
                                </a>

                                <a href="{{ route('user.add-to-wishlist', ['id' => $product->id, 'type' => 'product']) }}" class="wish-btn">
                                    <span>
                                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.41653 3.95746C4.40401 3.95746 3.5832 4.77827 3.5832 5.79079M9.99984 3.22645L9.37187 2.58246C7.41853 0.579283 4.25153 0.579281 2.29818 2.58246C0.397295 4.53184 0.33889 7.67344 2.16594 9.69572L7.4151 15.5058C8.8096 17.0493 11.1901 17.0493 12.5846 15.5058L17.8337 9.69575C19.6608 7.67347 19.6024 4.53187 17.7015 2.58248C15.7481 0.579294 12.5811 0.579296 10.6278 2.58248L9.99984 3.22645Z"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="nav_over-x-responsiver">
                                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-home-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                                                            role="tab" aria-controls="pills-home"
                                                            aria-selected="true">
                                                        {{ __('translate.Description') }}
                                                    </button>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-contact-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-contact"
                                                            type="button" role="tab" aria-controls="pills-contact"
                                                            aria-selected="false">
                                                        {{ __('translate.Reviews') }} ({{$reviews->count()}})
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                         aria-labelledby="pills-home-tab">

                                        <div class="tab-item">
                                            <h3>{{ __('translate.Description') }}</h3>
                                            <p>
                                                @php echo $product->description @endphp
                                            </p>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        @if ($reviews->count() > 0)
                                            <div class="tab-item">
                                                <h3>{{$reviews->count()}} {{ __('translate.Reviews') }} </h3>
                                            </div>
                                            <div class="tab-reviews-item-main">
                                                @foreach ($reviews as $review)
                                                    <div class="tab-reviews-item">
                                                        <div class="tab-reviews-thumb">
                                                            <img src="{{ asset($review?->user?->image) }}" alt="thumb">
                                                        </div>
                                                        <div class="tab-reviews-inner">
                                                            <div class="tab-reviews-inner-item">
                                                                <div class="tab-reviews-inner-txt">
                                                                    <h4>
                                                                        <a href="#">
                                                                            {{ html_decode($review?->user?->name) }}
                                                                        </a>
                                                                    </h4>
                                                                    <p>{{ $review->created_at->format('M d Y') }}</p>
                                                                </div>
                                                                <ul class="tab-reviews-inner-icon">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        @if ($review->rating < $i)
                                                                        <li><i class="fa-regular fa-star"></i></li>
                                                                        @else
                                                                        <li><i class="fa-solid fa-star"></i></li>
                                                                        @endif
                                                                    @endfor
                                                                </ul>
                                                            </div>

                                                            <p class="deception-regular">{{ html_decode($review->comment) }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        @auth('web')
                                            <div class="writer-review-box">
                                                <div class="tab-item">
                                                    <h3>{{ __('translate.Write Review') }} </h3>

                                                    <ul class="tab-reviews-inner-icon writer-review-icon">
                                                        <li><i onclick="listingReview(1)" data-rating="1" class="listing_rat fa-solid fa-star"></i></li>
                                                        <li><i onclick="listingReview(2)" data-rating="2" class="listing_rat fa-solid fa-star"></i></li>
                                                        <li><i onclick="listingReview(3)" data-rating="3" class="listing_rat fa-solid fa-star"></i></li>
                                                        <li><i onclick="listingReview(4)" data-rating="4" class="listing_rat fa-solid fa-star"></i></li>
                                                        <li><i onclick="listingReview(5)" data-rating="5" class="listing_rat fa-solid fa-star"></i></li>
                                                        <li><span id="rating_visible">(5.0)</span></li>
                                                    </ul>
                                                </div>


                                                <form method="POST" action="{{ route('user.store-product-review') }}" class="review_form_main">
                                                    @csrf
                                                    <input type="hidden" name="agent_id" value="1">
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" id="product_rating" name="rating" value="5">

                                                    <div class="review_form_item two">
                                                        <div class="review_form_inner">
                                                            <label class="form-label">{{ __('translate.Review') }} <span>*</span> </label>
                                                            <textarea placeholder="{{ __('translate.Type your review') }}" name="comment" class="form-control" id="exampleFormControlTextarea1" rows="7" style="height: 116px;">{{ old('comment') }}</textarea>
                                                        </div>

                                                    </div>
                                                    <div class="review_form_item">
                                                        <button type="submit" class="main-btn">
                                                            <div class="btn_m">
                                                                <div class="btn_c">
                                                                    <div class="btn_t1">{{ __('translate.Submit') }}</div>
                                                                    <div class="btn_t2">{{ __('translate.Submit') }}</div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </form>


                                            </div>
                                        @endauth



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if($relatedProducts->isNotEmpty())
            <!-- trending product part start  -->
            <section class="trending_product trending_product_two product_details_custom_padding">
            <div class="container">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-lg-6 col-sm-6 p-0">
                            <h2 class="taitel">{{ __('translate.Related Product') }}</h2>
                        </div>

                        <div class="col-lg-6 col-sm-6">

                            <div class="trending_product_arrow">
                                <span class="arrow_left">
                                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.3335 11.334L1.3335 6.33398M1.3335 6.33398L6.3335 1.33398M1.3335 6.33398L14.6668 6.33399"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>

                                <span class="arrow_right">
                                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.6665 11.334L14.6665 6.33398M14.6665 6.33398L9.6665 1.33398M14.6665 6.33398L1.33317 6.33399"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row  trending-product-slick_two">

                        @foreach($relatedProducts as $related)
                        <!-- latest_product card  -->
                        <div class="trending-product-item">
                            <div class="trending-produc-thumb">
                                <img src="{{ getImageOrPlaceholder($related->thumbnail_image, '338x366') }}" alt="thumb">
                                <div class="trending-produc-thumb-tag">
                                    @if($related->offer_price != null )
                                        <a href="{{ route('product.view', $related->slug) }}" class="tag">{{ (int) $related->offer_price }}{{ __('translate.% Off') }}</a>
                                    @endif
                                </div>

                                <div class="trending-produc-thumb-icon">
                                    <a href="{{ route('user.add-to-wishlist', ['id' => $related->id, 'type' => 'product']) }}">
                                            <span class="icon">
                                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16 4.50029C17.1045 4.50029 18 5.39572 18 6.50029M11 3.70283L11.6851 3.0003C13.816 0.815007 17.2709 0.815005 19.4018 3.00029C21.4755 5.12689 21.5392 8.55409 19.5461 10.7602L13.8197 17.0985C12.2984 18.7823 9.70154 18.7823 8.18026 17.0985L2.45393 10.7602C0.460783 8.55412 0.5245 5.12691 2.5982 3.00031C4.72912 0.815018 8.18404 0.815021 10.315 3.00031L11 3.70283Z"
                                                        stroke="#28303F" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                            </span>
                                    </a>
                                </div>
                                <!-- cart btn  -->
                                <button type="button" data-product-id="{{ $related->id }}" class="trending-produc-thumb-add-btn cart-add-btn">
                                        <span>
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.9167 18.791C11.9167 19.5504 12.5324 20.166 13.2917 20.166C14.0511 20.166 14.6667 19.5504 14.6667 18.791C14.6667 18.0316 14.0511 17.416 13.2917 17.416C12.5324 17.416 11.9167 18.0316 11.9167 18.791Z"
                                                    stroke="white" stroke-width="1.5" />
                                                <path
                                                    d="M3.66675 18.791C3.66675 19.5504 4.28236 20.166 5.04175 20.166C5.80114 20.166 6.41675 19.5504 6.41675 18.791C6.41675 18.0316 5.80114 17.416 5.04175 17.416C4.28236 17.416 3.66675 18.0316 3.66675 18.791Z"
                                                    stroke="white" stroke-width="1.5" />
                                                <path
                                                    d="M16.5001 3.66732L5.50008 3.66732C3.47504 3.66732 1.83342 5.30894 1.83342 7.33398L1.83341 11.9173C1.83341 13.9424 3.47504 15.584 5.50008 15.584L12.8334 15.584C14.8585 15.584 16.5001 13.9424 16.5001 11.9173L16.5001 3.66732ZM16.5001 3.66732C16.5001 2.6548 17.3209 1.83398 18.3334 1.83398L20.1667 1.83398M16.5001 7.33398L2.29175 7.33398"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                </button>
                            </div>

                            <div class="trending-produc-inner">
                                @if($related->reviews->isNotEmpty() )
                                    @php
                                        $avgRating = $related->reviews->avg('rating');
                                    @endphp
                                    <ul class="rating">
                                        @for($i = 1; $i <= 5; $i++)
                                        <li>
                                            <i class="fa-{{ ($i <= $avgRating) ? 'solid' : 'regular' }} fa-star"></i>
                                        </li>
                                        @endfor
                                    </ul>
                                @endif
                                <a href="{{ route('product.view', $related->slug) }}">
                                    <h4 class="trending-produc-inner-txt">
                                        {{ $related->translate->name }}
                                    </h4>
                                </a>
                                <p class="deception-medium">
                                    {!! $related->price_display !!}
                                </p>
                            </div>
                        </div>
                        <!-- latest_product card  -->
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
            <!-- trending  product part end  -->
        @endif
    </main>
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
@endpush
