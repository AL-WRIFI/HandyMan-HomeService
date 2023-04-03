<?php

namespace App\Http\Livewire\Handyman;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;
class HandymanStatus extends Component
{
    public Model $model;
    public string $field ,$status;

    public bool $isActive;


    public function mount()
    {
        $this->isActive = (bool) $this->model->getAttribute($this->field);
        if( $this->isActive == true )
        {
            $this->status = ': متاح';
        }else{
            $this->status = ': غير متاح';
        }
    }
    public function updating($field, $value)
    {
        //dump(request(),$field, $value);
        //dd($field, $value);
        $this->model->setAttribute($this->field, $value)->save();
        $this->mount();
    }
    public function render()
    {
        return view('livewire.handyman.handyman-status');
    }
}
