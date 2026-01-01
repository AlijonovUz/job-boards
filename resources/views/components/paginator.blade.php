@props(['items'])

@if($items->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">

            <li @class(['page-item', 'disabled' => $items->onFirstPage()])>
                @if($items->onFirstPage())
                    <span class="page-link">«</span>
                @else
                    <a class="page-link" href="{{ $items->previousPageUrl() }}">«</a>
                @endif
            </li>

            @php
                $current = $items->currentPage();
                $last = $items->lastPage();

                $start = max(1, $current - 2);
                $end = min($last, $current + 2);
            @endphp

            @for($i = $start; $i <= $end; $i++)
                @if($i === $current)
                    <li class="page-item active">
                        <span class="page-link">{{ $i }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $items->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            <li @class(['page-item', 'disabled' => $items->onLastPage()])>
                @if($items->onLastPage())
                    <span class="page-link">»</span>
                @else
                    <a class="page-link" href="{{ $items->nextPageUrl() }}">»</a>
                @endif
            </li>

        </ul>
    </nav>
@endif
