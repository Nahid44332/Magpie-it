@extends('frontend.master')
@section('content')
    <section class="pricing-section py-5">
        <div class="container section-title" data-aos="fade-up">
            <h2>Pricing</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row justify-content-center">

                <!-- 🔹 Pricing Card -->
                @foreach ($pricing as $price)
                    <div class="col-md-4">
                        <div class="pricing-card text-center">
                            <div class="price-circle">
                                <span>{{ $price->price }}/ months</span>
                            </div>
                            <h3>{{ $price->title }}</h3>
                            <h5>{{ $price->subtitle }}</h5>
                            <p class="small">Elementor / WPBakery</p>
                            <p>{{ $price->description }}</p>

                            <ul class="features list-unstyled">
                                @foreach (json_decode($price->features) as $feature)
                                    <li><i class="bi bi-check-circle-fill"></i> {{ $feature }}</li>
                                @endforeach
                            </ul><br>

                            <a href="{{ url('/order') }}" class="btn order-btn">Order</a>
                            <div class="delivery">
                                <span>🚀 {{$price->delivery_time}}</span>
                                <span>💎 Unlimited Revision</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
