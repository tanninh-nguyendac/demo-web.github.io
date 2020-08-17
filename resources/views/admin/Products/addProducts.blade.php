@extends('admin')
@section('content')
@if(count($errors) > 0)
<div class="container">
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{$error}}</p>
				@endforeach
		</div>
		@endif
<form id="addproduct" action="{{ route('insertProducts') }}" method="POST" enctype="multipart/form-data">
                        
<div class="form-group">
							<label>Tên sản phẩm </label>
							<input required type="text" name="productname" class="form-control" placeholder="Tên danh mục...">
						</div>
						<div class="form-group">
                        <label>Mô tả</label>
                        <textarea id="editor1" name="productdes" class="ckeditor" cols="80" rows="10">
                        
                        </textarea>
                        
                        <!-- (3): Code Javascript thay thế textarea có id='editor1' bởi CKEditor -->
                       
                        </div>
                        <div class="form-group">
                        <label>Mặt hàng</label>
                        
						<select class="browser-default custom-select" name="categories" >  
                        <option selected>mặt hàng</option>

                        @foreach($categories as $item)
                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                        @endforeach
                        </select>
                      
                        </div>
                        <div class="form-group">
                        <label>Giá</label>
                        <input type="number"  id="gia1" required type="text" name="productprice" min="0" class="form-control"  placeholder="">
                        <span style="color:red" id="errornumber"></span>
                        </div>
                        <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number"  id="soluong" required type="text" name="productquantity" min="0" class="form-control" placeholder="">
                        <span style="color:red" id="errornumber"></span>
                        </div>
                        <div class="form-group">
                        <label>Hình ảnh   </label>
                        <input type='file' name="file" />
                        <img style="width: 150px; height: 100px;" id="myImg" src="#" alt="your image" />
                        </div>
                                            
                        <input class="btn btn-primary" type="submit" value="submit">
                        <input class="btn btn-primary" type="reset" value="Reset">
						
						{{csrf_field()}}
                    </form>
                    </div>
                    
<script>

$(function () {
    $(":file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result);
};

</script>
@endsection