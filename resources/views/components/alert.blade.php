@if(session('toast'))
    @php
        $type = session('toast.type');
        $message = session('toast.message');

        $icons = [
            'success' => 'bi-check-circle-fill',
            'danger'  => 'bi-x-circle-fill',
            'warning' => 'bi-exclamation-triangle-fill',
            'info'    => 'bi-info-circle-fill',
        ];
    @endphp

    <div class="toast-container position-fixed end-0 p-4"
         style="top: 90px; z-index: 1080;">
        <div class="toast show align-items-center text-bg-{{ $type }} border-0 shadow"
             role="alert" aria-live="assertive" aria-atomic="true"
             style="border-radius:12px;">
            <div class="d-flex">
                <div class="toast-body fw-semibold">
                    <i class="bi {{ $icons[$type] ?? 'bi-info-circle-fill' }} me-2"></i>
                    {{ $message }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
@endif
