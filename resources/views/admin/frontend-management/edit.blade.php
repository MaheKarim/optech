@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Frontend Management') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Component Management') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Frontend Management') }}</p>
@endsection

@php
    $aboutContent = getContent('about.content',true);
@endphp

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="crancy-table crancy-table--v3 mg-top-30">
                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">@lang('Component Edit')</h4>
                                        </div>
                                    </div>

                                    <form action="{{ route('admin.front-end.store', ['key' => $key, 'id' => $frontend->id ?? null]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="type" value="{{ $contentType }}">

                                        <div class="row">
                                            @if($imageCount > 0)
                                                <!-- If images exist, use two columns -->
                                                <div class="col-md-4 pr-md-4">
                                                    @if($content)
                                                        @foreach($content as $field => $value)
                                                            @if($field === 'images' && $imageCount > 0)
                                                                @foreach($value as $imageKey => $imageDetails)
                                                                    <div class="form-group">
                                                                        <label for="{{ $imageKey }}">
                                                                            {{ ucfirst($imageKey) }} Image
                                                                            @if(isset($imageDetails['size']))
                                                                                (Recommended Size: {{ $imageDetails['size'] }})
                                                                            @endif
                                                                        </label>

                                                                        @php
                                                                            $existingImagePath = $dataValues['images'][$imageKey] ?? null;
                                                                        @endphp

                                                                        @if($existingImagePath)
                                                                            <div class="mb-3">
                                                                                <img
                                                                                    src="{{ asset($existingImagePath) }}"
                                                                                    alt="{{ $imageKey }}"
                                                                                    class="img-thumbnail"
                                                                                    style="max-width: 250px; max-height: 250px; object-fit: cover;"
                                                                                >
                                                                                <div class="text-muted small mt-1">
                                                                                    Current image: {{ basename($existingImagePath) }}
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <div class="alert alert-warning small">
                                                                                No image uploaded yet
                                                                            </div>
                                                                        @endif

                                                                        <div class="custom-file">
                                                                            <input
                                                                                type="file"
                                                                                id="{{ $imageKey }}"
                                                                                name="{{ $imageKey }}"
                                                                                class="custom-file-input"
                                                                                accept="image/jpeg,image/png,image/gif,image/webp"
                                                                                onchange="updateFileLabel(this)"
                                                                            >
                                                                            <label class="custom-file-label" for="{{ $imageKey }}">
                                                                                Choose file
                                                                            </label>
                                                                        </div>

                                                                        @if(isset($imageDetails['size']))
                                                                            <small class="form-text text-muted">
                                                                                Recommended image size: {{ $imageDetails['size'] }}
                                                                            </small>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>

                                                <div class="col-md-8 pl-md-4">
                                                    @if($content)
                                                        @foreach($content as $field => $value)
                                                            @if($field !== 'images')
                                                                @if(is_array($value))
                                                                    @foreach($value as $subField => $subValue)
                                                                        <div class="form-group">
                                                                            <label for="{{ $field }}_{{ $subField }}">
                                                                                {{ ucfirst($field) }} - {{ ucfirst($subField) }}
                                                                            </label>
                                                                            <input
                                                                                type="text"
                                                                                id="{{ $field }}_{{ $subField }}"
                                                                                name="{{ $field }}[{{ $subField }}]"
                                                                                class="form-control"
                                                                                value="{{ $dataValues[$field][$subField] ?? (is_scalar($subValue) ? $subValue : json_encode($subValue)) }}"
                                                                            >
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <div class="form-group">
                                                                        <label for="{{ $field }}">{{ ucfirst($field) }}</label>
                                                                        <input
                                                                            type="text"
                                                                            id="{{ $field }}"
                                                                            name="{{ $field }}"
                                                                            class="form-control"
                                                                            value="{{ $dataValues[$field] ?? $value }}"
                                                                        >
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <p>No content available to display.</p>
                                                    @endif

                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>

                                            @else
                                                <div class="col-md-8 offset-md-2">
                                                    @if($content)
                                                        @foreach($content as $field => $value)
                                                            @if(is_array($value))
                                                                @foreach($value as $subField => $subValue)
                                                                    <div class="form-group">
                                                                        <label for="{{ $field }}_{{ $subField }}">
                                                                            {{ ucfirst($field) }} - {{ ucfirst($subField) }}
                                                                        </label>
                                                                        <input
                                                                            type="text"
                                                                            id="{{ $field }}_{{ $subField }}"
                                                                            name="{{ $field }}[{{ $subField }}]"
                                                                            class="form-control"
                                                                            value="{{ $dataValues[$field][$subField] ?? (is_scalar($subValue) ? $subValue : json_encode($subValue)) }}"
                                                                        >
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="form-group">
                                                                    <label for="{{ $field }}">{{ ucfirst($field) }}</label>
                                                                    <input
                                                                        type="text"
                                                                        id="{{ $field }}"
                                                                        name="{{ $field }}"
                                                                        class="form-control"
                                                                        value="{{ $dataValues[$field] ?? $value }}"
                                                                    >
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <p>No content available to display.</p>
                                                    @endif

                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            @endif
                                        </div><!-- .row -->
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            function updateFileLabel(input) {
                const fileName = input.files[0] ? input.files[0].name : 'Choose file';
                const label = input.nextElementSibling;
                label.innerHTML = fileName;
            }
        </script>
    @endpush
@endsection
