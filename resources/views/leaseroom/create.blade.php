@extends('layouts.template_admin')
@section('main-content')

<div id="bookroom">
<div class="checkin">
<div class="col-md-12">
    <form class="search-date" action="{{ url('leasesearch') }}" method="get">
        <div class="col-md-6">
            <label>Ngay nhan</label>
            <input type="text" name="receive_date" class="form-control receive_date" 
            value="{{ (!empty($fromDate))?$fromDate:date('d/m/Y') }}" readonly>
        </div>
        <div class="col-md-6">
            <label>Ngay hen Tra</label>
            <input type="text" name="leave_date" class="form-control releave_date" readonly
            value="{{ (!empty($toDate))?$toDate:date('d/m/Y',strtotime('tomorrow')) }}">
        </div>

        <div class="col-md-12">
            <select class="form-control col-md-6">
                <option>Theo gio</option>
                <option>Theo ngay</option>
            </select>
            <input type="text" name="" class="form-control col-md-6">
        </div>

        <div class="col-md-6">
            <label>Gio nhan</label>
            <input type="text" name="receive_time" class="form-control yyyy" value="{{date('H:i')}}">
        </div>

        <div class="col-md-6">
            <label>Gio hen tra</label>
            <input type="text" name="leave_time" class="form-control xxxx " 
           >
           <script type="text/javascript">
               $('.xxxx,.yyyy').timepicker({
                    timeFormat: 'H:i'
               });
               // $('.yyyy').timepicker();
           </script>
        </div>

        <input type="submit"  class="btn btn-primary col-md-6 col-md-offset-3" value="Search">
    </form>

</div>
        <form class="form-checkin" method="post" action="{{route('bookroom.store')}}">
        {{csrf_field() }}
    <div class="col-md-6 left_checkin">
    <h2>Checkin Form</h2>

        <label>Ten khach</label>
            <input  name="name" class="form-control" value="ducxinh">
            <label>Cmnd</label>
            <input  name="cmnd" class="form-control" type="number" value="123456799">
            <label>Phone</label>
            <input  name="phone" class="form-control" type="number" value="0905443136">
            <label>Ngay sinh</label>
            <input type="hidden" name="role" value="0">
            <input  name="dob" class="form-control dob" type="text" readonly="" value="20/01/1994">
            <label>Tien coc</label>
            <input  name="deposit" class="form-control" type="number" value="0" value="500000">

            <label>Ngay  hen nhan</label>
            <input  name="receive_date" class="form-control receive_date" type="" readonly
                value="{{!empty($fromDate)?$fromDate:''}}" 
            >
            <label>Ngay hen tra</label>
            <input name="leave_date" class="form-control releave_date" type="" readonly
            value="{{!empty($toDate)?$toDate:''}}">

            <label>Tong tien</label>
            <input name="tong_tien" class="form-control tong_tien" type="number" readonly value="0">

            <label>Danh sach phong</label>
            <input class="form-control listphong" type="" readonly>

            <input type="hidden" class="length" value="{{empty($lengthOfAd)?'0':$lengthOfAd}}"><br>

            <input class="btn btn-success" value="Check-in" type="submit">
    </div>
    <div class="col-md-6 right_checkin">
     <h2>Phong con trong</h2>
     <table class="table">
         <tr>
             <th>Phong so</th>
             <th>Loai Phong</th>
             <th>Don gia</th>
             <th>Chon</th>
         </tr>
         @if(!empty($roomAvailable))
             @foreach($roomAvailable as $value)
                <tr class="cccc" id="cccc">
                    <td>{{ $value->room_name}}</td>
                    <td>{{ $value->roomtype_name}}</td>
                    <td class="price" id="price">{{ $value->day_price}}</td>
                    <td>
                    <input type="checkbox" class="chk-room" name="room[]" value="{{$value->id}}">
                    </td>
                </tr>
             @endforeach
         @endif
     </table>
    </div>
</div>
</div><!--end bookroom-->

    <script type="text/javascript">
                   $('.releave_date').datepicker({format: "dd/mm/yyyy", autoClose: true});
                   $('.receive_date').datepicker({format: "dd/mm/yyyy", autoClose: true});
                   $('.dob').datepicker({format: "dd/mm/yyyy", autoClose: true});

                    $('.releave_date').on('changeDate', function(ev){
                        // $('.receive_dates').val($(this).val());
                        $(this).datepicker('hide');
                    });
                    $('.receive_date').on('changeDate', function(ev){
                        $(this).datepicker('hide');
                    });  
                    $('.dob').on('changeDate', function(ev){
                        $(this).datepicker('hide');
                    }); 

                    $('.chk-room').click(function(){
                       var arr=[], money,money1,money_x=0;
                       $('.chk-room:checked').each(function(){
                         money = $(this).parent().parent('.cccc').children(".price").html();
                         money1 = parseInt(money)* parseInt($('.length').val());
                         money_x+=money1;
                         // money_x =parseInt($('.tong_tien').val());
                         // var money=ax.children(".price").html();
                         arr.push($(this).val());
                       });
                         $('.tong_tien').val(money_x);
                       $('.listphong').val(arr);
                    });
    </script>
@endsection