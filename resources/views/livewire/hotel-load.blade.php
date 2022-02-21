<div>
    <div class="container margin_60_35">
        <div class="row no-gutters custom-search-input-2 inner">
            <div class="col-lg-4">
                <div class="form-group">
                    <input class="form-control" wire:model="" type="text" placeholder="ما الذي تبحث عنه">
                    <i class="icon_search"></i>
                </div>
            </div>
            <div class="col-lg-4">
                <select class="wide">
                    <option>All Categories</option>	
                    <option>Paris Center</option>
                    <option>La Defanse</option>
                    <option>Latin Quarter</option>
                </select>
            </div>
            <div class="col-lg-4">
                <select class="wide">
                    <option>All Categories</option>	
                    <option>Paris Center</option>
                    <option>La Defanse</option>
                    <option>Latin Quarter</option>
                </select>
            </div>
        </div>
    </div>

    <div class="isotope-wrapper">
       <div class="container">
            <div class="row">
                @foreach($hotels as $hotel)
                    <div class="col-md-4">
                        <livewire:large-box :hotel="$hotel" :wire:key="$hotel->id"></livewire:large-box>  
                    </div>              
                @endforeach
                
            </div>
            {{ $hotels->links() }}
       </div>
    </div>
    

    </div>
</div>