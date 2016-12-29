@extends('layouts.template_admin')
@section('main-content')
<div id="leaseroom">
    <h2 class="title-h2">Thuê Phòng</h2>

    <form action="{{route('searchlease')}}" method="get" class="form-search-guest">
        <div class="col-md-3 col-md-offset-9">
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control " placeholder="Tim khach hang"  name="id"/>
                    <span class="input-group-btn">
                        <button class="btn btn-info " type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr class="tr-top">
                <th>Mã đặt phòng</th>
                <th>Phòng</th>
                <th>Checkin</th>
                <th>Checkout</th>
                <th>Khách</th>
                <th>Tình trạng</th>
                <th>Action</th>
            </tr>
        </thead> 
        <tbody>
        @foreach($leaseRooms as $leaseRoom)
            <tr>
                <td>{{ $leaseRoom->bookroom_id }}</td>
                <td>{{ $leaseRoom->room_name }}</td>
                <td>{{ Carbon\Carbon::parse($leaseRoom->checkin)->format('d-m-Y H:i') }}</td>
                <td>{{ $leaseRoom->checkout }}</td>
                <td><a href="{{route('guest.show',[$leaseRoom->user_id])}}">{{ $leaseRoom->name }}</a></td>
                <td>{{ $leaseRoom->lease_active==1?"Đang thuê":"Đã trả" }}</td>
                <td>
                    <button class="btn btn-danger">
                        <i class="glyphicon glyphicon-remove"></i>
                    </button>  
                    <button class="btn btn-primary">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </button>
                    <button class="btn btn-success">
                        <i class="glyphicon glyphicon-ok"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection