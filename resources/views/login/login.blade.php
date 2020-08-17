@extends('master')
@section('content')
<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						<p>{{$error}}</p>
						@endforeach
				</div>
				@endif
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{route('login')}}" method="post">
						
							<input type="email" name="Email" placeholder="Email" />
							<input type="password" name="Password" placeholder="Password" />
							
                            <span style="padding-left: 20px;">
							  <a href="{{route('signup')}}">Sign new account</a>
							  <a style="color : red;">/</a>
							  <a style="color : black;" href="{{route('laypass')}}">Forgot password? </a>
							</span>
							<button type="submit" class="btn btn-default">Login</button>
							{{csrf_field() }}
							
						</form>
					</div><!--/login form-->
                </div>
            </div>
</div>
@jquery
@toastr_js
@toastr_render
@endsection