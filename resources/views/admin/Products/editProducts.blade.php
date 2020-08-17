@extends('admin')
@section('content')
<form action="{{ route('updateProduct') }}" method="POST" enctype="multipart/form-data">
                       <?php //dd($products);exit; ?>
                        <div class="form-group">
							<label>Tên sản phẩm </label>
                            <input required type="text" name="productname" class="form-control" placeholder="Tên danh mục..." value="{{$products->product_name}}">
                            <input required type="hidden" name="id" class="form-control" placeholder="Tên danh mục..." value="{{$products->id}}">
						</div>
						<div class="form-group">
                        <label>Mô tả</label>
                        <textarea id="editor1" name="productdes" class="ckeditor" cols="80" rows="10">
                        {{$products->product_description}}
                        </textarea>
                        
                        <!-- (3): Code Javascript thay thế textarea có id='editor1' bởi CKEditor -->
                       
                        </div>
                        <div class="form-group">
                        <label>Mặt hàng</label>
                        
                        
                        <select class="browser-default custom-select" name="categories" >
                        @foreach($categories as $item)  
                        <option selected><?php if($products->cate_id == $item->id){
                            echo $item->category_name;
                        } ?></option>
                        
                      
                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                        @endforeach
                        </select>
                      
                        </div>
                       
                        <div class="form-group">
                        <label>Giá</label>
                        <input type="number" id="gia" required type="text" value="{{$products->product_price}}" name="productprice" class="form-control" placeholder="">
                        <span style="color:red" id="errornumber"></span>
                        </div>
                        <div class="form-group">
                        <label>Số lượng</label>
                        <input  type="number" id="soluong" required type="text" name="productquantity" value="{{$products->product_quantity}}" class="form-control" placeholder="">
                        <span style="color:red" id="errornumber"></span>
                        </div>
                        <div class="form-group">
                        <label>Hình ảnh   </label>
                        <input type='file' name="file" value="{{$products->product_image}}"/>
                        <img style="width: 150px; height: 100px;" id="myImg" src="upload/{{$products->product_image}}" alt="your image" />
                        </div>
                                            
                        <button type="button" class="btn btn-primary" onclick="validateForm()">submit</button>
                        <input class="btn btn-primary" type="reset" value="Reset">
						
						{{csrf_field()}}
                    </form>
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

function validateForm() {
	
    var sl = document.getElementById("soluong").value;
    var gia = document.getElementById("gia").value;

    
    var submit = false;
     
        if( isNaN(sl)|| sl <= 0){
            document.getElementById("errornumber").innerHTML="Số lượng phải là số dương";
            submit = false;
        }else{
            document.getElementById("errornumber").innerHTML="";
            submit = true;
        }
        if( isNaN(gia)|| sl <= 0){
            document.getElementById("errornumber").innerHTML="Giá phải là số dương";
            submit = false;
        }else{
            document.getElementById("errornumber").innerHTML="";
            submit = true;
        }
     
    

     if(submit){ 
        $( "#addsubmit" ).submit();
     }
  }
                    </script>
 @jquery
@toastr_js
@toastr_render
@endsection