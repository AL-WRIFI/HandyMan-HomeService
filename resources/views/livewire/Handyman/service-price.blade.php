<div class="maincont">
    <div class="container">

        @foreach($categories as $category)
        <div class="container mt-2"
            style="   border-radius: 3px; padding: 15px 15px; box-shadow: 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%), 0 3px 1px -2px rgb(0 0 0 / 20%); background-color: white">


            <button data-bs-toggle="collapse" data-bs-target="{{'#demo'.$category->id}}" class="collapsed" aria-expanded="false"
                style="margin: 0;padding: 0;border: 0;width: 100%; background-color:white">
                <div style="display: flex;flex-direction: row-reverse;justify-content: space-between;">


                    <span style=" font-weight: 600; ">{{$category->name}}</span>

                    <span style=" font-weight: 600; ">
                        < </span>
                </div>
            </button>


            <div id="{{'demo'.$category->id}}" class="mt-3 collapse"
            style="text-align: end; margin-right: 12px; margin-top: -9px; background-color: white;">

            @foreach($category->services as $service)

                <div class=" row px-3" style="flex-direction: row-reverse;">
                    <h5 class="col-10 col-md-11 col-lg-11  p-0 m-0" style="margin-right: 10px; font-size: small;">
                    {{$service->name}}
                    </h5>
                    <h5 class="col-2 col-md-1 col-lg-1 p-1 m-0" style="margin-right: 10px;font-size: small;width: fit-content;background-color: #4880d8;
                        color: white;border-radius: 50px;padding: 5px;text-align: center;
                        height: fit-content;">
                       {{$service->price}}
                    </h5>


                </div>
                <hr class="text-black" style="
                    height: 0.25px;
                    border: 0;">
               @endforeach


            </div>
        </div>
        @endforeach
      </div>

</div>
