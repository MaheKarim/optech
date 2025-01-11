

<li class="{{ Route::is('admin.product*') || Route::is('admin.shipping-method.index') ? 'active' : '' }}" >
    <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__ecommerce"><span class="menu-bar__text">
  <span class="crancy-menu-icon crancy-svg-icon__v1">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 6H20L18.5 14.5H8.5L6 6Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <circle cx="9" cy="19" r="1.5" fill="#fff"></circle>
        <circle cx="17" cy="19" r="1.5" fill="#fff"></circle>
    </svg>
</span>

    <span class="menu-bar__name">{{ __('translate.Ecommerce') }}</span></span> <span class="crancy__toggle"></span></a></span>
    <div class="collapse crancy__dropdown {{  Route::is('admin.product*') || Route::is('admin.shipping-method.index') || Route::is('admin.order*') ? 'show' : '' }}" id="menu-item__ecommerce"  data-bs-parent="#CrancyMenu">
        <ul class="menu-bar__one-dropdown">
            <li><a href="{{ route('admin.product.index') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Manage Product') }}</span></span></a></li>
            <li><a href="{{ route('admin.shipping-method.index') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Shipping Method') }}</span></span></a></li>
            <li><a href="{{ route('admin.order.index') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Manage Orders') }}</span></span></a></li>
            <li><a href="{{ route('admin.product.review.list') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Review List') }}</span></span></a></li>
        </ul>
    </div>
</li>
