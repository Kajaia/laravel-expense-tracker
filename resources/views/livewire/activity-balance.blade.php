<div>
    <small class="mb-0 text-light title="Your balance">
        Balance: <span class="fw-bold">{{ number_format($this->balance, 2) . auth()->user()->currency_symbol }}</span>
    </small>
</div>
