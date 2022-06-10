@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        @if($article->thumbnail)
                            <img src="{{ asset('storage/thumbnails'.$article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                        @else
                            <img src="{{ asset('images/thumbnail-default.png') }}" alt="{{ $article->slug }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{!! $article->body !!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="" class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                                <small class="text-muted">{{ $article->created_at }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
