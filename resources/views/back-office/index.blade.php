@extends('layouts.back-office')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div id="ajax-content">
            <div class="ajax-loader">
                <img src="{{ asset('images/Pacman-loading.gif') }}" class="img-responsive" />
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                @can('users.index')
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 id="usersCount"></h3>
                                <p>Total Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endcan
                @can('news.index')
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3 id="articlesCount"></h3>
                                <p>Total News</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('news.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endcan
                @can('categories.index')
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 id="categoriesCount"></h3>
                                <p>Total Categories</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endcan
                @can('manage.news.index')
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3 id="publishedCount"></h3>
                                <p>Published news</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-quote"></i>
                            </div>
                            <a href="{{ route('manage.news.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Most Popular Articles</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="mostPopularArticlesPieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <style>
        .ajax-loader{
            visibility: hidden;
            background-color: rgba(255,255,255,0.7);
            /*position: fixed;*/
            position:absolute;
            z-index: +100 !important;
            width: 100%;
            height: 100%;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/chart.js/Chart.min.js') }}"></script>

    <script>

        $(document).ready(function () {
            $('.ajax-loader').css("visibility", "visible");
            $.ajax({
                url: '{{ route('backoffice.ajaxDashboardLoader') }}',
                type: 'GET',
                success: function (data) {
                    $('#usersCount').html(data.usersCount);
                    $('#articlesCount').html(data.articlesCount);
                    $('#categoriesCount').html(data.categoriesCount);
                    $('#publishedCount').html(data.publishedCount);

                    //pie chart
                    var mostPopularArticles = data.mostPopularArticles;
                    var keys = Object.keys(mostPopularArticles);
                    var values = Object.values(mostPopularArticles);
                    var colors = [];
                    for (var i = 0; i < values.length; i++) {
                        var color = '#' + Math.floor(Math.random() * 16777215).toString(16);
                        colors.push(color);
                    }
                    var viewsData = {
                        labels: keys,
                        datasets: [
                            {
                                data: values,
                                backgroundColor : colors,
                            }
                        ]
                    }
                    var viewArticlesCanvas = $('#mostPopularArticlesPieChart').get(0).getContext('2d')
                    var pieData = viewsData;
                    var pieOptions = {
                        maintainAspectRatio : false,
                        responsive : true,
                    }
                    new Chart(viewArticlesCanvas, {
                        type: 'pie',
                        data: pieData,
                        options: pieOptions
                    })
                    //end pie chart

                    $('.ajax-loader').css("visibility", "hidden");
                }
            });
        });

    </script>
@endpush
