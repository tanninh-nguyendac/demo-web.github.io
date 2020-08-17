@extends('master')
@section('content')
@include('function')

<div class="features_items">
    <!--features_items-->
						<h2 class="title text-center">Sản phẩm khuyễn mãi</h2>
						<div class="itemm">
                        @foreach($products as $item) 
                        <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<a href="{{asset('detail/'.$item->id)}}">
										<div class="productinfo text-center">
                                        <div style="width: 256px; height: 237px;">    
                                        <img style="width: 100%; height: 100%;" src="upload/{{$item->product_image}}" alt="" />
										</div>
											<?php
												$Price = formatMoney("{$item->product_price}");
											?>
                                            <b style="color : red;">500.000 VND</b><br/>
											<del><?php echo $Price;?></del>
											<p>{{$item->product_name}}</p>
											</a>
										<a  data-id="{{$item->id}}" class="addcart btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

										</div>
								</div>							
							</div>
                        </div>
						@endforeach		
</div>	
				<!--features_items-->			   
</div>
                                 
								 {{ $products->links() }}	
	<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){

	$(".addcart").click(function(){
		let rowid = $(this).data('id');
			$.ajax({
			type:'POST',
			url:"{{ route('addcart') }}",
			data:{
				id : rowid
			},
			success:function(res){
				console.log(rowid)
				toastr.success(res.success)

			}
			
			})
			
	});
	$("#inputsearch").blur(function(){
		
		let data = $(this).val();
		$.ajax({
			type:'POST',
			url:"{{ route('search') }}",
			dataType: 'json',
			data:{
				data: data
			},
			success:function(res){
				var content = '';
				$(".itemm").html('');
				$.each(res,function(index, value){
					const formatter = new Intl.NumberFormat('en-US', {
  
  minimumFractionDigits: 0
})

					content = '<div class=" col-sm-4"><div class="product-image-wrapper"><div class="single-products"><div class="productinfo text-center"><div style="width: 256px; height: 237px;"><img style="width: 100%; height: 100%;" src="upload/'+value.product_image+'" alt="" /></div><h2>'+formatter.format(value.product_price) +'</h2><p>'+value.product_name+'</p><a  data-id="'+value.id+'" class="addcart btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></div></div></div>';
					$(".itemm").append(content);
				})
				console.log(res)
				
				
			}	
			})

	});
	
	
})
	


</script>
@jquery
@toastr_js
@toastr_render
@endsection