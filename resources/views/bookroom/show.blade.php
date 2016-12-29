@extends('layouts.template_admin')
@section('main-content')
    <div id="bookroom_show">
        <h2 class="title-h2">CHI TIẾT ĐẶT PHÒNG</h2>
    <div class="col-md-10 top_detail" >
        <table class="table table">
            <tr class="tr-top-details">
                <th>Mã đặt phòng</th>
                <th>Khách</th>
                <th>Tiền cọc</th>
                <th>Ngày đặt</th>
                <th>Tình trạng</th>
                <th>Action</th>
            </tr>
            <tr>
                    <td>{{$listDatPhong[0]->bookroom_id}}</td>
                    <td><a href="{{route('guest.show',[$listDatPhong[0]->user_id])}}">{{$listDatPhong[0]->name}}</a></td>
                    <td><input class="input-td"  name="deposit" value="{{$listDatPhong[0]->deposit}}" ></td>
                    <td>{{$listDatPhong[0]->created_at}}</td>
                    <td>{{ $listDatPhong[0]->active==0?"Chưa nhận":"Đã nhận"}}</td>
                    <td>
                        <button type="submit" class="btn btn-primary btn-action"><i class="glyphicon glyphicon-edit"></i>
                        </button>

                        <form class="inline-form form-delete-bookroom" method="POST" action="{{route('bookroom.destroy',[$listDatPhong[0]->bookroom_id])}}">
                            {{csrf_field()}}
                            <button type="submit" class="delete-bookroom btn btn-danger btn-action">
                                <i class="glyphicon glyphicon-trash"></i>
                            </button>
                        </form>
                    </td>
            </tr>
        </table>
                <form method="post" action="{{route('bookroom.update',$listDatPhong[0]->bookroom_id)}}">
                        {{csrf_field() }}
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="bookroom_active" value="1">

                        <button type="submit" class="btn btn-primary col-md-4 col-md-offset-4">
                            Nhận phòng <i class="glyphicon glyphicon-ok"></i>
                         </button>
                 </form>
             <!--     <button class="btn btn-primary col-md-3 " style="margin-left: 15px" type="button">
                 Thanh toán <i class="glyphicon glyphicon-euro"></i>
                 </button> -->
    </div><!--  end col-md-9-->

    <hr>
         <table class="table table-striped">
            <thead>
            <tr class="tr-top">
                    <th>Phòng</th>
                    <th>Ngày hẹn nhận</th>
                    <th>Ngày hẹn trả</th>
                    <th>Tình trạng</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($listDatPhong as $value)
                        <tr>
                        <!-- <form> -->
                            <input type="hidden" value=" {{ $value->bookroom_id}} ">
                            <td><input  class="form-control" value=" {{ $value->room_name}} "> </td>
                            <td><input type="" value=" {{ $value->receive_date}} " class="receive_date"> </td>
                            <td><input type=""  value=" {{ $value->leave_date}} " class="releave_date"> </td>
                            <td><input value=" {{ $value->active}} "> </td>
                            <td>
                                <form class="form-update-bookroom inline-form" method="post" action="{{route('bookroom.update',[$value->bookroom_id])}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="PATCH">
                                    <button  class="btn btn-success btn-action">
                                        <!-- <a href=" route('thuephong-xn', ơ'id'=>$value->bookroom_id]) " style="color: white"> -->
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </button>
                                </form>
                            <form class="inline-form">
                                <button  class="btn btn-danger btn-action">
                                    <!-- <a href="  route('thuephong-xn', ['id'=>$value->id]) " style="color: white"> -->
                                    <i class="glyphicon glyphicon-remove"></i>
                                    </a>
                                </button>
                                </form>
                            </td>
                        </tr>
                        <input type="hidden" name="room_id" value="{{$value->room_id}}">
                    @endforeach
            </tbody>

        </table>
        <!-- <button type="button" value="asdasd" onclick="window.print()">In Hoa don</button> -->
        @if(Session::has('msg'))
            <div class="alert alert-success">
            {{Session::get('msg')}}
            </div>
        @endif
    </div>

    <style type="text/css">
    input{
        border-radius: 0;
        box-shadow: none;
        border-color: #d2d6de;
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }
    </style>
    <script type="text/javascript">
                   $('.releave_date').datepicker({format: "dd/mm/yyyy", autoClose: true});
                   $('.receive_date').datepicker({format: "dd/mm/yyyy", autoClose: true});

                    $('.releave_date').on('changeDate', function(ev){
                        $(this).datepicker('hide');
                    });
                    $('.receive_date').on('changeDate', function(ev){
                        $(this).datepicker('hide');
                    });
    </script>
@endsection
