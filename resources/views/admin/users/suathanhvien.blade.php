@extends('admin')
@section('content')
<form action="{{route('updateuser')}}" method="POST">
						<div class="form-group">
							<label>Tên thành viên</label>
							<input required type="text" name="membername" class="form-control" placeholder="Tên danh mục..." value = "{{$users->member_name}}">
                            <input required type="hidden" name="id" class="form-control" placeholder="Tên danh mục..." value="{{$users->id}}">

                        </div>
                        <div class="form-group">
							<label>User name</label>
							<input required type="text" name="username" class="form-control" placeholder="Tên danh mục..." value = "{{$users->user_name}}">
						</div>
                        <div class="form-group">
							<label>Email</label>
							<input required type="text" name="email" class="form-control" placeholder="Tên danh mục..." value = "{{$users->email}}">
						</div>
                        <div class="form-group">
							<label>Số điện thoại</label>
							<input required type="text" name="phone" class="form-control" placeholder="Tên danh mục..." value = "{{$users->member_phone}}">
						</div>
                        <div class="form-group">
							<label>Địa chỉ</label>
							<input required type="text" name="address" class="form-control" placeholder="Tên danh mục..." value = "{{$users->member_address}}">
						</div>
						
						
                        <input class="btn btn-primary" type="submit" value="Submit">
                        <input class="btn btn-primary" type="reset" value="Reset">
						
						{{csrf_field()}}
                       
	
    				</form>

                    
 <script>
   @jquery
@toastr_js
@toastr_render
</script>
@endsection