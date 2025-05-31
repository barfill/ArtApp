<button
    type="{{ $type ?? 'button'}}" {{-- Tutaj sprawdzma tylko czy type jest null --}}
    class="btn {{ $class ?? '' }}"
    action="{{ $action ?? '' }}"
    {{ $disabled ? 'disabled' : '' }}>
    {{ $slot ?: $label }} {{-- Tutaj sprawdzma tylko czy $slot jest truthy/falsy czyli jeżeli $slot będzie truthy to wybierzemy te wartość a jak falsy to $label--}}
</button>
