
@extends('layouts.template_admin')
    @section('header_link')
            <link rel="stylesheet" type="text/css" href="{{asset('css/style_room_list.css')}}">
    @endsection
@section('main-content')
    <div id="list-room">
        <div class="row">
        @if(Session::has('msg'))
           <div class="alert alert-success">
               {{ Session::get('msg') }}
           </div>
        @endif
            @foreach($listArrayRoom as $value)
                <div class="col-md-2 portfolio-item panel-room"><!--panel-room-->
                    <div class="img-responsive img-room" 
                            style="background:url('{{asset(config('path.pictureroomtype').'/'.$value->roomtype_picture)}}');  
                                background-size: 200px;
                            "><!--img-room-->
                    @if($value->lease_active==1)
                        <div class="room-status room-guest"><!--room-status-->
                            <h4 class="card-title"> {{$value->room_name}}</h4>
                            <span>Khách: {{ $value->name}}</span>
                        @else
                            <div  class="room-status room-availabel" > <!--room-status-->
                            <h4 class="card-title"> {{$value->room_name}}</h4>
                            <span>Trống</span>
                    @endif    
                            @if(!empty( $value->receive_date))
                                <p class="card-text" >Từ: {{Carbon\Carbon::parse($value->receive_date)->format('d-m-Y H:i')}}</p>
                                <p class="card-text" >Đến: {{Carbon\Carbon::parse($value->leave_date)->format('d-m-Y H:i')}}</p>
                            @endif()
                        </div><!--end room-status-->
                    </div><!--end img-room-->

                    <h4>
                        <a href="#">{{$value->roomtype_name}}</a>
                    </h4>

                    <div class="detail-room-hidden" >
                        <h2 class="title-h2"> {{$value->room_name}}</h2>
                        <div>
                            @if($value->lease_active==1)
                                <div  class="item-detail-guest">
                                    <strong>Khách <i class="glyphicon glyphicon-user"></i>:  {{$value->name}}</strong><br>
                                    <strong>Cmnd <i class="glyphicon glyphicon-home"></i> :{{$value->cmnd}}</strong><br>
                                    <strong>Phone <i class="glyphicon glyphicon-phone"></i>: 0{{$value->phone}}<br></strong>
                                    <strong>Ngay sinh <i class="glyphicon glyphicon-calendar"></i>: {{Carbon\Carbon::parse($value->dob)->format('d-m-Y')}}<br> </strong>

                                    <strong>Hẹn nhận: {{Carbon\Carbon::parse($value->receive_date)->format('d-m-Y H:i')}}
                                    </strong><br>
                                    <strong>Hẹn trả: {{Carbon\Carbon::parse($value->leave_date)->format('d-m-Y H:i')}}</strong>
                                    <br>
                                    <strong>Checkin: {{Carbon\Carbon::parse($value->checkin)->format('d-m-Y H:i')}}</strong>
                                </div>
                                <div class="form-hidden-service">
                                        <!-- <a href="{{ route('bookroom.show',[$value->bookroom_id]) }}" class="btn btn-success"> -->
                                        <a href="{{ route('leaseroom.show',[$value->bookroom_id]) }}" class="btn btn-success">
                                        Chi tiet
                                        </a>
       
                                </div>
                            @endif
                        </div>       
                    </div><!--end detail-room-hidden-->
                </div><!-- end panel-room-->
            @endforeach
            <div class="col-md-2 panel-add-room" >
                 <button class="btn btn-success btn-add-room" >
                 <i class="glyphicon glyphicon-plus"></i>
                 </button>
<!--  form add room -->
                 <form action="{{route('room.store')}}" class="form-add-room" method="post">
                 {{csrf_field()}}
                    <h2 class="title-h2">Thêm phòng</h2>
                    <input type="hidden" name="hotel_id" value="{{Auth::user()->hotel->id}}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Tên phòng</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input  name="room_name" placeholder="Tên phòng" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Ghi chú</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                            <input  name="room_note" placeholder="ghi chú" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Tầng</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                            <input   placeholder="Tầng" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Loại phòng</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
                                <select class="form-control" name="roomtype_id">
                                    @foreach($roomTypes as $roomType)
                                        <option value="{{ $roomType->id }}">{{ $roomType->roomtype_name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>

                     <button class="btn btn-success col-md-3 col-md-offset-4">Thêm</button>
                     <button class="btn btn-success col-md-3 col-md-offset-2" type="reset">Hủy</button>
                 </form>
            </div><!-- end panel-add-room-->
            <div class="col-md-12 alert alert-success">
                @foreach($errors->all() as $error)
                    {{$error}}<br>
                @endforeach
            </div>
        </div><!-- end row -->
    </div><!--end list-room -->



@endsection
