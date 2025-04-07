@extends('client.layouts.main')


@section('content')
    <section class="xc-shop-area pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="shop__sidebar on-left">
                        <!-- Form lọc theo danh mục sản phẩm, màu sắc và giá -->
                        <form method="GET" action="{{ route('products.search') }}">

                            <!-- Lọc theo màu -->
                            <div class="shop__widget xc-accordion">
                                <div class="accordion" id="shop_color">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="color__widget">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#color_widget_collapse" aria-expanded="false"
                                                aria-controls="color_widget_collapse">
                                                Colors
                                            </button>
                                        </h2>
                                        <div id="color_widget_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="color__widget" data-bs-parent="#shop_color">
                                            <div class="accordion-body">
                                                <div class="shop__widget-list">
                                                    @foreach ($colors as $color)
                                                        <div class="shop__widget-list-item">
                                                            <input type="checkbox" name="color[]"
                                                                value="{{ $color }}" id="color-{{ $color }}">
                                                            <label
                                                                for="color-{{ $color }}">{{ ucfirst($color) }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Lọc theo khoảng giá -->
                            <div class="shop__widget xc-accordion">
                                <div class="accordion" id="shop_price">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="price__widget">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#price_widget_collapse" aria-expanded="false"
                                                aria-controls="price_widget_collapse">
                                                Price Range
                                            </button>
                                        </h2>
                                        <div id="price_widget_collapse" class="accordion-collapse collapse"
                                            aria-labelledby="price__widget" data-bs-parent="#shop_price">
                                            <div class="accordion-body">
                                                <div class="price-range-form">
                                                    <div class="price-input">
                                                        <label for="min_price">Min Price:</label>
                                                        <input type="number" id="min_price" name="min_price"
                                                            placeholder="Min price">
                                                    </div>
                                                    <div class="price-input">
                                                        <label for="max_price">Max Price:</label>
                                                        <input type="number" id="max_price" name="max_price"
                                                            placeholder="Max price">
                                                    </div>
                                                    <button type="submit" class="btn-filter">Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Apply Filters</button>
                        </form>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="xc-shop-main-wrapper">
                        <div class="xc-shop-top mb-45 bg-white">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="xc-shop-top-left d-flex align-items-center">
                                        <div class="xc-shop-top-result">
                                            <p>Showing {{ count($products) }} results</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="xc-shop-top-right d-sm-flex align-items-center justify-content-md-end">
                                        <div class="xc-shop-top-select">
                                            <select>
                                                <option>Default Sorting</option>
                                                <option>Low to High</option>
                                                <option>High to Low</option>
                                                <option>New Added</option>
                                                <option>On Sale</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="xc-shop-items-wrapper xc-shop-item-primary">
                            <div class="row gutter-y-20">
                                @foreach ($products as $product)
                                    <div class="col-xl-3 col-md-6 col-sm-6 infinite-item">
                                        <div class="xc-product-two__item">
                                            <div class="xc-product-two__img">
                                                <img src="{{ asset('path_to_images/' . $product->image) }}" alt="product">
                                            </div>
                                            <div class="xc-product-two__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (125)
                                            </div>
                                            <h3 class="xc-product-two__title"><a href="#">{{ $product->name }}</a>
                                            </h3>
                                            <h4 class="xc-product-two__price">${{ $product->price }}</h4>
                                            <div class="xc-product-two__btn">
                                                <a href="{{ route('product.show', $product->id) }}"><i
                                                        class="icon-eye"></i></a>
                                                <a href="#"><i class="icon-grocery-store"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
