<section class="mb-3">
    @if(count($hotels))
    <div class="main_title_3">
        <span><em></em></span>
        <h2>اخر الفنادق المضافة</h2>
        <p>يمكنك زياره افخم الفنادق في مصر معنا</p>
    </div>
        <div class="row">
            @foreach($hotels as $hotel)
              <x-box-large-details :hotel="$hotel"></x-box-large-details>
            @endforeach
        </div>
        @if(count($hotels) > 2)
        <a href="/search"><strong>اظهر جميع الفنادق<i class="arrow_carrot-left"></i></strong></a>
        @endif
    @endif
</section>