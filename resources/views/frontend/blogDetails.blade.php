@extends('frontend.master')
@section('content')
         <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Category</a></li>
            <li class="breadcrumb-item active current">Portfolio Details</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>Portfolio Details</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
      </div>
    </div><!-- End Page Title -->
 <!-- ===== Blog Details Page ===== -->
<section id="blog-details" style="background: radial-gradient(circle at top, #0a0b1a, #01020E); color: #fff; padding: 80px 0;">

  <div class="container" data-aos="fade-up">

    <!-- Feature Image -->
    <div class="text-center mb-5">
      <img src="{{asset('frontend/assets/img/portfolio/portfolio-12.webp')}}" alt="Blog Feature Image" class="img-fluid rounded-4 shadow-lg" style="max-height: 450px; object-fit: cover;">
    </div>

    <!-- Blog Header -->
    <div class="text-center mb-4">
      <h1 style="font-size: 2.4rem; font-weight: 700; color: #fff;">The Power of Clean Web Design</h1>
      <p style="color: #aaa;">By <span style="color:#f94144;">Admin</span> | 15 October 2025 | <span style="color:#43aa8b;">Web Development</span></p>
    </div>

    <!-- Blog Content -->
    <div class="blog-content" style="max-width: 850px; margin: 0 auto; color: #ccc; font-size: 1.05rem; line-height: 1.9;">

      <p>
        Clean web design is more than just minimalism — it’s about clarity, balance, and purpose.  
        A clean layout helps users focus on what truly matters without unnecessary distractions.  
        In 2025, simplicity is not just a trend — it’s the new standard for usability and trust.
      </p>

      <p>
        Great design is not about adding more elements; it’s about removing what’s unnecessary.  
        Whether you’re building a landing page or a personal portfolio, a clean approach will make  
        your website more engaging and professional.
      </p>

      <!-- Quote Box -->
      <blockquote style="border-left: 4px solid #f94144; padding-left: 20px; color:#f8961e; font-style: italic; margin: 40px 0;">
        “Simplicity is the ultimate sophistication.” — Leonardo da Vinci
      </blockquote>

      <h3 style="color:#fff; margin-top: 40px;">Key Principles of Clean Design</h3>
      <ul style="margin-top: 15px; list-style: square; margin-left: 25px;">
        <li>Use plenty of white space for visual breathing room.</li>
        <li>Focus on typography hierarchy and readability.</li>
        <li>Limit your color palette for consistency.</li>
        <li>Ensure every element has a purpose.</li>
      </ul>

      <p style="margin-top: 25px;">
        The essence of a clean design lies in purpose-driven simplicity.  
        By removing visual clutter and prioritizing clarity, your website  
        becomes more intuitive and enjoyable to explore.
      </p>

    </div>

    <!-- Tags -->
    <div class="mt-5 text-center">
      <span class="badge rounded-pill text-bg-danger mx-1 px-3 py-2">#HTML</span>
      <span class="badge rounded-pill text-bg-warning mx-1 px-3 py-2">#CSS</span>
      <span class="badge rounded-pill text-bg-success mx-1 px-3 py-2">#Design</span>
    </div>

    <!-- Related Posts -->
    <div class="related-posts mt-5 pt-5 border-top border-secondary">
      <h3 class="text-center mb-4" style="color:#fff;">Related Articles</h3>

      <div class="row gy-4">

         <!-- Blog Card -->
      <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-creative">
  <div class="portfolio-card">
    <div class="portfolio-image-container">
      <img src="{{asset('frontend/assets/img/portfolio/portfolio-12.webp')}}" alt="Blog Image" class="img-fluid" loading="lazy">
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
      <img src="{{asset('frontend/assets/img/portfolio/portfolio-10.webp')}}" alt="Blog Image" class="img-fluid" loading="lazy">
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
      <img src="{{asset('frontend/assets/img/portfolio/portfolio-11.webp')}}" alt="Blog Image" class="img-fluid" loading="lazy">
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

  </div>

</section>

<!-- ====== Custom Hover & Typography ===== -->
<style>
  .related-posts h5 a:hover {
    color: #f94144 !important;
  }
  blockquote:hover {
    transform: translateX(5px);
    transition: 0.3s;
  }
</style>

@endsection