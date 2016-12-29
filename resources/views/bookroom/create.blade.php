@extends('layouts.template_admin')
@section('main-content')

<div id="bookroom">
<div class="checkin">
<h2 class="title-h2"> Tìm kiếm Phòng</h2>
<div class="col-md-12">
    <form class="search-date" action="{{ url('business/searchdate') }}" method="get">
        <div class="col-md-6">
            <label>Ngày hẹn nhận</label>
            <input type="text" name="receive_date" class="form-control receive_date"
            value="{{ (!empty($fromDate))?$fromDate:date('d/m/Y') }}" readonly>
        </div>
        <div class="col-md-6">
            <label>Ngày hẹn trả</label>
            <input type="text" name="leave_date" class="form-control releave_date" readonly
            value="{{ (!empty($toDate))?$toDate:date('d/m/Y',strtotime('tomorrow')) }}">
        </div>
<!--         <div class="col-md-12">
            <label>Nhan ngay &nbsp &nbsp</label><input type="checkbox" name="chk_nhanngay">
        </div> -->
            <div class="col-md-6">
            <label>Giờ hẹn nhận</label>
            <input type="text" name="receive_time" class="form-control receive_time"
           value="{{ (!empty($fromTime))?$fromTime:date('H:i') }}" >
        </div>
        <div class="col-md-6">
            <label>Giờ hẹn trả</label>
         <input type="text" name="leave_time" class="form-control releave_time" value="{{ (!empty($toTime))?$toTime:date('H:i') }}" >
        </div>

        <input type="submit"  class="btn btn-primary col-md-6 col-md-offset-3" value="Search">
    </form>

</div>
        <form class="form-checkin" method="post" action="{{route('bookroom.store')}}">
        {{csrf_field() }}

    <div class="col-md-5 left_checkin">
    <h2 class="checkin-form-h2">Form Đặt phòng</h2>

        <div class="form-group">
        <label class="col-md-3 control-label">Tên khách</label>

        <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input  name="name" placeholder="Tên khách" class="form-control"  type="text" autofocus="">
            </div>
        </div>
    </div>

        <div class="form-group">
        <label class="col-md-3 control-label">Phone</label>

        <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input  name="phone" placeholder="số điên thoại" class="form-control"  type="number">
            </div>
        </div>
    </div>



    <div class="form-group">
        <label class="col-md-3 control-label">Cmnd</label>

        <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                <input  name="cmnd" placeholder="chứng minh nhân dân" class="form-control"  type="number">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Ngày sinh</label>
        <input type="hidden" name="role" value="0">
        <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input  name="dob"  class="form-control dob"  type="text" >
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label">Tiền cọc</label>
        <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                <input  name="deposit"  class="form-control"  type="number">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Tổng tiền</label>
        <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                <input  name="tong_tien"  class="form-control tong_tien"  type="number"  value="0">
            </div>
        </div>
    </div>



        <div class="form-group">
        <label class="col-md-3 control-label">Danh sách phòng</label>
        <div class="col-md-9 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <input  class="form-control listphong"   >
            </div>
        </div>
    </div>







        <div style="display: none">
            <label>Ngày hẹn nhận</label>
            <input  name="receive_date" class="form-control receive_date" type="" readonly
            value="{{!empty($fromDate)?$fromDate:''}}"
            >
            <label>Ngày hẹn trả</label>
            <input name="leave_date" class="form-control releave_date" type="" readonly
            value="{{!empty($toDate)?$toDate:''}}">

            <label>Giờ hẹn nhận</label>
            <input type="text" name="receive_time"  class="form-control" value="{{ (!empty($fromTime))?$fromTime:date('H:i') }}"  readonly>
            <label>Giờ hẹn trả</label>
            <input type="text" name="leave_time" class="form-control" value="{{ (!empty($toTime))?$toTime:date('H:i') }}" readonly>
        </div>





            <input type="hidden" class="length" value="{{empty($lengthOfAd)?'0':$lengthOfAd}}"><br>

            <input class="btn btn-primary col-md-4 col-md-offset-2" value="Đặt phòng" type="submit">
    </div>
<!-- end ------------------------------------------------ -->
    <div class="col-md-7 right_checkin">
     <h2 class="h2-phong-trong">Danh sách phòng trống</h2>
     <table class="table table-striped">
     <thead>
         <tr class="tr-list-room-available">
             <th>Phòng số</th>
             <th>Loại phòng</th>
             <th>1 Gio</th>
             <th>2 Gio</th>
             <th>3 Gio</th>
             <th>1 Ngay</th>
             <th>Chọn</th>
         </tr>
         </thead>
         <tbody>
         @if(!empty($roomAvailable))
             @foreach($roomAvailable as $value)
                <tr class="cccc" id="cccc">
                    <td class="room_name">{{ $value->room_name}}</td>
                    <td>{{ $value->roomtype_name}}</td>
                    <td>{{ number_format($value->first_hours) }}</td>
                    <td>{{ number_format($value->second_hours) }}</td>
                    <td>{{ number_format($value->third_hours) }}</td>
                    <td class="price" id="price">{{ number_format($value->day_price)}}</td>
                    <td>
                    <input type="checkbox" class="chk-room" name="room[]" value="{{$value->id}}">
                    </td>
                </tr>
             @endforeach
         @endif
         </tbody>
     </table>
    </div>
</div>
</div><!--end bookroom-->

    <script type="text/javascript">
                   $('.releave_date').datepicker({format: "dd/mm/yyyy", autoClose: true});
                   $('.receive_date').datepicker({format: "dd/mm/yyyy", autoClose: true});
                   $('.dob').datepicker({format: "dd/mm/yyyy", autoClose: true});

                    // $('.releave_date').on('changeDate', function(ev){
                    //     // $('.receive_dates').val($(this).val());
                    //     $(this).datepicker('hide');
                    // });
                    // $('.receive_date').on('changeDate', function(ev){
                    //     $(this).datepicker('hide');
                    // });
                    // $('.dob').on('changeDate', function(ev){
                    //     $(this).datepicker('hide');
                    // });

                    $('.receive_time, .releave_time').timepicker({
                        timeFormat: 'H:i'
                   });

                    $('.chk-room').click(function(){
                       var arr=[], money,money1,money_x=0,room_name;
                       $('.chk-room:checked').each(function(){
                         money = $(this).parent().parent('.cccc').children(".price").html();
                         room_name= $(this).parent().parent('.cccc').children('.room_name').html();
                         money1 = parseInt(money)* parseInt($('.length').val());
                         money_x+=money1;
                         // money_x =parseInt($('.tong_tien').val());
                         // var money=ax.children(".price").html();
                         arr.push(room_name);
                       });
                         $('.tong_tien').val(money_x);
                       $('.listphong').val(arr);
                    });
    </script>
@endsection
