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
                        <div class="social">
                            <a href="{{ $article->user->profile->twitter??'#' }}" target="_blank"><i class="bi bi-twitter"></i></a>
                            <a href="{{ $article->user->profile->facebook??'#' }}" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="{{ $article->user->profile->instagram??'#' }}" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="{{ $article->user->profile->linkedin??'#' }}" target="_blank"><i class="bi bi-linkedin"></i></a>
                        </div>
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
    <section class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Leave us a review</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('comment.store') }}" method="post" role="form" class="form-group">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" @error('name') autofocus @enderror>
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" @error('email') autofocus @enderror>
                                @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <select name="stars" id="stars" class="form-control" @error('stars') autofocus @enderror>
                                <option selected disabled>Stars</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            @error('stars')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="body" rows="5" placeholder="Message" @error('body') autofocus @enderror></textarea>
                            @error('body')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="my-3"></div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning rounded-3">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="comments" class="comments">
        <div class="container">
            <div class="section-title">
                <h2>Comments</h2>
                @if($comments->total() > 0)
                    <p>Rating: {{ number_format($comments->sum('stars')/$comments->count(),2) }}<i class="fa fa-star"></i>/5 <br>Total comments: {{ $comments->count() }}</p>
                @endif
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-6">
                    <div class="comments-list">
                        @foreach($comments as $comment)
                            <div class="comment-item">
                                <div class="comment-item-header">
                                    <div class="comment-item-avatar">
                                        <img src="{{ asset('images/avatar.png') }}" alt="">
                                    </div>
                                    <div class="comment-item-name">
                                        <h5>{{ $comment->name }}</h5>
                                        <span>{{ $comment->created_at->format('d-M-Y') }}</span>
                                    </div>
                                    <div class="comment-item-stars">
                                        @for($i = 0; $i < $comment->stars; $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                    </div>
                                </div>
                                <div class="comment-item-body">
                                    <p>{{ $comment->body }}</p>
                                </div>
                            </div>
                        @endforeach
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <style>
        .page-item.active .page-link {
            background-color: #ffc107 !important;
            border-color: #ffc107 !important;
            color: black !important;
        }
        .page-item .page-link {
            color: #ffc107 !important;
        }
        .fa-star{
            color: #ffc107;
        }
    </style>
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
