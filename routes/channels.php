<?php

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('notifications', function () {
    return true;
});
 Broadcast::channel('accsptedorder', function () {
     return true;
 });

// Broadcast::event('notification-received', $notification);
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
// Broadcast::channel('notifications.{handymanId}', function ($user ,$recipientId) {

//     return true;
//     // $user->id === Auth::guard('handyman')->user()->id;
// });
// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });
