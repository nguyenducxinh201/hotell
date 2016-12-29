@extends('layouts.template_admin')

@section('main-content')
    <div id="main-view-giaphong">
        <div class="row">
            <h2 class="title-h2">Danh mục giá phòng</h2>
        </div>

        <div class="content-view-giaphong">
            <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Mùa <i class="glyphicon glyphicon-bed"></i></th>
                    <th>Loại phòng</th>
                    <th>Giá 1 giờ</th>
                    <th>Giá 2 giờ</th>
                    <th>Giá 3 giờ</th>
                    <th>Giá 1 ngày</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($roomPrice as $value)
                        <tr>
                            <td><input value="{{ $value->season }} " class="form-control" readonly=""> </td>
                            <td><input value="{{ $value->roomtype_name }} " class="form-control" readonly=""> </td>
                            <td><input value="{{ number_format($value->first_hours) }} " class="form-control" readonly=""> </td>
                            <td><input value="{{ number_format($value->second_hours) }} " class="form-control" readonly=""> </td>
                            <td><input value="{{ number_format($value->third_hours) }} " class="form-control" readonly=""> </td>
                            <td><input value="{{ number_format($value->day_price) }} " class="form-control" readonly=""> </td>
                            <input type="hidden" name="" value=" {{ $value->roomtype_id }}">
                            <td class="td-action">

                                <button class="btn btn-info btn-edit">
                                    <a href="#"><i class="glyphicon glyphicon-edit"></i></a>
                                </button>
                                <button class="btn btn-info btn-save" style="display: none">
                                    <a href="#"><i class="glyphicon glyphicon-ok"></i></a>
                                </button>
                                <script type="text/javascript">
                                    $('.btn-edit').click(function(){
                                        $(this).hide();
                                        $parent =$(this).parent(".td-action");
                                        $parent.children('.btn-save').show();
                                    });
                                </script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-primary">Thêm giá phòng</button>
        </div>
    </div>
@endsection