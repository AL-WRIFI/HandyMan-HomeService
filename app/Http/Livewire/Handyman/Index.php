<?php

namespace App\Http\Livewire\Handyman;


use Livewire\Component;
use App\models\Order;
use App\models\handyman;
use App\models\Category;
use App\models\User;
use App\Models\Order_ditail;
use Illuminate\Support\Facades\Auth;
use App\Events\AccsptedOrder;


class Index extends Component
{

    // public $orders;
    public $notifications = [];
    // $this->listeners['newData'] = 'addNotification';
    
   

    
    public function mount(){
        
        // dd($this->orders);
    }
    public function render()
    {    
         $orders= Order::where(['handyman_id' => Auth::guard('handyman')->user()->id ,'status'=>'pending'])->get();
        return view('livewire.handyman.index',['orders' => $orders])->layout('layouts.handyman');
    }
    public function approvedOrder($orderId){
        Order::where('id',$orderId)->update(['status' => 'accepted',]);
        $user ='hhhhhhhhhhhhhhhhhhhhhhhh';
        event(new AccsptedOrder($user));  
        $this->mount(); 
        }
    public function rejectOrder($orderId){
        Order::where('id',$orderId)->update([
            'status' => 'rejected',
           ]);
          
           $user =0;
           event(new AccsptedOrder($user));
          $this->mount();
    }
    public function addNotification($date)
    {
        // $this->emit(ub)
        //$this->notifications = $date;
        // dd($date);
       // class CourseRegistration extends Component
       // {
       //     public $is_accepted = false;
       //     public $student_id;
       //     public $course_id;
    
      //     public function register()
//     {
//         $this->is_accepted = true;
//         $this->dispatchBrowserEvent('course-accepted');
//         $this->blockCourse($this->student_id, $this->course_id);
//     }

//     public function blockCourse($student_id, $course_id)
//     {
//         $this->delay( Carbon::now()->addDays(7), function () use ($student_id, $course_id) {
//             //قم بتعطيل الدخول على الكورس للطالب
//             $student = Student::find($student_id);
//             $student->courses()->updateExistingPivot($course_id, ['is_blocked' => true]);
//         });
//     }
    

    }


   
}
