@extends('layouts.template_admin')
@section('main-content')
<div id="capnhap1">
    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-3"><h2 style=""> Welcome to Hotel</h2></div>
    </div>
                    <script>
                  $( function() {
                    var availableTags = [
                        "An Giang",
                        "Bà Rịa - Vũng Tàu",
                        "Bắc Giang",
                        "Bắc Kạn",
                        "Bạc Liêu",
                        "Bắc Ninh",
                        "Bến Tre",
                        "Bình Định",
                        "Bình Dương",
                        "Bình Phước",
                        "Bình Thuận",
                        "Cà Mau",
                        "Cao Bằng",
                        "Đắk Lắk",
                        "Đắk Nông",
                        "Điện Biên",
                        "Đồng Nai",
                        "Đồng Tháp",
                        "Gia Lai",
                        "Hà Giang",
                        "Hà Nam",
                        "Hà Tĩnh",
                        "Hải Dương",
                        "Hậu Giang",
                        "Hòa Bình",
                        "Hưng Yên",
                        "Khánh Hòa",
                        "Kiên Giang",
                        "Kon Tum",
                        "Lai Châu",
                        "Lâm Đồng",
                        "Lạng Sơn",
                        "Lào Cai",
                        "Long An",
                       " Nam Định",
                       " Nghệ An",
                       " Ninh Bình",
                       " Ninh Thuận",
                       " Phú Thọ",
                       " Quảng Bình",
                       " Quảng Nam",
                       " Quảng Ngãi",
                       " Quảng Ninh",
                       " Quảng Trị",
                       " Sóc Trăng",
                       " Sơn La",
                       "Tây Ninh",
                       "Thái Bình",
                        "Thái Nguyên",
                        "Thanh Hóa",
                        "Thừa Thiên Huế",
                        "Tiền Giang",
                        "Trà Vinh",
                        "Tuyên Quang",
                        "Vĩnh Long",
                        "Vĩnh Phúc",
                        "Yên Bái",
                        "Phú Yên",
                        "Cần Thơ",
                        "Đà Nẵng",
                        "Hải Phòng",
                        "Hà Nội",
                        "TP HCM",
                        "Nha Trang",
                        "Đà Lạt"
                    ];
                    $( "#search" ).autocomplete({
                      source: availableTags
                    });
                  } );
                  </script>
    {{Form::open()}}

    {{Form::close()}}
    <form method="post" id="form-hotel-detail" action="{{ route('hotel.store')}}" autocomplete="off">
        {{csrf_field() }}

        <div class="col-md-5">
            <label for="">Tên khách sạn</label>
            <input class="form-control" type="" value="{{ old('hotel_name')}}" name="hotel_name">
            @if($errors->has('hotel_name')) 
                <span class="error">
                    <strong> {{$errors->first('hotel_name')}}</strong>
                </span>
            @endif
        </div> 

        <div class="col-md-5">
            <label for="">Loại Khách sạn</label>
            <select name="hotel_type" value="{{old('hotel_type')}}" class="form-control">
                <option value="khach san" selected >Khách sạn</option>
                <option value="Biet thu">Biệt thự</option>
                <option value="Can ho">Căn hộ</option>
                <option value="Resort">Resort</option>
            </select>
            @if($errors->has('type')) 
                <span class="error">
                    <strong> {{$errors->first('type')}}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-5">
            <label for="">Thành Phố</label>
            <input class="form-control" type="text" value="{{ old('city')}}" name="city" id="search" >
            @if($errors->has('city')) 
                <span class="error">
                    <strong> {{$errors->first('city')}}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-5">
            <label for="">Số sao</label>
            <select name="rank_star" class="form-control" value="{{old('rank_star')}}">
                <option value="1">1✯</option>
                <option value="2">2✯✯</option>
                <option value="3">3✯✯✯</option>
                <option value="4">4✯✯✯✯</option>
                <option value="5">5✯✯✯✯✯</option>
            </select>
            @if($errors->has('rank_star')) 
                <span class="error">
                    <strong> {{$errors->first('rank_star')}}</strong>
                </span>
            @endif
        </div>

        <div class="col-md-5">
            <label for="">Quận</label>
            <input class="form-control" type="" value="{{ old('township')}}" name="township">
            @if($errors->has('township')) 
                <span class="error">
                    <strong> {{$errors->first('township')}}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-5">
            <label for="">Tên đường</label>
            <input class="form-control" type="" value="{{ old('street')}}" name="street">
            @if($errors->has('street')) 
                <span class="error">
                    <strong> {{$errors->first('street')}}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-5">
            <label for="">Số điện thoại</label>
            <input class="form-control" type="number" value="{{ old('hotel_phone')}}" name="hotel_phone">
            @if($errors->has('hotel_phone')) 
                <span class="error">
                    <strong> {{$errors->first('hotel_phone')}}</strong>
                </span>
            @endif
        </div>

        <div class="col-md-5">
            <label for="">Website Khách sạn</label>
            <input class="form-control" type="" value="{{ old('website')}}" name="website">
            @if($errors->has('website')) 
                <span class="error">
                    <strong> {{$errors->first('website')}}</strong>
                </span>
            @endif
        </div>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="active" value="1">
        <input type="submit" id="submit-capnhap1" class="btn btn-primary col-md-10"  style="margin-top: 20px">
    </form>
    </div>
</div>

@endsection
