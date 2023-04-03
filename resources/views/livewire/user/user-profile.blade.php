<div class="maincont pt-3 " >
    <div class="container">


        <div class="row  row-cols-sm-1 row-cols-md-2" style="direction: rtl;">
            <div class="col-md-4 " style="">
                <div class="card" style=" height: 365px;">
                    <div class="card-body" style=" padding: 0;">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="upload-file">
                                <input type="file" class="upload-file__input" wire:model="image">
                                <div class="upload-file__img">
                                    <img onerror=""  src="{{ asset('storage/'.$image) }}" alt="">
                                </div>
                                <span class="upload-file__edit">
                                    <span class="material-icons">edit</span>
                                </span>
                            </div>
                     
                           
                            {{-- <input type="file" wire:model="image"> --}}
                
                            {{-- <button type="button" wire:click="uploadPhoto">Save Photo</button> --}}
                       
                        

                        

                         
                            
                        
                            {{-- <img src="{{ asset('storage/'.$user->image) }}" alt="Admin" class="rounded-circle"
                                width="150"> --}}
                            <div class="mt-2">

                                <h2 class="rating-numbers">{{$name}}</h2>
                                



                                <div class="col">
                                    <div class="rating-card">
                                        <div class="text-center m-b-30">

                                            <h2 style="font-size: 90%"> عدد الطلبات<strong>:{{$order_count}}</strong></h2>
                                           
                                            <div class="text-muted"></div>
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
                                <input type="email" name="email" placeholder="البريد الاكتروني" wire:model="email" value="{{$email}}" style="
                                background-color: white;
                                border-radius: 3px;
                                font-size: 15px;
                                ">
                             @error('email') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4 px-0">
                                <h5 class="mb-0">الهاتف</h5>
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
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-info " wire:click="submit" style="font-size: 70%;border-radius: 2px;font-weight: 500;">
                                    تعديل</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>


               



            </div>
            







        </div>


    </div>
</div>



