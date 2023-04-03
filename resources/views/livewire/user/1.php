<div class=" pt-3">

    <div class="container">



        <div class="row " style="justify-content: center;direction: rtl;">
            <div class="col-12 col-md-8 col-lg-6 ">

                <div class="card mb-3" style="padding: 25px">
                    <div class="card-body p-md-0">

                        <div class="d-flex flex-column align-items-center  mb-4">

                            <div class="upload-file">
                                <input type="file" class="upload-file__input" name="image">
                                <div class="upload-file__img">
                                    <img onerror="" src="{{ asset('storage/'.$user->image) }}"
                                        alt="" >
                                </div>
                                <span class="upload-file__edit">
                                    <span class="material-icons">edit</span>
                                </span>
                            </div>
                         {{-- <img src="http://127.0.0.1:8000/storage/uploads/8Os256Mu6PqYXuHb0x6KBDlpJlawH1hYsj3CoHNo.png" alt=""
                                 style="width: 90px;height: 90px;border-radius: 50px;margin-bottom: 10px;"> --}}
                            {{-- <img src="{{ asset('storage/'.$user->image) }}" alt="Admin" class="rounded-circle"
                                width="150"> --}}

                        </div>

                        <div class="row">

                            <div class="col-2 px-0">
                                <h5 style="font-size: 24px;" class="mb-0">الاسم</h5>
                            </div>
                            <div class="col-10 text-secondary">
                                {{-- <div>

                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div> --}}
                                <input type="text" name="name" value="{{$user->name}}" style="
                                  background-color: white;
                                border-radius: 3px;
                                direction: rtl;
                                font-size: 15px;
                                ">
                                {{-- {{$user->name}} --}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-2 px-0">
                                <h5 style=" font-size: 24px;" class="mb-0">االايميل</h5>
                            </div>
                            <div class="col-10 text-secondary">
                                <input type="text" name="email" value="{{$user->email}}" style="
                                background-color: white;
                                border-radius: 3px;
                                font-size: 15px;
                                ">

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-2 px-0">
                                <h5 style="font-size: 24px;" class="mb-0">الجوال</h5>
                            </div>
                            <div class="col-10 text-secondary">
                                <input type="text" name="phone" value="{{$user->phone}}" style="
                                background-color: white;
                                border-radius: 3px;
                                direction: rtl;
                                font-size: 15px;
                                ">
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-2 px-0">
                                <h5 style="
                                 font-size: 24px;" class="mb-0">العنوان</h5>
                            </div>
                            <div class="col-10 text-secondary">
                                <input type="text" name="address" value="{{$user->address}}" style="
                                background-color: white;
                                border-radius: 3px;
                                direction: rtl;
                                font-size: 15px;
                                ">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-info " style="font-size: 70%;border-radius: 2px;font-weight: 500;">
                                    تعديل</button>

                                {{-- <a class="btn btn-info " target="__blank" href="#"
                                style="font-size: 60%;border-radius: 2px;font-weight: 500;">تعديل</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>







        </div>
    </div>

</div>
