@extends('admin.layouts.master')

@section('title',' أضافة خدمة')

@push('css_or_js')
    <link rel="stylesheet" href="{{asset('assets/admin-module')}}/plugins/select2/select2.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/admin-module')}}/plugins/dataTables/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/admin-module')}}/plugins/dataTables/select.dataTables.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/admin-module')}}/plugins/wysiwyg-editor/froala_editor.min.css"/>
@endpush

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-wrap mb-3">
                        <h2 class="page-title"></h2>
                    </div>

                    <div class="card">
                        <div class="card-body p-30">
                            <form action="{{route('services.store')}}" method="post" enctype="multipart/form-data"
                                  id="service-add-form">
                                @csrf
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-5 mb-5 mb-lg-0">
                                                <div class="mb-30">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" name="name"
                                                               placeholder="service_name*"
                                                               value="{{old('name')}}">
                                                        <label>أسم الخدمة</label>
                                                    </div>
                                                </div>
                                                <div class="mb-30">
                                                    <select class="js-select theme-input-style w-100" name="category_id">
                                                        <option value="0">أخترالفئة</option>
                                                        @foreach($categories as $category)
                                                            <option required=""  value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-floating flex-grow-1">
                                                <input type="number" class="form-control" name="price"                                                       
                                                        required="" value="{{old('price')}}">
                                                <label>السعر</label>
                                            </div>

                                            </div>
                                            <div class="col-lg-3 col-sm-5 mb-5 mb-sm-0">
                                                <div class="d-flex flex-column align-items-center gap-3">
                                                    <p class="mb-0">صورة</p>
                                                    <div>
                                                        <div class="upload-file">
                                                            <input type="file" class="upload-file__input"
                                                                   name="image">
                                                            <div class="upload-file__img">
                                                                <img
                                                                    src="{{asset('assets/admin-module')}}/img/media/upload-file.png"
                                                                    alt="">
                                                            </div>
                                                            <span class="upload-file__edit">
                                                                <span class="material-icons">edit</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <p class="opacity-75 max-w220 mx-auto">
                                                    صيغ الصورة:
                                                    jpg,png,
                                                     jpeg,gif
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            
                                           
                                        </div>
                                    </section>
                                    
                                    <section>
                                    <div class="col-lg-12 mb-5 mt-5 mb-lg-0">
                                                <div class="mb-30">
                                                    <div class="form-floating">
                                                        <textarea type="text" class="form-control"
                                                                  name="description">{{old('description')}}</textarea>
                                                        <label>الوصف</label>
                                                    </div>
                                                </div>
                                            </div>
                                    </section>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-end gap-20 mt-30">
                                            <button class="btn btn--secondary" type="reset">أعادة</button>
                                            <button class="btn btn--primary" type="submit">أضافة</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/admin-module')}}/plugins/select2/select2.min.js"></script>
    
    <script src="{{asset('public/assets/admin-module')}}/plugins/jquery-steps/jquery.steps.min.js"></script>
    <script>
        $("#form-wizard").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true,
            onFinished: function (event, currentIndex) {
                $("#service-add-form")[0].submit();
            }
        });
    </script>

    
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    {{--<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>--}}
    <script src="{{asset('assets/ckeditor/jquery.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('textarea.ckeditor').each(function () {
                CKEDITOR.replace($(this).attr('id'));
            });
        });
    </script>
@endpush
