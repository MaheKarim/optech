
<!-- Modal -->
<div class="modal fade" id="refundRequestModal" tabindex="-1" aria-labelledby="jobDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="bg-white p-lg-5 rounded-3">
                    <div class="proposal-container">
                        <div class="proposal-header">
                            <h3 class="text-dark-300 text-24 fw-bold">{{ __('translate.Refund Request') }}</h3>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="{{ route('buyer.refund.store') }}">
                            @csrf
                            <div class="d-flex flex-column gap-4">

                            <div class="proposal-input-container">
                                <label for="time" class="proposal-form-label"
                                >{{ __('translate.Write your reason') }}*</label
                                >
                                <textarea
                                placeholder="{{ __('translate.Write your reason') }}"
                                class="form-textarea shadow-none"
                                name="note"

                                >{{ old('note') }}</textarea>
                            </div>

                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <div
                                class="d-flex gap-4 align-items-center justify-content-end"
                            >
                                <button class="w-btn-gray-sm" type="button" data-bs-dismiss="modal">
                                {{ __('translate.Cancel') }}
                                </button>
                                <button type="submit" class="w-btn-secondary-sm">
                                {{ __('translate.Submit Request') }}
                                </button>
                            </div>
                            </div>
                        </form>

                        
                    </div>
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">{{ __('translate.Alert!') }}</h4>
                        <p>{{ __('translate.Your refund balance will be added on your wallet balance') }}</p>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>