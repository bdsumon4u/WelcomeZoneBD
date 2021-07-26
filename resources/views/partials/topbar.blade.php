<div class="site-header__topbar topbar">
    <div class="topbar__container container">
        <div class="topbar__row">
            @foreach($menuItems as $item)
            <div class="topbar__item topbar__item--link d-none d-md-flex @if($loop->last) pr-4 @endif">
                <a class="topbar-link" style="white-space: nowrap" href="{{ url($item->href) }}">{!! $item->name !!}</a>
            </div>
            @endforeach
            <marquee class="d-flex align-items-center h-100" behavior="" direction="">{!! $scroll_text ?? '' !!}</marquee>
            <div class="topbar__item topbar__item--link pl-4">
                <a class="topbar-link" style="white-space: nowrap" href="{{ url('/track-order') }}">Track Order</a>
            </div>
        </div>
    </div>
</div>
