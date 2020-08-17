@extends('master')
@section('content')
@include('function')

					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="upload/{{$products->product_image}}" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div  class="item active">
										  <a href=""><div style="width: 329px;height: 150px;"><img style="width: 100%;height: 100%;" src="upload/{{$products->product_image}}" alt=""></div></a>
										  
										</div>
										<div  class="item">
										  <a href=""><div style="width: 329px;height: 150px;"><img style="width: 100%;height: 100%;" src="upload/{{$products->product_image}}" alt=""></div></a>
										  
										</div>
										<div  class="item">
										  <a href=""><div style="width: 329px;height: 150px;"><img style="width: 100%;height: 100%;" src="upload/{{$products->product_image}}" alt=""></div></a>
										  
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$products->product_name}}</h2>
							
								<?php
												$Price = formatMoney("{$products->product_price}");
											?>
								<span>
									<span><?php echo $Price?> VND</span>
									<label>Số lượng:</label>
									<input id="qty" type="text" value="1" />
									
                                </span>
                                <p><b>Số lượng còn:</b> {{$products->product_quantity}}</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> </p>
                                <button data-id="{{$products->id}}" type="button" class="addcart btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
							
								<a href=""><img src="Eshopper/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								
							</ul>
						</div>
						<div class="tab-content">
                        <div class="tab-pane fade active in" id="details" >
								<div class="col-sm-12">								
									<p>{!!$products->product_description!!}</p>
								</div>
							</div>
							
							
							
						
					
						</div>
					</div><!--/category-tab-->

	<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){

	$(".addcart").click(function(){
		let rowid = $(this).data('id');
		let qty = $("#qty").val()
			$.ajax({
			type:'POST',
			url:"{{ route('addcart') }}",
			data:{
				id : rowid,
				qty : qty
			},
			success:function(res){
				console.log(qty)
				toastr.success(res.success)
			}
			
			})
			
	});
	
})
	


</script>
@jquery
@toastr_js
@toastr_render
@endsection