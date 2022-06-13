@extends('layouts.app')
@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>{{ ucwords($category->name) }}</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>{{ ucwords($category->name) }}</li>
                </ol>
            </div>
        </div>
    </section>
    <section class="inner-page">
        <div class="container">
            <section id="about" class="about">
                <div class="container">
                    <div class="row">
                        @forelse($articles as $article)
                            <div class="col-md-6">
                                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static">

                                        <h3 class="mb-0">{{ $article->title }}</h3>
                                        <div class="mb-1 text-muted"> {{ $article->created_at->diffForHumans() }}</div>
                                        <div class="mb-1 text-muted">{{ $article->user->name }}</div>
                                        <p class="card-text mb-auto"><i class="fas fa-eye" style="font-size: 16px;"></i> {{ $article->articleViews->count() }}</p>
                                        <a href="{{ route('display.article', $article->id) }}" class="stretched-link">Continue reading</a>
                                    </div>
                                    <div class="col-auto d-lg-block">
                                        @if(!$article->thumbnail)
                                            <img src="{{ asset('images/thumbnail-default.png') }}" alt="thumbnail" class="img-fluid">
                                        @else
                                            <img src="{{ asset('storage/thumbnails/' . $article->thumbnail) }}" alt="thumbnail" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{ $articles->links() }}
                        @empty
                            <h2>We are sorry. :( </h2>
                            <h4>At the moment we don't have any news for {{ ucwords($category->name) }} category. Come back later.</h4>
                        @endforelse
                    </div>

                </div>
            </section>
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
    </style>
@endpush
