@extends('frontend.master')
@section('content')
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ $portfolio->category }}</a></li>
                    <li class="breadcrumb-item active current">Portfolio Details</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>{{ $portfolio->title }}</h1>
            <p>{{ $portfolio->short_description ?? 'Project Showcase' }}</p>
        </div>
    </div>

    <section id="portfolio-details" class="portfolio-details section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                {{-- Left Column: Media & Tech Stack --}}
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="portfolio-details-media">
                        <div class="main-image">
                            <div class="portfolio-details-slider swiper init-swiper" data-aos="zoom-in">
                                <script type="application/json" class="swiper-config">
                                {
                                  "loop": true,
                                  "speed": 1000,
                                  "autoplay": { "delay": 5000 },
                                  "slidesPerView": 1,
                                  "navigation": {
                                    "nextEl": ".swiper-button-next",
                                    "prevEl": ".swiper-button-prev"
                                  }
                                }
                                </script>

                                <div class="swiper-wrapper">
                                    @if ($portfolio->gallery && $portfolio->gallery->count() > 0)
                                        @foreach ($portfolio->gallery as $item)
                                            <div class="swiper-slide">
                                                <img src="{{ asset($item->image) }}" alt="Gallery Image"
                                                    class="img-fluid w-100">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="swiper-slide">
                                            <img src="{{ asset($portfolio->main_image) }}" alt="{{ $portfolio->title }}"
                                                class="img-fluid w-100">
                                        </div>
                                    @endif
                                </div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>

                        <div class="thumbnail-grid" data-aos="fade-up" data-aos-delay="200">
                            <div class="row g-2 mt-3">
                                @if ($portfolio->gallery)
                                    @foreach ($portfolio->gallery as $item)
                                        <div class="col-3">
                                            <img src="{{ asset($item->image) }}" alt="Thumbnail" class="img-fluid glightbox"
                                                style="height: 80px; width: 100%; object-fit: cover; cursor: pointer;">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="tech-stack-badges mt-4" data-aos="fade-up">
                            @if ($portfolio->technologies)
                                @php
                                    $techs = is_array($portfolio->technologies)
                                        ? $portfolio->technologies
                                        : json_decode($portfolio->technologies);
                                @endphp

                                @if ($techs)
                                    @foreach ($techs as $tech)
                                        <span class="badge bg-primary p-2 me-1">{{ $tech }}</span>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Right Column: Project Info & Accordion --}}
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="portfolio-details-content">
                        <div class="project-meta">
                            <div class="badge-wrapper">
                                <span class="project-badge">{{ $portfolio->category }}</span>
                            </div>
                            <div class="date-client">
                                <div class="meta-item">
                                    <i class="bi bi-calendar-check"></i>
                                    <span>{{ \Carbon\Carbon::parse($portfolio->date)->format('F Y') }}</span>
                                </div>
                                <div class="meta-item">
                                    <i class="bi bi-buildings"></i>
                                    <span>{{ $portfolio->company_name ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                        <h2 class="project-title">{{ $portfolio->title }}</h2>

                        <div class="project-website">
                            <i class="bi bi-link-45deg"></i>
                            <a href="{{ $portfolio->live_link }}" target="_blank">
                                {{ str_replace(['https://', 'http://'], '', $portfolio->live_link) }}
                            </a>
                        </div>

                        <div class="project-overview">
                            <p class="lead">{{ $portfolio->description }}</p>

                            <div class="accordion project-accordion" id="portfolio-details-projectAccordion">
                                <div class="accordion-item" data-aos="fade-up">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#portfolio-details-collapse-1" aria-expanded="true">
                                            <i class="bi bi-clipboard-data me-2"></i> Project Overview
                                        </button>
                                    </h2>
                                    <div id="portfolio-details-collapse-1" class="accordion-collapse collapse show"
                                        data-bs-parent="#portfolio-details-projectAccordion">
                                        <div class="accordion-body">
                                            <p>{{ $portfolio->overview }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#portfolio-details-collapse-2">
                                            <i class="bi bi-exclamation-diamond me-2"></i> The Challenge
                                        </button>
                                    </h2>
                                    <div id="portfolio-details-collapse-2" class="accordion-collapse collapse"
                                        data-bs-parent="#portfolio-details-projectAccordion">
                                        <div class="accordion-body">
                                            <p>{{ $portfolio->challenge }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#portfolio-details-collapse-3">
                                            <i class="bi bi-award me-2"></i> The Solution
                                        </button>
                                    </h2>
                                    <div id="portfolio-details-collapse-3" class="accordion-collapse collapse"
                                        data-bs-parent="#portfolio-details-projectAccordion">
                                        <div class="accordion-body">
                                            <p>{{ $portfolio->solution }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- End Row --}}

            {{-- Full Width Features Section --}}
            <div class="project-features mt-5" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="bi bi-stars"></i> Key Features</h3>
                <div class="row g-3">
                    @php
                        // ডাটাবেজ থেকে ফিচারগুলো অ্যারে হিসেবে নিয়ে আসা (JSON হলে ডিকোড হবে)
                        $allFeatures = is_array($portfolio->features)
                            ? $portfolio->features
                            : json_decode($portfolio->features, true);
                    @endphp

                    @if ($allFeatures && count($allFeatures) > 0)
                        @php
                            // ডিজাইন ঠিক রাখতে ফিচারগুলোকে দুই ভাগে ভাগ করা
                            $chunks = array_chunk($allFeatures, ceil(count($allFeatures) / 2));
                        @endphp

                        @foreach ($chunks as $chunk)
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    @foreach ($chunk as $feature)
                                        <li><i class="bi bi-check2-circle"></i> {{ $feature }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p>No features listed for this project.</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="cta-buttons mt-5">
                <a href="{{ $portfolio->live_link }}" target="_blank" class="btn btn-primary btn-lg">View Live
                    Project</a>
                <a href="{{ $portfolio->github_link }}" target="_blank" class="btn btn-outline-dark btn-lg ms-2">
                    <i class="bi bi-github"></i> GitHub
                </a>
            </div>
        </div>
    </section>
@endsection
