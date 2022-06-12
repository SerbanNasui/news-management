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
    @include('client.partials.categories')
    @include('client.partials.highlighted-articles')
    @include('client.partials.team')
    @include('client.partials.contact')
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
