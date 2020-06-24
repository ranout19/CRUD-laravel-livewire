<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Contact;

class ContactIndex extends Component
{

	use WithPagination;
	public $paginate = 10;
	public $search;
    public $status = false;
	protected $listeners = [
		'contactStored',
        'cancel',
        'contactUpdated'
	];

    public function render()
    {
        return view('livewire.contact-index', [
        	'contacts' => $this->search === null ? Contact::latest()->paginate($this->paginate) : Contact::latest()->where('name', 'like', '%'. $this->search .'%')->paginate($this->paginate)
        ]);
    }

    public function contactStored($contact)
    {
    	session()->flash('message', 'Contact '.$contact['name'].' was stored!');
    }

    public function contactUpdated($contact)
    {
        $this->status = false;
        session()->flash('message', 'Contact was Updated!');
    }

    public function delete($id)
    {
    	if ($id) {
    		$contact = Contact::find($id);
    		$contact->delete();
    		session()->flash('message', 'Contact was deleted!');
    	}
    }

    public function cancel()
    {
        $this->status = false;
    }

    public function getContact($id)
    {
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
        $this->status = true;
    }

}
