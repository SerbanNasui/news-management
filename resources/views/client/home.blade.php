@extends('layouts.app')
@section('content')
    <x-client.hero></x-client.hero>
    <section id="clients" class="clients section-bg">
        <div class="container">
            <img src="{{ asset('images/weather-loading.gif') }}" class="ajax-loader">
            <div class="row" id="weather">
            </div>
        </div>
    </section>
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

    <section id="highlighted-articles" class="portfolio-details">
        <div class="container">
            <div class="section-title">
                <h2>Highlighted Articles</h2>
                <p>We love news! </p>
            </div>
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            @forelse($articles as $article)
                                <div class="swiper-slide">
                                    @if(!$article->thumbnail)
                                        <img src="{{ asset('images/thumbnail-default.png') }}" alt="" class="image-highlight">
                                    @else
                                        <img src="{{ asset('storage/thumbnails/' . $article->thumbnail) }}" alt="" class="img-fluid">
                                    @endif
                                </div>
                            @empty
                                <p class="align-items-center">Ups, no highlighted articles for now. Come back later for more news!</p>
                            @endforelse
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
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
                                @if($user->profile)
                                    <img src="{{ asset('storage/avatars/'.$user->profile->avatar) }}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('client/assets/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                                @endif
                                <div class="social">
                                    <a href="{{ $user->profile->twitter??'#' }}" target="_blank"><i class="bi bi-twitter"></i></a>
                                    <a href="{{ $user->profile->facebook??'#' }}" target="_blank"><i class="bi bi-facebook"></i></a>
                                    <a href="{{ $user->profile->instagram??'#' }}" target="_blank"><i class="bi bi-instagram"></i></a>
                                    <a href="{{ $user->profile->linkedin??'#' }}" target="_blank"><i class="bi bi-linkedin"></i></a>
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

    <x-client.contact></x-client.contact>
@endsection
@push('styles')
    <style>
        .ajax-loader {
            visibility: hidden;
            align-items: center;
            justify-content: center;
            width: 100px;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('jquery-3.6.0/jquery-3.6.0.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.ajax-loader').css("visibility", "visible");
            $.ajax({
                url: '{{ route('display.weather') }}',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {
                        $('#weather').append(`
                            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                                ${value.location.name}, ${value.current.temp_c}'&deg;C <br> ${value.current.condition.text}
                                <img src="https:${value.current.condition.icon}" class="img-fluid" alt="">
                            </div>
                        `);
                    });
                    $('.ajax-loader').fadeOut();
                    $('.transition').fadeIn();
                }
            });
        });
    </script>
@endpush
