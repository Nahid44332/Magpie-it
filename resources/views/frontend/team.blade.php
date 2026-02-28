@extends('frontend.master')
@section('content')
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
                <h3>{{$teamIntro->section_heading}}</h3>
                <p>{{$teamIntro->intro_description}}</p>
                <div class="stats-row">
                  <div class="stat-item">
                    <span class="stat-number">{{$teamIntro->team_mamber_count}}+</span>
                    <span class="stat-label">Team Members</span>
                  </div>
                  <div class="stat-item">
                    <span class="stat-number">{{$teamIntro->departments_count}}</span>
                    <span class="stat-label">Departments</span>
                  </div>
                  <div class="stat-item">
                    <span class="stat-number">{{$teamIntro->countries_count}}+</span>
                    <span class="stat-label">Countries</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="team-grid" data-aos="fade-left" data-aos-delay="200">
              @foreach ($teammembers as $members)
                <div class="member-hexagon" data-aos="zoom-in" data-aos-delay="250">
                <div class="hexagon-inner">
                  <img src="{{asset('backend/images/teammember/'.$members->image)}}" alt="Team member">
                  <div class="member-overlay">
                    <h5>{{$members->name}}</h5>
                    <span>{{$members->position}}</span>
                    <div class="social-icons">
                      <a href="{{$members->facebook}}"><i class="bi bi-facebook"></i></a>
                      <a href="{{$members->instagram}}"><i class="bi bi-instagram"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
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
                  @foreach ($teamleaders as $leaders)
                    <div class="swiper-slide">
                    <div class="leader-card">
                      <div class="leader-image">
                        <img src="{{asset('backend/images/teamleader/'.$leaders->image)}}" alt="Leader">
                      </div>
                      <div class="leader-info">
                        <h5>{{$leaders->name}}</h5>
                        <span class="position">{{$leaders->position}}</span>
                        <p>{{$leaders->bio}}</p>
                        <div class="leader-contact">
                           <a href="{{$leaders->twitter}}" class="contact-btn">
                            <i class="bi bi-twitter"></i>
                          </a>
                           <a href="{{$leaders->instagram}}" class="contact-btn">
                            <i class="bi bi-instagram"></i>
                          </a>
                          <a href="{{$leaders->linkedin}}" class="contact-btn">
                            <i class="bi bi-linkedin"></i>
                          </a>
                            <a href="{{$leaders->github}}" class="contact-btn">
                            <i class="bi bi-github"></i>
                          </a>
                         
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
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
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>
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
@endsection