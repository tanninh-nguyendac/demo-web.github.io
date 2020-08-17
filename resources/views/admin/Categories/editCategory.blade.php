@extends('admin')
@section('content')
<form action="{{asset('admin/updateCategories/'.$category->id)}}" method="POST">
						<div class="form-group">
							<label>Tên danh mục:</label>
							<input required type="text" name="catename" class="form-control" placeholder="Tên danh mục..." value = "{{$category->category_name}}">
						</div>
						
						
                        <input class="btn btn-primary" type="submit" value="Submit">
                        <input class="btn btn-primary" type="reset" value="Reset">
						
						{{csrf_field()}}
                        {{ method_field('PUT')}}
					</form>
@endsection