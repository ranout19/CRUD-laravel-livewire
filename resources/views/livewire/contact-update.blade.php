<div>
	<form wire:submit.prevent="update" class="form">
		<div class="form-row">
			<div class="col">
				<input type="hidden" wire:model="contactId" name="">
				<input type="text" wire:model="name" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Name" name="">
				@error('name')
				<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
			<div class="col">
				<input type="text" wire:model="phone" class="form-control form-control-sm @error('phone') is-invalid @enderror" placeholder="Phone" name="">
				@error('phone')
				<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<button type="submit" class="btn btn-primary btn-sm">Update</button>
		<a wire:click="cancel" class="btn btn-default btn-sm">Cancel</a>
	</form>
	<hr>
</div>
