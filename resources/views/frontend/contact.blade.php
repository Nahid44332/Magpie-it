@extends('frontend.master')
@section('content')
<style>
    body {
      background-color: #05071E;
      color: white;
      font-family: 'Poppins', sans-serif;
    }

    h2, h3, h4, h5 {
      color: #4641B3;
      font-weight: 700;
    }

    .btn-outline {
      border: 2px solid #4641B3;
      color: #4641B3;
      padding: 10px 25px;
      border-radius: 8px;
      transition: 0.3s;
    }

    .btn-outline:hover {
      background: #4641B3;
      color: #fff;
    }

    /* === Service Card === */
    .service-card {
      background: #14152A;
      border: 2px solid #4641B3;
      border-radius: 15px;
      padding: 35px 25px;
      text-align: center;
      transition: 0.4s;
    }

    .service-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 0 25px rgba(70, 65, 179, 0.4);
    }

    .service-card i {
      font-size: 45px;
      color: #4641B3;
      margin-bottom: 15px;
    }

    .service-card h4 {
      color: white;
      font-weight: 600;
      margin-top: 10px;
    }

    .service-card p {
      color: #ddd;
      font-size: 15px;
    }

    .portfolio1 {
      background: #14152A;
      margin: 60px auto;
      max-width: 80%;
      padding: 40px 20px;
      border: 2px solid #4641B3;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(70, 65, 179, 0.2);
    }

    .ptag {
      color: #ccc;
    }

    #google_translate_element {
      position: fixed;
      top: 15px;
      right: 15px;
      z-index: 9999;
    }

    .footer a {
  color: #6c63ff;
  transition: 0.3s;
}
.footer a:hover {
  color: #bbb;
}
.footer h4 {
  color: #fff;
  font-weight: 600;

}
.footer .social-links a {
  color: #fff;
  font-size: 1.2rem;
}
.footer .social-links a:hover {
  color: #6c63ff;
}
.footer input.form-control {
  background: #0f1120;
  border: 1px solid #6c63ff;
  color: #fff;
}
.footer input.form-control::placeholder {
  color: #aaa;
}
 /* Contact Header */
    .contact-header {
      text-align: center;
      padding: 60px 20px 30px;
    }
    .contact-header h1 { font-size: 3rem; font-weight: 700; margin-bottom: 10px; color: #6c63ff; }
    .contact-header p { color: #ccc; font-size: 1.1rem; }

    /* Contact Info & Form */
    .contact-info, .contact-form {
      background: #14152A;
      padding: 40px 30px;
      border-radius: 12px;
      border: 2px solid #4641B3; /* ✅ Border color added */
      box-shadow: 0 10px 25px rgba(70, 65, 179, 0.2);
    }
    .contact-info h5 { font-weight: 600; margin-bottom: 20px; color: #6c63ff; }
    .contact-info p, .contact-info a { color: #ccc; margin-bottom: 10px; display: flex; align-items: center; }
    .contact-info i { font-size: 1.2rem; color: #6c63ff; margin-right: 10px; }

    .contact-form input, .contact-form textarea {
      border-radius: 8px;
      border: 1px solid #4641B3; /* ✅ Input border color */
      padding: 12px;
      width: 100%;
      margin-bottom: 20px;
      background-color: #05071E;
      color: #fff;
      transition: 0.3s;
    }
    .contact-form input::placeholder, .contact-form textarea::placeholder { color: #aaa; }
    .contact-form input:focus, .contact-form textarea:focus {
      border-color: #6c63ff;
      box-shadow: 0 0 8px rgba(108, 99, 255, 0.3);
      outline: none;
    }
    .contact-form button {
      background-color: #6c63ff;
      color: #fff;
      border: none;
      padding: 12px 25px;
      border-radius: 8px;
      font-weight: 600;
      transition: 0.3s;
    }
    .contact-form button:hover { background-color: #4641B3; }

    /* Dark Map with border */
    .map-container iframe {
      width: 100%;
      height: 350px;
      border: 2px solid #4641B3; /* ✅ Map border color */
      border-radius: 12px;
      filter: invert(90%) hue-rotate(180deg) brightness(0.7);
    }

  </style>
    <section class="contact-header">
  <h1>Contact Us</h1>
  <p>We’d love to hear from you! Whether it’s a question, project proposal, or just to say hello.</p>
</section>

<div class="container">
  <div class="row g-4">

    <!-- Contact Info -->
    <div class="col-lg-4">
      <div class="contact-info">
        <h5>Contact Info</h5>
        <p><i class="bi bi-geo-alt"></i> Uttara-10, Dhaka, Bangladesh</p>
        <p><i class="bi bi-telephone"></i> +880 1855 410 662</p>
        <p><i class="bi bi-envelope"></i> nusratjahanitbd1@gmail.com</p>
        <p><i class="bi bi-globe"></i> <a href="#" target="_blank">www.magpieit.com</a></p>
        <p><i class="bi bi-twitter"></i> <a href="#">@MagpieIT</a></p>
        <p><i class="bi bi-linkedin"></i> <a href="#">Magpie IT</a></p>
      </div>
    </div>

    <!-- Contact Form -->
    <div class="col-lg-8">
      <div class="contact-form">
        <form id="contactForm">
          <div class="row g-3">
            <div class="col-md-6"><input type="text" name="name" placeholder="Your Name" required></div>
            <div class="col-md-6"><input type="email" name="email" placeholder="Your Email" required></div>
            <div class="col-md-6"><input type="phone" name="phone" placeholder="Your Whatsapp Number" required></div>
            <div class="col-6"><input type="text" name="subject" placeholder="Subject" required></div>
            <div class="col-12"><textarea name="message" rows="5" placeholder="Your Message" required></textarea></div>
            <div class="col-12 text-center"><button type="submit">Send Message</button></div>
          </div>
        </form>
      </div>
    </div>

  </div>

  <!-- Google Map -->
  <div class="row mt-4">
    <div class="col-12">
      <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0!2d90.3960!3d23.8500!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1aa6b1b0d3f%3A0x1234567890abcdef!2sUttara%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1700000000000" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>

</div>

@endsection