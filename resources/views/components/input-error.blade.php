@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'ps-0 text-danger inputerror']) }}>
        @foreach ((array) $messages as $message)
            {{ $message }}
        @endforeach
    </ul>
@endif
