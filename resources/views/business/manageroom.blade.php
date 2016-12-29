@extends('business.app')
@section('content')

<style type="text/css">
input{
  width:auto;
}
</style>
<div class="container">
<form class="form-horizontal" action="{{url('business/setuproom')}}" method="post">
  {{csrf_field()}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
            <thead>
               <th>Stt</th>
               <th>Tên phòng</th>
                <th>Loại phòng</th>
                <th>Giá</th>
                <!-- <th>Số khách</th>
                <th>Giường phụ</th> -->
                <!-- <th>Ảnh</th> -->
                <!-- <th>Diện tích</th>
                <th>Hướng phòng</th>
                <th>Loại Giường</th> -->
            </thead>
            <?php  $count=0; ?>
            @foreach($list_roomtype as $u)
                 @for( $i=0;$i<$u->quantity;$i++)
                 <?php $count++?>
                 <tbody>
                      <tr>
                         <td>{{$count}}</td>
                         <input type="hidden" class="form-control"  name="roomtype_id[]" value="{{$u->id}}">
                         <td><input type="text" class="form-control" value="" name="room_name[]" ></td>
                         <td><input  disabled type="text" class="form-control"  name="" value="{{$u->roomtype_name}}"> </td>
                         <td><input disabled type="text" class="form-control"  name="" value="{{$u->price}}" ></td>
                         <!-- <td><input type="text" class="form-control"  name="guest_count" value="{{$u->guest_count}}" </td> -->
                         <!-- <td><input type="text" class="form-control"  name="bed_count" value="{{$u->bed_count}}" </td> -->
                         <!-- <td><input type="text" class="form-control"  name="picture" value="{{$u->picture}}" </td> -->
                         <!-- <td><input type="text" class="form-control"  name="area" value="{{$u->area }}" </td> -->
                         <!-- <td><input type="text" class="form-control"  name="direct" value="{{$u->direct}}" </td> -->
                         <!-- <td><input type="text" class="form-control"  name="bed_type" value="{{$u->bed_type }}"</td> -->

                      </tr>
                 @endfor
             @endforeach
           </tbody>
        </table>
    </div>
    <input type="hidden" name="hotel_id" value="{{$id_hotel}}">
    <button type="submit" class="btn btn-primary col-md-3 col-md-offset-2" > Submit</button>
    <button type="reset" class="btn btn-primary col-md-3 col-md-offset-1 " > Reset</button>
</form>
</div>
@endsection
