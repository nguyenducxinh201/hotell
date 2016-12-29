@extends('layouts.template_admin')

@section('main-content')
    <div id="service">
        <div class="container">
        <h2 class="title-h2 title-h2-service">DỊCH VỤ KHÁCH SẠN</h2>
        <button class="btn btn-primary btn-show-dichvu">
            <i class="glyphicon glyphicon-plus"></i>
        </button>
        </div>

                @if(Session::has('msg'))
                  <script type="text/javascript">
                      alert("{{ Session::get('msg')}}")
                  </script>  
                @endif
            <form class="them-dichvu"  action="{{route('service.store')}}" method="post">
            {{csrf_field()}}
                    <h2 class="title-h2">Thêm mới dịch vụ</h2>
                <div class="form-group">
                    <label class="col-md-4 control-label">Tên dịch vụ</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input  name="service_name" class="form-control" placeholder="Ten dich vu">
                    </div>    
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Giá dịch vụ</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input  name="service_price" class="form-control" placeholder="Gia dich vu" >
                    </div>
                </div>
                <input type="hidden" name="hotel_id" value="{{Auth::user()->hotel->id}}">

                    <button  type=submit class="col-md-4  col-md-offset-4 btn btn-primary col-md-5 btn-them-dichvu">
                        <i class="glyphicon glyphicon-ok"></i>
                    </button>
                    <button class="col-md-4  btn btn-danger col-md-5 "><i class="glyphicon glyphicon-remove"></i></button>
                
            </form>    


            <table class="table table-striped table-service-index">
                <thead>
                    <tr class="tr-top">
                        <th>Tên dịch vụ</th>
                        <th>Giá</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>
                    @foreach($listServices as $listService)
                        <tr>
                            <td>{{ $listService->service_name }}</td>
                            <td>{{ number_format($listService->service_price) }} vnd</td>
                            <td>
                                <a class="btn btn-success btn-action btn-action-a" href="">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                {{Form::open(['method' =>'delete', 'route'=>['service.destroy',
                                $listService->id], 'class' => 'form-delete-service'])}}
                                {{csrf_field()}}
                                    <button class="btn btn-danger btn-delete-service btn-action" type="submit">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </button>
                                {{Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="row">
        </div>
    </div>


@endsection