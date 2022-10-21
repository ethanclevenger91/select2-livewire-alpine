<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="form-group">
        <label for="from">Pick One:</label>
        <x-select2
            :options="$this->options"
            wire:model="form.from"
            class="w-full"
            />
    </div>
    
    <div class="form-group">
        <label for="to">Pick Some:</label>
        <x-select2
            :options="$this->options"
            :multiple="true"
            wire:model="form.to"
            class="w-full"
            />
    </div>

    <div class="d-flex justify-content-end align-items-center">
        <button type="submit" 
            class="float-right btn btn-primary"
            wire:click="store"
            wire:loading.attr="disabled">
                {{ $submitButtonText ?? 'Submit' }}
        </button>
    </div>
</div>
