@extends('layouts.template_admin')
@section('header_link')
    <link rel="stylesheet" type="text/css" href="{{asset('css/bill_show.css')}}">
@endsection
@section('main-content')
    <div id="show-bill" >

        <div class="row">
            <div class="col-md-5">
                <p class="as">
                <img src="{{asset('image/danang1.jpg')}}" class="logo-bill-show">
                Khách sạn {{Auth::user()->hotel->hotel_name}} <br>
                Địa chỉ: {{Auth::user()->hotel->city}}<br>
                Đường: {{Auth::user()->hotel->street}}</p>
            </div>
        </div>

        <h2 class="title-h2"> Chi tiết hóa đơn</h2>

        <div class="row profile-cus">
            <div class="col-md-3">
                <h3> Thông tin khách hàng</h3>
                <p>Mã đặt phòng: <strong>{{$bookrooms->id}}</strong></p>
                <p>Tiền cọc: <strong> {{$bookrooms->deposit}}</strong> </p>
                <p>Tên khách: <strong> {{$bookrooms->user->name}}</strong></p>
            </div>

            <div class="col-md-8 show-bill-right">
                <div class="div-tienphong">
                    <h3>Tiền phòng </h3>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Phòng</th>
                                <th>Loại phòng</th>
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th>Thời gian</th>
                                <th>Giá</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $tongtien=0; ?>
                            @foreach($detail as $value)
                            <tr>
                                <td>{{$value->room_name}}</td>
                                <td>{{$value->roomtype_name}}</td>
                                <td>{{$value->checkin}}</td>
                                <td>{{$value->checkout}}</td>
                                <td>{{$value->count_day>0?$value->count_day.' ngày':$value->count_hour.'giờ'}}</td>
                                <td>{{$value->count_day>0?number_format($value->day_price):
                                    $value->count_hour>3?number_format($value->day_price):
                                    $value->count_hour==3?number_format($value->third_hours):
                                    $value->count_hour==2?number_format($value->second_hours):
                                    number_format($value->first_hours) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h3> Chi tiết dịch vụ</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Phòng</th>
                                <th>Dịch vụ</th>
                                <th>Giá tiền</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{$service->room_name}}</td>
                                    <td>{{$service->service_name}}</td>
                                    <td>{{  number_format($service->service_price) }}</td>
                                    <td>{{  $service->service_quantity }}</td>
                                    <td>{{  number_format($service->tongdichvu) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h3>Tổng Hợp</h3>
                    <table class="table">
                        <tr>
                            <th>Phòng</th>
                            <th>Tiền phòng</th>
                            <th>Tiền dịch vụ</th>
                            <th>Tổng</th>
                        </tr>
                        <?php $count = 0?>
                        @foreach($bills as $bill)
                        <tr>
                            <td>{{$bill->room_name}}</td>
                            <td>{{ number_format($bill->room_price) }}</td>
                            <td>{{ number_format($bill->service_price) }}</td>
                            <td>{{ number_format($bill->count_price) }} VND</td>
                        </tr>
                        <?php $count += $bill->count_price ?>
                        @endforeach
                    </table>
                    <h3 style="float: right;">Tổng tiền: {{ number_format($count) }} VND</h3>
                </div><!-- end tien phong -->
            </div> <!-- end show-bill-right -->
        </div><!--end profile-cus -->
    </div>.
    <button class="btn btn-success col-md-2" style="clear:both; float: right; margin-right: 30px;"
    onclick="this.style.display = 'none'; window.print()"> 

    <i class="glyphicon glyphicon-print" style="font-size: 25px;"></i></button>
@endsection