<section id="highlighted-articles" class="portfolio-details">
    <div class="container">
        <div class="section-title">
            <h2>Highlighted Articles</h2>
            <p>We love news! </p>
        </div>
        <div class="row gy-4">
            <div class="col-lg-12">
                <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @forelse($articles as $article)
                            <div class="swiper-slide">
                                @if(!$article->thumbnail)
                                    <img src="{{ asset('images/thumbnail-default.png') }}" alt="" class="image-highlight">
                                @else
                                    <img src="{{ asset('storage/thumbnails/' . $article->thumbnail) }}" alt="" class="img-fluid">
                                @endif
                            </div>
                        @empty
                            <p class="align-items-center">Ups, no highlighted articles for now. Come back later for more news!</p>
                        @endforelse
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
