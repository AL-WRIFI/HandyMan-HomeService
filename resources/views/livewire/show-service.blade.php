@if( $Steps != 1)

<div style="display: none" class="h-100 h-custom">
  @endif
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">الخدمات </h1>
                    <h6 class="mb-0 text-muted"></h6>
                  </div>
                  @foreach ($services as $service)
                      
                  
                  <hr class="my-4">

                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-3 col-lg-2 col-xl-2">
                      <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img5.webp"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted">{{$service->name}}</h6>
                    </div>
                    <div class="col">
                      <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
                      <h6 class="text-muted">العدد</h6>
                  </div>
                    <div class="col-md-3 col-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="" style="font-size:70%">{{$service->price}}</h6>
                    </div>
                    <div class="col-md-1 col-3 col-lg-1 col-xl-1 text-end">
                      <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                    </div>
                  </div>
                  @endforeach
                  <hr class="my-4">

                  <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                        type="button">Next
                </button>
                  <div class="pt-5">
                    <h6 class="mb-0"><a href="#!" wire:click="firstStepSubmit" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
