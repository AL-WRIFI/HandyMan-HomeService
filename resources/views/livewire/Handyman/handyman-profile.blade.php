<div class="maincont pt-3">
    <div class="container">


        <div class="row  row-cols-sm-1 row-cols-md-2" style="direction: rtl;">
            <div class="col-md-4 mb-3">
                <div class="card" style=" height: 438px;">
                    <div class="card-body" style=" padding: 0;">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="upload-file">
                                    <input type="file" class="upload-file__input" name="image" wire:model="image" >
                                    <div class="upload-file__img">
                                        <img onerror=""  src="{{ asset('storage/'.$image) }}" alt="">
                                    </div>
                                    <span class="upload-file__edit">
                                        <span class="material-icons">edit</span>
                                    </span>
                                </div>
                            {{-- <img src="{{ asset('storage/'.$handyman->image) }}" alt="Admin" class="rounded-circle"
                                width="150"> --}}
                            <div class="mt-3">

                                <h2 class="rating-numbers">{{$name}}</h2>
                                <p class="text-secondary mb-1">{{$category_name}}</p>



                                <div class="col">
                                    <div class="rating-card">
                                        <div class="text-center m-b-30">

                                            <h2 class="rating-number">{{$AvgRating}}<small>/5</small></h2>
                                            <div class="rating-stars d-inline-block position-relative mx-md-3 "
                                                style="margin: 0 42px;">
                                                <img src="{{ asset('assets/svg/grey-star.svg') }}" alt="">
                                                <div class="filled-star" style="width:{{$AvgRating+30}}%"></div>
                                            </div>
                                            <div class="text-muted">ratings{{$ratingCount}} </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body p-md-0" style="padding: 0.5rem;">
                    
                        <div class="row">
                            
                            <div class="col-sm-4 px-0">
                                <h5 class="mb-0">الاسم</h5>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{-- <div>

                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                        :value="old('name', $handyman->name)" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div> --}}
                                <input type="text" name="name" value="{{$name}}"  wire:model="name" style="
                                  background-color: white;
                                border-radius: 3px;
                                direction: rtl;
                                font-size: 15px;
                                ">
                               @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4 px-0">
                                <h5 class="mb-0">االايميل</h5>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <input type="email" name="email" wire:model="email" value="{{$email}}" style="
                                background-color: white;
                                border-radius: 3px;
                                font-size: 15px;
                                ">
                             @error('email') <span class="email">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4 px-0">
                                <h5 class="mb-0">الجوال</h5>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <input type="phone" name="phone" wire:model="phone"  value="{{$phone}}" style="
                                background-color: white;
                                border-radius: 3px;
                                direction: rtl;
                                font-size: 15px;
                                ">
                                @error('phone') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-4 px-0">
                                <h5 class="mb-0">العنوان</h5>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <input type="text" name="address_note" wire:model="address_note" value="{{$address_note}}" style="
                                background-color: white;
                                border-radius: 3px;
                                direction: rtl;
                                font-size: 15px;
                                ">
                             @error('address_note') <span class="error">{{ $message }}</span> @enderror

 
                            </div>
                        </div>
                        <hr>
                        <div class="row gx-2">
                            <div class="col-lg-6">
                            
                            <select wire:model="city_id" class="js-select theme-input-style w-100" name="city_id">
                                <option value="2" required>المدينة</option>
                                @foreach($cities as $city)
                                <option value="{{$city->id}}" @selected($city->id == $city_id)>{{$city->name}}</option>
                                @endforeach
                            </select>
                            @error('city_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        
                        <div class="col-lg-6">
                            <select  wire:model="zone_id" class="js-select theme-input-style w-100" name="zone_id">
                                <option value="0" required>المنطقة</option>
                                @foreach($zones as $zone)
                                <option value="{{$zone->id}}" @selected($zone->id == $zone_id) >{{$zone->name}}</option>
                                @endforeach
                            </select>
                            @error('zone_id') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        </div> 
                        <hr>
                        <div class="col" style="text-align: start;">

                            <div class=" p-0  text-end  text-black"
                                style="justify-content: center;display: flex;align-content: center;flex-wrap: wrap;">

                                <textarea name="" wire:model="description" placeholder="وصف قصير عنك..." style="
                                      width: 95%;
                                      background-color: #f9f9f936;height: 55px;
                                      border: 0.3px solid #bfbfbf;
                                      border-radius: 3px;
                                      padding: 5px;margin: 5px; margin-top: 0px; height: 40px;
                                      direction: rtl;
                                      font-size: 14px;">{{$description}}</textarea>

                           
                        </div>
                         </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" wire:click="submit" class="btn btn-info " style="font-size: 70%;border-radius: 2px;font-weight: 500;">
                                    تعديل</button>
                            </div>
                        </div>
                    
                    </div>
                </div>


               



            </div>
            <div class="col-12 col-md-12">
            <div class="card ">
                <div>
                    <h5 class=" align-items-center mb-3">صور من اعمالك السابقة</h5>
                </div>
                <div class="card-body">


                    <div class="row g-4">
                        <div class="col-12  " style="direction: rtl">

                            <div class="upload-file">
                                <input type="file" class="upload-file__input" name="image" wire:model="photos" multiple>
                                <div class="upload-file__img">
                                    <img onerror=""
                                        src="{{asset('assets/admin-module')}}/img/media/upload-file.png"
                                        alt="">
                                </div>
                                <span class="upload-file__edit">
                                    <span class="material-icons">add</span>
                                </span>
                            </div>


                            {{-- <img src="{{ asset('assets/img/portfolio/branding-3.jpg') }}" alt=""
                                style=" width: 100%;height: 100%;"> --}}
                        </div>
                       
                        @if ($photos)
                        <form wire:submit.prevent="uploadImgae">
                        Photo Preview:<br>
                        @foreach($photos as $photo)
                        <img src="{{ $photo->temporaryUrl() }}">
                        @endforeach

                        <button type="submit" style="width:30%; heigh:auto;">حفظ</button>
                       </form>
                       @endif
                       <hr>
                       
                       @foreach($hanymanPreviousWorke as $hanymanPhoto)
                        <div class="col-sm-12 col-md-6 ">
                            
                            <img src="{{ asset('storage/'.$hanymanPhoto->image) }}" alt=""
                                style=" width: 100%;height: 100%;">
                        </div>
                       @endforeach
                    </div>
                </div>
                     
            </div>
            </div>







        </div>


    </div>
</div>
