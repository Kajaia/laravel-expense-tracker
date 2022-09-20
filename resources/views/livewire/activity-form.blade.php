<div>
    <div class="text-center">
        <div class="row">
            <div class="col-6">
                <button id="subtractMoney" class="btn btn-danger rounded-3 w-100 shadow-sm py-3" title="Subtract money">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <div class="col-6">
                <button id="addMoney" class="btn btn-success rounded-3 w-100 shadow-sm py-3" title="Add money">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div id="activityForm" class="col-12 d-none">
            <div class="form-group my-2">
                <input wire:model.defer="amount" type="number" min="1" max="100000" class="form-control bg-secondary text-secondary border-0 rounded-3 shadow-sm @error('amount') is-invalid @enderror" placeholder="Amount" title="Enter your amount">
                @error('amount')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group my-2">
                <input wire:model.defer="note" type="text" class="form-control bg-secondary text-secondary border-0 rounded-3 shadow-sm @error('note') is-invalid @enderror" placeholder="Add note..." title="Enter your note">
                @error('note')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        @foreach($this->addCategories as $category)
        <div class="addCategories col-6 my-2 d-none">
            <div wire:click="chooseCategory({{ $category->id }})" class="card bg-secondary h-100 rounded-3 shadow-sm cursor-pointer category" title="Choose category and save">
                <div class="card-body text-center">
                    <div>
                        <i class="fas {{ $category->icon }} fa-lg text-light"></i>
                    </div>
                    <small class="text-light">{{ $category->title }}</small>
                </div>
            </div>
        </div>
        @endforeach
        @foreach($this->subtractCategories as $category)
        <div class="subtractCategories col-6 my-2 d-none">
            <div wire:click="chooseCategory({{ $category->id }})" class="card bg-secondary h-100 rounded-3 shadow-sm cursor-pointer category" title="Choose category and save">
                <div class="card-body text-center">
                    <div>
                        <i class="fas {{ $category->icon }} fa-lg text-light"></i>
                    </div>
                    <small class="text-light">{{ $category->title }}</small>
                </div>
            </div>
        </div>
        @endforeach
        <div id="closeForm" class="col-12 mt-2 d-none">
            <button class="btn text-primary rounded-3 w-100 text-decoration-none" title="Close form">
                <i class="fas fa-times fa-sm"></i>
                <small>Close</small>
            </button>
        </div>
    </div>
</div>