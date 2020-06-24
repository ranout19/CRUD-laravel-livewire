<div>
	<form wire:submit.prevent="store" class="form">
		<div class="form-row">
			<div class="col">
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
		<button type="submit" class="btn btn-primary btn-sm">Create</button>
	</form>
	<hr>
</div>
