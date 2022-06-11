@extends('layouts.app')
@section('content')
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>{{ ucwords($article->title) }}</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('show.articles.from.category', $article->category_id) }}">{{ ucwords($article->category->name) }}</a></li>
                    <li>{{ ucwords($article->title) }}</li>
                </ol>
            </div>
        </div>
    </section>

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="portfolio-details-container">
                <div class="portfolio-details-text">
                    <h2 class="text-center">{{ ucwords($article->title) }}</h2>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider">
                        <div class="align-items-center">
                            <div class="swiper-slide">
                                @if(!$article->thumbnail)
                                    <img src="{{ asset('images/thumbnail-default.png') }}" alt="">
                                @else
                                    <img src="{{ asset('storage/thumbnails/' . $article->thumbnail) }}" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Article information</h3>
                        <ul>
                            <li><strong>Author</strong>: {{ $article->user->name }}</li>
                            <li><strong>Author contact</strong>: {{ $article->user->email }}</li>
                            <li><strong>Article date</strong>: {{ $article->created_at->format('d-M-Y') }}</li>
                            <li><strong>Article time</strong>: {{ $article->created_at->format('H:i:s') }}</li>
                            <li><strong>Article views</strong>: {{ $article->articleViews->count() }} <i class="fa fa-eye" style="font-size: 14px"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <section id="about" class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            {!! $article->body !!}
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </section>
@endsection
@push('styles')
@endpush
@push('scripts')
    <script src="{{ asset('jquery-3.6.0/jquery-3.6.0.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $.ajax({
                    url: '{{ route('increment.views', $article->id) }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                    },
                });
            }, 5000);
        });
    </script>
@endpush
