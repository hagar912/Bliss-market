@extends('layouts.master')
@section('content')
<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row ">
				<div class="col-12 mt-100 text-center">
					<div class="section-title">
						<h3>Add <span class="orange-text">Product</span></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="post" id="fruitkha-contact" action="/{{route('product.store')}}" enctype="multipart/form-data">
							@csrf()
							<p>
								<input type="text" placeholder="Name" name="name" id="name" value="{{ old('name') }}">
								@error('name')
									<small class="text-danger">{{ $message }}</small>
								@enderror

								<input type="number" placeholder="Price" name="price" id="price" value="{{ old('price') }}">
								@error('price')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</p>
							<p>
								<input type="number" placeholder="Quantity" name="quantity" id="quantity" value="{{ old('quantity') }}">
								@error('quantity')
									<small class="text-danger">{{ $message }}</small>
								@enderror
								<select name="category_id" id="category_id">
									@foreach ($categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach
								</select>
								@error('category_id')
									<small class="text-danger">{{ $message }}</small>
								@enderror

							</p>
							<p>
								<textarea name="description" id="description" cols="30" rows="10" placeholder="description"> {{ old('description') }}</textarea>
								@error('description')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</p>
							<p>
								<input type="file" name="photo" id="photo" class="form-control">
								@error('photo')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</p>
							<input type="hidden" name="token" value="FsWga4&@f6aw" />
							<p><input type="submit" value="Submit"></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection