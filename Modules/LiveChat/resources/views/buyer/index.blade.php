@extends('buyer.layout')
@section('title')
    <title>{{ __('translate.Buyer || Live Chat') }}</title>
@endsection
@section('front-content')

<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4">
      <div>
        <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.Live Chat') }}</h3>
        <ul class="d-flex align-items-center gap-2">
          <li class="text-dark-200 fs-6">{{ __('translate.Dashboard') }}</li>
          <li>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="5"
              height="11"
              viewBox="0 0 5 11"
              fill="none"
            >
              <path
                d="M1 10L4 5.5L1 1"
                stroke="#5B5B5B"
                stroke-width="1.2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </li>
          <li class="text-lime-300 fs-6">{{ __('translate.Live Chat') }}</li>
        </ul>
      </div>
      <div class="bg-white rounded-3">
        <div
          class="d-flex flex-column flex-lg-row justify-content-between"
        >
          <div class="col-lg-4 col-md-12 border-end">
            <aside>
              <div class="message-sidebar-header">
                <h4 class="fw-normal fs-6">{{ __('translate.Seller List') }}</h4>

              </div>
              <div class="person-list-h-535 overflow-y-auto">
                <ul>

                    @foreach ($sellers as $index => $seller)
                        <li class="d-flex justify-content-between align-items-center p-3 message-person selerItem" data-seller_id="{{ $seller->seller_id }}">
                            <div class="d-flex align-items-center gap-3">
                               <div class="image-unread-feature position-relative">
                                    @if ($seller?->seller?->image)
                                    <img
                                    src="{{ asset($seller?->seller?->image) }}"
                                    class="rounded-circle person-image"
                                    alt=""
                                    />
                                    @else
                                    <img
                                    src="{{ asset($general_setting->default_avatar) }}"
                                    class="rounded-circle person-image"
                                    alt=""
                                    />
                                    @endif

                                    @php
                                        $buyer = Auth::guard('web')->user();

                                        $unseen_message = Modules\LiveChat\App\Models\Message::where('buyer_id', $buyer->id)->where('seller_id', $seller->seller_id)->where('send_by', 'seller')->where('buyer_read_msg', 0)->count();
                                    @endphp

                                    <div class="unread-message-qty {{ $unseen_message == 0 ? 'd-none' : '' }} unread-message-{{ $seller->seller_id }}">
                                        <span>{{ $unseen_message }}</span>
                                    </div>
                               </div>

                                <div>
                                <h4 class="text-18 fw-normal">{{ html_decode($seller?->seller?->name) }}</h4>
                                <p class="text-dark-200 fs-6">
                                    {{ html_decode($seller?->seller?->designation) }}
                                </p>
                                </div>
                            </div>
                            @php
                                $buyer = Auth::guard('web')->user();

                                $last_message = Modules\LiveChat\App\Models\Message::where('buyer_id', $buyer->id)->where('seller_id', $seller->seller_id)->where('send_by', 'seller')->latest()->first();
                            @endphp
                            @if ($last_message)
                                <div>
                                    <span class="text-dark-200">{{ $last_message->created_at->diffForHumans() }}</span>
                                </div>
                            @endif

                        </li>
                    @endforeach

                  </ul>
              </div>
            </aside>
          </div>

          <div class="col-lg-8 col-md-12">
            <div class="position-relative d-flex flex-column justify-content-between h-100" id="chatBody">
              <!--Chat Header -->
              <div id="chatInnerBody" class="h-100">
                <div class="d-flex justify-content-center align-items-center h-100">
                   <div>
                    <svg width="237" height="189" viewBox="0 0 237 189" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2787_16733)">
                        <path d="M146.596 100.405C146.596 117.677 140.642 133.557 130.662 146.078C129.545 147.503 128.328 148.894 127.11 150.218C113.78 164.639 94.6996 173.699 73.5552 173.699C66.9244 173.699 60.5303 172.816 54.4407 171.154L19.7978 188.086L23.7222 153.916C19.0535 149.505 14.9262 144.517 11.5431 139.054C4.54004 127.822 0.51416 114.589 0.51416 100.405C0.51416 97.962 0.615653 95.5528 0.85247 93.1775C3.62661 64.7084 22.6396 41.0238 48.4865 31.5567C55.8955 28.8421 63.8796 27.2812 72.202 27.1455C72.6418 27.1455 73.0816 27.1455 73.5552 27.1455C76.3632 27.1455 79.1373 27.3152 81.8776 27.6206C90.4369 28.5707 98.5225 31.0477 105.931 34.7124C106.202 34.8481 106.473 34.9838 106.743 35.1535C129.918 47.0298 145.886 70.918 146.562 98.6067C146.596 99.1835 146.596 99.7943 146.596 100.405Z" fill="#22BE0D"/>
                        <path opacity="0.2" d="M146.597 100.406C146.597 117.677 140.643 133.558 130.663 146.079C103.733 143.669 79.4766 116.592 79.4766 87.2741C79.4766 66.847 90.8099 46.4876 106.744 35.1543C129.919 47.0306 145.887 70.9188 146.563 98.6075C146.597 99.1843 146.597 99.7951 146.597 100.406Z" fill="black"/>
                        <path opacity="0.1" d="M48.4865 31.5571C21.2187 59.4494 11.8475 105.258 11.5092 139.054C4.54005 127.823 0.51416 114.589 0.51416 100.406C0.51416 68.7807 20.5083 41.8046 48.4865 31.5571Z" fill="white"/>
                        <path opacity="0.1" d="M81.8777 27.587C73.8259 55.3435 30.8268 85.645 0.852539 93.1779C3.62668 64.7088 22.6397 41.0241 48.4865 31.5571C55.8955 28.8425 63.8796 27.2816 72.202 27.1459C72.6419 27.1459 73.0816 27.1459 73.5553 27.1459C76.3633 27.112 79.1374 27.2816 81.8777 27.587Z" fill="white"/>
                        <path d="M42.9047 107.362C45.8382 107.362 48.2162 104.977 48.2162 102.034C48.2162 99.0922 45.8382 96.707 42.9047 96.707C39.9713 96.707 37.5933 99.0922 37.5933 102.034C37.5933 104.977 39.9713 107.362 42.9047 107.362Z" fill="white"/>
                        <path d="M63.2709 107.362C66.2044 107.362 68.5824 104.977 68.5824 102.034C68.5824 99.0922 66.2044 96.707 63.2709 96.707C60.3375 96.707 57.9595 99.0922 57.9595 102.034C57.9595 104.977 60.3375 107.362 63.2709 107.362Z" fill="white"/>
                        <path d="M83.6367 107.362C86.5701 107.362 88.9481 104.977 88.9481 102.034C88.9481 99.0922 86.5701 96.707 83.6367 96.707C80.7032 96.707 78.3252 99.0922 78.3252 102.034C78.3252 104.977 80.7032 107.362 83.6367 107.362Z" fill="white"/>
                        <path d="M236.046 73.2596C236.046 80.9622 234.862 88.3933 232.663 95.3833C231.512 99.082 230.058 102.611 228.332 106.004C224.442 113.809 219.164 120.832 212.872 126.771L216.796 160.974L182.187 143.974C176.097 145.637 169.669 146.519 163.039 146.519C122.712 146.519 89.9976 113.707 89.9976 73.2596C89.9976 43.8404 107.285 18.4591 132.252 6.78644C133.2 6.34532 134.181 5.9042 135.162 5.49701C143.721 1.96807 153.16 0 163.005 0C203.365 0 236.046 32.8124 236.046 73.2596Z" fill="#13544E"/>
                        <path opacity="0.1" d="M236.046 73.2596C236.046 80.9622 234.862 88.3933 232.663 95.3834C231.512 99.082 230.058 102.611 228.332 106.004C187.938 87.6468 147.206 42.8903 135.128 5.49701C143.721 1.96807 153.16 0 163.005 0C203.365 0 236.046 32.8124 236.046 73.2596Z" fill="white"/>
                        <path d="M136.515 80.4869C140.326 80.4869 143.416 77.3878 143.416 73.5647C143.416 69.7417 140.326 66.6426 136.515 66.6426C132.703 66.6426 129.613 69.7417 129.613 73.5647C129.613 77.3878 132.703 80.4869 136.515 80.4869Z" fill="white"/>
                        <path d="M163.005 80.4869C166.816 80.4869 169.906 77.3878 169.906 73.5647C169.906 69.7417 166.816 66.6426 163.005 66.6426C159.193 66.6426 156.103 69.7417 156.103 73.5647C156.103 77.3878 159.193 80.4869 163.005 80.4869Z" fill="white"/>
                        <path d="M189.495 80.4869C193.306 80.4869 196.396 77.3878 196.396 73.5647C196.396 69.7417 193.306 66.6426 189.495 66.6426C185.683 66.6426 182.593 69.7417 182.593 73.5647C182.593 77.3878 185.683 80.4869 189.495 80.4869Z" fill="white"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_2787_16733">
                        <rect width="235.531" height="188.086" fill="white" transform="translate(0.51416)"/>
                        </clipPath>
                        </defs>
                        </svg>
                        <p class="no-message">{{ __('translate.No Message Yet') }}</p>
                        <p class="no-message-des">{{ __('translate.Please choose one') }}</p>
                   </div>


                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection

@push('js_section')

    <script>

        (function($) {
            "use strict"
            $(document).ready(function () {
                $(".selerItem").on("click", function(e){
                    let seller_id = $(this).data('seller_id');
                    $(`.unread-message-${seller_id}`).addClass('d-none');
                    $.ajax({
                        type:"get",
                        url:"{{url('/buyer/get-message-body/') }}"+"/"+seller_id,
                        success:function(response){
                            $("#chatInnerBody").html(response);
                            $("#chatInnerBody").removeClass('d-none');
                            scrollToBottomFunc();
                        },
                        error:function(err){}
                    })
                })
            });
        })(jQuery);

        function scrollToBottomFunc() {
            $('.scrolling-body').animate({
                scrollTop: $('.scrolling-body').get(0).scrollHeight
            }, 50);

        }

    </script>
@endpush
