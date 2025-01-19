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

        <ul class="site-menu-main {{ $menuTheme ?? '' }}">
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
                           <span class="menu-item-text">{{ __('translate.IT Solutions') }}</span>
                        </a>
                    </li>
                    <li class="sub-menu--item">
                        <a href="{{ route('home', ['theme' => 'tech_agency']) }}">
                            <span class="menu-item-text">{{ __('translate.Tech Agency')}}</span>
                        </a>
                    </li>
                    <li class="sub-menu--item">
                        <a href="{{ route('home', ['theme' => 'startup_home']) }}">
                        <span  class="menu-item-text">{{ __('translate.Startup Home') }}</span>
                        </a>
                    </li>
                    <li class="sub-menu--item">
                        <a href="{{ route('home', ['theme' => 'it_consulting']) }}">
                           <span class="menu-item-text">{{ __('translate.IT Consulting') }}</span>
                        </a>
                    </li>
                    <li class="sub-menu--item">
                        <a href="{{ route('home', ['theme' => 'soft_company']) }}">
                           <span class="menu-item-text">{{ __('translate.Software Company') }}</span>
                        </a>
                    </li>
                    <li class="sub-menu--item">
                        <a href="{{ route('home', ['theme' => 'digital_agency']) }}">
                           <span class="menu-item-text">{{ __('translate.Digital Agency') }}</span>
                        </a>
                    </li>
                    <li class="sub-menu--item">
                        <a href="{{ route('home', ['theme' => 'tech_company']) }}">
                            <span class="menu-item-text">{{ __('translate.Tech Company') }}</span>
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
                        <a href="{{ route('pricing') }}">
                            <span class="menu-item-text">{{ __('Pricing Plan') }}</span>
                        </a>
                    </li>

                    <li class="sub-menu--item ">
                        <a href="{{ route('services') }}"  class="drop-trigger">{{ __('Service') }}
                        </a>
                    </li>

                    <li class="sub-menu--item ">
                        <a href="{{ route('teams') }}" class="drop-trigger">{{ __('Our Teams') }}
                        </a>
                    </li>
                    <li class="sub-menu--item nav-item-has-children">
                        <a href="#" data-menu-get="h3" class="drop-trigger">{{ __('Utility') }}<i
                                class="ri-arrow-down-s-fill"></i>
                        </a>
                        <ul class="sub-menu shape-none" id="submenu-7">
                            <li class="sub-menu--item">
                                <a href="{{ route('faq') }}">
                                    <span
                                        class="menu-item-text">{{ __('FAQ') }}</span>
                                </a>
                            </li>

                            <li class="sub-menu--item">
                                <a href="{{ route('testimonials') }}">
                                    <span class="menu-item-text">{{ __('Testimonials') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu--item nav-item-has-children">
                        <a href="#" data-menu-get="h3" class="drop-trigger">{{ __('Shop') }}<i
                                class="ri-arrow-down-s-fill"></i>
                        </a>
                        <ul class="sub-menu shape-none" id="submenu-8">
                            <li class="sub-menu--item">
                                <a href="{{ route('product.shop') }}">
                                    <span class="menu-item-text">{{ __('Shop') }}</span>
                                </a>
                            </li>

                            <li class="sub-menu--item">
                                <a href="{{ route('cart.cart') }}">
                                    <span class="menu-item-text">{{ __('My Cart') }}</span>
                                </a>
                            </li>
                            <li class="sub-menu--item">
                                <a href="{{ route('checkout.index') }}">
                                    <span class="menu-item-text">{{ __('Checkout') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            @php
                $portfolioType = Modules\GlobalSetting\App\Models\GlobalSetting::where('key', 'portfolio_type')->first()?->value ?? 'default';
                $isGrid = $portfolioType === 'grid';
            @endphp

            @if(config('app.env') === 'DEMO')
                <li class="nav-item nav-item-has-children">
                <a href="#" class="nav-link-item drop-trigger">{{ __('Portfolio') }} <i
                        class="ri-arrow-down-s-fill"></i></a>
                <ul class="sub-menu shape-none" id="submenu-6">
                    <li class="sub-menu--item">
                        <a href="{{ route('portfolio', ['type' => 'grid']) }}">
                            <span class="menu-item-text {{ $isGrid ? 'active' : '' }}">{{ __('Portfolio Grid') }}</span>
                        </a>
                    </li>
                    <li class="sub-menu--item">
                        <a href="{{ route('portfolio') }}">
                            <span class="menu-item-text {{ !$isGrid ? 'active' : '' }}">{{ __('Portfolio Masonry') }}</span>
                        </a>
                    </li>

                </ul>
            </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('portfolio', $isGrid ? ['type' => 'grid'] : []) }}" class="nav-link-item">
                        <span class="menu-item-text active">{{ __('translate.Portfolio') }}</span>
                    </a>
                </li>
            @endif

            @php
                $blogType = Modules\GlobalSetting\App\Models\GlobalSetting::where('key', 'blog_type')->first()?->value ?? 'default';
                $isGrid = $blogType === 'grid';
            @endphp

            @if(config('app.env') === 'DEMO')
                <li class="nav-item nav-item-has-children">
                    <a href="#" class="nav-link-item drop-trigger">{{ __('translate.Blog') }} <i
                            class="ri-arrow-down-s-fill"></i></a>
                    <ul class="sub-menu" id="submenu-9">
                        <li class="sub-menu--item">
                            <a href="{{ route('blogs') }}">
                                <span class="menu-item-text {{ !$isGrid ? 'active' : '' }}">{{ __('translate.Blog') }}</span>
                            </a>
                        </li>
                        <li class="sub-menu--item">
                            <a href="{{ route('blogs', ['type' => 'grid']) }}">
                                <span class="menu-item-text {{ $isGrid ? 'active' : '' }}">{{ __('Blog Grid') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('blogs', $isGrid ? ['type' => 'grid'] : []) }}" class="nav-link-item">
                        <span class="menu-item-text active">{{ __('translate.Blog') }}</span>
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link-item"
                   href="{{ route('contact-us') }}">{{ __('translate.Contact') }}</a>
            </li>
        </ul>
    </nav>
</div>
