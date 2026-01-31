@extends('frontend.master')
@section('content')
<style>
    body {
      background-color: #05071E;
      color: #222;
    }

    h2,
    h3,
    h4,
    h5 {
      color: #4641B3;
      font-weight: 700;
    }

    .h1 {
      color: #4641B3 !important;
    }

    .features-list {
      list-style: none;
      padding-left: 0;
    }

    .features-list li {
      margin-bottom: 10px;
    }

    .order-btn {
      border: 2px solid #4641B3;
      color: white;
    }

    .order-btn:hover {
      background: #4641B3;
      color: white;
    }

    .btn-primary {
      background-color: #4641B3;
      border: none;
      padding: 10px 25px;
      border-radius: 8px;
    }

    .btn-outline {
      border: 2px solid #4641B3;
      color: #4641B3;
      padding: 10px 25px;
      border-radius: 8px;
    }

    .btn-outline:hover {
      background: #4641B3;
      color: #fff;
    }

    .service-card,
    .feature-card,
    .portfolio-wrapper {
      border: 1px solid #ddd;
      border-radius: 12px;
      transition: all 0.3s ease;
      background: #fff;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      padding: 25px;
    }

    .service-card:hover,
    .feature-card:hover,
    .portfolio-wrapper:hover {
      transform: translateY(-6px);
      box-shadow: 0 0 15px rgba(70, 65, 179, 0.3);
    }

    .service-icon {
      font-size: 40px;
      color: #4641B3;
      margin-bottom: 15px;
    }

    .portfolio {
      background: #05071E !important;
    }

    .portfolio1 {
      background: #14152A !important;
      margin: 0 auto;
      /* Center এ রাখবে */
      margin-left: 180px;
      max-width: 80%;
      /* বাম-ডানে ৫% করে ফাঁকা রাখবে */
      padding: 40px 20px;
      border: 2px solid #4641B3;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(70, 65, 179, 0.2);

    }

    .ptag {
      color: #ddd !important;
    }

    h4 {
      color: white;
      font-size: 30px;
      font-weight: 600;
    }

    .portfolio-tech span {
      background: #4641B3 !important;
      color: #4641B3;
      padding: 5px 10px;
      border-radius: 6px;
      font-size: 13px;
      margin-right: 5px;
    }

    .section-title h2 {
      color: #4641B3;
      font-weight: 700;
    }

    .h3 {
      color: #ddd !important;
    }

</style>
    <!-- ======= About Section ======= -->
  <section id="about" class="about section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-5 align-items-center">
        <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
          <h1 class="subtitle text-muted h1 ">Discover Our Story</h1>
          <h3 class="h3 mt-3">Innovative Solutions for a Digital-First World</h3>
          <p class="mt-3">We craft digital experiences that transform brands and grow businesses. With years of
            experience in design, development, and strategy — we deliver innovation that truly matters.</p>
          <ul class="features-list">
            <li><i class="bi bi-check-circle-fill text-primary"></i> Creative & strategic digital solutions</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Expert team of designers & developers</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Proven results with global brands</li>
          </ul>
          <a href="#services" class="order-btn mt-3">Discover More</a>
        </div>
        <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
          <img src="{{asset('frontend/assets/img/about/about-9.webp')}}" class="img-fluid rounded-4 shadow" alt="About Magpie IT">
        </div>
      </div>
    </div>
  </section>
  <!-- /About Section -->


  <!-- Why Us Section -->
  <section id="why-us" class="why-us section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Why Us</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-4">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-card">
            <div class="icon-wrapper">
              <i class="bi bi-palette-fill"></i>
            </div>
            <h4>Creative Excellence</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua ut enim ad minim veniam.</p>
            <div class="feature-stats">
              <span class="stat-number" data-purecounter-start="0" data-purecounter-end="95"
                data-purecounter-duration="2">95</span>
              <span class="stat-label">% Client Satisfaction</span>
            </div>
          </div>
        </div><!-- End Feature Card -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-card">
            <div class="icon-wrapper">
              <i class="bi bi-graph-up-arrow"></i>
            </div>
            <h4>Proven Results</h4>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat duis aute irure dolor in reprehenderit.</p>
            <div class="feature-stats">
              <span class="stat-number" data-purecounter-start="0" data-purecounter-end="200"
                data-purecounter-duration="2">200</span>
              <span class="stat-label">% ROI Increase</span>
            </div>
          </div>
        </div><!-- End Feature Card -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="feature-card">
            <div class="icon-wrapper">
              <i class="bi bi-award-fill"></i>
            </div>
            <h4>Expert Team</h4>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
              laborum sed ut perspiciatis unde omnis.</p>
            <div class="feature-stats">
              <span class="stat-number" data-purecounter-start="0" data-purecounter-end="50"
                data-purecounter-duration="2">50</span>
              <span class="stat-label">+ Awards Won</span>
            </div>
          </div>
        </div><!-- End Feature Card -->

      </div>

      <div class="row mt-5">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
          <div class="feature-showcase">
            <img src="{{asset('frontend/assets/img/illustration/illustration-14.webp')}}" alt="Creative Process" class="img-fluid">
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
          <div class="feature-content">
            <h3>Why Leading Brands Choose Us</h3>
            <p class="lead">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
              pariatur excepteur sint occaecat.</p>

            <div class="feature-list">
              <div class="feature-item">
                <div class="feature-icon">
                  <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="feature-text">
                  <h5>Strategic Thinking</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
                </div>
              </div>

              <div class="feature-item">
                <div class="feature-icon">
                  <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="feature-text">
                  <h5>Data-Driven Approach</h5>
                  <p>Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
                </div>
              </div>

              <div class="feature-item">
                <div class="feature-icon">
                  <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="feature-text">
                  <h5>24/7 Support</h5>
                  <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit.</p>
                </div>
              </div>
            </div>

            <div class="cta-wrapper">
              <a href="#" class="btn btn-primary">Start Your Project</a>
              <a href="#" class="btn btn-outline">View Portfolio</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>

  </section><!-- /Why Us Section -->

  <div class="portfolio1 portfolio-cta text-center col-12" data-aos="fade-up" data-aos-delay="400">
    <h4>Ready to start your next project?</h4>
    <p class="ptag">Let's work together to bring your digital vision to life</p>
    <div class="cta-buttons">
      <a href="#" class="btn-outline">Start a Project</a>
      <a href="#" class="btn btn-outline">View All Work</a>
    </div>
  </div>
@endsection