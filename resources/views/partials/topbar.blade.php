<div class="site-header__topbar topbar">
    <div class="topbar__container container">
        <div class="topbar__row">
            <div class="topbar__item topbar__item--link">
                <a style="font-family: monospace; font-size: 20px;" class="topbar-link d-flex align-items-center" href="tel:{{ $company->phone ?? '' }}">
                    <img style="height: 35px; max-width: 35px;" class="img-responsive" src="{{ asset('call-now.gif') }}" alt="Call 7colors" title="7colors">
                    <span class="d-none d-md-block">{{ $company->phone ?? '' }}</span>
                </a>
            </div>
            @foreach($menuItems as $item)
            <div class="topbar__item topbar__item--link d-none d-md-flex @if($loop->last) pr-4 @endif">
                <a class="topbar-link" style="white-space: nowrap" href="{{ url($item->href) }}">{!! $item->name !!}</a>
            </div>
            @endforeach
            <marquee class="d-flex align-items-center h-100" behavior="" direction="">{!! $company->tagline ?? '' !!}</marquee>
            <div class="topbar__item topbar__item--link pl-4">
                <a class="topbar-link" style="white-space: nowrap" href="{{ url('/track-order') }}">Track Order</a>
            </div>
        </div>
    </div>
</div>
