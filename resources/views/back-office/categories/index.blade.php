@extends('layouts.back-office')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backoffice.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
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
                            <h3 class="card-title">Categories</h3>
                            <div class="card-tools">
                                <a href="{{ route('categories.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Add Category
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="categories_table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thumbnail</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Articles</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <th>
                                            @if($category->image)
                                                <img src="{{ asset('storage/thumbnails/' . $category->image) }}" alt="{{ $category->title }}" class="img-fluid" style="max-width: 50px;">
                                            @else
                                                <img src="{{ asset('images/thumbnail-default.png') }}" alt="{{ $category->slug }}" class="img-fluid" style="max-width: 50px;">
                                            @endif
                                        </th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>{{ $category->articles->count() }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                    Delete
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
            $('#categories_table').DataTable({
                "order": [[0, "asc"]],
            });
        });
    </script>
@endpush
