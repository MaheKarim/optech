@extends('seller.dashboard_layout')
@section('title')
    <title>{{ __('Orders List') }}</title>
@endsection
@section('breadcrumb')
    <h1 class="post__title">{{ __('Orders') }}</h1>
    <nav class="breadcrumbs">
        <ul>
            <li><a href="{{ route('user.dashboard') }}">{{ __('Home') }}</a></li>
            <li> {{ __('Orders ') }} </li>
        </ul>
    </nav>
@endsection
@section('dashboard-content')
    <!-- End breadcrumb -->

    <div class="dashbord_table_top">
        <div class="dashbord_table_top_left">
            <div class="dashbord_table_top_left_text">
                <p>Show</p>
            </div>
            <div class="optech-checkout-field dropdown">
                <select>
                    <option value="Option 1">10</option>
                    <option value="Option 2">20</option>
                    <option value="Option 3">30</option>
                </select>
            </div>
            <div class="dashbord_table_top_left_text">
                <p>entries</p>
            </div>
        </div>


        <form class="dashbord_table_top_right">
            <div class="optech-checkout-field">
                <input type="text" placeholder="Search">
            </div>

            <button type="button" class="search_btn">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.5 21.75C5.85 21.75 1.25 17.15 1.25 11.5C1.25 5.85 5.85 1.25 11.5 1.25C17.15 1.25 21.75 5.85 21.75 11.5C21.75 17.15 17.15 21.75 11.5 21.75ZM11.5 2.75C6.67 2.75 2.75 6.68 2.75 11.5C2.75 16.32 6.67 20.25 11.5 20.25C16.33 20.25 20.25 16.32 20.25 11.5C20.25 6.68 16.33 2.75 11.5 2.75Z"
                                                fill="#292D32"/>
                                            <path
                                                d="M22.0004 22.7504C21.8104 22.7504 21.6204 22.6804 21.4704 22.5304L19.4704 20.5304C19.1804 20.2404 19.1804 19.7604 19.4704 19.4704C19.7604 19.1804 20.2404 19.1804 20.5304 19.4704L22.5304 21.4704C22.8204 21.7604 22.8204 22.2404 22.5304 22.5304C22.3804 22.6804 22.1904 22.7504 22.0004 22.7504Z"
                                                fill="#292D32"/>
                                        </svg>
                                    </span>
            </button>

        </form>

    </div>

    @if($orders->isEmpty())
        @include('ecommerce::user.order.no_order')
    @else
        @include('ecommerce::user.order.with_order')

        <div class="optech-navigation">
            <nav class="navigation pagination" aria-label="Posts">
                <div class="nav-links">
                    <a class="next page-numbers" href="">
                        <i class="ri-arrow-left-s-line"></i>
                    </a>
                    <span aria-current="page" class="page-numbers current">1</span>
                    <a class="page-numbers" href="">2</a>
                    <a class="page-numbers" href="">3</a>
                    <a class="next page-numbers" href="">
                        <i class="ri-arrow-right-s-line"></i>
                    </a>
                </div>
            </nav>
        </div>
    @endif
    <!-- End section -->
@endsection
