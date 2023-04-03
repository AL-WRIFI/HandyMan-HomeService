
<div >
  <div class="row py-5 px-4"> 
    <div class="col-md-5 mx-auto"> 
    <div class="bg-white shadow rounded overflow-hidden"> 
    
    
                 <div class="px-3 pt-0 pb-0 cover"> 
                  <div class="media align-items-end profile-head">
                  <div class="profile mr-2">
                  <img src="{{asset('storage/'.$handyman->image)}}"
                          alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                          style="width: 100px; z-index: 1">
                
                 </div>
               
               <div class="media-body mb-0 text-white"> 

                <h4 class="mt-0 mb-1">{{$handyman->name}}</h4> <p class="small mb-0"> 
                  <i class="fas fa-map-marker-alt mr-2 "></i>{{$handyman->city->name}}</p> 
                  <div class="mt-0 mb-5">
                    <div class="{{ $handyman->status != 1 ? 'ofonline-indicator' : 'online-indicator'}}">
                      <span class="{{ $handyman->status != 1 ? '' : 'blink'}}"></span>
                    </div>
                    <h2 class="online-text" style="font-size: 100%">{{ $handyman->status != 1 ? 'غير متاح' : 'متاح'}}</h2>
                  </div> 

                </div>
                
               </div> 
              </div> 
     
                <div class="bg-light p-4  d-flex justify-content-end text-center"> 
                
                 <ul class="list-inline mb-0">
                   <li class="list-inline-item"> 
                     <h5 class="font-weight-bold mb-0 d-block">{{$handyman->order_count}}</h5>
                     <small class="text-muted"><strong>عددالطلبات</strong></small> 
                   </li> 

                   <li class="list-inline-item"> 
                     <h5 class="font-weight-bold mb-0 d-block">{{$handyman->avg_rating}}</h5>
                     <small class="text-muted"> 
                      <strong> التقيم</strong></small> 
                     </li>

                     <li class="list-inline-item">
                       <h5 class="font-weight-bold mb-0 d-block">{{$handyman->category->name}}</h5>
                       <small class="text-muted"> <strong>المهنة</strong></small> 
                      </li> 
                   </ul> 

                   </div> 

            
            <div class="card-body p-4 text-black " style="text-align: right">
              <div class="mb-5">
                <p class="lead fw-normal mb-1">عن المزود</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="font-italic mb-1">{{$handyman->description}}</p>
                  {{-- <p class="font-italic mb-1">مدينة صنعاء</p>
                  <p class="font-italic mb-0"> يفضل العمل صباحاً </p> --}}
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0">الاعمال السابقة</p>
                <p class="mb-0"><a href="#!" class="text-muted">عرض الكل</a></p>
              </div>
              <div class="row g-2">
                @foreach($handyman->previousWorks as $previousWorks)
                <div class="col mb-2">
                  <img src="{{asset('storage/'.$previousWorks->image)}}"
                    alt="image 1" class="w-100 rounded-3">
                </div>
                @endforeach
              </div>
            </div>
               
            </div>

      </div> 
           
    </div>
</div>
  