@extends('frontend.master')
@section('content')
    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Category</a></li>
                    <li class="breadcrumb-item active current">Service Details</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>{{$services->header_title}}</h1>
            <p>{{$services->header_description}}</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <!-- Service Overview -->
                <div class="col-lg-8">
                    <div class="service-content">
                        <h2>{{$services->title}}</h2>
                        <p class="lead">{{$services->section_description}}
                        </p>

                        <div class="service-image" data-aos="fade-up" data-aos-delay="200">
                            <img src="{{ asset('backend/images/service/'.$services->image) }}" alt="Digital Marketing"
                                class="img-fluid rounded">
                        </div>

                        <p>{{$services->description}}</p>

                        <!-- Service Features -->
                        <div class="service-features" data-aos="fade-up" data-aos-delay="300">
                            <h4>What's Included</h4>
                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <div class="feature-item">
                                        <i class="bi bi-graph-up-arrow flex-shrink-0"></i>
                                        <div>
                                            <h5>Performance Analytics</h5>
                                            <p>{{$services->features->performance_analytics}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-item">
                                        <i class="bi bi-bullseye flex-shrink-0"></i>
                                        <div>
                                            <h5>Target Audience Research</h5>
                                            <p>{{$services->features->target_audience_research}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-item">
                                        <i class="bi bi-palette flex-shrink-0"></i>
                                        <div>
                                            <h5>Content Creation</h5>
                                            <p>{{$services->features->content_creation}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-item">
                                        <i class="bi bi-share flex-shrink-0"></i>
                                        <div>
                                            <h5>Social Media Management</h5>
                                            <p>{{$services->features->social_media_management}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Process Steps -->
                        <div class="service-process" data-aos="fade-up" data-aos-delay="400">
                            <h4>Our Process</h4>
                            <div class="process-steps">
                                <div class="step-item">
                                    <div class="step-number">01</div>
                                    <div class="step-content">
                                        <h5>Strategy Development</h5>
                                        <p>{{$services->process->strategy_development}}</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">02</div>
                                    <div class="step-content">
                                        <h5>Implementation</h5>
                                        <p>{{$services->process->implementation}}</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">03</div>
                                    <div class="step-content">
                                        <h5>Optimization</h5>
                                        <p>{{$services->process->optimization}}</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">04</div>
                                    <div class="step-content">
                                        <h5>Results &amp; Reporting</h5>
                                        <p>{{$services->process->results_reporting}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Service Content -->

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar" data-aos="fade-up" data-aos-delay="200">

                        <!-- Service Quick Facts -->
                        <div class="service-info">
                            <h4>Service Details</h4>
                            <ul class="service-facts">
                                <li>
                                    <span class="fact-label">Duration:</span>
                                    <span class="fact-value">{{$services->sidebar->duration}}</span>
                                </li>
                                <li>
                                    <span class="fact-label">Delivery:</span>
                                    <span class="fact-value">{{$services->sidebar->delivery}}</span>
                                </li>
                                <li>
                                    <span class="fact-label">Team Size:</span>
                                    <span class="fact-value">{{$services->sidebar->team_size}}</span>
                                </li>
                                <li>
                                    <span class="fact-label">Support:</span>
                                    <span class="fact-value">{{$services->sidebar->support}}</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Testimonial -->
                        <div class="service-testimonial">
                            <div class="testimonial-content">
                                <p>"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit anim id est laborum sed ut perspiciatis."</p>
                                <div class="testimonial-author">
                                    <img src="{{ asset('frontend/assets/img/person/person-f-3.webp') }}" alt="Sarah Johnson"
                                        class="author-image">
                                    <div class="author-info">
                                        <h5>Sarah Johnson</h5>
                                        <span>Marketing Director</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="inquiry-form">
                            <h4>Get a Quote</h4>
                            <form action="forms/get-a-quote.php" method="post" class="php-email-form">
                                <div class="form-group mb-3">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required="">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Your Email" required="">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="tel" name="phone" class="form-control" id="phone"
                                        placeholder="Your Phone">
                                </div>
                                <input type="hidden" name="subect" value="Service Quote Request">
                                <div class="form-group mb-4">
                                    <textarea class="form-control" name="message" rows="5"
                                        placeholder="Tell us about your project requirements..." required=""></textarea>
                                </div>
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                                <button type="submit" class="btn-submit w-100">Request Quote</button>
                            </form>
                        </div>

                    </div>
                </div><!-- End Sidebar -->

            </div>

        </div>

    </section><!-- /Service Details Section -->
@endsection
