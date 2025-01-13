<!DOCTYPE html>
<html lang="en">
    @include('frontend.head')
  <body>
    <!-- Menu Start -->
    <div class="optech-preloader-wrap">
        <div class="optech-preloader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- End preloader -->


    <!-- progress circle -->
    <div class="paginacontainer">
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
            <div class="top-arrow">
                <i class="ri-arrow-up-s-line"></i>
            </div>
        </div>
    </div>

    @yield('front-content')

    @include('frontend.script')
        <script>
            @if(Session::has('message'))
            var type = "{{Session::get('alert-type','info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
            @endif
        </script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <script>
                    toastr.error('{{ $error }}');
                </script>
            @endforeach
        @endif
    @stack('js_section')

<script>
    // Cart Related Code
    $(document).on('click', '.cart-add-btn', function (e) {
        e.preventDefault();
        var productId = $(this).data('product-id');
        var quantity = $('input[name="quantity"]').val() || 1;
        var $this = $(this);

        // Create Form Data
        let formData = new FormData();
        formData.append('product_id', productId);
        formData.append('quantity', quantity);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('cart.add') }}",
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $this.attr("disabled", true);
            },
            complete: function () {
                $this.attr("disabled", false);
            },
            success: function (response) {
                if (response.success) {
                    $('.cart-count').text(response.totalCartItem);
                    toastr.success("{{ __('translate.Cart Added Successfully') }}");
                } else {
                    toastr.error("{{ __('translate.Something Went Wrong') }}");
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", xhr.responseText);
            }
        });
    });
    </script>

  </body>
  </html>
