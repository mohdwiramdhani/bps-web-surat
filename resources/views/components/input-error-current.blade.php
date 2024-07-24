@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'ps-0 text-danger inputerror']) }}>
        @foreach ((array) $messages as $message)
            Kolom password saat ini diperlukan
        @endforeach
    </ul>
@endif
