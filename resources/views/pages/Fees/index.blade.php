@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    اضافة رسوم جديدة
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    اضافة رسوم جديدة
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif


                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <a class="btn btn-success icon left"

                               href="{{route('Fees.create')}}">اضافة رسوم جديدة <i class="fa fa-plus"></i></a>
                        </div>

                    </div>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>الاسم</th>
                                <th>المبلغ</th>
                                <th>المرحلة الدراسية</th>
                                <th>الصف الدراسي</th>
                                <th>السنة الدراسية</th>
                                <th>ملاحظات</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fees as $fee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$fee->title}}</td>
                                    <td>{{ number_format($fee->amount, 2) }}</td>
                                    <td>{{$fee->grade->Name}}</td>
                                    <td>{{$fee->classroom->Name_Class}}</td>
                                    <td>{{$fee->year}}</td>
                                    <td>{{$fee->description}}</td>
                                    <td>
                                        <a href="{{route('Fees.edit',$fee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee{{$fee->id}}" title="حذف"><i class="fa fa-trash"></i></button>
                                        <a href="#" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>

                                    </td>
                                </tr>
                            @include('pages.fees.delete')
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
