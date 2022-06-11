@extends('layouts.app')
@section('content')
    <x-client.hero></x-client.hero>
    <section id="categories" class="portfolio">
        <div class="container">

            <div class="section-title">
                <h2>News Categories</h2>
                <p>Find the most epic News on our website every day! </p>
            </div>

            <div class="row portfolio-container">
                @foreach($categories as $category)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <a href="{{ route('show.articles.from.category', $category->id) }}">
                            @if(!$category->image)
                                <img src="{{ asset('images/thumbnail-default.png') }}" alt="{{ $category->slug }}" class="img-fluid">
                            @else
                                <img src="{{ asset('storage/thumbnails/' . $category->image) }}" class="img-fluid" alt="">
                            @endif
                            <div class="portfolio-info">
                                <h4>{{ $category->name }}</h4>
                                <p>{{ $category->description }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="team" class="team section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Our Team</h2>
                <p>Teamwork is the ability to work together toward a common vision. The ability to direct individual accomplishments toward organizational objectives. It is the fuel that allows common people to attain uncommon results.</p>
            </div>

            <div class="row">
                @foreach($users as $user)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('client/assets/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ $user->name }}</h4>
                                <span>{{ strtoupper($user->roles->first()->name) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
                <p>If you have any question about our company, please contact us! We are happy to talk with you!</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Our Address</h3>
                                <p>Str. Ştiinţei nr. 2, Galaţi, 800210</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email Us</h3>
                                <p>info@newsdirect.com<br>contact@newsdirect.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Call Us</h3>
                                <p>+4 0755 111 222<br>+40 0723 919 111</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
