@extends('layouts.back-office')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create News</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create news</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('news.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="title" name="title" id="title" class="form-control" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea id="compose-textarea" name="body" class="form-control" style="height: 300px">
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.css') }}">
    <style>
        .note-group-select-from-files {
            display: none;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            $('#compose-textarea').summernote({
                height: 500,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['paragraph', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            })
        })
    </script>
@endpush
