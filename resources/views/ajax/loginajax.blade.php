@extends('business.app')
@section('content')
	<form id="form-login" action="{{url('form-login')}}" method="post" role="form">
		 {{ csrf_field() }}
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" autofocus="">
		</div>
	<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control">
		</div>
		<input type="submit" class="btn btn-primary" >

	</form>
@endsection