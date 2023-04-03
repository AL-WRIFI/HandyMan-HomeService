@extends('admin.layouts.master')

@section('title','تعديل فئة')

@push('css_or_js')
    <link rel="stylesheet" href="{{asset('assets/admin-module')}}/plugins/select2/select2.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/admin-module')}}/plugins/dataTables/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/admin-module')}}/plugins/dataTables/select.dataTables.min.css"/>
@endpush

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-wrap mb-3">
                        <h2 class="page-title">تعديل فئة</h2>
                    </div>

                    <!-- Category Setup -->
                    <div class="card category-setup mb-30">
                        <div class="card-body p-30">
                            <form action="{{route('categories.update',[$category->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-8 mb-5 mb-lg-0">
                                        <div class="d-flex flex-column">
                                            <div class="form-floating mb-30">
                                                <input type="text" name="name" class="form-control"
                                                       value="{{$category->name}}"
                                                       placeholder="category_---name" required>
                                                <label>أسم الفئة</label>
                                            </div>

                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-8 mb-5 mb-lg-0">
                                          <div class="mb-30">
                                            <div class="form-floating">
                                                <textarea type="text" class="form-control"
                                                          name="description">{{$category->description}}</textarea>
                                                <label>الوصف</label>
                                            </div>
                                          </div>
                                       </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex  gap-3 gap-xl-5">
                                            <p class="opacity-75 max-w220">
                                                صيغ الصورة:
                                                 jpg,png,
                                                 jpeg,gif
                                                  
                                                </p>
                                            <div>
                                                <div class="upload-file">
                                                    <input type="file" class="upload-file__input" name="image" >
                                                    <div class="upload-file__img">
                                                        <img
                                                            onerror=""
                                                            src="{{asset('storage/app/public/uploads/TtkkUnELaTafd71Ms9hsSTcXOHY50NttrJI3kKsb.jpg')}}"
                                                            alt="">
                                                    </div>
                                                    <span class="upload-file__edit">
                                                        <span class="material-icons">edit</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-end gap-20 mt-30">
                                            <button class="btn btn--secondary"
                                                    type="reset">اعادة</button>
                                            <button class="btn btn--primary" type="submit">تحديث
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Category Setup -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/admin-module')}}/plugins/select2/select2.min.js"></script>
    
    <script src="{{asset('assets/admin-module')}}/plugins/dataTables/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets/admin-module')}}/plugins/dataTables/dataTables.select.min.js"></script>
@endpush
