<div>
    @if ($isSent)
        <div class="text-center">Thank you, we'll be in touch!</div>
    @else
        <form wire:submit.prevent="submit">
            <div class="mt-4">
                <x-input wire:model.defer="name" name="name" label="Name" required />
            </div>

            <div class="mt-4">
                <x-input wire:model.defer="email" name="email" label="Email" type="email" required />
            </div>

            <div class="mt-4">
                <x-textarea wire:model.defer="message" name="message" label="Message" rows="8" required />
            </div>

            <div class="mt-4">
                <x-input wire:model.defer="quiz" name="quiz" label="What is 8-1?" required />
            </div>

            <div class="mt-4">
                <x-button label="Send" />
            </div>
        </form>
    @endif
</div>
