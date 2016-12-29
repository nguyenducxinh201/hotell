@extends('includes')
@section('head')
       <link rel="stylesheet" type="text/css" href="{{Asset('index/css/getcity.css')}}"> 
     <script src="{{ Asset('js/jquery/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ Asset('js/validate/jquery.validate.js') }}"></script>
 
@endsection

@section('content')
<div id="wrapper">
        @include('index.head')
        <div id="index1">
            <div class="container">
                    <div class="form_search">
                        <table>
                            <tr>
                                <td>Bạn muốn đi đâu</td>
                                <td>Nhận phòng</td>
                                <td>Trả phòng</td>
                                <td>Du khách</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="phong1"><input  class="form-control "  name="city" placeholder="Thanh pho, khach san, diem du lich" value="{{ $input['city'] }}"></td>
                                <td><input  class="form-control phong2"  name="checkin" value="{{$input['checkin']}}"></td>
                                <td><input  class="form-control phong3"  name="checkout" value="{{$input['checkout']}}"></td>
                                <td><input  class="form-control phong4"  name=""></td>
                                <td><button  class="btn btn-primary" type="submit" name="">Tìm kiếm</button></td>
                            </tr>
                        </table>
                        <div class="chonloctimkiem">
                        </div>
                    </div>
            </div>
        </div>

<div id="index1_content">
<div class="container">
        <div style="width: 25%; float: left;">
            <div class="panel panel-primary" id="timkiem">
            <div class="panel-heading">
            <h3 class="panel-title">Lọc kết quả</h3>
            </div>
            <div class="panel-body">
            <label for="pwd">Theo mức giá:</label>
            <div class="checkbox">
            <label><input type="checkbox" value="">Dưới 500,000 VNĐ</label>
            </div>
            <div class="checkbox">
            <label><input type="checkbox" value="">500,000 - 1,000,000 VNĐ</label>
            </div>
            <div class="checkbox ">
            <label><input type="checkbox" value="">1,000,000 - 1,500,000 VNĐ</label>
            </div>
            <div class="checkbox">
            <label><input type="checkbox" value="">1,500,000 - 2,000,000 VNĐ</label>
            </div>
            <div class="checkbox ">
            <label><input type="checkbox" value="">2,000,000 - 3,000,000 VNĐ</label>
            </div>
            <div class="checkbox ">
            <label><input type="checkbox" value="">Trên 3,000,000 VNĐ</label>
            </div>
            <label for="pwd">Xếp hạng:</label>
            <div class="checkbox">
            <label><input type="checkbox" value="">***** 5 sao</label>
            </div>
            <div class="checkbox">
            <label><input type="checkbox" value="">**** 4 sao</label>
            </div>
            <div class="checkbox ">
            <label><input type="checkbox" value="">*** 3 sao</label>
            </div>
            <div class="checkbox">
            <label><input type="checkbox" value="">** 2 sao</label>
            </div>
            <div class="checkbox ">
            <label><input type="checkbox" value="">* 1 sao</label>
            </div>
            <label for="pwd">Tiện nghi:</label>
            <div class="checkbox">
            <label><input type="checkbox" value="">Có bãi đổ xe</label>
            </div>
            <div class="checkbox">
            <label><input type="checkbox" value="">Có hồ bơi</label>
            </div>
            <div class="checkbox ">
            <label><input type="checkbox" value="">Có thang máy</label>
            </div>
            <div class="checkbox">
            <label><input type="checkbox" value="">Có truyền hình cáp</label>
            </div>
            <div class="checkbox ">
            <label><input type="checkbox" value="">Có nhà hàng</label>
            </div>
            <div class="checkbox ">
            <label><input type="checkbox" value="">Có Wifi free</label>
            </div>
            <div class="checkbox">
            <label><input type="checkbox" value="">Có dịch vụ giặt</label>
            </div>
            <div class="checkbox ">
            <label><input type="checkbox" value="">Có phòng họp</label>
            </div>
            </div>
            </div>
            <!-- end locketqua-->
            <!--quanhuyen-->
            <div class="panel panel-primary" id="timkiem">
            <div class="panel-heading">
            <h3 class="panel-title">Quận huyện</h3>
            </div>
            <div class="panel-body">
            <div class="list-group">
            <a href="#" class="list-group-item">Hải Châu</a>
            <a href="#" class="list-group-item">Thanh Khê</a>
            <a href="#" class="list-group-item">Sơn Trà</a>
            <a href="#" class="list-group-item">Cẩm Lệ</a>
            <a href="#" class="list-group-item">Hòa Vang</a>
            <a href="#" class="list-group-item">Liên Chiểu</a>
            <a href="#" class="list-group-item">Ngũ Hành Sơn</a>
            <a href="#" class="list-group-item">Hoàng Sa</a>
            </div>
            </div>
            </div>
        </div>

        <div  id="index1_right">
            <div id="nav">
            <h3>{{$input['city']}}: 200 khach san </h3>
                <ul>
                    <li>Sap xep theo</li>
                    <li>Duoc goi y</li>
                    <li>Gia & Uu dai</li>
                    <li>Uu Dai</li>
                    <li>Sao</li>
                    <li>Danh gia cua khach</li>
                </ul>
            </div>
            @if(!empty($hotel))
                @foreach($hotel as $value)
                    <div class="itemhotel" >
                        <div class="col-md-4 subitem sub1" >
                        <form method="get" action="{{url('indexx/hotell')}}" style="height: 100%; width:100%">
                            <input type="hidden" name="checkin" value="{{$input['checkin']}}">
                            <input type="hidden" name="checkout" value="{{$input['checkout']}}">
                            <input type="hidden" name="hotel_id" value="{{$value->id}}">
                            <!-- <a href="{{route('indexx',['id'=>$value->id,'checkin'=>$input['checkin'],'checkout'=>$input['checkout'] ])}}"> -->
                            <button style="height: 100%"><img src="{{Asset('image/danang1.jpg')}}"></button>
                        <!-- </a> -->
                        </form>
                        </div>
                        <div class="col-md-5 subitem sub2" >
                            <p>{{$value->hotel_name}}</p>
                            <p> <strong>Dia chi:</strong> {{$value->township}} - {{$value->city}}</p>
                            <p><strong>Hang sao:</strong>
                            @for($i=0;$i<$value->rank_star;$i++)
                                <span class=" glyphicon glyphicon-star-empty"></span>
                            @endfor
                            </p>
                        </div>
                        <div class="col-md-3 subitem sub3">
                            <div style="height: 60%; width: 100%" class="top">
                                <p>Danh gia<br>8.5</p>
                            </div>
                            <div>
                                <i>Gia moi dem it nhat tu<i>
                                <p><strong style="font-size: 25px">1.000.000 </strong>VND</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>   <!-- end index1-right -->
</div><!-- end container -->
</div>
 </div>   


@endsection