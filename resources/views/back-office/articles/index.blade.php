@extends('layouts.back-office')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">News</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">News</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Articles</h3>
                        </div>
                        <div class="card-body">
                            <table id="articles_table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    @can('users-management')
                                        <th>Author</th>
                                    @endcan
                                    <th>Category</th>
                                    <th>Published</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>
                                                @if($article->thumbnail)
                                                    <img src="{{ asset('storage/thumbnails/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="img-fluid" style="max-width: 50px;">
                                                @else
                                                    <img src="{{ asset('images/thumbnail-default.png') }}" alt="{{ $article->slug }}" class="img-fluid" style="max-width: 50px;">
                                                @endif
                                            </td>
                                            <td>{{ $article->title }}</td>
                                            @can('users-management')
                                                <td>{{ $article->user->name }}</td>
                                            @endcan
                                            <td>{{ $article->category->name }}</td>
                                            <td>
                                                @if($article->published)
                                                    <span class="badge badge-success">Published</span>
                                                @else
                                                    <span class="badge badge-danger">Unpublished</span>
                                                @endif
                                            </td>
                                            <td data-toggle="tooltip" data-placement="top" title="{{ $article->created_at->diffForHumans() }}">{{ $article->created_at }}</td>
                                            <td data-toggle="tooltip" data-placement="top" title="{{ $article->updated_at->diffForHumans() }}">{{ $article->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('news.show', $article->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('news.destroy', $article->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}'"></script>
    <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>>
    <script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#articles_table').DataTable({
                "order": [[0, "asc"]],
            });
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush
