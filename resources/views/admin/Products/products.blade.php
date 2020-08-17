@extends('admin')
@section('content')

  
								
								
  <form style="position: absolute;right: 30px;" class="form-inline" action="">
			<div class="form-group">
  				<input type="text" class="form-control" placeholder="Tên sản phẩm" name="name" value="">
			</div>
  		<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
	</form>
  <thead>          
<table class="table">

  <a style="float: left;" class="btn btn-success" href="{{route('addProducts')}}" role="button">Thêm mới</a>
    <tr >
      <th width="4%" >ID</th>
      <th width="15%">Sản phẩm </th>
      <th width="7%" >Mặt hàng</th>
      <th width="30%">Mô tả</th>
      <th width="7%" >Đơn giá</th>
      <th width="7%">Số lượng</th>
      <th width="15%" >Ảnh</th>
      <th width="15%">Hành động</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $item)
    <tr >
      <th>{{$item->id}}</th>
      <td >{{$item->product_name}}</td>
      <td>{{$item->category_name}}</td>
      <td >{!! $item->product_description !!}</td>
      <td>{{$item->product_price}}</td>
      <td>{{$item->product_quantity}}</td>
      <td>
        <div  style="width:100px; height: 100px;" >
        <img src="upload/{{$item->product_image}}" alt=""  style="width:100%; height: 100%;" />
        </div>
    </td>
      
      <td>
      <div class="row">
      <div style = "padding-right: 10px">
      <a class="btn btn-primary" href="{{asset('admin/updateProduct/'.$item->id)}}" role="button">Sửa</a>
      </div>
      <div>
      <a class="btn btn-primary" href="{{asset('admin/deleteProduct/'.$item->id)}}" role="button">Xóa</a>
      </div>
      </div>
      </td>
    </tr> 
    @endforeach  
  </tbody>
</table>
{{ $products->links() }}
<script>



$(document).ready(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

	$("#inputsearchadmin").blur(function(){
		
		let data = $(this).val();
		$.ajax({
			type:'POST',
			url:"{{ route('search') }}",
			dataType: 'json',
			data:{
				data: data
			},
			success:function(res){
			

			}	
			})

	});

	});
	

	

	
					//<div class=" col-sm-4"><div class="product-image-wrapper"><div class="single-products"><div class="productinfo text-center"><div style="width: 256px; height: 237px;"><img style="width: 100%; height: 100%;" src="upload/'+value.product_image+'" alt="" /></div><p>'+value.product_name+'</p><a  data-id="'+value.id+'" class="addcart btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></div></div></div>
</script>

@jquery
@toastr_js
@toastr_render
@endsection

<!-- <tr style="white-space: nowrap;" height = "150px"><th scope="row">+value.id+</th><td>+value.product_name+</td><td></td><td class="text123" >+value.product_description+</td><td>+value.product_price+</td><td>+value.product_quantyti+</td><td><div  style="width:100px; height: 100px;" ><img src="" alt=""  style="width:100%; height: 100%;" /></div></td><td><div class="row"><div style = "padding-right: 10px"><a class="btn btn-primary" href="" role="button">Sửa</a></div><div><a class="btn btn-primary" href="" role="button">Xóa</a></div></div></td></tr> -->