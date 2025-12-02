@extends('layouts.master')
@php
    $productId = request()->route('catid'); // gets the route parameter
@endphp
@section('content')
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            @if (!empty($categories))
                                @foreach ($categories as $category)
                                    @if (!empty($productId) && $productId == $category->id)
                                        <li class="active" data-filter=".{{ strtolower($category->name) }}">{{ $category->name }}</li>
                                    @else
                                        <li data-filter=".{{ strtolower($category->name) }}">{{ $category->name }}</li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists">
                @if (!empty($products))
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 text-center strawberry">
                            <div class="single-product-item">
                                <div class="product-image">
									<a href="/product"><img src="{{ filter_var($product->imagepath, FILTER_VALIDATE_URL) ? $product->imagepath : asset($product->imagepath) }}" alt="" style="max-height:250px; min-height: 250px;"></a>
                                </div>
                                <h3>{{ $product->name }}</h3>
                                <p class="product-price"><span>{{ $product->price }} $ </span></p>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                    @endforeach
                @endif
			</div>

			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->
@endsection