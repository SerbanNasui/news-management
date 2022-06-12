<section id="categories" class="portfolio">
    <div class="container">

        <div class="section-title">
            <h2>News Categories</h2>
            <p>Find the most epic News on our website every day! </p>
        </div>

        <div class="row portfolio-container">
            @foreach($categories as $category)
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <a href="{{ route('show.articles.from.category', $category->id) }}">
                        @if(!$category->image)
                            <img src="{{ asset('images/thumbnail-default.png') }}" alt="{{ $category->slug }}" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/thumbnails/' . $category->image) }}" class="img-fluid" alt="">
                        @endif
                        <div class="portfolio-info">
                            <h4>{{ $category->name }}</h4>
                            <p>{{ $category->description }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
