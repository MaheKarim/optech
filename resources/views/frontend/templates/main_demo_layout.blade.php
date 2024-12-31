@extends('layout')

@section('front-content')
    <header class="site-header optech-header-section" id="sticky-menu">
        <div class="optech-header-top bg-light1">
            <div class="container">
                <div class="optech-header-info-wrap">
                    <div class="optech-header-info dark-color">
                        <ul>
                            <li><i class="ri-map-pin-2-fill"></i>{{ $footer->address }}</li>
                            <li><a href="tel:{{ $footer->phone }}"><i class="ri-phone-fill"></i>{{ $footer->phone }}</a>
                            </li>
                            <li><a href="mailto:{{ $footer->email }}"><i class="ri-mail-fill"></i> {{ $footer->email }}
                                </a></li>
                        </ul>
                    </div>

                    <div class="optech-header-info-right">
                        <div class="cur_lun_login_item">
              <span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 11.25C11.3096 11.25 10.75 10.6904 10.75 10C10.75 9.30964 11.3096 8.75 12 8.75C12.6904 8.75 13.25 9.30964 13.25 10C13.25 10.4142 13.5858 10.75 14 10.75C14.4142 10.75 14.75 10.4142 14.75 10C14.75 8.74122 13.9043 7.67998 12.75 7.35352V6.5C12.75 6.08579 12.4142 5.75 12 5.75C11.5858 5.75 11.25 6.08579 11.25 6.5V7.35352C10.0957 7.67998 9.25 8.74122 9.25 10C9.25 11.5188 10.4812 12.75 12 12.75C12.6904 12.75 13.25 13.3096 13.25 14C13.25 14.6904 12.6904 15.25 12 15.25C11.3096 15.25 10.75 14.6904 10.75 14C10.75 13.5858 10.4142 13.25 10 13.25C9.58579 13.25 9.25 13.5858 9.25 14C9.25 15.2588 10.0957 16.32 11.25 16.6465V17.5C11.25 17.9142 11.5858 18.25 12 18.25C12.4142 18.25 12.75 17.9142 12.75 17.5V16.6465C13.9043 16.32 14.75 15.2588 14.75 14C14.75 12.4812 13.5188 11.25 12 11.25Z"
                        fill="white"/>
                </svg>
              </span>
                    <select class="js-example-basic-single" name="currency_code">
                        @foreach ($currency_list as $currency_item)
                            <option
                                {{ Session::get('currency_code') == $currency_item->currency_code ? 'selected' : '' }} value="{{ $currency_item->currency_code }}">{{ $currency_item->currency_name }}</option>
                        @endforeach
                    </select>
            </div>

        <div class="cur_lun_login_item">
              <span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.87643 2.47813C7.18954 4.3671 6.75001 7.02637 6.75001 10C6.75001 10.3796 6.75718 10.754 6.7711 11.1224C7.79627 11.2054 8.87923 11.25 10 11.25C11.1208 11.25 12.2038 11.2054 13.2289 11.1224C13.2429 10.754 13.25 10.3796 13.25 10C13.25 7.02637 12.8105 4.3671 12.1236 2.47813C11.779 1.53057 11.3865 0.816517 10.9883 0.353377C10.8696 0.215345 10.7565 0.106123 10.6496 0.0207619C10.4349 0.00699121 10.2183 0 10 0C9.78177 0 9.56516 0.00699124 9.3504 0.020762C9.24349 0.106123 9.13042 0.215345 9.01175 0.353377C8.61357 0.816517 8.221 1.53057 7.87643 2.47813ZM13.1315 12.6346C12.1291 12.71 11.0797 12.75 10 12.75C8.92028 12.75 7.87096 12.71 6.86854 12.6346C7.04293 14.5326 7.40024 16.2123 7.87643 17.5219C8.221 18.4694 8.61357 19.1835 9.01175 19.6466C9.13042 19.7847 9.24348 19.8939 9.35039 19.9792C9.56516 19.993 9.78177 20 10 20C10.2183 20 10.4349 19.993 10.6496 19.9792C10.7565 19.8939 10.8696 19.7847 10.9883 19.6466C11.3865 19.1835 11.779 18.4694 12.1236 17.5219C12.5998 16.2123 12.9571 14.5326 13.1315 12.6346ZM5.26493 10.968C5.25504 10.6486 5.25001 10.3257 5.25001 10C5.25001 6.8985 5.70592 4.05777 6.46674 1.96552C6.67341 1.39719 6.90681 0.872262 7.16688 0.407001C3.12245 1.59958 0.144576 5.28026 0.00512695 9.67717C0.882073 10.0753 2.09222 10.433 3.56698 10.7066C4.104 10.8062 4.67155 10.8938 5.26493 10.968ZM0.0879116 11.3317C1.0045 11.6736 2.09274 11.9587 3.29339 12.1814C3.94235 12.3018 4.63038 12.4051 5.3503 12.4893C5.5238 14.6072 5.91514 16.5176 6.46674 18.0345C6.67341 18.6028 6.90681 19.1277 7.16688 19.593C3.43599 18.4929 0.612705 15.2755 0.0879116 11.3317ZM14.6497 12.4893C15.3697 12.4051 16.0577 12.3018 16.7066 12.1814C17.9073 11.9587 18.9955 11.6736 19.9121 11.3317C19.3873 15.2755 16.564 18.4929 12.8332 19.593C13.0932 19.1277 13.3266 18.6028 13.5333 18.0345C14.0849 16.5176 14.4762 14.6072 14.6497 12.4893ZM19.9949 9.67717C19.118 10.0753 17.9078 10.433 16.4331 10.7066C15.896 10.8062 15.3285 10.8938 14.7351 10.968C14.745 10.6486 14.75 10.3257 14.75 10C14.75 6.8985 14.2941 4.05777 13.5333 1.96552C13.3266 1.39719 13.0932 0.872265 12.8332 0.407004C16.8776 1.59958 19.8555 5.28026 19.9949 9.67717Z"
                        fill="white"/>
                </svg>
              </span>

                            <form action="{{ route('language-switcher') }}" id="language_form">
                                <select id="language_dropdown" class="js-example-basic-single" name="lang_code">
                                    @foreach ($language_list as $language_item)
                                        <option {{ Session::get('front_lang') == $language_item->lang_code ? 'selected' : '' }} value="{{ $language_item->lang_code }}">{{ $language_item->lang_name }}</option>
                                    @endforeach
                                </select>
                            </form>

                        </div>
                        <div class="cur_lun_login_item">
              <span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11ZM12 21C15.866 21 19 19.2091 19 17C19 14.7909 15.866 13 12 13C8.13401 13 5 14.7909 5 17C5 19.2091 8.13401 21 12 21Z"
                        fill="white"/>
                </svg>
              </span>
                            <a href="{{ route('login') }}" class="login-btn">{{ __('translate.Login') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="optech-header-bottom bg-white">
            <div class="container">
                    <nav class="navbar site-navbar">
                        <!-- Brand Logo-->
                        <div class="brand-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset($general_setting->logo) }}" alt="logo" class="light-version-logo">
                            </a>
                        </div>
                        <div class="menu-block-wrapper">
                            <div class="menu-overlay"></div>
                            <nav class="menu-block" id="append-menu-header">
                                <div class="mobile-menu-head">
                                    <div class="go-back">
                                        <i class="fa fa-angle-left"></i>
                                    </div>
                                    <div class="current-menu-title"></div>
                                    <div class="mobile-menu-close">&times;</div>
                                </div>

                                <ul class="site-menu-main">
                                    <li class="nav-item nav-item-has-children">
                                        <a href="#" class="nav-link-item drop-trigger">{{ __('translate.Home') }} <i
                                                class="ri-arrow-down-s-fill"></i></a>
                                        <ul class="sub-menu" id="submenu-1">
                                            <li class="sub-menu--item">
                                                <a href="{{ route('home', ['theme' => 'main_demo']) }}">
                                                    <span class="menu-item-text">{{ __('translate.Main Demo') }}</span>
                                                </a>
                                            </li>
                                            <li class="sub-menu--item">
                                                <a href="{{ route('home', ['theme' => 'it_solutions']) }}">
                                                    <span
                                                        class="menu-item-text">{{ __('translate.IT Solutions') }}</span>
                                                </a>
                                            </li>
                                            <li class="sub-menu--item">
                                                <a href="{{ route('home', ['theme' => 'tech_agency']) }}">
                                                    <span class="menu-item-text">{{ __('translate.Tech Agency')}}</span>
                                                </a>
                                            </li>
                                            <li class="sub-menu--item">
                                                <a href="{{ route('home', ['theme' => 'startup_home']) }}">
                                                    <span
                                                        class="menu-item-text">{{ __('translate.Startup Home') }}</span>
                                                </a>
                                            </li>
                                            <li class="sub-menu--item">
                                                <a href="{{ route('home', ['theme' => 'it_consulting']) }}">
                                                    <span
                                                        class="menu-item-text">{{ __('translate.IT Consulting') }}</span>
                                                </a>
                                            </li>
                                            <li class="sub-menu--item">
                                                <a href="{{ route('home', ['theme' => 'soft_company']) }}">
                                                    <span
                                                        class="menu-item-text">{{ __('translate.Software Company') }}</span>
                                                </a>
                                            </li>
                                            <li class="sub-menu--item">
                                                <a href="{{ route('home', ['theme' => 'digital_agency']) }}">
                                                    <span
                                                        class="menu-item-text">{{ __('translate.Digital Agency') }}</span>
                                                </a>
                                            </li>
                                            <li class="sub-menu--item">
                                                <a href="{{ route('home', ['theme' => 'tech_company']) }}">
                                                    <span
                                                        class="menu-item-text">{{ __('translate.Tech Company') }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item nav-item-has-children">
                                        <a href="#" class="nav-link-item drop-trigger">{{ __('translate.Pages') }} <i
                                                class="ri-arrow-down-s-fill"></i></a>
                                        <ul class="sub-menu" id="submenu-2">
                                            <li class="sub-menu--item">
                                                <a href="{{ route('about-us') }}">
                                                    <span class="menu-item-text">{{ __('translate.About Us') }}</span>
                                                </a>
                                            </li>
                                            <li class="sub-menu--item">
                                                <a href="pricing.html">
                                                    <span class="menu-item-text">Pricing</span>
                                                </a>
                                            </li>

                                            <li class="sub-menu--item nav-item-has-children">
                                                <a href="#" data-menu-get="h3"
                                                   class="drop-trigger">{{ __('translate.Blog') }} <i
                                                        class="ri-arrow-down-s-fill"></i></a>
                                                <ul class="sub-menu shape-none" id="submenu-3">
                                                    <li class="sub-menu--item">
                                                        <a href="{{ route('blogs') }}">
                                                            <span
                                                                class="menu-item-text">{{ __('translate.Blog') }}</span>
                                                        </a>
                                                    </li>
                                                    <li class="sub-menu--item">
                                                        <a href="{{ route('blogs') }}">
                                                            <span class="menu-item-text">Blog Grid</span>
                                                        </a>
                                                    </li>
                                                    <li class="sub-menu--item">
                                                        <a href="single-blog.html">
                                                            <span class="menu-item-text">Blog details</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="sub-menu--item nav-item-has-children">
                                                <a href="#" data-menu-get="h3" class="drop-trigger">Service<i
                                                        class="ri-arrow-down-s-fill"></i>
                                                </a>
                                                <ul class="sub-menu shape-none" id="submenu-4">
                                                    <li class="sub-menu--item">
                                                        <a href="service.html">
                                                            <span class="menu-item-text">Service</span>
                                                        </a>
                                                    </li>
                                                    <li class="sub-menu--item">
                                                        <a href="single-service.html">
                                                            <span class="menu-item-text">Service details</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="sub-menu--item nav-item-has-children">
                                                <a href="#" data-menu-get="h3" class="drop-trigger">Team<i
                                                        class="ri-arrow-down-s-fill"></i>
                                                </a>
                                                <ul class="sub-menu shape-none" id="submenu-5">
                                                    <li class="sub-menu--item">
                                                        <a href="team.html">
                                                            <span class="menu-item-text">Team</span>
                                                        </a>
                                                    </li>
                                                    <li class="sub-menu--item">
                                                        <a href="single-team.html">
                                                            <span class="menu-item-text">Team details</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="sub-menu--item nav-item-has-children">
                                                <a href="#" data-menu-get="h3" class="drop-trigger">Utility<i
                                                        class="ri-arrow-down-s-fill"></i>
                                                </a>
                                                <ul class="sub-menu shape-none" id="submenu-7">
                                                    <li class="sub-menu--item">
                                                        <a href="{{ route('faq') }}">
                                                            <span
                                                                class="menu-item-text">{{ __('translate.FAQ') }}</span>
                                                        </a>
                                                    </li>
                                                    <li class="sub-menu--item">
                                                        <a href="errors-404.html">
                                                            <span class="menu-item-text">Error 404</span>
                                                        </a>
                                                    </li>
                                                    <li class="sub-menu--item">
                                                        <a href="testimonial.html">
                                                            <span class="menu-item-text">Testimonial</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="sub-menu--item nav-item-has-children">
                                                <a href="#" data-menu-get="h3" class="drop-trigger">Shop<i
                                                        class="ri-arrow-down-s-fill"></i>
                                                </a>
                                                <ul class="sub-menu shape-none" id="submenu-8">
                                                    <li class="sub-menu--item">
                                                        <a href="shop.html">
                                                            <span class="menu-item-text">Shop</span>
                                                        </a>
                                                    </li>
                                                    <li class="sub-menu--item">
                                                        <a href="single-shop.html">
                                                            <span class="menu-item-text">Shop Details</span>
                                                        </a>
                                                    </li>
                                                    <li class="sub-menu--item">
                                                        <a href="my-cart.html">
                                                            <span class="menu-item-text">My Cart</span>
                                                        </a>
                                                    </li>
                                                    <li class="sub-menu--item">
                                                        <a href="checkout.html">
                                                            <span class="menu-item-text">Checkout</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item nav-item-has-children">
                                        <a href="#" class="nav-link-item drop-trigger">Portfolio <i
                                                class="ri-arrow-down-s-fill"></i></a>
                                        <ul class="sub-menu shape-none" id="submenu-6">
                                            <li class="sub-menu--item">
                                                <a href="portfolio-01.html">
                                                    <span class="menu-item-text">Portfolio Grid</span>
                                                </a>
                                            </li>
                                            <li class="sub-menu--item">
                                                <a href="portfolio-02.html">
                                                    <span class="menu-item-text">Portfolio masonry</span>
                                                </a>
                                            </li>
                                            <li class="sub-menu--item">
                                                <a href="single-portfolio.html">
                                                    <span class="menu-item-text">Single Portfolio</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item nav-item-has-children">
                                        <a href="#" class="nav-link-item drop-trigger">{{ __('translate.Blog') }} <i
                                                class="ri-arrow-down-s-fill"></i></a>
                                        <ul class="sub-menu" id="submenu-9">
                                            <li class="sub-menu--item">
                                                <a href="{{ route('blogs') }}">
                                                    <span class="menu-item-text">{{ __('translate.Blog') }}</span>
                                                </a>
                                            </li>
                                            <li class="sub-menu--item">
                                                <a href="{{ route('blogs') }}">
                                                    <span class="menu-item-text">Blog grid</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link-item"
                                           href="{{ route('contact-us') }}">{{ __('translate.Contact') }}</a>
                                    </li>
                                </ul>

                            </nav>
                        </div>
                        <div class="header-btn header-btn-l1 ms-auto d-none d-xs-inline-flex">
                            <div class="optech-header-icon">

                                <div class="optech-header-search">
                                    <i class="ri-search-line"></i>
                                </div>

                                <div class="optech-header-cart">
                                      <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M18.1906 6.00295L15.6009 2.55004C15.3524 2.21867 14.8823 2.15152 14.5509 2.40004C14.2196 2.64857 14.1524 3.11867 14.4009 3.45004L16.3134 6H7.68847L9.60093 3.45004C9.84946 3.11867 9.7823 2.64857 9.45093 2.40004C9.11956 2.15152 8.64946 2.21867 8.40093 2.55004L5.81125 6.00295C3.91268 6.07556 2.40486 7.481 2.07031 9.25H21.9315C21.5969 7.48103 20.0891 6.07561 18.1906 6.00295ZM20.2829 18.808C19.903 20.6666 18.2815 22 16.4011 22H7.60066C5.7203 22 4.09876 20.6666 3.71893 18.808L2.08401 10.808C2.08006 10.7887 2.07625 10.7693 2.07258 10.75H21.9292C21.9255 10.7693 21.9217 10.7887 21.9178 10.808L20.2829 18.808ZM9.00073 13.25C9.41495 13.25 9.75073 13.5858 9.75073 14L9.75073 18C9.75073 18.4142 9.41495 18.75 9.00073 18.75C8.58652 18.75 8.25073 18.4142 8.25073 18L8.25073 14C8.25073 13.5858 8.58652 13.25 9.00073 13.25ZM15.7507 14C15.7507 13.5858 15.4149 13.25 15.0007 13.25C14.5865 13.25 14.2507 13.5858 14.2507 14V18C14.2507 18.4142 14.5865 18.75 15.0007 18.75C15.4149 18.75 15.7507 18.4142 15.7507 18V14Z"
                                                fill="#0A165E"/>
                                        </svg>
                                      </span>
                                    <span class="cart_number">3</span>
                                </div>

                                <a class="optech-default-btn optech-header-btn" href="{{ route('contact-us') }}"
                                   data-text="Get in Touch"><span
                                        class="btn-wraper">{{ __('translate.Get in Touch') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="mobile-menu-trigger">
                            <span></span>
                        </div>
                    </nav>
                </div>
            </div>

        <div class="optech-header-search-section">
            <div class="container">
                <div class="optech-header-search-box">
                    <input type="search" placeholder="Search here...">
                    <button id="header-search" type="button"><i class="ri-search-line"></i></button>
                    <p>{{ __('translate.Type above and press Enter to search. Press Close to cancel.') }}</p>
                </div>
            </div>
            <div class="optech-header-search-close">
                <i class="ri-close-line"></i>
            </div>
        </div>
    </header>
    <div class="search-overlay"></div>

    @yield('content')

<!-- Footer Section Start -->
    @unless(Route::is('contact-us'))
        @include('frontend.templates.layouts.main_demo_cta')
    @endunless
<footer class="optech-footer-section dark-bg">
    <div class="container">
        <div class="optech-footer-top optech-section-padding">
            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <div class="optech-footer-textarea light-color">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset($general_setting->white_logo) }}" alt="Logo">
                        </a>
                        <p>{{ $footer->about_us }}</p>
                        <div class="optech-social-icon-box">
                            <ul>
                                <li>
                                    <a href="{{ @$footer->facebook }}">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ @$footer->linkedin }}">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ @$footer->twitter }}">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ @$footer->instagram }}">
                                        <i class="ri-instagram-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 offset-xl-1 col-md-4">
                    <div class="optech-footer-menu">
                        <div class="optech-footer-title">
                            <h5>{{ __('Quick Links') }}</h5>
                        </div>
                        <ul>
                            <li><a href="{{ route('about-us') }}">{{ __('About Us') }}</a></li>
                            <li><a href="{{ route('services') }}">{{ __('Our Services') }}</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="{{ route('blogs') }}">{{ __('Blogs') }}</a></li>
                            <li><a href="{{ route('contact-us') }}">{{ __('Contact Us') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-5">
                    <div class="optech-footer-menu">
                        <div class="optech-footer-title">
                            <h5>{{ __('Services') }}</h5>
                        </div>
                        <ul>
                            <li><a href="">UI/UX Design</a></li>
                            <li><a href="">App Development</a></li>
                            <li><a href="">Digital Marketing</a></li>
                            <li><a href="">Web Development</a></li>
                            <li><a href="">Cyber Security</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3">
                    <div class="optech-footer-menu mb-0">
                        <div class="optech-footer-title">
                            <h5>{{ __('Information') }}</h5>
                        </div>
                        <ul>
                            <li><a href="">Working Process</a></li>
                            <li><a href="">Privacy Policy</a></li>
                            <li><a href="">Terms & Conditions</a></li>
                            <li><a href="{{ route('faq') }}">{{ __('Faq') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="optech-footer-bottom center">
            <div class="optech-copywright">
                <p>  {{ $footer->copyright }}</p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
@endsection
