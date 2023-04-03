<div class="relative w-8">
@if($hasNotification)
<div class="relative flex items-center justify-center w-8 h-8">  
  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75">
  </span>
  <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500">
  <x.zondicon.notification.outline>  
  
  </span>

  <span class="absolute top-0 righ-0 px-1 text-xs texr-white bg-blue-500 rounded-full">
   <livewire:notification.caunt>
  </span>
@else
<span class="absolute top-0 righ-0 px-1 text-xs texr-white bg-white-200 rounded-full">
   <livewire:notification.caunt>
  </span> 
</div>
@endif
</div>
