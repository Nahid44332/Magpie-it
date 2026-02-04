@extends('frontend.master')
@section('content')
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
                  <img src="{{asset('frontend/assets/img/portfolio/portfolio-7.webp')}}" alt="Creative Web Project" class="img-fluid" loading="lazy">
                  <div class="portfolio-hover">
                    <div class="portfolio-actions">
                      <a href="{{asset('frontend/assets/img/portfolio/portfolio-7.webp')}}" class="glightbox action-btn preview-btn" title="Preview Project">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="{{url('/protfolio-details')}}" class="action-btn details-btn" title="View Details">
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
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
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
                  <img src="{{asset('frontend/assets/img/portfolio/portfolio-8.webp')}}" alt="Mobile App Project" class="img-fluid" loading="lazy">
                  <div class="portfolio-hover">
                    <div class="portfolio-actions">
                      <a href="{{asset('frontend/assets/img/portfolio/portfolio-8.webp')}}" class="glightbox action-btn preview-btn" title="Preview Project">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="{{url('/protfolio-details')}}" class="action-btn details-btn" title="View Details">
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
                  <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.</p>
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
                  <img src="{{asset('frontend/assets/img/portfolio/portfolio-9.webp')}}" alt="Branding Project" class="img-fluid" loading="lazy">
                  <div class="portfolio-hover">
                    <div class="portfolio-actions">
                      <a href="{{asset('frontend/assets/img/portfolio/portfolio-9.webp')}}" class="glightbox action-btn preview-btn" title="Preview Project">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="{{url('/protfolio-details')}}" class="action-btn details-btn" title="View Details">
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
                  <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id.</p>
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
                  <img src="{{asset('frontend/assets/img/portfolio/portfolio-10.webp')}}" alt="UI/UX Project" class="img-fluid" loading="lazy">
                  <div class="portfolio-hover">
                    <div class="portfolio-actions">
                      <a href="{{asset('frontend/assets/img/portfolio/portfolio-10.webp')}}" class="glightbox action-btn preview-btn" title="Preview Project">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="{{url('/protfolio-details')}}" class="action-btn details-btn" title="View Details">
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
                  <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
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
                  <img src="{{asset('frontend/assets/img/portfolio/portfolio-11.webp')}}" alt="E-commerce Platform" class="img-fluid" loading="lazy">
                  <div class="portfolio-hover">
                    <div class="portfolio-actions">
                      <a href="{{asset('frontend/assets/img/portfolio/portfolio-11.webp')}}" class="glightbox action-btn preview-btn" title="Preview Project">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="{{url('/protfolio-details')}}" class="action-btn details-btn" title="View Details">
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
                  <p>Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur sed.</p>
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
                  <img src="{{asset('frontend/assets/img/portfolio/portfolio-12.webp')}}" alt="Fintech Mobile App" class="img-fluid" loading="lazy">
                  <div class="portfolio-hover">
                    <div class="portfolio-actions">
                      <a href="{{asset('frontend/assets/img/portfolio/portfolio-12.webp')}}" class="glightbox action-btn preview-btn" title="Preview Project">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="{{url('/protfolio-details')}}" class="action-btn details-btn" title="View Details">
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
                  <p>Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus. Sed porttitor lectus nibh.</p>
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
@endsection