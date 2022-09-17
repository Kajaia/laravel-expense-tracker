<div>
    <div class="text-center">
        <div class="row">
            <div class="col-6">
                <button wire:click="showForm('subtract')" class="btn btn-danger rounded-3 w-100 shadow-sm py-3" title="Subtract money">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <div class="col-6">
                <button wire:click="showForm('add')" class="btn btn-success rounded-3 w-100 shadow-sm py-3" title="Add money">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
    @if($type)
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="form-group my-2">
                    <input wire:model="amount" type="number" min="1" max="100000" class="form-control rounded-3 shadow-sm @error('amount') is-invalid @enderror" placeholder="Amount" title="Enter your amount">
                    @error('amount')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <input wire:model="note" type="text" class="form-control rounded-3 shadow-sm @error('note') is-invalid @enderror" placeholder="Add note..." title="Enter your note">
                    @error('note')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            @foreach($this->categories as $category)
            <div class="col-6 my-2">
                <div wire:click="chooseCategory({{ $category->id }})" class="card h-100 rounded-3 shadow-sm cursor-pointer category" title="Choose category and save">
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
