@if (count($breadcrumbs))

    <nav class="ml-6 rounded">
        <ol class="list-reset flex text-grey-dark">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li>
                        <a href="{{ $breadcrumb->url }}"
                           class="text-green-darker font-bold no-underline">
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                    <li><span class="mx-2 select-none">/</span></li>
                @elseif (!$loop->last)
                    <li>{{ $breadcrumb->title }}</li>
                    <li><span class="mx-2 select-none">/</span></li>
                @else
                    <li>{{ $breadcrumb->title }}</li>
                @endif

            @endforeach
        </ol>
    </nav>

@endif
