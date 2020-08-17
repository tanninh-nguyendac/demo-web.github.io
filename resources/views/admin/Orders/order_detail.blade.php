@extends('admin')
@section('content')
@foreach($member as $item)
<div class="form-group">
    <label for="exampleInputEmail1">Tên khách hàng:   </label> 
    &nbsp;
    <label for="exampleInputEmail1">{{$item->member_name}}</label>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Member Phone:</label>
    &nbsp;
    <label for="exampleInputEmail1">{{$item->member_phone}}</label>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Địa chỉ:</label>
    &nbsp;
    <label for="exampleInputEmail1">{{$item->member_address}}</label>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tổng hóa đơn:</label>
    &nbsp;
    <label for="exampleInputEmail1">{{$item->total}}</label>
  </div>
  @endforeach
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Đơn giá</th>
      
  </thead>
  <tbody>
      @foreach ($order as $item)
    <tr>
      <td>{{$item->product_name}}</td>
      <td>{{$item->quantity}}</td>
      <td>{{$item->product_price}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="row">
  <div class="col-sm-5"></div>
  <div class="col-sm-2">
@foreach($member as $item)

<input data-id = "{{$item->id}}" class="status1 btn <?php if($item->status == 1)
      {
        echo "btn-success ";
      }else{
        echo "btn-warning";
      } ?>" type="button" value="<?php if($item->status == 1)
      {
        echo "đã xử lí";
      }else{
        echo "chưa xử lí";
      } ?>"></input>
@endforeach 
</div>
<div class="col-sm-5"></div>
</div>
<script>


  $(document).ready(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $(".status1").click(function(){
    $(this).toggleClass("btn-warning ")
    $(this).toggleClass("btn-success ")
    let value = $(this).val()
    let id = $(this).data('id');
    console.log(id,value)
    if(value == "đã xử lí"){
      $(this).val('chưa xử lí') 
    }else{
      $(this).val('đã xử lí')
    }
    $.ajax({
			type:'POST',
			url:"{{ route('updatestatus') }}",
			data:{
				id : id
			},
			
			});
  });
  
});

</script>
@endsection