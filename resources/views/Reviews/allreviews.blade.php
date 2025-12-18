@extends('layouts.master')

@section('content')

    <!-- testimonail-section -->
    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 mt-100 text-center">
                    <div class="testimonial-sliders">
                        @if($reviews)
                            @foreach ($reviews as $review)
                                <div class="single-testimonial-slider">

                                    <div class="client-avater">
                                        <img src={{ asset($review->image_path) }} alt="testimonial">
                                    </div>
                                    <div class="client-meta">
                                        <h3>{{ $review->name }} <span>{{ $review->role }}</span></h3>
                                        <p class="testimonial-body">
                                            " {{ $review->message }} "
                                        </p>
                                        <div class="last-icon">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No reviews available.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection