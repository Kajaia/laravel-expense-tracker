<div>
    <div class="row justify-content-center">
        @foreach($this->categories as $category)
        <div class="col-6 my-2">
            <div wire:click="chooseCategory({{ $category->id }})" class="card h-100 rounded-3 shadow-sm cursor-pointer category">
                <div class="card-body text-center">
                    <div>
                        <i class="fas {{ $category->icon }} fa-lg text-primary"></i>
                    </div>
                    <small>{{ $category->title }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
