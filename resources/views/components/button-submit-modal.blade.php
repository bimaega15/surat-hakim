@props([
    'disabled' => '',
])
<button type="submit" class="btn btn-primary" id="btn-submit" {{ $disabled }}>
    <i class="fa-regular fa-paper-plane me-1"></i>
    Send
</button>
