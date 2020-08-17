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
						<h2>Forgot Password</h2>
						<form action="{{route('laypass')}}" method="post">
						
							<input type="email" name="Email" placeholder="Email Address"/>
                            <!-- <input type="text" name="Phonenumber" placeholder="Phone Number"/> -->

							<button type="submit" class="btn btn-default">Submit</button>
							{{csrf_field() }}
						</form>
					</div><!--/sign up form-->
    </div>
</div>
<div style="margin: 50px;"></div>
@endsection