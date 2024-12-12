
    <li class="{{ Route::is('admin.refund.*') ? 'active' : '' }}"><a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__refund_list"><span class="menu-bar__text">
        <span class="crancy-menu-icon crancy-svg-icon__v1">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 10H16M8 14H16M6 22H18C20.2091 22 22 20.2091 22 18V6C22 3.79086 20.2091 2 18 2H6C3.79086 2 2 3.79086 2 6V18C2 20.2091 3.79086 22 6 22Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>


        </span>

        <span class="menu-bar__name">{{ __('translate.Manage Refund') }}</span></span> <span class="crancy__toggle"></span></a></span>
        <!-- Dropdown Menu -->
        <div class="collapse crancy__dropdown {{ Route::is('admin.refund.*') ? 'show' : '' }}" id="menu-item__refund_list"  data-bs-parent="#CrancyMenu">
            <ul class="menu-bar__one-dropdown">

                <li><a href="{{ route('admin.refund.index') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Refund List') }}</span></span></a></li>

                <li><a href="{{ route('admin.refund.index', ['type' => 'approved']) }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Approved Refund') }}</span></span></a></li>

                <li><a href="{{ route('admin.refund.index', ['type' => 'pending']) }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Pending Refund') }}</span></span></a></li>

                <li><a href="{{ route('admin.refund.index', ['type' => 'rejected']) }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Rejected Refund') }}</span></span></a></li>

            </ul>
        </div>
    </li>