<div>
    <div class="text-center">
        <button wire:click="showForm('subtract')" class="btn btn-danger rounded-pill shadow-sm">
            <i class="fas fa-minus"></i>
        </button>
        <button wire:click="showForm('add')" class="btn btn-success rounded-pill shadow-sm">
            <i class="fas fa-plus"></i>
        </button>
    </div>
    @if($type)
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="form-group my-2">
                    <input wire:model="amount" type="number" class="form-control" placeholder="Amount">
                </div>
                <div class="form-group my-2">
                    <input wire:model="note" type="text" class="form-control" placeholder="Note...">
                </div>
            </div>
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
    @endif
</div>
