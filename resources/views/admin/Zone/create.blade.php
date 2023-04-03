@extends('adminmodule::layouts.master')

@section('title',translate('zone_setup'))

@push('css_or_js')
    <link rel="stylesheet" href="{{asset('public/assets/admin-module')}}/plugins/dataTables/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="{{asset('public/assets/admin-module')}}/plugins/dataTables/select.dataTables.min.css"/>
@endpush

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-wrap mb-3">
                        <h2 class="page-title"> Zone Setup</h2>
                    </div>

                    <!-- Instructions -->
                    <div class="card zone-setup-instructions mb-30">
                        <div class="card-body p-30">
                            <form action="{{route('admin.zone.store')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row justify-content-between">
                                    <div class="col-lg-5 col-xl-4 mb-5 mb-lg-0">
                                        <h4 class="mb-3 c1"> instructions</h4>
                                        <div class="d-flex flex-column">
                                            <p> create_zone_by_click_on_map_and_connect_the_dots_together</p>

                                            <div class="media mb-2 gap-3 align-items-center">
                                                <img
                                                    src="{{asset('public/assets/admin-module')}}/img/icons/map-drag.png"
                                                    alt="">
                                                <div class="media-body ">
                                                    <p> use_this_to_drag_map_to_find_proper_area</p>
                                                </div>
                                            </div>

                                            <div class="media gap-3 align-items-center">
                                                <img
                                                    src="{{asset('public/assets/admin-module')}}/img/icons/map-draw.png"
                                                    alt="">
                                                <div class="media-body ">
                                                    <p> click_this_icon_to_start_pin_points_in_the_map_and_connect_them_
                                                        to_draw_a_
                                                        zone_._Minimum_3_points_required</p>
                                                </div>
                                            </div>
                                            <div class="map-img mt-4">
                                                <img src="{{asset('public/assets/admin-module')}}/img/instructions.gif"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-floating mb-30">
                                            <input type="text" class="form-control" id="floatingInput" name="name"
                                                   placeholder=" zone_name " required
                                                   value="{{old('name')}}">
                                            <label for="floatingInput"> Zone Name</label>
                                        </div>

                                        <div class="form-group mb-3" style="display: none">
                                            <label class="input-label"
                                                   for="exampleFormControlInput1"> coordinates
                                                    class="input-label-secondary"> draw_your_zone_on_the_map</span>
                                            </label>
                                            <textarea type="text" rows="8" name="coordinates" id="coordinates"
                                                      class="form-control" readonly></textarea>
                                        </div>

                                        <!-- Start Map -->
                                        <div class="map-warper overflow-hidden" style="border-radius: 5px;">
                                            <input id="pac-input" class="controls rounded"
                                                   style="height: 3em;width:fit-content;"
                                                   title=" search_your_location_here " type="text"
                                                   placeholder=" search_here"/>
                                            <div id="map-canvas" style="height: 310px"></div>
                                        </div>
                                        <!-- End Map -->
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-end gap-20 mt-30">
                                            <button class="btn btn--secondary" type="reset"
                                                    id="reset_btn"> reset </button>
                                            <button class="btn btn--primary"
                                                    type="submit"> Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Instructions -->

                    <div class="d-flex justify-content-end border-bottom mx-lg-4 mb-10">
                        <div class="d-flex gap-2 fw-medium">
                            <span class="opacity-75"> Total Zones :</span>
                            <span class="title-color"></span>
                        </div>
                    </div>

                    <div class="card mb-30">
                        <div class="card-body">
                            <div class="data-table-top d-flex flex-wrap gap-10 justify-content-between">
                                <form action="{{url()->current()}}" class="search-form search-form_style-two"
                                      method="POST">
                                    @csrf
                                    <div class="input-group search-form__input_group">
                                            <span class="search-form__icon">
                                                <span class="material-icons">search</span>
                                            </span>
                                        <input type="search" class="theme-input-style search-form__input"
                                               value="" name="search"
                                               placeholder=" search_here">
                                    </div>
                                    <button type="submit" class="btn btn--primary"> search </button>
                                </form>

                                <div class="d-flex flex-wrap align-items-center gap-3">
                                    <div class="dropdown">
                                        <button type="button"
                                                class="btn btn--secondary text-capitalize dropdown-toggle"
                                                data-bs-toggle="dropdown">
                                            <span class="material-icons">file_download</span>  download
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <li><a class="dropdown-item"
                                                   href=""> Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="example" class="table align-middle">
                                    <thead>
                                    <tr>
                                        <th> zone_name</th>
                                        <th> providers</th>
                                        <th> services</th>
                                        <th> status</th>
                                        <th> action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($zones as $key=>$zone)
                                        <tr>
                                            <td>{{$zone->name}}</td>
                                            <td>{{$zone->providers_count}}</td>
                                            <td>{{$zone->categories_count}}</td>
                                            <td>
                                                <label class="switcher" data-bs-toggle="modal"
                                                       data-bs-target="#deactivateAlertModal">
                                                    <input class="switcher_input"
                                                           onclick="route_alert('{{route('status-update',[$zone->id])}}',' want_to_update_status')}}')"
                                                           type="checkbox" {{?'checked':''}}>
                                                    <span class="switcher_control"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="table-actions">
                                                    <a href="{{route('zone.edit',[$zone->id])}}"
                                                       class="table-actions_edit demo_check">
                                                        <span class="material-icons">edit</span>
                                                    </a>
                                                    <button type="button"
                                                            @if(env('APP_ENV')!='demo')
                                                            onclick="form_alert('delete-{{$zone->id}}',' want_to_delete_this_zone')}}?')"
                                                            @endif
                                                            class="table-actions_delete bg-transparent border-0 p-0 demo_check"
                                                            data-bs-toggle="modal" data-bs-target="#deleteAlertModal">
                                                        <span class="material-icons">delete</span>
                                                    </button>
                                                    <form action="{{route('admin.zone.delete',[$zone->id])}}"
                                                          method="post" id="delete-{{$zone->id}}" class="hidden">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end">
                                {!! $zones->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{asset('public/assets/admin-module')}}/plugins/dataTables/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/assets/admin-module')}}/plugins/dataTables/dataTables.select.min.js"></script>

    <script>
        auto_grow();

        function auto_grow() {
            let element = document.getElementById("coordinates");
            element.style.height = "5px";
            element.style.height = (element.scrollHeight) + "px";
        }
    </script>

    @php($api_key=(business_config('google_map', 'third_party'))->live_values)
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{$api_key['map_api_key_client']}}&libraries=drawing,places&v=3.45.8"></script>

    <script>
        var map; // Global declaration of the map
        var drawingManager;
        var lastpolygon = null;
        var polygons = [];

        function resetMap(controlDiv) {
            // Set CSS for the control border.
            const controlUI = document.createElement("div");
            controlUI.style.backgroundColor = "#fff";
            controlUI.style.border = "2px solid #fff";
            controlUI.style.borderRadius = "3px";
            controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
            controlUI.style.cursor = "pointer";
            controlUI.style.marginTop = "8px";
            controlUI.style.marginBottom = "22px";
            controlUI.style.textAlign = "center";
            controlUI.title = "Reset map";
            controlDiv.appendChild(controlUI);
            // Set CSS for the control interior.
            const controlText = document.createElement("div");
            controlText.style.color = "rgb(25,25,25)";
            controlText.style.fontFamily = "Roboto,Arial,sans-serif";
            controlText.style.fontSize = "10px";
            controlText.style.lineHeight = "16px";
            controlText.style.paddingLeft = "2px";
            controlText.style.paddingRight = "2px";
            controlText.innerHTML = "X";
            controlUI.appendChild(controlText);
            // Setup the click event listeners: simply set the map to Chicago.
            controlUI.addEventListener("click", () => {
                lastpolygon.setMap(null);
                $('#coordinates').val('');
            });
        }

        @php($location = session('location'))

        function initialize() {
            var myLatlng = {
                lat: '{{$location['lat']}}',
                lng: '{{$location['lng']}}'
            };

            var myOptions = {
                zoom: 13,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            }
            map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: [google.maps.drawing.OverlayType.POLYGON]
                },
                polygonOptions: {
                    editable: true
                }
            });
            drawingManager.setMap(map);

            //get current location block
            // infoWindow = new google.maps.InfoWindow();
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                        map.setCenter(pos);
                    });
            }

            google.maps.event.addListener(drawingManager, "overlaycomplete", function (event) {
                if (lastpolygon) {
                    lastpolygon.setMap(null);
                }
                $('#coordinates').val(event.overlay.getPath().getArray());
                lastpolygon = event.overlay;
                auto_grow();
            });

            const resetDiv = document.createElement("div");
            resetMap(resetDiv, lastpolygon);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(resetDiv);

            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];

            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length === 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };
                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>

    <script>
        $('#reset_btn').click(function () {
            $('#name').val(null);

            lastpolygon.setMap(null);
            $('#coordinates').val(null);
        })
    </script>
@endpush
