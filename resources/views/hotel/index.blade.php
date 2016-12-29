@extends('admin.layouts.home')

@section('main-content')
    @if(Session::has('msg'))
        <script type="text/javascript">
            alert("{{Session::get('msg')}}")
        </script>
    @endif
    <div id="list_hotel">
        <h2 class="title-h2">Danh sách khách sạn đăng ký</h2>

        <form action="{{route('hotelsearch')}}" method="get" class="form-search-guest">
            <div class="col-md-3 col-md-offset-9">
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control " placeholder="Tim Khách sạn"  name="id"/>
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
            <th>Tên khách sạn</th>
            <th>Loại khách sạn</th>
            <th>Hạng sao</th>
            <th>Thành phố</th>
            <th>Quận</th>
            <th>Đường</th>
            <th>Số ĐT</th>
            <th>Website</th>
            <th>Tình trạng</th>
            <th>Người đăng ký</th>
            <th>Active</th>
        </tr>
    </thead>

    <tbody>
    @foreach($hotels as $hotel)
        <tr>
            <td>{{ $hotel->hotel_name }}</td>
            <td>{{ $hotel->hotel_type }}</td>
            <td>{{ $hotel->rank_star }}</td>
            <td>{{ $hotel->city }}</td>
            <td>{{ $hotel->township }}</td>
            <td>{{ $hotel->street }}</td>
            <td>{{ $hotel->hotel_phone }}</td>
            <td>{{ $hotel->website }}</td>
            <td>{{ $hotel->hotel_active==0?"Chưa xác nhận":"Đã xác nhận" }}</td>

            <td><a href="{{route('guest.show',[$hotel->user_id]) }}">{{ $hotel->name }}</a></td>
            <td>

              <form class="inline-form form-accept-hotel" method="POST" action="{{route('hotel.update',[$hotel->id])}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="hotel_active" value="1">
                    <button class="btn btn-success btn-action btn-accept-hotel"><i class="glyphicon glyphicon-ok"></i></button>
              </form>

              <form class="inline-form form-delete-hotel form-delete-hotel" method="POST" 
              action="{{route('hotel.destroy',[$hotel->id])}}">
                    {{csrf_field()}} 
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger btn-action btn-delete-hotel"><i class="glyphicon glyphicon-remove"></i></button>
              </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
@endsection
@section('footer_link')
    <script type="text/javascript" src="{{asset('js/hotel_index.js')}}"></script>
@endsection