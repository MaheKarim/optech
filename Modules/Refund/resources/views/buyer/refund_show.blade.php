<div class="modal fade" id="refundRequest{{ $refund->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Refund Details') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>{{ __('translate.Amount') }}</td>
                            <td>{{ currency($refund->refund_amount) }}</td>
                        </tr>
                        
                        <tr>
                            <td>{{ __('translate.Apply Date') }}</td>
                            <td>{{ $refund->created_at->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <td> {{ __('translate.Reason') }}</td>
                            <td>{!! clean(nl2br(html_decode($refund->note))) !!}</td>
                        </tr>
                        
                        <tr>
                            <td> {{ __('translate.Status') }}</td>
                            <td>
                                @if ($refund->status == 'pending')
                                <span class="status-badge pending">
                                    {{ __('translate.Pending') }}
                                </span>
                                @elseif ($refund->status == 'rejected')
                                    <span class="status-badge pending">
                                        {{ __('translate.Rejected') }}
                                    </span>
                                @elseif ($refund->status == 'approved')
                                <span class="status-badge in-progress">
                                    {{ __('translate.Approved') }}
                                </span>
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>