<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;

class ContactUpdate extends Component
{

	public $name;
	public $phone;
	public $contactId;
	public $listeners = [
		'getContact'
	];

    public function render()
    {
        return view('livewire.contact-update');
    }

    public function update()
    {
    	$this->validate([
    		'name' => 'required|min:3',
    		'phone' => 'required|min:9|max:14'
    	]);	
    	$contact = Contact::find($this->contactId);
    	$contact->update([
    		'name' => $this->name,
    		'phone' => $this->phone
    	]);
    	$this->resetInput();
    	$this->emit('contactUpdated', $contact);
    }

    private function resetInput()
    {
    	$this->name = null;
    	$this->phone = null;
    }

    public function cancel()
    {
    	$this->emit('cancel');
    }

    public function getContact($contact)
    {
    	$this->name = $contact['name'];
    	$this->phone = $contact['phone'];
    	$this->contactId = $contact['id'];
    }
}
