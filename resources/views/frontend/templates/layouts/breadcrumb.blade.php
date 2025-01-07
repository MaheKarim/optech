<div class="optech-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumb/breadcrumb.png') }})">
    <div class="container">
        <h1 class="post__title">{{ __($pageTitle) }}</h1>
        <nav class="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li aria-current="page">{{ __($pageTitle) }}</li>
            </ul>
        </nav>

    </div>
</div>
