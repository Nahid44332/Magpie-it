@extends('frontend.master')
@section('content')
    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card">
              <div class="service-icon">
                <i class="bi bi-palette"></i>
              </div>
              <h4><a href="service-details.html">Brand Identity Design</a></h4>
              <p>Donec vel sapien augue integer urna vel turpis cursus porta aliquam ligula eget ultricies.</p>
             
              <a href="service-details.html" class="service-link">
                <span>Learn More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-card">
              <div class="service-icon">
                <i class="bi bi-layout-text-window-reverse"></i>
              </div>
              <h4><a href="service-details.html">UI/UX Design</a></h4>
              <p>Mauris blandit aliquet elit eget tincidunt nibh pulvinar rutrum tellus pellentesque eu.</p>
              <a href="service-details.html" class="service-link">
                <span>Learn More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-card">
              <div class="service-icon">
                <i class="bi bi-code-slash"></i>
              </div>
              <h4><a href="service-details.html">Web Development</a></h4>
              <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.</p>
              <a href="service-details.html" class="service-link">
                <span>Learn More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-card">
              <div class="service-icon">
                <i class="bi bi-phone"></i>
              </div>
              <h4><a href="service-details.html">Mobile App Design</a></h4>
              <p>Nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet non curabitur gravida.</p>
              <a href="service-details.html" class="service-link">
                <span>Learn More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card">
              <div class="service-icon">
                <i class="bi bi-megaphone"></i>
              </div>
              <h4><a href="service-details.html">Digital Marketing</a></h4>
              <p>Sed porttitor lectus nibh donec sollicitudin molestie malesuada proin eget tortor risus.</p>
              <a href="service-details.html" class="service-link">
                <span>Learn More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-card">
              <div class="service-icon">
                <i class="bi bi-search"></i>
              </div>
              <h4><a href="service-details.html">SEO Optimization</a></h4>
              <p>Curabitur arcu erat accumsan id imperdiet et porttitor at sem pellentesque habitant morbi.</p>
              <a href="service-details.html" class="service-link">
                <span>Learn More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

        </div>

        <div class="row mt-5 col-12">
          <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="services-cta">
              <h3>Ready to Transform Your Digital Presence?</h3>
              <p>Let's discuss your project and create something amazing together</p>
              <a href="service-details.html" class="btn btn-primary">Get Started Today</a>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Services Section -->
@endsection