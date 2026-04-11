@extends('frontend.master')
@section('content')
    <section id="portfolio" class="portfolio section">

        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>আমাদের কাজগুলোর একটি সংগ্রহ। আমরা প্রতিটি প্রজেক্টে সর্বোচ্চ মান নিশ্চিত করি।</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="200">
                    <li data-filter="*" class="filter-active">All Projects</li>
                    {{-- ক্যাটাগরি যদি ডাইনামিক থাকে তবে এখানে লুপ হবে --}}
                    <li data-filter=".filter-web">Web Design</li>
                    <li data-filter=".filter-mobile">Mobile Apps</li>
                    <li data-filter=".filter-branding">Branding</li>
                    <li data-filter=".filter-ui">UI/UX</li>
                </ul>
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

                    @foreach ($portfolios as $portfolio)
                        <div
                            class="col-xl-4 col-lg-6 portfolio-item isotope-item filter-{{ strtolower($portfolio->category) }}">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-image">
                                    {{-- ইমেজ ডাইনামিক --}}
                                    <img src="{{ asset($portfolio->main_image) }}" alt="{{ $portfolio->title }}"
                                        class="img-fluid" loading="lazy">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-actions">
                                            <a href="{{ asset($portfolio->main_image) }}"
                                                class="glightbox action-btn preview-btn" title="Preview Project">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ url('/protfolio-details/' . $portfolio->id) }}"
                                                class="action-btn details-btn" title="View Details">
                                                <i class="bi bi-arrow-up-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portfolio-content">
                                    <div class="portfolio-meta">
                                        <span class="project-type">{{ $portfolio->category }}</span>
                                        <div class="project-rating">
                                            <i class="bi bi-star-fill"></i>
                                            <span>{{ $portfolio->rating ?? '5.0' }}</span>
                                        </div>
                                    </div>
                                    <h3>{{ $portfolio->title }}</h3>
                                    <p>{{ Str::limit($portfolio->description, 100) }}</p>
                                    @php
                                        $colors = [
                                            'bg-primary',
                                            'bg-info',
                                            'bg-success',
                                            'bg-warning',
                                            'bg-danger',
                                            'bg-secondary',
                                        ];
                                    @endphp

                                    <div class="portfolio-tech">
                                        @if ($portfolio->technologies)
                                            @php
                                                // যদি ডাটা স্ট্রিং হয় তবে তাকে অ্যারেতে রূপান্তর করবে
                                                $techs = is_array($portfolio->technologies)
                                                    ? $portfolio->technologies
                                                    : json_decode($portfolio->technologies, true);

                                                $colors = [
                                                    'bg-primary',
                                                    'bg-info',
                                                    'bg-success',
                                                    'bg-warning',
                                                    'bg-danger',
                                                    'bg-secondary',
                                                ];
                                            @endphp

                                            @if (is_array($techs))
                                                @foreach ($techs as $index => $tech)
                                                    <span
                                                        class="tech-badge {{ $colors[$index % count($colors)] }} text-white">
                                                        {{ $tech }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="portfolio-cta text-center col-12" data-aos="fade-up" data-aos-delay="400">
                <h4>Ready to start your next project?</h4>
                <p>Let's work together to bring your digital vision to life</p>
                <div class="cta-buttons">
                    <a href="#contact" class="btn btn-primary">Start a Project</a>
                    <a href="#" class="btn btn-outline">View All Work</a>
                </div>
            </div>

        </div>

    </section>
@endsection
