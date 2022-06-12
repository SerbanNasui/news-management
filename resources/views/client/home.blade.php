@extends('layouts.app')
@section('content')
    <x-client.hero></x-client.hero>
    <section id="clients" class="clients section-bg">
        <div class="container">
            <div class="row">
                <div class="container">
                    <section class="logo-carousel slider" data-arrows="false">
                        @foreach($weather as $city)
                            <div class="slide">
                                <b>{{ $city->city }}</b>, {{ json_decode($city->info_data)->current->temp_c }}&deg;C <br><i>{{ json_decode($city->info_data)->current->condition->text }}</i>
                                <img src="https:{{ json_decode($city->info_data)->current->condition->icon }}">
                            </div>
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </section>
    @include('client.partials.categories')
    @include('client.partials.highlighted-articles')
    @include('client.partials.team')
    @include('client.partials.contact')
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('slick-carousel/slick.css') }}"/>
    <style>
        .slick-slide {
            margin: 0px;
        }
        .logo-carousel {
            overflow: inherit;
        }
        .slick-slide img {
            width: 100%;
        }
        .slick-track::before,
        .slick-track::after {
            display: table;
            content: '';
        }
        .slick-track::after {
            clear: both;
        }
        .slick-track {
            padding: 1rem 0;
        }
        .slick-loading .slick-track {
            visibility: hidden;
        }
        .slick-slide.slick-loading img {
            display: none;
        }
        .slick-slide.dragging img {
            pointer-events: none;
        }
        .slick-loading .slick-slide {
            visibility: hidden;
        }
        .slick-arrow {
            position: absolute;
            top: 10%;
            background: url(https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/arrow.svg?sanitize=true) center no-repeat;
            color: #fff;
            filter: invert(77%) sepia(32%) saturate(1%) hue-rotate(344deg) brightness(105%) contrast(103%);
            border: none;
            width: 2rem;
            height: 1.5rem;
            text-indent: -10000px;
            margin-top: -16px;
            z-index: 99;
        }
        .slick-arrow.slick-next {
            right: -40px;
            transform: rotate(180deg);
        }
        .slick-arrow.slick-prev {
            left: -40px;
        }
        @media (max-width: 768px) {
            .slick-arrow {
                width: 1rem;
                height: 1rem;
            }
        }
        .row {
            overflow: hidden;
        }
        .logo-carousel {
            margin-top: -60px;
            margin-bottom: -85px;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('jquery-3.6.0/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('slick-carousel/slick.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.logo-carousel').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1000,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 2
                    }
                }]
            });
        });
    </script>
@endpush
