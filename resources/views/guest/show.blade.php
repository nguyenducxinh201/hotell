@extends('layouts.template_admin')
@section('main-content')
<div id="guest_show">
    <h2 class="title-h2">THÔNG TIN KHÁCH HÀNG</h2>


<form class="guest-show-form col-md-6">
    <input type="hidden" name="id" value="{{ $guest->id }}">
    <input type="hidden" name="hotel_id" value="{{empty(Auth::user()->hotel->id)?'':Auth::user()->hotel->id}}">

    <div class="form-group">
        <label class="col-md-3 control-label">Tênkhách</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input  name="" placeholder="" class="form-control"  type="text" value=" {{ $guest->name}}">
        </div>
    </div>
    <!-- -->
        <div class="form-group">
        <label class="col-md-3 control-label">Cmnd</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                <input  name="" placeholder="" class="form-control"  type="text" value=" {{ $guest->cmnd}}">
        </div>
    </div>
    <!-- -->
    <div class="form-group">
        <label class="col-md-3 control-label">Số điện thoại</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input  name="" placeholder="" class="form-control"  type="text" value=" 0{{ $guest->phone}}">
        </div>
    </div>
    <!-- -->
    <div class="form-group">
        <label class="col-md-3 control-label">Địa chỉ</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input  name="" placeholder="" class="form-control"  type="text" value=" {{ $guest->address}}">
        </div>
    </div>
    <!-- -->
        <div class="form-group">
        <label class="col-md-3 control-label">Ngày sinh</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input  name="" placeholder="" class="form-control"  type="text" value=" {{ Carbon\Carbon::parse($guest->dob)->format('d-m-Y')}}">
        </div>
    </div>
    <!-- -->
        <div class="form-group">
        <label class="col-md-3 control-label">Email</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input  name="" placeholder="" class="form-control"  type="text" value=" {{ $guest->email}}">
        </div>
    </div>
<!-- -->
<input  class="btn btn-success col-md-3 col-md-offset-3" value="Lưu">
<input  class="btn btn-danger col-md-3 col-md-offset-1" value="Huy">
</form>

</div>
@endsection
