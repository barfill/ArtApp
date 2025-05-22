<button
    type="{{ $type ?? 'button'}}"
    class="btn {{ $class ?? '' }}"
    action="{{ $action ?? '' }}"
    {{ $disabled ? 'disabled' : '' }}>
    {{ $slot ?: $label }}
</button>
