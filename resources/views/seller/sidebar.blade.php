<div class="col-xxl-3 col-xl-4 col-lg-4 col-md-5">
    <div class="dashbord_sidebar">
        <div class="dashbord_prof_box">
            <div class="dashbord_prof_thumb_main">
                <div class="dashbord_prof_thumb">
                    @php
                        use Illuminate\Support\Facades\Auth;
                        $user = Auth::guard('web')->user();
                    @endphp
                    <img src="{{ asset($user->image) }}" alt="thumb">
                </div>

                <span class="change_prof_thumb">
                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.40447 9.75234C2.67133 9.01664 1.93043 8.2727 1.18823 7.5279C3.0713 5.63883 4.95696 3.74672 6.83874 1.85938C7.57361 2.59854 8.31365 3.34291 9.04809 4.08164C7.17148 5.96725 5.28625 7.86153 3.40447 9.75234Z"
                            fill="white"/>
                        <path
                            d="M9.65426 3.49537C9.6228 3.45985 9.59478 3.42475 9.56332 3.39312C8.87715 2.70291 8.19056 2.01271 7.50396 1.3225C7.43026 1.24841 7.43112 1.24885 7.50568 1.17346C7.78325 0.89486 8.06212 0.617564 8.3371 0.335936C8.50519 0.163493 8.69915 0.0421759 8.94008 0.0105468C9.23963 -0.0288812 9.51418 0.0404428 9.73615 0.248848C9.99001 0.487149 10.2314 0.738881 10.4771 0.985848C10.5783 1.08767 10.6788 1.19035 10.7766 1.29521C11.0749 1.6154 11.077 2.0595 10.7723 2.37276C10.4133 2.74234 10.046 3.10413 9.68227 3.46938C9.6771 3.47458 9.6715 3.47891 9.65426 3.49451V3.49537Z"
                            fill="white"/>
                        <path
                            d="M2.80052 10.3859C2.68329 10.4145 2.58157 10.4396 2.47985 10.4643C1.75878 10.6398 1.03813 10.8157 0.317057 10.9903C0.126551 11.0362 -0.0286115 10.898 0.00414505 10.7035C0.0364706 10.5124 0.0843125 10.3239 0.12612 10.1346C0.266629 9.49983 0.407568 8.86509 0.548077 8.22991C0.553249 8.20738 0.556266 8.18485 0.568765 8.15625C1.31656 8.89022 2.05186 9.63458 2.80052 10.3859Z"
                            fill="white"/>
                    </svg>
                    <input type="file" class="my_file">
                </span>

            </div>
            <div class="dashbord_prof_thumb_text">
                <a href="{{ route('user.dashboard') }}">{{ __(auth()->user()->name) }}</a>
            </div>
        </div>
        <ul class="dashbord_sidebar_menu">
            <li>
                <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.5999 22.5598H6.39985C4.57984 22.5598 2.91985 21.1598 2.61985 19.3598L1.28984 11.3999C1.07984 10.1599 1.67985 8.56987 2.66985 7.77987L9.59986 2.22982C10.9399 1.14982 13.0498 1.15983 14.3998 2.23983L21.3299 7.77987C22.3099 8.56987 22.9099 10.1599 22.7099 11.3999L21.3799 19.3598C21.0799 21.1298 19.3899 22.5598 17.5999 22.5598ZM11.9899 2.93984C11.4599 2.93984 10.9298 3.09981 10.5398 3.40981L3.60985 8.95986C3.03985 9.41986 2.64986 10.4398 2.76986 11.1598L4.09986 19.1198C4.27986 20.1698 5.32984 21.0598 6.39985 21.0598H17.5999C18.6699 21.0598 19.7198 20.1698 19.8998 19.1098L21.2298 11.1499C21.3498 10.4299 20.9499 9.39985 20.3899 8.94985L13.4599 3.40981C13.0599 3.09981 12.5299 2.93984 11.9899 2.93984Z"
                                fill="currentColor"/>
                            <path
                                d="M12 16.25C10.21 16.25 8.75 14.79 8.75 13C8.75 11.21 10.21 9.75 12 9.75C13.79 9.75 15.25 11.21 15.25 13C15.25 14.79 13.79 16.25 12 16.25ZM12 11.25C11.04 11.25 10.25 12.04 10.25 13C10.25 13.96 11.04 14.75 12 14.75C12.96 14.75 13.75 13.96 13.75 13C13.75 12.04 12.96 11.25 12 11.25Z"
                                fill="currentColor"/>
                        </svg>
                    </span>
                    {{ __('Dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('user.wishlist.index') }}" class="{{ request()->routeIs('user.wishlist.*') ? 'active' : '' }}">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.765 4.70229L12 5.52422L11.235 4.70229C9.12233 2.43257 5.69709 2.43257 3.58447 4.70229C1.47184 6.972 1.47184 10.6519 3.58447 12.9217L10.4699 20.3191C11.315 21.227 12.685 21.227 13.5301 20.3191L20.4155 12.9217C22.5282 10.6519 22.5282 6.972 20.4155 4.70229C18.3029 2.43257 14.8777 2.43257 12.765 4.70229Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    {{ __('Wishlist') }}
                </a>
            </li>
            <li>
                <a href="{{ route('user-order.index') }}" class="{{ request()->routeIs('user-order.index') ? 'active' : '' }}">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 12H11.25C11.25 12.3228 11.4566 12.6094 11.7628 12.7115L12 12ZM12.75 7C12.75 6.58579 12.4142 6.25 12 6.25C11.5858 6.25 11.25 6.58579 11.25 7H12.75ZM14.7628 13.7115C15.1558 13.8425 15.5805 13.6301 15.7115 13.2372C15.8425 12.8442 15.6301 12.4195 15.2372 12.2885L14.7628 13.7115ZM12.75 12V7H11.25V12H12.75ZM11.7628 12.7115L14.7628 13.7115L15.2372 12.2885L12.2372 11.2885L11.7628 12.7115ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM12 2.75C17.1086 2.75 21.25 6.89137 21.25 12H22.75C22.75 6.06294 17.9371 1.25 12 1.25V2.75Z"
                                fill="currentColor"/>
                        </svg>
                    </span>
                   {{ __('Order List') }}
                </a>
            </li>
            <li>
                <a href="{{ route('user-order.myTransactions') }}" class="{{ request()->routeIs('user-order.myTransactions') ? 'active' : '' }}">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 22.5C17.79 22.5 22.5 17.79 22.5 12C22.5 6.21 17.79 1.5 12 1.5C6.21 1.5 1.5 6.21 1.5 12C1.5 17.79 6.21 22.5 12 22.5ZM12 3C16.965 3 21 7.035 21 12C21 16.965 16.965 21 12 21C7.035 21 3 16.965 3 12C3 7.035 7.035 3 12 3Z"
                                fill="currentColor"/>
                            <path
                                d="M7.4999 11.2504H16.4999C16.9144 11.2504 17.2499 10.9145 17.2499 10.5004C17.2499 10.0862 16.9144 9.75037 16.4999 9.75037H8.90143L9.62398 8.6664C9.85363 8.32177 9.76055 7.85595 9.416 7.62637C9.0707 7.39605 8.60518 7.48942 8.37598 7.83435L6.87598 10.0843C6.72253 10.3143 6.70828 10.6102 6.83863 10.8541C6.96928 11.098 7.22338 11.2504 7.4999 11.2504Z"
                                fill="currentColor"/>
                            <path
                                d="M7.5 14.25H15.0989L14.3759 15.334C14.146 15.6786 14.239 16.1444 14.5839 16.374C14.7122 16.4594 14.8565 16.5 14.9993 16.5C15.2417 16.5 15.4797 16.3828 15.624 16.166L17.124 13.916C17.2771 13.6861 17.2917 13.3901 17.1614 13.1462C17.031 12.9023 16.7768 12.75 16.5 12.75H7.5C7.08585 12.75 6.75 13.0859 6.75 13.5C6.75 13.9141 7.08585 14.25 7.5 14.25Z"
                                fill="currentColor"/>
                        </svg>
                    </span>
                    {{ __('Transactions') }}
                </a>
            </li>
            <li>
                <a href="{{ route('user-order.reviews') }}" class="{{ request()->routeIs('user-order.reviews') ? 'active' : '' }}">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.0328 3.27141C10.8375 1.5762 13.1625 1.57619 13.9672 3.27141L15.3579 6.20118C15.6774 6.87435 16.2951 7.34094 17.0096 7.44888L20.1193 7.91869C21.9187 8.19053 22.6371 10.4895 21.3351 11.8091L19.0849 14.0896C18.5679 14.6136 18.332 15.3685 18.454 16.1084L18.9852 19.3285C19.2926 21.1918 17.4116 22.6126 15.8022 21.7329L13.0208 20.2126C12.3817 19.8633 11.6183 19.8633 10.9792 20.2126L8.19776 21.7329C6.58839 22.6126 4.70742 21.1918 5.01479 19.3286L5.54599 16.1084C5.66804 15.3685 5.43211 14.6136 4.91508 14.0896L2.66488 11.8091C1.36287 10.4895 2.08133 8.19053 3.88066 7.91869L6.99037 7.44888C7.70489 7.34094 8.32257 6.87435 8.64211 6.20118L10.0328 3.27141Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    {{ __('Reviews') }}
                </a>
            </li>
            <li>
                <a href="./dashbord-profile-setting.html">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="12" cy="17.5" rx="7" ry="3.5" stroke="currentColor"
                                     stroke-width="1.5" stroke-linejoin="round"/>
                            <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="1.5"
                                    stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Profile Settings
                </a>
            </li>
            <li>
                <a href="./dashbord-change-password.html">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <rect x="4" y="7" width="16" height="14" rx="4" stroke="currentColor"
                                  stroke-width="1.5"/>
                            <circle cx="12" cy="14" r="2" stroke="currentColor"
                                    stroke-width="1.5"/>
                            <path d="M16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7"
                                  stroke="currentColor" stroke-width="1.5"/>
                        </svg>
                    </span>
                    Change Password
                </a>
            </li>
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 8V18C5 20.2091 6.79086 22 9 22H15C17.2091 22 19 20.2091 19 18V8M14 11V17M10 11L10 17M16 5L14.5937 2.8906C14.2228 2.3342 13.5983 2 12.9296 2H11.0704C10.4017 2 9.7772 2.3342 9.40627 2.8906L8 5M16 5H8M16 5H21M8 5H3"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Delete Account
                </a>
            </li>
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 14L21.2929 12.7071C21.6834 12.3166 21.6834 11.6834 21.2929 11.2929L20 10"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path
                                d="M21 12H13M6 20C3.79086 20 2 18.2091 2 16V8C2 5.79086 3.79086 4 6 4M6 20C8.20914 20 10 18.2091 10 16V8C10 5.79086 8.20914 4 6 4M6 20H14C16.2091 20 18 18.2091 18 16M6 4H14C16.2091 4 18 5.79086 18 8"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</div>
