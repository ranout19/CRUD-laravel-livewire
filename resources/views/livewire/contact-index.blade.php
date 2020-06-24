<div>
	@if (session()->has('message'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}</div>
	@endif

    @if ($status == true)
	   @livewire('contact-update')
    @else
       @livewire('contact-create')
    @endif
	<div class="row">
		<div class="col">
			<select wire:model="paginate" class="form-control form-control-sm w-auto">
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="50">50</option>
			</select>
		</div>
		<div class="col">
			<input wire:model="search" placeholder="Search by name" type="text" class="form-control form-control-sm">
		</div>
	</div>
	<hr>
    <table class="table table-light">
    	<thead>
    		<tr>
    			<th>#</th>
    			<th>Name</th>
    			<th>Phone</th>
    			<th>Action</th>
    		</tr>
    	</thead>
    	<tbody>
    		@php
    			$num = 1;
    		@endphp
    		@foreach ($contacts as $contact)
    		<tr>
    			<td>{{ $num++ }}</td>
    			<td>{{ $contact->name }}</td>
    			<td>{{ $contact->phone }}</td>
    			<td>
    				<button wire:click="getContact({{ $contact->id }})" class="btn btn-sm btn-success">Edit</button>
    				<button wire:click="delete({{ $contact->id }})" class="btn btn-sm btn-danger">Delete</button>
    			</td>
    		</tr>
    		@endforeach
    	</tbody>
    </table>
    {{ $contacts->links() }}
</div>
