<div class="service-1">
  <div class="container">

      <div class=" text-center p-3 pb-2">
          <h3>الخدمات</h3>
        
      </div>
      <div class="row-service row row1 text-white pt-4 pb-4">
    @foreach ($categories as $category)
        <!--item-->
        
        <div class="single-service col-3 col-lg-2  m-1  text-center "  >
     
          <a href="{{route('select_services',[$category->id])}}">
              <div class=" text-black-20 ">
                  <img src="{{asset('storage/'.$category->image)}}" style="margin-block: 0px">
                  <h5>{{$category->name}}</h5>
              </div>
          </a>
        </div>
        <!-- End-->
        
    @endforeach


    
     </div>
    </div>
  </div>
