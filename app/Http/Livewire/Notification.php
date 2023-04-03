<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{
    protected $listeners = ['notification' => 'render'];
    public function render()
    {
        return <<<'blade'
            <div>
            <div class="col-3  ms-auto me-4 mb-2  text-end  " style="color: #2215da;">
            <h5>التاريخ</h5>
        </div>
        <div class="row row1 text-center pb-1 text-black  ">
            <div class="col-6 ms-auto me-4  text-end ">

                <input class="input_date" type="date" name="date" value="dd/mm/yy">

            </div>
        </div>
            </div>
        blade;
    }
}
