<?php

namespace App\Listeners;
use Illuminate\Auth\Events\NewNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Pusher\Pusher;


class SendPusherNotification 
{
    

    public function handle(NewNotification $event)
    {
        dd('ghj');
        $user = $event->user;
        $notification = $event->order;

       
        // $data = [
        //     'message' => $event->message
        // ];

        // Broadcast::to($event->broadcastOn())->with($notification)->dispatch($event);
    
        // Send a push notification to the specified user using Pusher
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true
            ]
        );

        $pusher->trigger('notifications'.$event->recipientId, 'NewNotification', $event->order);
    }
 

   
   
}
