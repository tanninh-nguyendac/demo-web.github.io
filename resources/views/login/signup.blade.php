@extends('master')
@section('content')
<div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{$error}}</p>
				@endforeach
		</div>
		@endif
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{route('signup')}}" method="post">
							<input type="text" name="UserName" placeholder="Name"/>
							<input type="email" name="Email" placeholder="Email Address"/>
                            <input type="password" name="Password" placeholder="Password"/>
							<input type="password" name="Confirm" placeholder="Confirm Password"/>
                            <input type="text" name="Fullname" placeholder="Full Name"/>
				
                            <input type="text" name="Phonenumber" placeholder="Phone Number"/>

                            <input type="text" name="Address" placeholder="Address"/>

							<button type="submit" class="btn btn-default">Signup</button>
							{{csrf_field() }}
						</form>
					</div><!--/sign up form-->
    </div>
</div>
<div style="margin: 50px;"></div>
@endsection