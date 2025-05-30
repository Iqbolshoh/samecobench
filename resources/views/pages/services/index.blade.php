@extends('layouts.app')

@section('title', 'Xizmatlar')
@section('description', 'Sam Ecobench tomonidan taqdim etiladigan ekologik xizmatlar: quyosh panellari o‘rnatish, smart skameykalar, quyosh ustunlari va boshqa yashil texnologiyalar. Biz bilan yashil kelajak sari qadam qo‘ying!')

@section('keywords', 'xizmatlar, Sam Ecobench xizmatlari, ekologik texnologiyalar, quyosh panellari, smart skameyka, quyosh ustunlari, yashil energiya, samarali yechimlar, energiya tejash')

@section('content')
    <!-- Sahifa sarlavhasi -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Bosh sahifa</a></li>
                    <li class="current">Xizmatlar</li>
                </ol>
            </nav>
            <h1>Xizmatlar</h1>
        </div>
    </div>
    <!-- Sahifa sarlavhasi tugadi -->

    <!-- Ko‘nikmalar bo‘limi -->
    <section id="skills" class="skills section">
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ $service_sections[0]->title }}</h2>
            <p>{!! $service_sections[0]->text_1 !!}</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center">
                    <img src="{{ asset('storage/' . $service_sections[0]->image) }}" class="img-fluid"
                        alt="Mahsulotlarimiz">
                </div>

                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h3>{{ $service_sections[0]->sub_title }}</h3>
                    <p class="fst-italic">
                        {!! $service_sections[0]->text_2 !!}
                    </p>

                    <div class="skills-content skills-animation">
                        @foreach ($ourservices as $service)
                            <div class="progress">
                                <span class="skill">
                                    <span>{{ $service->service_name }}</span>
                                    <i class="val">{{ $service->skill_level }}%</i>
                                </span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $service->skill_level }}"
                                        aria-valuemin="0" aria-valuemax="100" style="width: {{ $service->skill_level }}%;">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Xizmatlar bo‘limi -->
    <section id="services" class="services section">
        <div class="container">
            <div class="row gy-4">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($service['id'] - 1) * 100 }}">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="{{ $service['icon'] }}"></i></div>
                            <a href="#" class="stretched-link">
                                <h3>{{ $service['title'] }}</h3>
                            </a>
                            <p>{!! $service['description'] !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
