@extends('layouts.app')

@section('title', 'Aloqa')
@section('description', 'Sam Ecobench bilan bog‘laning! Manzilimiz, telefon raqamlarimiz, elektron pochta va ijtimoiy tarmoqlar orqali biz bilan aloqada bo‘ling. Biz sizning savollaringiz va hamkorlik takliflaringiz uchun ochiqmiz!')

@section('keywords', 'aloqa, Sam Ecobench bog‘lanish, kontaktlar, telefon raqam, email, manzil, kompaniya bilan bog‘lanish, savollar, hamkorlik')

@section('content')
    <!-- Sahifa Sarlavhasi -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="./">Bosh sahifa</a></li>
                    <li class="current">Aloqa</li>
                </ol>
            </nav>
            <h1>Aloqa</h1>
        </div>
    </div><!-- Sahifa Sarlavhasi Tugadi -->

    <!-- Aloqa Bo‘limi -->
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
                <!-- Google Xarita -->
                <div class="col-lg-6" data-aos="fade-up">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d6142.706736006619!2d66.903936!3d39.664265!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMznCsDM5JzUxLjQiTiA2NsKwNTQnMTQuMiJF!5e0!3m2!1sen!2s!4v1747066826003!5m2!1sen!2s"
                        frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- Google Xarita Tugadi -->

                <!-- Aloqa Formasi -->
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
                                <input type="text" name="name" class="form-control" placeholder="Ismingiz" required
                                    maxlength="255">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Emailingiz" required
                                    maxlength="255">
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Mavzu" required
                                    maxlength="255">
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Xabar"
                                    required></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit">Xabarni Yuborish</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Aloqa Formasi Tugadi -->

            </div>

        </div>

    </section>
    <!-- Aloqa Bo‘limi Tugadi -->
@endsection