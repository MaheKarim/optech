<li class="{{ Route::is('admin.subscription-plan.*') || Route::is('admin.purchase-history') || Route::is('admin.purchase-history-detail') || Route::is('admin.pending-purchase-history') ? 'active' : '' }}"><a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__sub_list"><span class="menu-bar__text">
    <span class="crancy-menu-icon crancy-svg-icon__v1">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 10H16M8 14H16M8 18H12M8 4C8 5.10457 8.89543 6 10 6H14C15.1046 6 16 5.10457 16 4M8 4C8 2.89543 8.89543 2 10 2H14C15.1046 2 16 2.89543 16 4M8 4H7C4.79086 4 3 5.79086 3 8V18C3 20.2091 4.79086 22 7 22H17C19.2091 22 21 20.2091 21 18V8C21 5.79086 19.2091 4 17 4H16" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/>
        </svg>

    </span>
    <span class="menu-bar__name">{{ __('translate.Subscription Plan') }}</span></span> <span class="crancy__toggle"></span></a></span>
    <!-- Dropdown Menu -->
    <div class="collapse crancy__dropdown {{ Route::is('admin.subscription-plan.*') || Route::is('admin.purchase-history') || Route::is('admin.purchase-history-detail') || Route::is('admin.pending-purchase-history') || Route::is('admin.assign-plan') ? 'show' : '' }}" id="menu-item__sub_list"  data-bs-parent="#CrancyMenu">
        <ul class="menu-bar__one-dropdown">

            <li><a href="{{ route('admin.subscription-plan.index') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Plan List') }}</span></span></a></li>

            <li><a href="{{ route('admin.purchase-history') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Purchase History') }}</span></span></a></li>

            <li><a href="{{ route('admin.pending-purchase-history') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Pending History') }}</span></span></a></li>

            <li><a href="{{ route('admin.assign-plan') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Assign Plan') }}</span></span></a></li>

        </ul>
    </div>
</li>
