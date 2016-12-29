@extends('layouts.template_admin')

@section('main-content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
            <h2 class="title-h2">Cập nhập giá phòng</h2>
    </div>
</div>
    <div id="capnhapgiaphong">
        {!! Form::open(['route'=>'roomprice.store','class'=>'form-create-price'])!!}
        <label>Mùa</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
            <select name="season" class="form-control" autofocus="">
                <option value="1" selected >1</option>
                <option value="2" >2</option>
            </select>
        </div>

        <label>Loại phòng</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-bed"></i></span>
            <select name="roomtype_id" class="form-control">
                @foreach($roomTypes as $roomType)
                    <option value=" {{$roomType->id}} ">{{ $roomType->roomtype_name }}</option>
                @endforeach
            </select>
        </div>

        <label>Giá 1 giờ</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
            <input type="number" name="first_hours" class="form-control" value="{{ old('fist_hours')}}">
        </div>

        <label>Giá 2 giờ</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
            <input type="number" name="second_hours" class="form-control" value="{{ old('second_hours')}}">
        </div>

        <label>Giá 3 giờ</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
            <input type="number" name="third_hours" class="form-control" value="{{ old('third_hours')}}">
        </div>

        <label>Giá ngày</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
            <input type="number" name="day_price" class="form-control" value="{{ old('day_price')}}">
        </div>

        <input type="hidden" name="hotel_id" value="{{Auth::user()->hotel->id}}">
        <input type="submit" name="" id="btn-create-price" value="Submit" class="btn btn-primary" style="margin-top:20px">
        </form>
    @foreach($errors->all() as $error)
        <div class="alert alert-warning">{{ $error }}</div>
    @endforeach

        @if(Session::has('msg'))
            <div class="alert alert-success">
            {{ Session::get('msg') }}
        @endif
    </div>   
    <script type="text/javascript">
        $('#btn-create-price').on('click',function(event){
            event.preventDefault();
            var msg="Bạn muốn thêm phòng?? ";
            if(confirm(msg)){
                $('.form-create-price').submit();
            }
            return false;
        });
    </script>
@endsection