@extends('frontend.master')

@section('content')
<style>
    .contact-header {
        text-align: center;
        padding: 60px 20px 30px;
    }
    .contact-header h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: #6c63ff;
    }
    .contact-header p {
        color: #ccc;
        font-size: 1.1rem;
    }
    .contact-form input,
    .contact-form textarea {
        border-radius: 8px;
        border: 1px solid #4641B3;
        padding: 12px;
        width: 100%;
        margin-bottom: 20px;
        background-color: #05071E;
        color: #fff;
        transition: 0.3s;
    }
    .contact-form input::placeholder,
    .contact-form textarea::placeholder {
        color: #aaa;
    }
    .contact-form input:focus,
    .contact-form textarea:focus {
        border-color: #6c63ff;
        box-shadow: 0 0 8px rgba(108, 99, 255, 0.3);
        outline: none;
    }
    .contact-form button {
        background-color: #6c63ff;
        color: #fff;
        border: none;
        padding: 12px 55px;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
    }
    .contact-form button:hover {
        background-color: #4641B3;
    }
</style>

<section class="contact-header">
    <h1>Order</h1>
    <p>We’d love to hear from you! Whether it’s a question, project proposal, or just to say hello.</p>
</section>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="contact-form">
                <form action="#" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>

                        <div class="col-md-6">
                            <input type="email" name="email" placeholder="Your Email" required>
                        </div>

                        <div class="col-md-6">
                            <input type="tel" name="phone" placeholder="Your WhatsApp Number" required>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="subject" placeholder="Subject" required>
                        </div>

                        <div class="col-12">
                            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit">Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
