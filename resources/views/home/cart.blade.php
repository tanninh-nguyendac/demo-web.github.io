@extends('master')
@section('content')
@include('function')

	<section id="cart_items">
	{{csrf_field()}}
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div   class="table-responsive cart_info">
				<table  id="item1"  class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image"></td>
							<td class="description">Tên Sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
						
						
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach( $cart as $item)
						<tr >
							
							<td class="cart_product">
							<div style="width: 145px; height: 125px;">    
                                      
								<a href=""><img style="width: 100%; height: 100%;" src="upload/{{$item->associatedModel}}" alt=""></a>
							</div>

							</td>
							<td class="cart_description">
								<h4><a href="">{{$item->name}} </a></h4>
							</td>
							<td class="cart_price">
							<?php
							$Price = formatMoney("{$item->price}");
												//var_dump($user);exit;
							?>
								<p>
								<?php echo $Price;?> VND
							</p>
							</td>
							<td  class="cart_quantity">
								<div class="cart_quantity_button">
									<input style="width: 50px;" type="number" class="cart_quantity_input" type="text" name="quantity" value="{{$item->quantity}}" data-id = "{{$item->id}}" autocomplete="off" size="2">
								</div>
							</td>
							
							<td class="cart_delete">
								<a class="cart_quantity_delete" data-id = "{{$item->id}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
						
					
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
		
			<form name="test" id="form-checkout"  method= "post">
				{{csrf_field()}}

			<div class="row">
				<div  class="col-sm-6">
					<div id="total1" class="total_area">
						<ul>
						<?php
							$total1 = Cart::gettotal();
							$total = formatMoney($total1);					
							?>
							<li>Cart Sub Total <span id="total2"><?php echo $total ?> VND</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span id = "total1"><?php echo $total ?> VND</span></li>
						</ul>
							<a class="btn btn-default update" href="{{route('/')}}">Mua thêm</a>
							<a id="online" class="btn btn-default update">Thanh toán online</a>
							<button data-toggle="modal" data-target="#exampleModal"  class="btn btn-default check_out" type="" >Đặt hàng</button>
					</div>
				</div>
				<div  class="col-sm-6">
			
	 
	 <div class="form-group">
	   <label for="exampleInputEmail1">Họ Và Tên</label>
	   
	   <input type="text" class="form-control" id="inputfulname" name="name"value="<?php if(!empty($user)){
		   foreach($user as $item){
			   echo $item->member_name;
		   }
	   } ?>">
	 </div>
	
	 <div class="form-group">
	   <label for="exampleInputPassword1">Số điện thoại</label>
	   <input type="tetx" class="form-control" id="" name="number" value="<?php if(!empty($user)){
		   foreach($user as $item){
			   echo $item->member_phone;
		   }
	   } ?>">
	 </div>
   
	 <div class="form-group">
	   <label for="exampleInputPassword1">Địa chỉ</label>
	   <input type="tetx" class="form-control" id="" name="address" value="<?php if(!empty($user)){
		   foreach($user as $item){
			   echo $item->member_address;
		   }
	   } ?>">
	 </div>
	   
				</div>
			</div>
			</form>
		</div>

		<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notifications</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <h4 class="modal-title" id="exampleModalLabel"><?php if ($cart->isEmpty()){
		  echo "Giỏ hàng rỗng";
	  }else
	  {
		echo "Bạn có chắc chắn";
	  }?></h>
        
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-primary" data-dismiss="modal">Thoát</button>
		@if(!$cart->isEmpty())
		<button id="submit" type="button" class="btn btn-primary">Đặt hàng</button>
		@endif
      </div>
    </div>
  </div>
</div>

	</section><!--/#do_action-->

	<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){

	$(".cart_quantity_input").blur(function(){
		let rowid = $(this).data('id');
		let rowid1 = $(this).data('id');
		let data1 = $(this).val();
		var div=$('#total1').html();
		if(data1 > 0){
			$.ajax({
			type:'POST',
			url:"{{ route('updatecart') }}",
			data:{
				qty : $(this).val(),
				id : rowid
			},
			success:function(){
				location.reload();
			}
			
			})
		}else{
			if(data1 == 0){
				let rowid1 = $(this).data('id');
				$.ajax({
				type:'POST',
				url:"{{ route('deleteitemcart') }}",
				data:{
					id : rowid1
				},
				success:function(){
						location.reload();
					}	
				});
					}
				}
			
	});
	
})

$('#online').click(function(){
  $('form[name=test]').attr('action','checkoutonline');
  $('form[name=test]').submit();
});
$('#submit').click(function(){
  $('form[name=test]').attr('action','checkout');
  $('form[name=test]').submit();
});
function get_action(form) {
	$("#online").click(function(){
		form.action = '{{route("checkoutonline")}}';
	})
	$("#submit").click(function(){
		form.action = 'checkout';
	})
    }


$('.cart_quantity_delete').click(function(e){
		let rowid1 = $(this).data('id');
		$.ajax({
  		type:'POST',
		  url:"{{ route('deleteitemcart') }}",
  		data:{
			id : rowid1
		},
		success:function(){
				location.reload();
			}	
		});
  
	});




</script>
@jquery
@toastr_js
@toastr_render

@endsection