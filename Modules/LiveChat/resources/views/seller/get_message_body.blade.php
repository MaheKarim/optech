<div class="d-flex justify-content-between border-bottom py-3 px-4" >
    <div class="d-flex gap-3 align-items-center">
        <div>
            @if ($buyer?->image)
            <img
            src="{{ asset($buyer?->image) }}"
            class="rounded-circle  person-image"
            alt=""
            />
            @else
            <img
            src="{{ asset($general_setting->default_avatar) }}"
            class="rounded-circle person-image"
            alt=""
            />
            @endif
        </div>
        <div>
            <h4 class="text-dark-300 fw-bold text-18">
                {{ html_decode($buyer?->name) }}
            </h4>
            @if ($last_message)
            <p class="text-dark-200 fs-6">{{ $last_message->created_at->diffForHumans() }}</p>
            @endif
        </div>
    </div>
    <div class="d-md-block d-none">
        <a href="{{ route('buyers', $buyer->username) }}" target="_blank" class="w-btn-primary-lg">{{ __('translate.View Profile') }}</a>
    </div>
</div>

<div class="py-3 px-4 overflow-y-auto body-h-535 scrolling-body ">


    <ul class="conversation-text pt-5 message-list ">

        @foreach ($messages as $message)

            @if ($message->send_by == 'seller')
            <li class="d-flex flex-column align-items-end gap-1">
                <p class="bg-blue-300 text-white p-2 rounded-3 text-p-message">
                    {{ html_decode($message->message) }}
                </p>
                <span class="text-dark-200 text-14">{{ $message->created_at->diffForHumans() }}</span>
            </li>
            @else
            <li class="d-flex flex-column  gap-1 left-side">
                <p class="bg-blue-300 align-items-start  p-2 rounded-3 text-p-message">
                    {{ html_decode($message->message) }}
                </p>
                <span class="text-dark-200 text-14">{{ $message->created_at->diffForHumans() }}</span>
            </li>
            @endif

        @endforeach

    </ul>
</div>

<div class="position-relative overflow-x-hidden">
    <form class="px-4 py-2 msg-write-input d-flex flex-column flex-md-row align-items-center gap-3" id="sendMessageForm">
        @csrf
        <input type="hidden" name="buyer_id" value="{{ $buyer->id }}" id="buyer_id">

        <input type="text" class="form-control rounded-5 bg-offWhite shadow-none" placeholder="{{ __('translate.Type your message') }}" autocomplete="off" name="message" id="message" />
        <button type="submit" class="msg-send-btn" id="sendMessageBtn">{{ __('Send') }}</button>
    </form>
</div>

    <script>

        (function($) {
            "use strict"
            $(document).ready(function () {

                $("#sendMessageForm").on("submit", function(e){
                    e.preventDefault();

                    let message = $("#message").val()

                    if(!message)return;

                    var isDemo = "{{ env('APP_MODE') }}"
                    if(isDemo == 'DEMO'){
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }

                     $.ajax({
                        type:"post",
                        data : $(this).serialize(),
                        url:"{{url('/seller/store-message/') }}",
                        success:function(response){
                            $(".message-list").html(response);
                            $("#message").val('');
                            scrollToBottomFunc();
                        },
                        error:function(err){
                            $("#message").val('')
                        }
                    })
                })
            });
        })(jQuery);


        function loadedLatestMessage(){
            setInterval(() => {

                let buyer_id = $("#buyer_id").val()

                $.ajax({
                    type:"get",
                    url:"{{url('/seller/get-message-list/') }}"+"/"+buyer_id,
                    success:function(response){
                        $(".message-list").html(response);
                        scrollToBottomFunc();
                    },
                    error:function(err){}
                })

            }, 5000);
        }

        loadedLatestMessage()

    </script>
