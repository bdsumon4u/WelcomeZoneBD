<header class="site__header d-lg-block d-none">
    <div class="site-header">
        <!-- .topbar -->
        @include('partials.topbar')
        <!-- .topbar / end -->
        <div class="site-header__middle container">
            <div class="site-header__logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset($logo->desktop ?? '') }}" width="{{ config('services.logo.desktop.width', 260) }}" height="{{ config('services.logo.desktop.height', 54) }}" alt="Logo" style="max-width: 100%;">
                </a>
            </div>
            <div class="site-header__search">
                <div class="search">
                    <form action="/shop">
                        <div style="grid-area:search" class="md:ml-4">
                            <div class="Searchbar__CustomCombobox-xnx3kr-6 joXPnU transition-all duration-75 ease-linear overflow-initial" data-reach-combobox="" data-state="idle">
                                <div class="Searchbar__Container-xnx3kr-1 kWQExC" style="
    display: flex;
">
                                    <input name="search" aria-autocomplete="both" aria-controls="listbox--1" aria-expanded="false" aria-haspopup="listbox" aria-labelledby="demo" role="combobox" placeholder="Search for..." data-reach-combobox-input="" data-state="idle" value="{{ request('search') }}" style="
    background-color: white;
    letter-spacing: 0.025em;
    font-weight: 500;
    font-size: 0.875rem;
    height: 40px;
    display: flex;
    flex: 1 1 0%;
    padding: 0px 17px;
    border: 2px solid #28a745;
    border-radius: 4px 0px 0px 4px;
    outline: none;
    width: 100%;
">
                                    <button type="submit" style="border: none; padding: 0;">
                                        <figure color="black" class="Searchbar__Button-xnx3kr-3 duKdNo" style="
                                        cursor: pointer;
                                        display: flex;
                                        -webkit-box-align: center;
                                        align-items: center;
                                        padding-right: 29px;
                                        padding-left: 29px;
                                        background: #28a745;
                                        color: rgb(255, 255, 255);
                                        height: 40px;
                                        min-height: 100%;
                                        margin: 0;
                                    "><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" _css2="
                                            @media (max-width: ,768px,) {
                                              ,
                                                    font-size:20px;
                                                  ,
                                            }
                                          " class="Searchbar___StyledMdSearch-xnx3kr-5 fHBAIp" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="
                                        font-size: 25px;
                                    "><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg></figure>
                                    </button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="site-header__phone">
                <div class="site-header__phone-title">Customer Service</div>
                <div class="site-header__phone-number">
                    <div class="topbar__item topbar__item--link">
                        <i class="fas fa-phone mr-1"></i>
                        <a style="font-family: monospace; font-size: 16px;" class="topbar-link" href="tel:{{ $company->phone ?? '' }}">{{ $company->phone ?? '' }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-header__nav-panel">
            <div class="nav-panel">
                <div class="nav-panel__container container">
                    <div class="nav-panel__row">
                        @include('partials.departments')
                        <!-- .nav-links -->
                        @include('partials.header.menu.desktop')
                        <!-- .nav-links / end -->
                        <div class="nav-panel__indicators">
                            <div class="indicator indicator--trigger--click">
                                <a href="#" class="indicator__button">
                                    <span class="indicator__area">
                                        <svg width="20" height="20">
                                            <circle cx="7" cy="17" r="2"></circle>
                                            <circle cx="15" cy="17" r="2"></circle>
                                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6 V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4 C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"></path>
                                        </svg>
                                        <span class="indicator__value cart-count"></span>
                                    </span>
                                </a>
                                <div class="indicator__dropdown">
                                    <!-- .dropcart -->
                                    <div class="dropcart">
                                        <div class="dropcart__products-list">

                                        </div>
                                        <div class="dropcart__totals">
                                            <table>
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td class="cart-subtotal">{!!  theMoney(0)  !!}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="dropcart__buttons">
                                            <a class="btn btn-primary" href="{{ route('checkout') }}">Checkout</a>
                                        </div>
                                    </div><!-- .dropcart / end -->
                                </div>
                            </div>
                        </div>
                        @include('partials.auth-indicator')
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
