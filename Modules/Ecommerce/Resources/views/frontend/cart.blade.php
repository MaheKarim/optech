@extends('layout')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('body-content')

    <main>
        <div class="inner-bg"
             style="background-image:  url({{ asset($breadcrumb) }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="inner-bg-txt">
                            <h1>{{ __('translate.Cart') }}</h1>
                            <ul>
                                <li><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                                <li><span>
                                        <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.633816 2.7705e-08C0.446997 0.0532405 0.28353 0.143084 0.158011 0.319443C-0.0492418 0.618921 -0.0550799 1.0515 0.155092 1.35098C0.195958 1.40755 0.239744 1.46411 0.286449 1.51735C1.56499 2.97481 2.84645 4.4356 4.125 5.89306C4.15419 5.92633 4.18922 5.95295 4.24176 6.03281C4.20673 6.0561 4.16295 6.06941 4.13375 6.10269C2.84062 7.57346 1.5504 9.04755 0.257258 10.5183C0.0295721 10.7779 -0.0579994 11.0773 0.0412483 11.4367C0.187201 11.9591 0.776848 12.1721 1.16216 11.8427C1.20595 11.8061 1.24682 11.7628 1.28768 11.7196C2.7764 10.0225 4.26511 8.32881 5.75091 6.63177C6.02238 6.32231 6.07492 5.92966 5.89394 5.57361C5.85015 5.4871 5.78594 5.41056 5.72464 5.34069C4.27971 3.69356 2.83478 2.04976 1.39277 0.399304C1.23222 0.216289 1.06875 0.0532405 0.838149 3.66367e-08C0.771011 3.3702e-08 0.703873 3.07673e-08 0.633816 2.7705e-08Z"/>
                                        </svg>

                                    </span></li>
                                <li><a href="#">{{ __('translate.Cart') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- add to cart part start-->

        <section class="add-to-cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                @php
                                    $subtotal = 0;
                                @endphp
                                @foreach($carts as $cart)
                                    @php
                                        $itemTotal = $cart->product ? $cart->product->finalPrice * $cart->quantity : 0;
                                        $subtotal += $itemTotal;
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="add-to-cart-item">
                                                <div class="add-to-cart-item-thumb">
                                                    <img
                                                        src="{{ getImageOrPlaceholder($cart->product->thumbnail_image, '125x135') }}"
                                                        alt="thumb"
                                                    />
                                                </div>
                                                <h4 class="add-to-cart-item-txt">
                                                    @if($cart->product)
                                                        <a href="{{ route('product.view', $cart->product->slug) }}">
                                                            {{ __($cart->product->name) }}
                                                        </a>
                                                    @else
                                                        <span>{{ __('translate.Product not available') }}</span>
                                                    @endif
                                                </h4>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="price main-price">
                                                {!! $cart->product->price_display !!}</p>
                                        </td>
                                        <td>
                                            <div class="quantity-item">
                                                <div class="quantity">
                                                    <span class="minus" data-id="{{ $cart->id }}">
                                                        <svg width="13" height="2" viewBox="0 0 13 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="0.8" y1="1.2" x2="12.2" y2="1.2" stroke="#636973" stroke-width="1.6"
                                                                  stroke-linecap="round"></line>
                                                        </svg>
                                                     </span>
                                                    <span class="number"
                                                          id="quantity-{{ $cart->id }}">{{ $cart->quantity }}</span>
                                                    <span class="plus" data-id="{{ $cart->id }}">
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                fill-rule="evenodd"
                                                                clip-rule="evenodd"
                                                                d="M1.5 7.1875C1.1203 7.1875 0.8125 6.8797 0.8125 6.5C0.8125 6.1203 1.1203 5.8125 1.5 5.8125L6.3125 5.8125L6.3125 1C6.3125 0.620304 6.6203 0.3125 7 0.3125C7.3797 0.3125 7.6875 0.620304 7.6875 1L7.6875 5.8125L12.5 5.8125C12.8797 5.8125 13.1875 6.1203 13.1875 6.5C13.1875 6.8797 12.8797 7.1875 12.5 7.1875L7.6875 7.1875L7.6875 12C7.6875 12.3797 7.3797 12.6875 7 12.6875C6.6203 12.6875 6.3125 12.3797 6.3125 12L6.3125 7.1875L1.5 7.1875Z"
                                                                fill="#28303F"
                                                            ></path>
                                                        </svg>
                                                     </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="price total-price" id="price-{{ $cart->id }}"
                                               data-unit-price="{{ $cart->product ? $cart->product->finalPrice : 0 }}">
                                                {{ currency($itemTotal) }}
                                            </p>
                                        </td>

                                        <td>
                                            <button type="button"
                                                    class="delet_btn delete-cart-item"
                                                    data-id="{{ $cart->id }}"
                                                    data-url="{{ route('cart.delete', $cart->id) }}">
                                                <i class="fa-solid fa-x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="add-to-cart-total">
                            <h4 class="add-to-cart-total-txt">{{ __('translate.Cart Totals') }}</h4>

                            <div class="sub-total-item">
                                <h5 class="sub-total-item-txt">
                                    {{ __('translate.Subtotal') }} <span class="sub_total">{{ currency($subtotal) }}</span>
                                </h5>

                                <h5 class="sub-total-item-txt four">
                                    {{ __('translate.Total') }} <span class="total_sale">{{ currency($subtotal) }}</span>
                                </h5>
                                    <a class="main-btn" href="{{ route('checkout.index') }}">
                                        <div class="btn_m">
                                            <div class="btn_c">
                                                <div class="btn_t1">{{ __('translate.Proceed to Checkout') }}</div>
                                                <div class="btn_t2">{{ __('translate.Proceed to Checkout') }}</div>
                                            </div>
                                        </div>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
