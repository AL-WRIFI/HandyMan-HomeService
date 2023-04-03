<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Handyman;
class ProviderProfile extends Component
{
    public $handyman_id ;
    public $handyman;

    public function mount($handyman_id){

        $this->handyman =Handyman::find($handyman_id); 
    }

    public function render()
    {
        return view('livewire.provider-profile')->layout('layouts.service');
    }
}
