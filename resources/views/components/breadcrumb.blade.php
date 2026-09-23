<nav aria-label="breadcrumb" class="upa-breadcrumb-wrap bg-upa-alt">
    <div class="container px-3 px-lg-5 py-3">
        <ol class="breadcrumb upa-breadcrumb mb-0">
            @foreach ($crumbs as $index => $crumb)
                @if ($index === count($crumbs) - 1 || empty($crumb['url']))
                    <li class="breadcrumb-item active" aria-current="page">{{ $crumb['label'] }}</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a></li>
                @endif
            @endforeach
        </ol>
    </div>
</nav>
