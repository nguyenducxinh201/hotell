@extends('layouts.template_admin')
@section('main-content')
    <div id="sudungdichvu">
    <h2 class="title-h2">Sử dụng dịch vụ</h2>

    <button class="btn btn-success btn-action">
        <i class="glyphicon glyphicon-plus btn-add-use_service"></i>
    </button>
        <form class="use-service form-add-use-service" method="post" action="{{route('serviceuser.store')}}">
        {{csrf_field()}}
        <div class="col-md-5 form-add-service-user">
                <label>Tên dịch vụ</label>
                <select name="service_id" class="form-control">
                    @foreach($services as $service)
                        <option value=" {{  $service->id}}">{{ $service->service_name }}</option>
                    @endforeach
                </select>

                <label>Số lượng</label>
                <input type="number" name="service_quantity"  class="form-control">

                <label>Phòng</label>
                 <select name="room_id" class="form-control">
                   @foreach($rooms as $room)
                    <option value="{{ $room->id }}"> {{$room->room_name}}</option>
                   @endforeach
                </select>               

                <input type="hidden" name="hotel_id" value="{{Auth::user()->hotel->id}}">

             <div class="" style="margin-top:15px">
                    <button class="btn btn-success">Xác nhận</button>
            </div>
            @if(Session::has('msg'))
                <div class="alert alert-success">{{Session::get('msg')}}</div>
            @endif

            @foreach($errors->all() as $error)
                <div class="alert alert-warning">{{ $error }}</div>
            @endforeach
         </div>   
        </form >  
        <table class="table">
                <thead>
                    <tr>
                        <th>Tên dịch vụ</th>
                        <th>Số lượng</th>
                        <th>Phòng</th>
                        <th>Ngày sử dụng</th>
                        <th>Tình trạng</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($useServices as $useService)
                    <tr>
                        <td>{{$useService->service_name}}</td>
                        <td>{{ $useService->service_quantity }}</td>
                        <td>{{ $useService->room_name }}</td>
                        <td>{{ $useService->created_at}}</td>
                        <td>{{ $useService->service_status==0?"Chưa thanh toán":"Đã thanh toán"}}</td>
                        <td>
                            <button class="btn btn-danger btn-action">
                            <i class="glyphicon glyphicon-remove"></i>
                            </button>
                            <button class="btn btn-success btn-action">
                            <i class="glyphicon glyphicon-ok"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </table>  
    </div>
@endsection