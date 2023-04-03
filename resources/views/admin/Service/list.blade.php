@extends('admin.layouts.master')

@section('title','الخدمات')

@push('css_or_js')
    <link rel="stylesheet" href="{{asset('assets/admin-module')}}/plugins/dataTables/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/admin-module')}}/plugins/dataTables/select.dataTables.min.css"/>
@endpush

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-wrap d-flex justify-content-between flex-wrap align-items-center gap-3 mb-3">
                        <h2 class="page-title">قائمة الخدمات</h2>
                        <div>
                            <a href="{{route('services.create')}}" class="btn btn--primary">
                                <span class="material-icons">add</span>
                                اضافة خدمة
                            </a>
                        </div>
                    </div>

                    <div
                        class="d-flex flex-wrap justify-content-between align-items-center border-bottom mx-lg-4 mb-10 gap-3">
                        <ul class="nav nav--tabs">
                            <li class="nav-item">
                                
                            <a class="nav-link {{$status=='all'?'active':''}}"
                                   href="{{ URL::current() }}?status=all">
                                   الكل
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$status=='active'?'active':''}}"
                                   href="{{ URL::current() }}?status=active">
                                   نشط
                                </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{$status=='inactive'?'active':''}}"
                                   href="{{URL::current()}}?status=inactive">
                                   خامل
                                </a>
                            </li>
                        </ul>

                        <div class="d-flex gap-2 fw-medium">
                             <span class="opacity-75">مجموع الخدمات:</span>
                            <span class="title-color">{{$services->count()}}</span>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="all-tab-pane">
                            <div class="card">
                                <div class="card-body">
                                    <div class="data-table-top d-flex flex-wrap gap-10 justify-content-between">
                                    <form action="{{URL::current()}}?status={{$status}}"
                                          class="search-form search-form_style-two"
                                              method="GET">
                                           
                                            <div class="input-group search-form__input_group">
                                            <span class="search-form__icon">
                                                <span class="material-icons">search</span>
                                            </span>
                                                <input type="search" class="theme-input-style search-form__input"
                                                       value="{{ $search }}" name="search"
                                                       placeholder="ابحث هنا">
                                            </div>
                                            <button type="submit" class="btn btn--primary">البحث</button>
                                        </form>
                                        
                                        
                                    </div>

                                    <div class="table-responsive">
                                        <table id="example" class="table align-middle">
                                            <thead >
                                            <tr>
                                                <th>رقم</th>
                                                <th>الأسم</th>
                                                <th>الفئة </th>
                                                <th>الحالة</th>
                                                <th>تحرير</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($services as $key=>$service)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$service->name}}</td>
                                                    <td>
                                                    {{$service->category->name ?? ''}}
                                                    </td>
                                                    
                                                    <td>
                                                        @livewire('status-form',[
                                                            'model'=> $service,
                                                            'field'=> 'status',
                                                        ])
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-actions">
                                                            <a href="{{route('services.edit',[$service->id])}}"
                                                               class="table-actions_edit demo_check">
                                                                <span class="material-icons">edit</span>
                                                            </a>
                                                            
                                                            <form
                                                                action="{{route('services.destroy',[$service->id])}}"
                                                                method="post" id="delete-{{$service->id}}"
                                                                class="hidden">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"                                                                 
                                                                class="table-actions_delete bg-transparent border-0 p-0 demo_check">
                                                               <span class="material-icons">delete</span>
                                                           </button>
                                                                
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    
@endpush
