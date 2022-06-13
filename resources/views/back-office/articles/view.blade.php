@extends('layouts.back-office')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('news.index') }}">View News</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Article Preview</h3>
                        </div>
                        <div class="card-body">
                            <h4>{{ $article->title }}</h4>
                            <p>{{ $article->short_description }}</p>
                            {!! $article->body !!}
                            @if($article->thumbnail)
                                <img src="{{ asset('storage/thumbnails/'.$article->thumbnail) }}" alt="{{ $article->slug }}" class="img-fluid">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Article Comments</h3>
                            <br>
                            @if($comments->total()>0)
                                <p>Rating: {{ number_format($comments->sum('stars')/$comments->count(),2) }}<i class="fa fa-star"></i>/5 <br>Total comments: {{ $comments->count() }}</p>
                            @endif
                        </div>
                        <div class="card-body">
                            @foreach($comments as $comment)
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Author: {{ $comment->name }}</h4>
                                        <h5>Email: {{ $comment->email }}</h5>
                                        <p>
                                            @for($i = 0; $i < $comment->stars; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </p>
                                        <p>{{ $comment->body }}</p>
                                    </div>
                                </div>
                            @endforeach
                            {{ $comments->links() }}
                        </div>
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
