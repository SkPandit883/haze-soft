<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;

class CompanyAdd extends Component
{
    public $name;
    public $location;
    public $contact;

    protected $rules = [
        'name' => 'required|string',
        'location' => 'required|string',
        'contact' => 'required|string',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        $validatedData = $this->validate();
        Company::create($validatedData);
    }
    public function render()
    {

        return view('livewire.company-add');
    }
}
