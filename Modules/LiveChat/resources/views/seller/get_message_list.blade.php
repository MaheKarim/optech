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
