@if (session('toasts', collect())->count())
    {{-- I will keep this generated quote :v --}}
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
    <div class="toast-container {{ config('app.pos_class') }} p-3">
        @foreach (session('toasts', collect()) as $item)
            <div class="toast fade notif" role="alert" aria-live="assertive" aria-atomic="true"
                @if (!$item['autohide']) data-autohide="false" @endif>
                <div class="toast-header">
                    <button class="btn {{ $item['style'][$item['level']]['color'] }} btn-sm me-2">
                        <i data-feather="{{ $item['style'][$item['level']]['icon'] }}"></i>
                    </button>
                    <strong class="me-auto text-capitalize">{{ $item['level'] }}</strong>
                    <small class="text-body-secondary">just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ $item['message'] }}
                </div>
            </div>
        @endforeach
    </div>
    @php
        session()->forget('toasts');
    @endphp
@endif
