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
                            <div class="card-tools">
                                <form action="{{ route('manage.news.filter-by-writer') }}" method="post">
                                    @csrf
                                    <div class="input-group input-group-sm">
                                        <select name="writer" id="writer" class="form-control">
                                            <option value="" selected disabled>Select Writer</option>
                                            <option value="all">All</option>
                                            @foreach($writers as $writer)
                                                <option value="{{ $writer->id }}" @if(Session::get('writer') == $writer->id) selected @endif>{{ $writer->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Filter by writer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="articles_table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Published</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
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
                                        <td>{{ $article->user->name }}</td>
                                        <td>{{ $article->category->name }}</td>
                                        <td>
                                            <input data-id="{{$article->id}}" class="toggle-class" type="checkbox" data-onstyle="success"
                                                   data-offstyle="danger" data-toggle="toggle" data-on="Yes" data-off="No"
                                                {{ $article->published ? 'checked' : '' }}>
                                        </td>
                                        <td data-toggle="tooltip" data-placement="top" title="{{ $article->created_at->diffForHumans() }}">{{ $article->created_at }}</td>
                                        <td data-toggle="tooltip" data-placement="top" title="{{ $article->updated_at->diffForHumans() }}">{{ $article->updated_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-xl" data-attr="{{ $article->id }}">
                                                Preview Article
                                            </button>
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

    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-thumbnail"></div>
            </div>
        </div>
    </div>
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

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#articles_table').DataTable({
                // "order": [[4, "desc"]],
            });
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })


        $('#modal-xl').on('show.bs.modal', function (event) {
            $('.modal-title').html('');
            $('.modal-body').html('');
            $('.modal-thumbnail').html('');
            var button = $(event.relatedTarget)
            var id = button.data('attr')
            $.ajax({
                url: '{{ route('manage.news.preview.article') }}',
                type: 'GET',
                data: {
                    id: id
                },
                success: function (data) {
                    $('.modal-title').text(data.title)
                    $('.modal-body').html(data.body)
                    if(data.thumbnail){
                        $('.modal-thumbnail').append(`<img src="{{ asset('storage/thumbnails/') }}/${data.thumbnail}" alt="${data.title}" class="img-fluid">`)
                    }

                }
            })

        })

        $(function(){
            $('.toggle-class').change(function(){
                var publish = $(this).prop('checked') == true ? 1:0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{route('manage.news.publish')}}",
                    data: { 'publish': publish, 'id': id},
                    success: function(data){

                    }
                });
            });
        });
    </script>
@endpush
