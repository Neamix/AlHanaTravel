<div class="container container-custom margin_80_0">
    <div class="main_title_3">
        <h2>{{ $title }}</h2>
    </div>
    <div class="row">
        @foreach($cities as $city)
            @livewire('small-box',['city' => $city])
        @endforeach
    </div>
</Div>
