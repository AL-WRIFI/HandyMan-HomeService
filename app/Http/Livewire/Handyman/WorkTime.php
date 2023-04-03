<?php

namespace App\Http\Livewire\Handyman;

use Livewire\Component;
use App\Models\Handyman;
use Illuminate\Support\Facades\Auth;
class WorkTime extends Component
{
    public $workingDays = [];
    // public $rules = [
    //     'workingDays.Saturday' => 'required|boolean',
    //     'workingDays.Sunday' => 'required|boolean',
    //     'workingDays.Monday' => 'required|boolean',
    //     'workingDays.Tuesday' => 'required|boolean',
    //     'workingDays.Wednesday' => 'required|boolean',
    //     'workingDays.Thursday' => 'required|boolean',
    //     'workingDays.Friday' => 'required|boolean',
    // ];
    public function mount(){

        $days =Handyman::find(Auth::guard('handyman')->user()->id);
        $this->workingDays = $days->working_days; 

    }
    public function render()
    {
        
        return view('livewire.handyman.work-time')->layout('layouts.handyman');
    }

    public function saveWorkingDays()
    {
        // $validatedData = $this->validate([
        //     'workingDays' => 'required|array',
        // ]);
        $json = json_encode($this->workingDays);
        // Code to save the JSON data to the database
        Handyman::where('id',Auth::guard('handyman')->user()->id)->update([
            'working_days' => $json,
           ]);
           
       // dd($json);
    }


    public function updated($field)
    {
        if ($this->workingDays[$field] ?? false) {
            $this->workingDays = array_merge($this->workingDays, [$field]);
        } else {
            $this->workingDays = array_diff($this->workingDays, [$field]);
        }
    }


}

// use Livewire\Component;

// class EmployeeWorkingDays extends Component
// {
//     public $workingDays = [];

//     public function addWorkingDay($day)
//     {
//         if (!in_array($day, $this->workingDays)) {
//             $this->workingDays[] = $day;
//         }
//     }

//     public function removeWorkingDay($day)
//     {
//         $key = array_search($day, $this->workingDays);
//         if ($key !== false) {
//             unset($this->workingDays[$key]);
//         }
//     }

//     public function render()
//     {
//         return view('livewire.employee-working-days', [
//             'days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
//         ]);
//     }
// }

// <div>
//     <h3>Working Days</h3>
//     @foreach ($days as $day)
//         <label>
//             <input type="checkbox"
//                    wire:model="workingDays"
//                    value="{{ $day }}"
//                    wire:click="$event.target.checked ? addWorkingDay('{{ $day }}') : removeWorkingDay('{{ $day }}')">
//             {{ $day }}
//         </label>
//     @endforeach
// </div>

