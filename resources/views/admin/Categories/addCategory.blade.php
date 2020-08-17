@extends('admin')
@section('content')
<form action="{{ route('insertCategories') }}" method="POST">
						<div class="form-group">
							<label>Tên danh mục:</label>
							<input required type="text" name="catename" class="form-control" placeholder="Tên danh mục...">
						</div>
					
                        <input class="btn btn-primary" type="submit" value="Submit">
                        <input class="btn btn-primary" type="reset" value="Reset">
						
						{{csrf_field()}}
					</form>
@endsection