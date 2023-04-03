<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
class Home extends Component
{
    public $count = 1;
    public function render()
    {
        return view('livewire.home', [
                    'categories' => Category::where('status',1)->get(),
                ])->layout('layouts.service');
    }

    public function show_services($id){

        $category = Category::whereId($id)->first();
        if($category){
            return redirect()->to('category/' . $id . '/show_services');
        }
        return redirect()->to('home');

    }

    
}
