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
          @foreach ($services as $service)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card">
              <div class="service-icon">
                <i class="{{$service->icon}}"></i>
              </div>
              <h4><a href="{{url('/service-details')}}">{{$service->title}}</a></h4>
              <p>{{$service->short_description}}</p>
             
              <a href="{{url('service-details/'.$service->id)}}" class="service-link">
                <span>Learn More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
          @endforeach
        </div>

        <div class="row mt-5 col-12">
          <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="services-cta">
              <h3>Ready to Transform Your Digital Presence?</h3>
              <p>Let's discuss your project and create something amazing together</p>
              <a href="{{url('/service-details')}}" class="btn btn-primary">Get Started Today</a>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Services Section -->
@endsection