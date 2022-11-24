<div>
    <span class="badge bg-secondary rounded-3 py-1 px-3">
        <button wire:click="switch('gel')" class="btn btn-sm p-0 @if(auth()->user()->currency === 'gel') bg-light text-dark @else bg-secondary text-secondary @endif">
            <small>₾</small>
        </button>
        <button wire:click="switch('usd')" class="btn btn-sm p-0 @if(auth()->user()->currency === 'usd') bg-light text-dark @else bg-secondary text-secondary @endif">
            <small>$</small>
        </button>
        <button wire:click="switch('eur')" class="btn btn-sm p-0  @if(auth()->user()->currency === 'eur') bg-light text-dark @else bg-secondary text-secondary @endif">
            <small>€</small>
        </button>
    </span>
</div>
