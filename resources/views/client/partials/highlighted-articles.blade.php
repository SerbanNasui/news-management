<section id="highlighted-articles" class="testimonials">
    <div class="container">

        <div class="section-title">
            <h2>Highlighted Articles</h2>
            <p>We love news!</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                @foreach($articles as $article)
                    <div class="swiper-slide">
                        <a href="{{ route('display.article', $article->id) }}" class="highlighted-articles-link">
                            <div class="testimonial-item">
                                <p>
                                    {{ $article->short_description }}...
                                </p>
                                @if($article->thumbnail)
                                    <img src="{{ asset('storage/thumbnails/' . $article->thumbnail) }}" alt="" class="img-fluid">
                                @else
                                    <img src="{{ asset('images/thumbnail-default.png') }}" alt="" class="image-highlight">
                                @endif
                                <h3>{{ $article->title }}</h3>
                                <h4>{{ $article->user->name }}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>
