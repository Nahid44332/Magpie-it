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
      <div class="col-md-4">
        <div class="pricing-card text-center">
          <div class="price-circle">
            <span>$30.00 / months</span>
          </div>
          <h3>Standard</h3>
          <h5>Make your static site</h5>
          <p class="small">Elementor / WPBakery</p>
          <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</p>

          <ul class="features list-unstyled">
            <li><i class="bi bi-check-circle-fill"></i> 1 Page with Elementor</li>
            <li><i class="bi bi-check-circle-fill"></i> Responsive Design</li>
            <li><i class="bi bi-check-circle-fill"></i> SEO Optimized</li>
            <li><i class="bi bi-check-circle-fill"></i> Speed Optimized</li>
          </ul><br>

          <a href="{{url('/order')}}" class="btn order-btn">Order</a>
          <div class="delivery">
            <span>🚀 2 Days Delivery</span>
            <span>💎 Unlimited Revision</span>
          </div>
        </div>
      </div>

      <!-- 🔹 2 -->
      <div class="col-md-4">
        <div class="pricing-card text-center">
          <div class="price-circle">
            <span>$50.00 / months</span>
          </div>
          <h3>Pro</h3>
          <h5>Make your dynamic site</h5>
          <p class="small">Elementor / WPBakery</p>
          <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</p>

          <ul class="features list-unstyled">
            <li><i class="bi bi-check-circle-fill"></i> 3 Pages with Elementor</li>
            <li><i class="bi bi-check-circle-fill"></i> Responsive Design</li>
            <li><i class="bi bi-check-circle-fill"></i> SEO Optimized</li>
            <li><i class="bi bi-check-circle-fill"></i> Speed Optimized</li>
          </ul><br>

          <a href="{{url('/order')}}" class="btn order-btn">Order</a>
          <div class="delivery">
            <span>🚀 3 Days Delivery</span>
            <span>💎 Unlimited Revision</span>
          </div>
        </div>
      </div>

      <!-- 🔹 3 -->
      <div class="col-md-4">
        <div class="pricing-card text-center">
          <div class="price-circle">
            <span>$70.00 / months</span>
          </div>
          <h3>Premium</h3>
          <h5>Build your business site</h5>
          <p class="small">Elementor / WPBakery</p>
          <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</p>

          <ul class="features list-unstyled">
            <li><i class="bi bi-check-circle-fill"></i> 5 Pages with Elementor</li>
            <li><i class="bi bi-check-circle-fill"></i> Responsive Design</li>
            <li><i class="bi bi-check-circle-fill"></i> SEO Optimized</li>
            <li><i class="bi bi-check-circle-fill"></i> Speed Optimized</li>
          </ul><br>

          <a href="{{url('/order')}}" class="btn order-btn">Order</a>
          <div class="delivery">
            <span>🚀 5 Days Delivery</span>
            <span>💎 Unlimited Revision</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection