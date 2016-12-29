@extends('layouts.template_admin')
@section('header_link')
    <link rel="stylesheet" type="text/css" href="{{asset('css/roomtype_create.css')}}">
@endsection

@section('main-content')

  <div id="wrapper1">
  <div class="container" style="margin-right: 10px">
  <div class="row">
    <h2 class="title-h2">Cập nhập loại phòng</h2>
  </div>
  @if(Session::has('msg'))
    <div class="alert alert-success">
        {{Session::get('msg')}}
    </div>
  @endif
 
 <button type="button" class="btn btn-primary col-md-2 col-md-offset-9" id="themphong"> Thêm phòng</button>

<div id="form_themphong">

    <h2 class="title-h2">Thêm loại phòng</h2>

    <form action="{{route('roomtype.store')}}" method="post" enctype="multipart/form-data" id="form-create-room-type">
        {{csrf_field() }} 
        <input type="hidden" name="hotel_id" value="{{Auth::user()->hotel->id}}">

            <div class="col-md-4 ">
                <label class="control-label">Tên Loại Phòng</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-bed"></i></span>
                    <input type="text" class="form-control" name="roomtype_name" value="{{old('roomtype_name') }}">
                </div>

                <label class="control-label">Số lượng phòng</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    <input type="number" class="form-control" name="roomtype_quantity" value="{{old('roomtype_quantity')}}">
                </div>


                <label class="control-label">Ghi chu</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <label class="control-label">Số khách</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    <input type="number" class="form-control" name="guest_count" value="{{old('guest_count')}}">
                </div>

                <label class="control-label">Giường phụ</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-bed"></i></span>
                    <input type="number" class="form-control" name="bed_count" value="{{old('bed_count')}}">
                </div>

                <label class="control-label">Loại giường</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-bed"></i></span>
                    <select class="form-control" name="bed_type">
                        <option>Giường Đơn</option>
                        <option>Giường Đôi</option>
                        <option>Giường đôi nhỏ</option>
                        <option>Giường Sofa</option>
                        <option>Giường Tầng</option>
                        <option>Giường King</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <label for="">Upload anh</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-paperclip"></i></span>
                    <input class="form-control" type="file" id="exampleInputFile" name="roomtype_picture" value="{{old('roomtype_picture')}}">
                </div>



                <label class="control-label">Diện tích phòng (m2)</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-bed"></i></span>
                    <input type="number" class="form-control" name="area">
                </div>



                <label class="control-label">Hướng phòng</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                    <select class="form-control" name="direct">
                    <option>Biển</option>
                        <option>Công viên</option>
                        <option>Đông quê</option>
                        <option>Đường phố</option>
                        <option>Hồ bơi</option>
                        <option>Núi</option>
                        <option selected>Không rõ</option>
                    </select>
                </div>


        </div>
        <div style=" margin-top: 20px; " class="col-md-10 col-md-offset-1 " >
            <button class=" btn btn-primary col-md-4 " type="submit" id="save-type">Lưu tất cả</button>
            <button class=" btn btn-primary col-md-2 col-md-offset-1" type="reset">Reset</button>
            <button class=" btn btn-primary col-md-4 col-md-offset-1" type="button" id="off"> Tắt  </button>
        </div>
    </form>
</div><!-- end form_themphong-->


    <table border="1" class=" table table table-striped" id="table-room-type">
      <tr>
        <th style="width:2%">Mã</th>
        <th class="col-md-1">Loại phòng</th>
        <th style="width:7%">Số lượng</th>
        <th style="width:7%">Số khách</th>
        <th style="width:8%">Phòng phụ</th>
        <th style="width:7%">Diện tích</th>
        <th class="col-md-1">Hướng</th>
        <th class="col-md-1">Loại phòng</th>
        <th class="col-md-2">Ảnh</th>
        <th class="col-md-1">Action</th>
      </tr>
      <?php  $u=1 ; $list_roomtype = Auth::user()->hotel->roomtype;?>
      @if(!empty($list_roomtype) )
          @foreach($list_roomtype as $room)
                <tr>
                     <td>{{$room->id}}</td>
                    <td>{{$room->roomtype_name}}   </td>
                    <td>{{$room->roomtype_quantity }}  </td>
                    <td>{{$room->guest_count}}   </td>
                    <td>{{$room->bed_count }}  </td>
                    <td>{{$room->area   }}</td>
                    <td>{{$room->direct   }}</td>
                    <td>{{$room->bed_type }}  </td>
                    <td><img src="{{asset(config('path.pictureroomtype').$room->roomtype_picture)}}"</td>
                    <td>
                    <button class="btn btn-primary btn-action"><i class="glyphicon glyphicon-edit"></i></button>
                    <button class="btn btn-danger btn-action"><i class="glyphicon glyphicon-remove"></i></button>
                    </td>
                    <!-- <td>{{$room->hotel_id }}  </td> -->
                </tr>
          @endforeach
        @endif
    </table>
    
      </div><!-- end container -->
     @if($errors->count()>0)
                <div class="alert alert-danger">
                      {{$errors->first('roomtype_name')}}<br>
                      {{$errors->first('roomtype_quantity')}} <br>
                      {{$errors->first('guest_count')}}<br> 
                      {{$errors->first('bed_count')}}<br>
                      {{$errors->first('roomtype_picture')}}<br> 
                      {{$errors->first('area')}}<br> 
                      {{$errors->first('direct')}}<br> 
                      {{$errors->first('bed_type')}}<br> 
                      {{$errors->first('hotel_id')}}<br> 
                 </div>
      @endif
</div><!-- end wrapper -->
@endsection

@section('footer_link')
  <script type="text/javascript" src="{{asset('js/roomtype_create.js')}}"></script>
@endsection