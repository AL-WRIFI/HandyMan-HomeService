<?php

namespace App\Http\Livewire\Handyman;

use Livewire\Component;

use App\Models\Category;
use App\Models\service;


class ServicePrice extends Component
{
    protected $listeners = ['xzsawq' => 'vart'];
    public function vart(){
        $fd ="hfgkvtkguvkutvuyvluykvbolblu";
        dd($fd);
    }
    public function render()
    {
        $category = Category::all();
        return view('livewire.handyman.service-price',[ 'categories' => $category,])->layout('layouts.handyman');
    }
}
