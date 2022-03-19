<div class="item">
    <a href="adventure-detail.html" class="grid_item_adventure">
        <figure>
            <div class="score"><strong><i class="fa fa-star mr-2" aria-hidden="true"></i>{{ $hotel->stars }}</strong></div>
            <img loading="lazy" src="{{ asset('images/small/'.$hotel->preview->name) }}" class="img-fluid" alt="{{ $hotel->name }}" >
            <div class="info">
                <em>2 days in Canada</em>
                <h3>Horseback ride through Valencia</h3>
            </div>
        </figure>
    </a>
</div>
