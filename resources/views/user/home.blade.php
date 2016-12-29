@extends('user.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    @if(Auth::user())
                        <br>
                        Role: {{Auth::user()->role}}<br>
                        Name: {{Auth::user()->name}}
                    @else
                        Not Logined  
                    @endif
                    <ul>
                        <li> <a href="{{url('business/hoteldetail')}}"><strong>Hoteldetail</strong></a> </li>
                        <li> <a href="{{url('business/capnhapphong')}}"><strong>Cai dat phong</strong></a> </li>
                        <li> <a href="{{url('business/setuproom')}}"><strong>setup phong</strong></a> </li>
                        <li> <a href="{{url('business/listroom')}}"><strong>Danh sach phong</strong></a> </li>
                    </ul>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
