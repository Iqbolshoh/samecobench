@extends('layouts.app')

@section('title', 'Contact')
@section('description', 'Discover tutorials, coding tips, and web development resources by Iqbolshoh, a passionate full-stack developer and educator.')
@section('keywords', 'Iqbolshoh, Web Developer, Laravel, PHP, JavaScript, Portfolio, Online Courses, Full-Stack Development, Programming')

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="./">Home</a></li>
                    <li class="current">Contact</li>
                </ol>
            </nav>
            <h1>Contact</h1>
        </div>
    </div><!-- End of Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-6 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up">
                        <i class="<?= $socialLinks[1]->icon ?>"></i>
                        <h3><?= $socialLinks[1]->title ?></h3>
                        <p><?= $socialLinks[1]->value ?></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up">
                        <i class="<?= $socialLinks[2]->icon ?>"></i>
                        <h3><?= $socialLinks[2]->title ?></h3>
                        <p><?= $socialLinks[2]->value ?></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up">
                        <i class="<?= $socialLinks[3]->icon ?>"></i>
                        <h3><?= $socialLinks[3]->title ?></h3>
                        <p><?= $socialLinks[3]->value ?></p>
                    </div>
                </div>

            </div>

            <div class="row gy-4 mt-1">
                <!-- Google Map -->
                <div class="col-lg-6" data-aos="fade-up">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5792.162896136428!2d66.97004124999109!3d39.65178209523781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f13603b3d1c8d49%3A0x312f6005ab01c497!2z0KjQv9C70LDQudC-0LLQvtCy0YfQutC40Y8g0YDQvtCx0YHRgtC10YHQvtCy0YbQu9C10LvQvtC1!5e0!3m2!1sen!2suz!4v1695613534192!5m2!1sen!2suz"
                        frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- Google Map End -->

                <!-- Contact Form -->
                <div class="col-lg-6">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('send_message') }}" method="POST" class="php-email-form" id="contactForm"
                        data-aos="fade-up">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required
                                    maxlength="255">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required
                                    maxlength="255">
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required
                                    maxlength="255">
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                    required></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Contact Form End -->

            </div>

        </div>

    </section>
    <!-- Contact Section End -->
@endsection