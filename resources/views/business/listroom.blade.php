@extends('business.app')
@section('content')
<div class="row">
     <div class="col-md-2">
          <div class="list-group">
               <a href="#" class="list-group-item active">Phòng</a>
               <a href="#" class="list-group-item">Tiện nghi phòng</a>
               <a href="#" class="list-group-item">Dịch vụ</a>
               <a href="#" class="list-group-item">Sử dụng dịch vụ</a>
               <a href="#" class="list-group-item">Đặt phòng</a>
          </div>
     </div>

     <div class="col-md-9" style="border: 1px solid black; height: 700px;">
               @foreach ($listRoom as $key => $value)
                    <div class="col-sm-2">
                         <div class="card card-block" >
                              <h4 class="card-title"> {{$value->roomtype_name}}</h4>
                              <p class="card-text">{{$value->active}}</p>
                              <a href="#" class="btn btn-primary">{{$value->room_name}}</a>
                         </div>
                    </div>
               @endforeach
     </div>
</div>

@endsection
