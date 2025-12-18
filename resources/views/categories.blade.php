@extends('layouts.master')

@section('content')

    <div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            @if (!empty($categories) )
                                @foreach ($categories as $category)
                                    @if (!empty($productId) && $productId == $category->id)
                                        <li class="active" data-filter=".{{ strtolower($category->id) }}">{{ $category->name }}</li>
                                    @else
                                        <li data-filter=".{{ strtolower($category->id) }}">{{ $category->name }}</li>
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
                        <div class="col-lg-4 col-md-6 text-center {{ strtolower($product->category_id) }}">
                            <div class="single-product-item">
                                <div class="product-image">
									<a href="/product"><img style="max-height: 15rem;min-height:15rem;" src="{{ filter_var($product->image_path, FILTER_VALIDATE_URL) ? $product->image_path : asset($product->image_path) }}" alt="" style="max-height:250px; min-height: 250px;"></a>
                                </div>
                                <h3 style="min-height: 4.5rem">{{ $product->name }}</h3>
                                <p class="product-price"><span>{{ $product->price }} $ </span></p>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
								<p style="margin-top:1rem">
                                	<a href="{{ route('product.remove', ['id'=>$product->id]) }}" class="cart-btn" style="background-color: #a30000 !important"><i class="fas fa-trash"></i> Remove</a>
                                	<a href="{{ route('product.edit', ['id'=>$product->id]) }}" class="cart-btn" style="background-color: #007bff !important"><i class="fas fa-edit"></i> Edit</a>
								</p>
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

@endsection