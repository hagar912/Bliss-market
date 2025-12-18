@extends('layouts.master')
@php
    $productId = request()->route('id'); // gets the route parameter
@endphp
@section('content')
<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row ">
				<div class="col-12 mt-100 text-center">
					<div class="section-title">
						<h3>Edit <span class="orange-text">Product</span></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="post" id="fruitkha-contact" action="/{{route('product.store')}}" enctype="multipart/form-data">
							@csrf()
							<p>
                                <input type="hidden" placeholder="id" name="id" id="id" value="{{ $product->id }}">
								<input type="text" placeholder="Name" name="name" id="name" value="{{ $product->name }}">
								@error('name')
									<small class="text-danger">{{ $message }}</small>
								@enderror

								<input type="number" placeholder="Price" name="price" id="price" value="{{ $product->price }}">
								@error('price')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</p>
							<p>
								<input type="number" placeholder="Quantity" name="quantity" id="quantity" value="{{ $product->quantity }}">
								@error('quantity')
									<small class="text-danger">{{ $message }}</small>
								@enderror
								<select name="category_id" id="category_id">
									@foreach ($categories as $category)
                                        <!-- If the category id matches the product's category_id, mark it as selected -->
										<option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
									@endforeach
								</select>
								@error('category_id')
									<small class="text-danger">{{ $message }}</small>
								@enderror

							</p>
							<p>
								<textarea name="description" id="description" cols="30" rows="10" placeholder="description"> {{ $product->description }}</textarea>
								@error('description')
									<small class="text-danger">{{ $message }}</small>
								@enderror

                                <div class="current-image">
                                    <label>Current Image:</label><br>
                                    <img src="{{ asset($product->image_path) }}" alt="Current Product" style="max-width: 200px; max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                </div>
                                <br>
                                <label for="photo">Upload New Image (optional):</label>
								<input type="file" name="photo" id="photo" class="form-control" accept="image/*">
								@error('photo')
									<small class="text-danger">{{ $message }}</small>
								@enderror
                                <div id="image-preview" style="margin-top: 10px;">
                                    <img id="preview-img" src="#" alt="Preview" style="max-width: 200px; max-height: 200px; border: 1px solid #ddd; padding: 5px; display: none;">
                                </div>

							</p>
							<input type="hidden" name="token" value="FsWga4&@f6aw" />
							<p><input type="submit" value="Submit"></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    <script>
        $(document).ready(function() {
            $('#photo').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview-img').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#preview-img').hide();
                }
            });
        });
    </script>
@endsection