@extends('master_layout')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('new-layout')

    <div class="optech-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumb/breadcrumb.png') }})">
        <div class="container">
            <h1 class="post__title">{{ __('My Cart') }}</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li aria-current="page">{{ __('My Cart') }}</li>
                </ul>
            </nav>

        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="optech-cart-section">
        <div class="container">
            <div class="optech-cart-list">
                <table>
                    <thead>
                    <tr>
                        <th>{{ __('Product') }}</th>
                        <th>{{ __('Price') }}</th>
                        <th>{{ __('Quantity') }}</th>
                        <th>{{ __('Subtotal') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php
                        $subtotal = 0;
                    @endphp
                    @foreach($carts as $cart)
                        @php
                            $itemTotal = $cart->product ? $cart->product->finalPrice * $cart->quantity : 0;
                            $subtotal += $itemTotal;
                        @endphp
                        <tr data-aos="fade-up" data-aos-duration="400">
                            <td>
                                <div class="optech-cart-thumb">
                                    <i class="ri-close-line delete-cart-item" data-id="{{ $cart->id }}"
                                       data-url="{{ route('cart.delete', $cart->id) }}"></i>
                                    <img src="{{ getImageOrPlaceholder($cart->product->thumbnail_image, '125x135') }}" alt="Image">

                                    <a href="{{ route('product.view', $cart->product->slug)  }}">  <h5>{{ __(Str::limit($cart->product->translate?->name, 35)) }}</h5>
                                    </a>

                                </div>
                            </td>
                            <td>{!! $cart->product->price_display !!}</td>
                            <td>
                                <div class="optech-product-number">
                                    <span class="optech-product-minus minus" data-id="{{ $cart->id }}"><i class="ri-subtract-line"></i></span>
                                    <input type="text" class="number" id="quantity-{{ $cart->id }}" value="{{ $cart->quantity }}"/>
                                    <span class="optech-product-plus plus" data-id="{{ $cart->id }}"><i class="ri-add-line"></i></span>
                                </div>
                            </td>
                            <td class="price total-price" id="price-{{ $cart->id }}"
                                data-unit-price="{{ $cart->product ? $cart->product->finalPrice : 0 }}">{{ currency($itemTotal) }}</td>
                        </tr data-aos="fade-up" data-aos-duration="600">
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section optech-section-padding-bottom">
        <div class="container">
            <div class="optech-cart-total">
                <h5>{{ __('Cart Totals') }}</h5>
                <div class="optech-cart-total-item sub_total">
                    <p>{{ __('Subtotal') }}:</p>
                    <p>{{ currency($subtotal) }}</p>
                </div>

                <div class="optech-cart-total-item total_sale">
                    <p>{{ __('Subtotal') }}:</p>
                    <p><span>{{ currency($subtotal) }}</span></p>
                </div>
                <a class="optech-default-btn rt-mt-40" data-aos="fade-up" data-aos-duration="800" href="{{ route('checkout.index') }}"
                   data-text="{{ __('Proceed to Checkout') }}"><span class="btn-wraper">{{ __('Proceed to Checkout') }}</span></a>
            </div>
        </div>
    </div>


@endsection

@push('js_section')
    <script src="{{ asset('global/sweetalert/sweetalert2@11.js') }}"></script>
    <script>
        "use strict";
        function updateSubtotal() {
            let subtotal = 0;
            document.querySelectorAll('.total-price').forEach(priceElement => {
                const price = parseFloat(priceElement.innerText.replace(/[^0-9.-]+/g, ''));
                if (!isNaN(price)) {
                    subtotal += price;
                }
            });
            document.querySelector('.sub_total').innerText = subtotal.toFixed(2);
            document.querySelector('.total_sale').innerText = subtotal.toFixed(2);
        }

        // Cart Item Button
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".minus, .plus").forEach(span => {
                span.addEventListener("click", function() {
                    const itemId = this.getAttribute("data-id");
                    const quantityElement = document.getElementById(`quantity-${itemId}`);
                    const priceElement = document.getElementById(`price-${itemId}`);
                    const unitPrice = parseFloat(priceElement.getAttribute('data-unit-price'));
                    let currentQuantity = parseInt(quantityElement.innerText);

                    if (this.classList.contains("minus")) {
                        if (currentQuantity > 1) {
                            currentQuantity--;
                        } else {
                            toastr.error('Quantity must be at least 1');
                            return;
                        }
                    } else if (this.classList.contains("plus")) {
                        currentQuantity++;
                    }

                    quantityElement.innerText = currentQuantity;

                    fetch(@json(route('cart.update')), {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ id: itemId, quantity: currentQuantity })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const newTotal = (unitPrice * currentQuantity).toFixed(2);
                                priceElement.innerText = newTotal;
                                updateSubtotal();
                                toastr.success(data.notification.message);
                            } else {
                                if (data.notification) {
                                    toastr.error(data.notification.message);
                                }
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                        });
                });
            });
        });

        // Add click event listener to delete buttons
        document.querySelectorAll('.delete-cart-item').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const cartId = this.dataset.id;
                deleteCartItem(cartId);
            });
        });

        function deleteCartItem(id) {
            Swal.fire({
                title: "{{ __('translate.Are you really want to delete this item?') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('translate.Yes, Delete It') }}",
                cancelButtonText: "{{ __('translate.Cancel') }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "{{ __('translate.Deleting..') }}",
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    fetch(`{{ url('cart/cart') }}/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(json => Promise.reject(json));
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Show the notification
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });

                            Toast.fire({
                                icon: data.notification['alert-type'],
                                title: data.notification.messege
                            });

                            if (data.success) {
                                // Reload the page after successful deletion
                                setTimeout(() => {
                                    window.location.reload();
                                }, 1000);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);

                            // Show error notification
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });

                            Toast.fire({
                                icon: error.notification ? error.notification['alert-type'] : 'error',
                                title: error.notification ? error.notification.messege : "{{ __('translate.An error occurred while removing the item') }}"
                            });
                        });
                }
            });
        }
    </script>
@endpush
