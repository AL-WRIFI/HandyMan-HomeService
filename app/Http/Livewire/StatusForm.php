<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class StatusForm extends Component
{

    public Model $model;
    public string $field;

    public bool $isActive;

    public function mount(Model $model)
    {
        $this->isActive = (bool) $model->getAttribute($this->field);
    }
    public function render()
    {
        //dd($this->model);
        return view('livewire.status-form');
    }
    public function updating($field, $value)
    {
        //dump(request(),$field, $value);
        //dd($field, $value);
        $this->model->setAttribute($this->field, $value)->save();
    }
    // public function switcherStatus(Category $category){
    //     $category = Category::where('id', $category->id)->update(['status' => !$category->status]);
    // }
}
