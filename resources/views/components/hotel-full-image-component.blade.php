<div class="item">
    <a href="adventure-detail.html" class="grid_item_adventure">
        <figure>
            <div class="score"><strong><i class="fa fa-star mr-2" aria-hidden="true"></i>{{ $hotel->stars }}</strong></div>
            <img loading="lazy" src="{{ asset('images/medium/'.$hotel->preview->name) }}" class="img-fluid" alt="{{ $hotel->name }}" >
            <div class="info">
                <em>{{ $hotel->min_days }} ايام في {{ $hotel->city->name }}</em>
                <h3>{{ $hotel->name }}</h3>
            </div>
        </figure>
    </a>
</div>
