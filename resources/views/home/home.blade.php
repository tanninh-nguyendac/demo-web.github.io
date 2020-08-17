@extends('master')
@section('content')
@yield('slide')
@include('function')
@if(!$feature->isEmpty())
<div  class=" features_items">
    <!--features_items-->
						<h2 class="title text-center">Sản phẩm nổi bật</h2>
						<div class="itemm">
						@foreach($feature as $item)
                        <div class=" col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<a href="{{asset('detail/'.$item->id)}}">
                                        <div style="width: 256px; height: 237px;">    
                                        <img style="width: 100%; height: 100%;" src="upload/{{$item->product_image}}" alt="" />
										</div>
											<?php
												$Price = formatMoney("{$item->product_price}");
												//var_dump($user);exit;
												// {{route('addCart',['id'=>$item->id])}}
											?>
											<h2><?php echo $Price;?></h2>
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
@endif
<div  class=" features_items">
    <!--features_items-->
						<h2 class="title text-center">Sản phẩm</h2>
						<div class="itemm">
						@foreach($products as $item)
                        <div class=" col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<a href="{{asset('detail/'.$item->id)}}">
                                        <div style="width: 256px; height: 237px;">    
                                        <img style="width: 100%; height: 100%;" src="upload/{{$item->product_image}}" alt="" />
										</div>
											<?php
												$Price = formatMoney("{$item->product_price}");
												//var_dump($user);exit;
												// {{route('addCart',['id'=>$item->id])}}
											?>
											<h2><?php echo $Price;?></h2>
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
				var link = 'detail/'+value.id+''
				console.log(link)
					content = '<div class=" col-sm-4"><div class="product-image-wrapper"><div class="single-products"><div class="productinfo text-center"><a href="'+link+'"><div style="width: 256px; height: 237px;"><img style="width: 100%; height: 100%;" src="upload/'+value.product_image+'" alt="" /></div><h2>'+formatter.format(value.product_price) +'</h2><p>'+value.product_name+'</p></a><a  data-id="'+value.id+'" class="addcart btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></div></div></div>';
					$(".itemm").append(content);
				})
				console.log(res)
			}	
			})

	});
	

	
})
	
					//<div class=" col-sm-4"><div class="product-image-wrapper"><div class="single-products"><div class="productinfo text-center"><div style="width: 256px; height: 237px;"><img style="width: 100%; height: 100%;" src="upload/'+value.product_image+'" alt="" /></div><p>'+value.product_name+'</p><a  data-id="'+value.id+'" class="addcart btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></div></div></div>
</script>
@jquery
@toastr_js
@toastr_render
@endsection

