@extends('frontend.master')
@section('content')
  <!-- Hero Section as Full Div Carousel -->
    <section id="hero" class="hero section">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-right">
                                <div class="hero-content">
                                    <h1>Transform Your Digital Presence</h1>
                                    <p>We create innovative digital solutions that drive growth and elevate your brand.
                                    </p>
                                    <div class="hero-buttons">
                                        <a href="#" class="btn btn-primary">Get Started</a>
                                        <a href="#" class="btn btn-outline">Our Work</a>
                                    </div>
                                    <div class="hero-stats">
                                        <div class="stat-item">
                                            <span class="stat-number purecounter" data-purecounter-start="0"
                                                data-purecounter-end="150" data-purecounter-duration="1"></span>
                                            <span class="stat-label">Projects Completed</span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-number purecounter" data-purecounter-start="0"
                                                data-purecounter-end="95" data-purecounter-duration="1"></span>
                                            <span class="stat-label">Client Satisfaction</span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-number purecounter" data-purecounter-start="0"
                                                data-purecounter-end="24" data-purecounter-duration="1"></span>
                                            <span class="stat-label">Team Members</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6" data-aos="fade-left">
                                <div class="hero-image">
                                    <img src="{{ asset('frontend/assets/img/misc/misc-16.webp') }}" height="450"
                                        width="700" alt="Slide 2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-right">
                                <div class="hero-content">
                                    <h1>Innovative Web Solutions</h1>
                                    <p>Delivering cutting-edge websites to help your business grow faster.</p>
                                    <div class="hero-buttons mt-5">
                                        <a href="#" class="btn btn-primary">Get Started</a>
                                        <a href="#" class="btn btn-outline">Our Work</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6" data-aos="fade-left">
                                <div class="hero-image">
                                    <img src="{{ asset('frontend/assets/img/misc/misc-17.webp') }}" height="450"
                                        width="700" alt="Slide 2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-right">
                                <div class="hero-content">
                                    <h1>Grow Your Digital Brand</h1>
                                    <p>Helping brands achieve digital excellence with creative solutions.</p>
                                    <div class="hero-buttons mt-5">
                                        <a href="#" class="btn btn-primary">Get Started</a>
                                        <a href="#" class="btn btn-outline">Our Work</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6" data-aos="fade-left">
                                <div class="hero-image">
                                    <img src="{{ asset('frontend/assets/img/misc/misc-18.webp') }}" height="450"
                                        width="700" alt="Slide 2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>


    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5 align-items-center">

                <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
                    <div class="content">
                        <h6 class="subtitle">Discover Our Story</h6>
                        <h2>Innovative Solutions for a Digital-First World</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>

                        <ul class="features-list">
                            <li><i class="bi bi-check-circle-fill"></i><span>Excepteur sint occaecat cupidatat non
                                    proident.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i><span>Nemo enim ipsam voluptatem quia voluptas
                                    sit.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i><span>Duis aute irure dolor in reprehenderit in
                                    voluptate velit.</span></li>
                        </ul>

                        <a href="#" class="btn btn-primary">Discover More</a>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
                    <div class="image-composition">
                        <div class="image-main">
                            <img src="{{ asset('frontend/assets/img/about/about-9.webp') }}"
                                alt="Modern office with a team working" class="img-fluid" loading="lazy">
                        </div>
                        <div class="image-secondary">
                            <img src="{{ asset('frontend/assets/img/about/about-square-8.webp') }}"
                                alt="Collaborative discussion" class="img-fluid" loading="lazy">
                        </div>
                        <div class="stats-card">
                            <div class="stats-item">
                                <h3>20+</h3>
                                <p>Years of Expertise</p>
                            </div>
                            <div class="stats-item">
                                <h3>500+</h3>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->

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
                        <p>Donec vel sapien augue integer urna vel turpis cursus porta aliquam ligula eget ultricies.
                        </p>

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
                        <p>Curabitur arcu erat accumsan id imperdiet et porttitor at sem pellentesque habitant morbi.
                        </p>
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

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="200">
                    <li data-filter="*" class="filter-active">All Projects</li>
                    <li data-filter=".filter-web">Web Design</li>
                    <li data-filter=".filter-mobile">Mobile Apps</li>
                    <li data-filter=".filter-branding">Branding</li>
                    <li data-filter=".filter-ui">UI/UX</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-xl-4 col-lg-6 portfolio-item isotope-item filter-web">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-image">
                                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-7.webp') }}"
                                    alt="Creative Web Project" class="img-fluid" loading="lazy">
                                <div class="portfolio-hover">
                                    <div class="portfolio-actions">
                                        <a href="{{ asset('frontend/assets/img/portfolio/portfolio-7.webp') }}"
                                            class="glightbox action-btn preview-btn" title="Preview Project">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="portfolio-details.html" class="action-btn details-btn"
                                            title="View Details">
                                            <i class="bi bi-arrow-up-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-content">
                                <div class="portfolio-meta">
                                    <span class="project-type">Web Design</span>
                                    <div class="project-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <span>4.8</span>
                                    </div>
                                </div>
                                <h3>Digital Innovation Platform</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                                    incididunt ut labore.</p>
                                <div class="portfolio-tech">
                                    <span class="tech-badge">React</span>
                                    <span class="tech-badge">Node.js</span>
                                    <span class="tech-badge">AWS</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 portfolio-item isotope-item filter-mobile">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-image">
                                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-8.webp') }}"
                                    alt="Mobile App Project" class="img-fluid" loading="lazy">
                                <div class="portfolio-hover">
                                    <div class="portfolio-actions">
                                        <a href="{{ asset('frontend/assets/img/portfolio/portfolio-8.webp') }}"
                                            class="glightbox action-btn preview-btn" title="Preview Project">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="portfolio-details.html" class="action-btn details-btn"
                                            title="View Details">
                                            <i class="bi bi-arrow-up-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-content">
                                <div class="portfolio-meta">
                                    <span class="project-type">Mobile App</span>
                                    <div class="project-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <span>4.9</span>
                                    </div>
                                </div>
                                <h3>Smart Productivity App</h3>
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                                    curae.</p>
                                <div class="portfolio-tech">
                                    <span class="tech-badge">Flutter</span>
                                    <span class="tech-badge">Firebase</span>
                                    <span class="tech-badge">AI</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-image">
                                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-9.webp') }}"
                                    alt="Branding Project" class="img-fluid" loading="lazy">
                                <div class="portfolio-hover">
                                    <div class="portfolio-actions">
                                        <a href="{{ asset('frontend/assets/img/portfolio/portfolio-9.webp') }}"
                                            class="glightbox action-btn preview-btn" title="Preview Project">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="portfolio-details.html" class="action-btn details-btn"
                                            title="View Details">
                                            <i class="bi bi-arrow-up-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-content">
                                <div class="portfolio-meta">
                                    <span class="project-type">Branding</span>
                                    <div class="project-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <span>5.0</span>
                                    </div>
                                </div>
                                <h3>Modern Brand Identity</h3>
                                <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat,
                                    accumsan id.</p>
                                <div class="portfolio-tech">
                                    <span class="tech-badge">Illustrator</span>
                                    <span class="tech-badge">Figma</span>
                                    <span class="tech-badge">Brand</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 portfolio-item isotope-item filter-ui">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-image">
                                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-10.webp') }}"
                                    alt="UI/UX Project" class="img-fluid" loading="lazy">
                                <div class="portfolio-hover">
                                    <div class="portfolio-actions">
                                        <a href="{{ asset('frontend/assets/img/portfolio/portfolio-10.webp') }}"
                                            class="glightbox action-btn preview-btn" title="Preview Project">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="portfolio-details.html" class="action-btn details-btn"
                                            title="View Details">
                                            <i class="bi bi-arrow-up-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-content">
                                <div class="portfolio-meta">
                                    <span class="project-type">UI/UX</span>
                                    <div class="project-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <span>4.7</span>
                                    </div>
                                </div>
                                <h3>SaaS Dashboard Design</h3>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                    egestas.</p>
                                <div class="portfolio-tech">
                                    <span class="tech-badge">Figma</span>
                                    <span class="tech-badge">Prototyping</span>
                                    <span class="tech-badge">UX</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 portfolio-item isotope-item filter-web">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-image">
                                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-11.webp') }}"
                                    alt="E-commerce Platform" class="img-fluid" loading="lazy">
                                <div class="portfolio-hover">
                                    <div class="portfolio-actions">
                                        <a href="{{ asset('frontend/assets/img/portfolio/portfolio-11.webp') }}"
                                            class="glightbox action-btn preview-btn" title="Preview Project">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="portfolio-details.html" class="action-btn details-btn"
                                            title="View Details">
                                            <i class="bi bi-arrow-up-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-content">
                                <div class="portfolio-meta">
                                    <span class="project-type">E-commerce</span>
                                    <div class="project-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <span>4.6</span>
                                    </div>
                                </div>
                                <h3>E-commerce Platform</h3>
                                <p>Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur
                                    sed.</p>
                                <div class="portfolio-tech">
                                    <span class="tech-badge">Shopify</span>
                                    <span class="tech-badge">React</span>
                                    <span class="tech-badge">API</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 portfolio-item isotope-item filter-mobile">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-image">
                                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-12.webp') }}"
                                    alt="Fintech Mobile App" class="img-fluid" loading="lazy">
                                <div class="portfolio-hover">
                                    <div class="portfolio-actions">
                                        <a href="{{ asset('frontend/assets/img/portfolio/portfolio-12.webp') }}"
                                            class="glightbox action-btn preview-btn" title="Preview Project">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="portfolio-details.html" class="action-btn details-btn"
                                            title="View Details">
                                            <i class="bi bi-arrow-up-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-content">
                                <div class="portfolio-meta">
                                    <span class="project-type">Fintech</span>
                                    <div class="project-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <span>4.8</span>
                                    </div>
                                </div>
                                <h3>Fintech Mobile Solution</h3>
                                <p>Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus. Sed porttitor
                                    lectus nibh.</p>
                                <div class="portfolio-tech">
                                    <span class="tech-badge">Swift</span>
                                    <span class="tech-badge">Kotlin</span>
                                    <span class="tech-badge">Blockchain</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Portfolio Items Container -->

            </div>

            <div class="portfolio-cta text-center col-12" data-aos="fade-up" data-aos-delay="400">
                <h4>Ready to start your next project?</h4>
                <p>Let's work together to bring your digital vision to life</p>
                <div class="cta-buttons">
                    <a href="#contact" class="btn btn-primary">Start a Project</a>
                    <a href="#portfolio" class="btn btn-outline">View All Work</a>
                </div>
            </div>

        </div>

    </section><!-- /Portfolio Section -->

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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua ut enim ad minim veniam.</p>
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
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat duis aute irure dolor in reprehenderit.</p>
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
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum sed ut perspiciatis unde omnis.</p>
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
                        <img src="{{ asset('frontend/assets/img/illustration/illustration-14.webp') }}"
                            alt="Creative Process" class="img-fluid">
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="feature-content">
                        <h3>Why Leading Brands Choose Us</h3>
                        <p class="lead">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                            eu fugiat nulla pariatur excepteur sint occaecat.</p>

                        <div class="feature-list">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="feature-text">
                                    <h5>Strategic Thinking</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor
                                        incididunt.</p>
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="feature-text">
                                    <h5>Data-Driven Approach</h5>
                                    <p>Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip
                                        ex ea.</p>
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="feature-text">
                                    <h5>24/7 Support</h5>
                                    <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt
                                        mollit.</p>
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

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimonials</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="testimonials-slider swiper init-swiper">
                <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 4000
              },
              "slidesPerView": 1,
              "centeredSlides": true,
              "spaceBetween": 20,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "768": {
                  "slidesPerView": 1.5,
                  "spaceBetween": 30
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 40
                }
              }
            }
          </script>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-card" data-aos="zoom-in" data-aos-delay="100">
                            <div class="testimonial-header">
                                <div class="user-avatar">
                                    <img src="{{ asset('frontend/assets/img/person/person-f-12.webp') }}"
                                        alt="Profile Image">
                                </div>
                                <div class="user-info">
                                    <h3>Jennifer Martinez</h3>
                                    <span class="user-role">Product Designer</span>
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="quote-mark">
                                    <i class="bi bi-quote"></i>
                                </div>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit anim id est laborum consectetur adipiscing elit.</p>
                            </div>
                            <div class="testimonial-footer">
                                <div class="company-badge">
                                    <i class="bi bi-building"></i>
                                    <span>TechCorp</span>
                                </div>
                                <div class="verified-badge">
                                    <i class="bi bi-patch-check-fill"></i>
                                    <span>Verified</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-card" data-aos="zoom-in" data-aos-delay="200">
                            <div class="testimonial-header">
                                <div class="user-avatar">
                                    <img src="{{ asset('frontend/assets/img/person/person-m-11.webp') }}"
                                        alt="Profile Image">
                                </div>
                                <div class="user-info">
                                    <h3>Alexander Chen</h3>
                                    <span class="user-role">Frontend Engineer</span>
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="quote-mark">
                                    <i class="bi bi-quote"></i>
                                </div>
                                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                            </div>
                            <div class="testimonial-footer">
                                <div class="company-badge">
                                    <i class="bi bi-building"></i>
                                    <span>InnovateLab</span>
                                </div>
                                <div class="verified-badge">
                                    <i class="bi bi-patch-check-fill"></i>
                                    <span>Verified</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-card" data-aos="zoom-in" data-aos-delay="300">
                            <div class="testimonial-header">
                                <div class="user-avatar">
                                    <img src="{{ asset('frontend/assets/img/person/person-f-8.webp') }}"
                                        alt="Profile Image">
                                </div>
                                <div class="user-info">
                                    <h3>Rachel Taylor</h3>
                                    <span class="user-role">Marketing Lead</span>
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="quote-mark">
                                    <i class="bi bi-quote"></i>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                    fugiat nulla pariatur excepteur sint occaecat cupidatat non proident.</p>
                            </div>
                            <div class="testimonial-footer">
                                <div class="company-badge">
                                    <i class="bi bi-building"></i>
                                    <span>GrowthCo</span>
                                </div>
                                <div class="verified-badge">
                                    <i class="bi bi-patch-check-fill"></i>
                                    <span>Verified</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-card" data-aos="zoom-in" data-aos-delay="100">
                            <div class="testimonial-header">
                                <div class="user-avatar">
                                    <img src="{{ asset('frontend/assets/img/person/person-m-14.webp') }}"
                                        alt="Profile Image">
                                </div>
                                <div class="user-info">
                                    <h3>Christopher Lee</h3>
                                    <span class="user-role">VP Engineering</span>
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="quote-mark">
                                    <i class="bi bi-quote"></i>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua enim ad minim veniam.</p>
                            </div>
                            <div class="testimonial-footer">
                                <div class="company-badge">
                                    <i class="bi bi-building"></i>
                                    <span>DevStream</span>
                                </div>
                                <div class="verified-badge">
                                    <i class="bi bi-patch-check-fill"></i>
                                    <span>Verified</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-card" data-aos="zoom-in" data-aos-delay="200">
                            <div class="testimonial-header">
                                <div class="user-avatar">
                                    <img src="{{ asset('frontend/assets/img/person/person-f-5.webp') }}"
                                        alt="Profile Image">
                                </div>
                                <div class="user-info">
                                    <h3>Amanda Rodriguez</h3>
                                    <span class="user-role">UX Researcher</span>
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="quote-mark">
                                    <i class="bi bi-quote"></i>
                                </div>
                                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
                                    duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                            </div>
                            <div class="testimonial-footer">
                                <div class="company-badge">
                                    <i class="bi bi-building"></i>
                                    <span>UserFirst</span>
                                </div>
                                <div class="verified-badge">
                                    <i class="bi bi-patch-check-fill"></i>
                                    <span>Verified</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <!-- Team Section -->
    <section id="team" class="team section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Team</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4">

                <div class="col-lg-6">
                    <div class="team-intro" data-aos="fade-right" data-aos-delay="150">
                        <div class="intro-content">
                            <h3>Meet Our Exceptional Team</h3>
                            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet
                                ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                            <div class="stats-row">
                                <div class="stat-item">
                                    <span class="stat-number">50+</span>
                                    <span class="stat-label">Team Members</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">8</span>
                                    <span class="stat-label">Departments</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">15+</span>
                                    <span class="stat-label">Countries</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="team-grid" data-aos="fade-left" data-aos-delay="200">
                        <div class="member-hexagon" data-aos="zoom-in" data-aos-delay="250">
                            <div class="hexagon-inner">
                                <img src="{{ asset('frontend/assets/img/person/person-f-3.webp') }}"
                                    alt="Team member">
                                <div class="member-overlay">
                                    <h5>Sarah Chen</h5>
                                    <span>Creative Director</span>
                                    <div class="social-icons">
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                        <a href="#"><i class="bi bi-twitter"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="member-hexagon" data-aos="zoom-in" data-aos-delay="300">
                            <div class="hexagon-inner">
                                <img src="{{ asset('frontend/assets/img/person/person-m-4.webp') }}"
                                    alt="Team member">
                                <div class="member-overlay">
                                    <h5>Marcus Johnson</h5>
                                    <span>Tech Lead</span>
                                    <div class="social-icons">
                                        <a href="#"><i class="bi bi-github"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="member-hexagon" data-aos="zoom-in" data-aos-delay="350">
                            <div class="hexagon-inner">
                                <img src="{{ asset('frontend/assets/img/person/person-f-8.webp') }}"
                                    alt="Team member">
                                <div class="member-overlay">
                                    <h5>Emma Rodriguez</h5>
                                    <span>Product Manager</span>
                                    <div class="social-icons">
                                        <a href="#"><i class="bi bi-instagram"></i></a>
                                        <a href="#"><i class="bi bi-dribbble"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="member-hexagon" data-aos="zoom-in" data-aos-delay="400">
                            <div class="hexagon-inner">
                                <img src="{{ asset('frontend/assets/img/person/person-m-6.webp') }}"
                                    alt="Team member">
                                <div class="member-overlay">
                                    <h5>David Kim</h5>
                                    <span>UX Architect</span>
                                    <div class="social-icons">
                                        <a href="#"><i class="bi bi-behance"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <div class="team-carousel-wrapper" data-aos="fade-up" data-aos-delay="200">
                        <h4 class="carousel-title">Leadership Team</h4>

                        <div class="leadership-slider swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                  {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                      "delay": 4000
                    },
                    "slidesPerView": 1,
                    "spaceBetween": 0,
                    "pagination": {
                      "el": ".swiper-pagination",
                      "clickable": true
                    },
                    "breakpoints": {
                      "768": {
                        "slidesPerView": 2
                      },
                      "1024": {
                        "slidesPerView": 3
                      }
                    }
                  }
                </script>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="leader-card">
                                        <div class="leader-image">
                                            <img src="{{ asset('frontend/assets/img/person/person-f-14.webp') }}"
                                                alt="Leader">
                                        </div>
                                        <div class="leader-info">
                                            <h5>Jennifer Walsh</h5>
                                            <span class="position">Chief Executive Officer</span>
                                            <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia
                                                deserunt mollit anim id jfytgfd.</p>
                                            <div class="leader-contact">
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-envelope"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-twitter"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-instagram"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-linkedin"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-github"></i>
                                                </a>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="leader-card">
                                        <div class="leader-image">
                                            <img src="{{ asset('frontend/assets/img/person/person-m-13.webp') }}"
                                                alt="Leader">
                                        </div>
                                        <div class="leader-info">
                                            <h5>Robert Martinez</h5>
                                            <span class="position">Chief Technology Officer</span>
                                            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim
                                                ad minim veniam quis.</p>
                                            <div class="leader-contact">
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-envelope"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-twitter"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-instagram"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-linkedin"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-github"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="leader-card">
                                        <div class="leader-image">
                                            <img src="{{ asset('frontend/assets/img/person/person-f-5.webp') }}"
                                                alt="Leader">
                                        </div>
                                        <div class="leader-info">
                                            <h5>Lisa Thompson</h5>
                                            <span class="position">Head of Operations</span>
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                                dolore eu fugiat nulla pariatur.</p>
                                            <div class="leader-contact">
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-envelope"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-twitter"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-instagram"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-linkedin"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-github"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="leader-card">
                                        <div class="leader-image">
                                            <img src="{{ asset('frontend/assets/img/person/person-m-9.webp') }}"
                                                alt="Leader">
                                        </div>
                                        <div class="leader-info">
                                            <h5>Alex Garcia</h5>
                                            <span class="position">VP of Marketing</span>
                                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod
                                                tempor incididunt ut labore.</p>
                                            <div class="leader-contact">
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-envelope"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-twitter"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-instagram"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-linkedin"></i>
                                                </a>
                                                <a href="#" class="contact-btn">
                                                    <i class="bi bi-github"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-8 offset-lg-2">
                    <div class="join-team-cta" data-aos="fade-up" data-aos-delay="300">
                        <div class="cta-icon">
                            <i class="bi bi-rocket-takeoff"></i>
                        </div>
                        <div class="cta-content">
                            <h4>Ready to Join Our Mission?</h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores.</p>
                            <div class="cta-actions">
                                <a href="#" class="btn btn-primary">View Open Roles</a>
                                <a href="#" class="btn btn-outline">Learn Our Culture</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Team Section -->

    <!-- ===== Blog Section ===== -->
    <section id="blog" class="portfolio section">

        <div class="container section-title" data-aos="fade-up">
            <span class="subtitle">Blog</span>
            <h2>Blog</h2>
            <p>
                Welcome to my Blog! Explore articles, tips, and creative ideas about Web Development, UI/UX Design, and
                Digital Innovation — crafted to inspire your next project.
            </p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

                <!-- Blog Card -->
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-creative">
                    <div class="portfolio-card">
                        <div class="portfolio-image-container">
                            <img src="{{ asset('frontend/assets/img/portfolio/portfolio-11.webp') }}"
                                alt="Blog Image" class="img-fluid" loading="lazy">
                        </div>

                        <div class="portfolio-content p-3">
                            <h4 class="blog-title">
                                The Power of Clean Web Design <br>
                            </h4>

                            <div class="portfolio-meta d-flex justify-content-between align-items-center mt-3">
                                <div class="project-tags">
                                    <span class="tag">#HTML</span>
                                    <span class="tag">#CSS</span>
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <a href="blog-details.html" class="text-light">
                                        <i class="bi bi-arrow-right-circle fs-3"></i>
                                    </a>
                                    <div class="project-year" style="color:#999;">2025</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Blog Card -->
                <!-- Blog Card -->
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-creative">
                    <div class="portfolio-card">
                        <div class="portfolio-image-container">
                            <img src="{{ asset('frontend/assets/img/portfolio/portfolio-10.webp') }}"
                                alt="Blog Image" class="img-fluid" loading="lazy">
                        </div>

                        <div class="portfolio-content p-3">
                            <h4 class="blog-title">
                                The Power of Clean Web Design <br>
                            </h4>

                            <div class="portfolio-meta d-flex justify-content-between align-items-center mt-3">
                                <div class="project-tags">
                                    <span class="tag">#HTML</span>
                                    <span class="tag">#CSS</span>
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <a href="blog-details.html" class="text-light">
                                        <i class="bi bi-arrow-right-circle fs-3"></i>
                                    </a>
                                    <div class="project-year" style="color:#999;">2025</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Blog Card -->
                <!-- Blog Card -->
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-creative">
                    <div class="portfolio-card">
                        <div class="portfolio-image-container">
                            <img src="{{ asset('frontend/assets/img/portfolio/portfolio-12.webp') }}"
                                alt="Blog Image" class="img-fluid" loading="lazy">
                        </div>

                        <div class="portfolio-content p-3">
                            <h4 class="blog-title">
                                The Power of Clean Web Design <br>
                            </h4>

                            <div class="portfolio-meta d-flex justify-content-between align-items-center mt-3">
                                <div class="project-tags">
                                    <span class="tag">#HTML</span>
                                    <span class="tag">#CSS</span>
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <a href="blog-details.html" class="text-light">
                                        <i class="bi bi-arrow-right-circle fs-3"></i>
                                    </a>
                                    <div class="project-year" style="color:#999;">2025</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Blog Card -->

            </div>
        </div>
    </section>



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
                        <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary
                        </p>

                        <ul class="features list-unstyled">
                            <li><i class="bi bi-check-circle-fill"></i> 1 Page with Elementor</li>
                            <li><i class="bi bi-check-circle-fill"></i> Responsive Design</li>
                            <li><i class="bi bi-check-circle-fill"></i> SEO Optimized</li>
                            <li><i class="bi bi-check-circle-fill"></i> Speed Optimized</li>
                        </ul><br>

                        <a href="#" class="btn order-btn">Order</a>
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
                        <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary
                        </p>

                        <ul class="features list-unstyled">
                            <li><i class="bi bi-check-circle-fill"></i> 3 Pages with Elementor</li>
                            <li><i class="bi bi-check-circle-fill"></i> Responsive Design</li>
                            <li><i class="bi bi-check-circle-fill"></i> SEO Optimized</li>
                            <li><i class="bi bi-check-circle-fill"></i> Speed Optimized</li>
                        </ul><br>

                        <a href="#" class="btn order-btn">Order</a>
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
                        <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary
                        </p>

                        <ul class="features list-unstyled">
                            <li><i class="bi bi-check-circle-fill"></i> 5 Pages with Elementor</li>
                            <li><i class="bi bi-check-circle-fill"></i> Responsive Design</li>
                            <li><i class="bi bi-check-circle-fill"></i> SEO Optimized</li>
                            <li><i class="bi bi-check-circle-fill"></i> Speed Optimized</li>
                        </ul><br>

                        <a href="#" class="btn order-btn">Order</a>
                        <div class="delivery">
                            <span>🚀 5 Days Delivery</span>
                            <span>💎 Unlimited Revision</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
                    <div class="contact-form-card">
                        <div class="form-header">
                            <div class="header-icon">
                                <i class="bi bi-chat-dots-fill"></i>
                            </div>
                            <h3>Let's Start a Conversation</h3>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                nulla pariatur excepteur sint.</p>
                        </div>

                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Your Name" required="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email Address" required="">
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" name="subject"
                                    placeholder="What's this about?" required="">
                            </div>

                            <div class="mb-4">
                                <textarea class="form-control" name="message" rows="4" placeholder="Tell us more about your project..."
                                    required=""></textarea>
                            </div>

                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>

                            <button type="submit" class="submit-btn">
                                <span>Send Message</span>
                                <i class="bi bi-send-fill"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
                    <div class="contact-info-area">
                        <div class="info-header">
                            <h3>Ready to Transform Your Ideas?</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium totam rem aperiam eaque ipsa quae ab illo inventore.</p>
                        </div>

                        <div class="contact-methods">
                            <div class="method-card" data-aos="zoom-in" data-aos-delay="250">
                                <div class="card-icon">
                                    <i class="bi bi-envelope-at"></i>
                                </div>
                                <div class="card-content">
                                    <h5>Email Us</h5>
                                    <p>hello@productdemo.com</p>
                                    <span class="response-time">Response in 2-4 hours</span>
                                </div>
                            </div>

                            <div class="method-card" data-aos="zoom-in" data-aos-delay="300">
                                <div class="card-icon">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div class="card-content">
                                    <h5>Call Us</h5>
                                    <p>+1 (555) 987-6543</p>
                                    <span class="response-time">Available 9AM - 6PM EST</span>
                                </div>
                            </div>

                            <div class="method-card" data-aos="zoom-in" data-aos-delay="350">
                                <div class="card-icon">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div class="card-content">
                                    <h5>Visit Our Office</h5>
                                    <p>4821 Broadway Street, New York, NY 10013</p>
                                    <span class="response-time">Open Monday - Friday</span>
                                </div>
                            </div>
                        </div>

                        <div class="additional-info" data-aos="fade-up" data-aos-delay="400">
                            <div class="info-stats">
                                <div class="stat-item">
                                    <div class="stat-number">24h</div>
                                    <div class="stat-label">Average Response</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">98%</div>
                                    <div class="stat-label">Client Satisfaction</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">150+</div>
                                    <div class="stat-label">Projects Delivered</div>
                                </div>
                            </div>

                            <div class="social-connect">
                                <h6>Connect With Us</h6>
                                <div class="social-links">
                                    <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-twitter-x"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-github"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-discord"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->
@endsection