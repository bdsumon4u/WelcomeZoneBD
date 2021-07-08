@extends('layouts.yellow.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('strokya/vendor/xzoom/xzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('strokya/vendor/xZoom-master/example/css/demo.css') }}">
    <style>
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            border-top: 2px solid #1870e0;
        }
        .block-features__list.flex-column.d-block {
            border-top: 5px solid #1870e0;
        }

        @media (max-width: 768px) {
            .product__option-label {
                display: block;
                text-align: center;
            }
            .product__actions {
                justify-content: center;
            }
            .product__actions-item {
                width: 100%;
            }
        }
        .product__content {
            grid-template-columns: [gallery] calc(40% - 30px) [info] calc(40% - 35px) [sidebar] calc(25% - 10px);
            grid-column-gap: 10px;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
@endpush

@section('title', $product->name)

@section('content')

    @include('partials.page-header', [
        'paths' => [
            url('/')                => 'Home',
            route('products.index') => 'Products',
        ],
        'active' => $product->name,
    ])

    <div class="block">
        <div class="container">
            <div class="product product--layout--standard" data-layout="standard">
                <div class="product__content" data-id="{{ $product->id }}" data-max="{{ $product->should_track ? $product->stock_count : -1 }}">
                    <div class="xzoom-container">
                        <img class="xzoom" id="xzoom-default" src="{{ asset($product->base_image->src) }}" xoriginal="{{ asset($product->base_image->src) }}" />
                        <div class="xzoom-thumbs d-flex mt-2">
                            <a href="{{ asset($product->base_image->src) }}"><img class="xzoom-gallery" width="80" src="{{ asset($product->base_image->src) }}"  xpreview="{{ asset($product->base_image->src) }}"></a>
                            @foreach($product->additional_images as $image)
                                <a href="{{ asset($image->src) }}">
                                    <img class="xzoom-gallery" width="80" src="{{ asset($image->src) }}">
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- .product__info -->
                    <div class="product__info">
                        <h1 class="product__name">{{ $product->name }}</h1>
                        <div class="w-100 mb-2 border-top pt-2">Product Code: <strong>{{ $product->sku }}</strong></div>
                        <div class="product__prices {{$product->selling_price == $product->price ? '' : 'has-special'}}">
                            Price:
                            @if($product->selling_price == $product->price)
                                {!!  theMoney($product->price)  !!}
                            @else
                                <span class="product-card__old-price">{!!  theMoney($product->price)  !!}</span>
                                <span class="product-card__new-price">{!!  theMoney($product->selling_price)  !!}</span>
                            @endif
                        </div>
                        <ul class="product__meta">
                            <li class="product__meta-availability w-100 mb-2">
                                <big>
                                    Availability:
                                    @if(! $product->should_track)
                                        <span class="text-success">In Stock</span>
                                    @else
                                        <span class="text-{{ $product->stock_count ? 'success' : 'danger' }}">{{ $product->stock_count }} In Stock</span>
                                    @endif
                                </big>
                            </li>
                        </ul>
                        <!-- .product__sidebar -->
                        <div class="product__sidebar">
                            <!-- .product__options -->
                            <form class="product__options">
                                <div class="form-group product__option">
                                    <div class="d-flex align-items-center mb-2">
                                        <label class="product__option-label mr-2" for="product-quantity">Quantity</label>
                                        <div class="input-number product__quantity">
                                            <input id="product-quantity"
                                                   class="input-number__input form-control form-control-lg"
                                                   type="number" min="1" {{ $product->should_track ? 'max='.$product->stock_count : '' }} value="1">
                                            <div class="input-number__add"></div>
                                            <div class="input-number__sub"></div>
                                        </div>
                                    </div>
                                    <div class="product__actions">
                                        @exp($available = !$product->should_track || $product->stock_count > 0)
                                        <div class="product__buttons d-flex flex-wrap">
                                            <div class="product__actions-item product__actions-item--addtocart">
                                                <button class="btn btn-danger product__addtocart btn-lg btn-block" {{ $available ? '' : 'disabled' }}>Add to cart</button>
                                            </div>
                                            <div class="product__actions-item product__actions-item--ordernow">
                                                <button class="btn btn-success product__ordernow btn-lg btn-block" {{ $available ? '' : 'disabled' }}>Order Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="call-for-order">
                                    <img src="{{ asset('call-now-icon-20.jpg') }}" width="135" alt="Call For Order">
                                    <div style="padding: 10px;margin-bottom: 10px;font-weight: bold;color: red;">
                                        {!! implode('<br>', explode(' ', setting('call_for_order'))) !!}
                                    </div>
                                </div>
                            </form><!-- .product__options / end -->
                        </div><!-- .product__end -->

                        <div class="product__footer mt-0">
                            <div class="product__tags tags">
                                @if($product->brand)
                                    <p class="text-secondary mb-2">
                                        Brand: <a href="{{ route('brands.products', $product->brand) }}" class="text-primary badge badge-light"><big>{{ $product->brand->name }}</big></a>
                                    </p>
                                @endif
                                <div class="">
                                    <p class="text-secondary mb-2 d-inline-block mr-2">Categories:</p>
                                    @foreach($product->categories as $category)
                                        <a href="{{ route('categories.products', $category) }}" class="badge badge-primary">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!-- .product__info / end -->
                    <div>
                        <div class="block-features__list flex-column d-block">
                            @if($services = setting('services'))
                                @foreach(config('services.services', []) as $num => $icon)
                                    <div class="block-features__item">
                                        <div class="block-features__icon">
                                            <svg width="48px" height="48px">
                                                <use xlink:href="{{ asset($icon) }}"></use>
                                            </svg>
                                        </div>
                                        <div class="block-features__content">
                                            <div class="block-features__title">{{ $services->$num->title }}</div>
                                            <div class="block-features__subtitle">{{ $services->$num->detail }}</div>
                                        </div>
                                    </div>
                                    @if(!$loop->last)
                                        <div class="block-features__divider"></div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs" id="productTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Product Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="delivery-tab" data-toggle="tab" href="#delivery" role="tab" aria-controls="delivery" aria-selected="false">Delivery and Payment</a>
                </li>
            </ul>
            <div class="tab-content" id="productTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="card">
                        <div class="card-body p-4">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                    <div class="card">
                        <div class="card-body p-4">
                            {!! setting('delivery_text') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .block-products-carousel -->
    @include('partials.products.pure-grid', [
        'title' => 'Related Products',
        'cols' => $related_products->cols,
        'rows' => $related_products->rows,
    ])
    <!-- .block-products-carousel / end -->
@endsection

@push('scripts')
    <script src="{{ asset('strokya/vendor/xzoom/xzoom.min.js') }}"></script>
    <script src="{{ asset('strokya/vendor/xZoom-master/example/js/vendor/modernizr.js') }}"></script>
    <script src="{{ asset('strokya/vendor/xZoom-master/example/js/setup.js') }}"></script>
    <script>
        $(document).ready(function () {

        });
    </script>
@endpush
