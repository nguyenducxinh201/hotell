@extends('layouts.template_admin')
@section('main-content')
<div id="gues-index">
    <h2 class="title-h2">DANH SÁCH KHÁCH HÀNG</h2>

<form action="{{route('guestsearch')}}" method="get" class="form-search-guest">
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
                <th>Tên khách</th>
                <th>CMND</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày sinh</th>
                <th>Email</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guests as $guest)
                <tr>
                    <td>{{$guest->name}}</td>
                    <td>{{$guest->cmnd}}</td>
                    <td>{{$guest->phone}}</td>
                    <td>{{$guest->address}}</td>
                    <td>{{Carbon\Carbon::parse($guest->dob)->format('d-m-Y')}}</td>
                    <td>{{$guest->email}}</td>
                    <td>
                        <a href="{{route('guest.show',[$guest->id])}}" class="btn btn-primary">
                        <i class="glyphicon glyphicon-eye-open"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
