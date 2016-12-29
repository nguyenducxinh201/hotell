@extends('layouts.template_admin')
@section('main-content')
    <div id="listdatphong">
        <h2 class="bookroom_index_h2">DANH SÁCH ĐẶT PHÒNG</h2>


    <form action="{{route('searchbookroom')}}" method="get" class="form-search-guest">
        <div class="col-md-3 col-md-offset-9">
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control " placeholder="Tìm đặt phòng"  name="id"/>
                    <span class="input-group-btn">
                        <button class="btn btn-info " type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>

        <table class="table table-striped table_list_book_room">
            <thead>
                <tr>
                    <th>Mã đặt phòng</th>
                    <th>Mã phòng</th>
                    <th>Ngày hẹn nhận</th>
                    <th>Ngày hẹn trả</th>
                    <th>Khách</th>
                    <th>Tiền cọc</th>
                    <th>Ngày đặt</th>
                    <th>Tình trạng</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($listDatPhong as $value)
                        <tr>
                            <td>{{ $value->bookroom_id}}</td>
                            <td>{{ $value->room_name}}</td>
                            <td>{{ Carbon\Carbon::parse($value->receive_date)->format('d-m-Y H:i')}}</td>
                            <td>{{ Carbon\Carbon::parse($value->leave_date)->format('d-m-Y H:i') }}</td>
                            <td><a href="{{route('guest.show',[$value->user_id])}}">{{ $value->name }}</a></td>
                            <td>{{ $value->deposit }}</td>
                            <td>{{ Carbon\Carbon::parse($value->created_at)->format('d-m-Y H:i') }}</td>
                            <td>{{ $value->active==0?"Chưa nhận":$value->active==1?"Đã nhận":"Đã trả" }}</td>
                            <td>
                                <button  class="btn btn-success btn-action" >
                                    <a href="{{ route('bookroom.show',[$value->bookroom_id]) }}" >
                                        <i class=" glyphicon glyphicon-eye-open"></i>
                                    </a>
                                </button>
                                @if($value->active==0)
                                    <form method="POST" action="{{route('bookroom.update',[$value->bookroom_id])}}" class="form-accept-thue inline-form">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PATCH">
                                        <input type="hidden" name="bookroom_active" value="1">
                                        <button  class="btn btn-success btn-action btn-accept-bookroom">
                                            <i class="glyphicon glyphicon-ok"></i>
                                        </button>
                                    </form>
                                @else
                                    <button  class="btn btn-success btn-action">
                                        <a href="#" ></a>
                                    </button>
                                @endif
                                <form method="POST" action="{{route('bookroom.destroy',[$value->bookroom_id])}}" 
                                class="inline-form form-delete-book-room" alt="asd">
                                {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button  class="btn btn-danger btn-action btn-delete-bookroom">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <input type="hidden" name="room_id" value="{{$value->room_id}}">
                    @endforeach
            </tbody>
        </table>
        @if(Session::has('msg'))
            <div class="alert alert-success">
            {{Session::get('msg')}}
            </div>
        @endif
    </div>

@endsection

@section('footer_link')
    <script type="text/javascript" src="{{asset('js/bookroom.js')}}"></script>
@endsection
