@extends('master')
@section('content')
@yield('slide')
@include('function')

<div id="item" class="features_items">
    <!--features_items-->
						<h2 class="title text-center">Features Items</h2>
                        @foreach($products as $item) 
                        <div class="col-sm-4">
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
			data:{
				data: data
			},
			success:function(res){
				location.reload();
			}
			
			})

	});
	

	
})
	


</script>
@jquery
@toastr_js
@toastr_render
@endsection