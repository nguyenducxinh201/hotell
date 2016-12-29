@extends('layouts.template_admin')
@section('main-content')
    <div id="show-bill">
@if(Session::has('msg'))
    <script type="text/javascript">
        alert("{{Session::get('msg')}}");
    </script>
@endif
    <h2 class="title-h2">Chi tiết Thuê phòng</h2>
        <table class="table table-striped">
            <thead class="thead-inverse">
                <tr style="background: #373a3c; color: #fff">
                    <th>Mã đặt phòng</th>
                    <th>Tiền cọc</th>
                    <th>Tên khách</th>
                    <th>Ngày sinh</th>
                    <th>SDT</th>
                    <!-- <th>Tinh trang</th> -->
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$bookRooms[0]->bookroom_id}}</td>
                    <td>{{$bookRooms[0]->deposit}}</td>
                    <td>{{$bookRooms[0]->name}}</td>
                    <td>{{Carbon\Carbon::parse($bookRooms[0]->dob)->format('d-m-Y')}}</td>
                    <td>0{{$bookRooms[0]->phone}}</td>
                </tr>         
                </tbody>
        </table>

            <table class="table table-striped">
                <thead>
                    <tr class="tr-top">
                        <th>Phòng</th>
                        <th>Loại phòng</th>
                        <th>Checkin</th>
                        <th>Checkout</th>
                        <!-- <th>Thoi gian</th> -->
                        <!-- <th>Gia</th> -->
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bookRooms as $bookRoom)
                    <tr>
                        <td>{{ $bookRoom->room_name }}</td>
                        <td>{{ $bookRoom->roomtype_name }}</td>
                        <td>{{ Carbon\Carbon::parse($bookRoom->checkin)->format('d-m-Y H:i') }}</td>
                        <td>{{$bookRoom->checkout}}</td>
                        <!-- <td>{{ Carbon\Carbon::parse($bookRoom->checkout)->format('d-m-Y H:i') }}</td> -->
                        <td>{{ $bookRoom->lease_active==1?"Đang thuê":"Đã thanh toán" }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <h2 style="text-align: center"> Chi tiết dịch vụ</h2>
            <table class="table table-striped">
                <thead>
                    <tr class="tr-top">
                    <th>Phòng</th>
                    <th>Tên dịch vụ</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    <th>Tổng tiền</th>
                    <th>Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serviceUsers as $serviceUser)
                    <tr>
                    <td>{{ $serviceUser->room_name }}</td>
                    <td>{{ $serviceUser->service_name }}</td>
                    <td>{{ $serviceUser->service_quantity }}</td>
                    <td>{{ $serviceUser->service_price }}</td>
                    <td>{{ $serviceUser->count_service }}</td>
                    <td>{{ $serviceUser->service_status }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <form method="POST" action="{{ route('bookroom.update',[$bookRooms[0]->bookroom_id])}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="bookroom_active" value="2">
                <button class="btn btn-success col-md-5 col-md-offset-3">Thanh Toán</button>
            </form>
    </div>
@endsection