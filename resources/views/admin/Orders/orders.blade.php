@extends('admin')
@section('content')

 
<table class="table">


<colgroup>
    <col span="2" >
  </colgroup>
  <form style="position: absolute;left: 30px;" class="form-inline" action="">
			<div class="form-group">
  				<input type="text" class="form-control" placeholder="Mã hóa đơn" name="name" value="">
			</div>
	</form>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Điện thoại</th>
      <th  scope="col">Địa chỉ</th>
      <th scope="col">Chi tiết</th>
      <th scope="col">Hình thức</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Hành động</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach ($orders as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->member_name}}</td>
      <td>{{$item->member_phone}}</td>
     
      
    
      <td style="width: 250px;display: block;
  
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;" >{{$item->member_address}}</td>
  
  <td><a href="{{asset('admin/order/'.$item->id)}}">detail</a></td>
    <td><?php if($item->payments){
      echo  "<p style = color:green>Thanh toán online</p>";
    }else{
      echo  "<p style = color:red>Thanh toán offline</p>";
    } ?></td>

   <td>
      
      <input data-id = "{{$item->id}}" class="status1 btn <?php if($item->status == 1)
      {
        echo "btn-success ";
      }else{
        echo "btn-warning";
      } ?>" type="button" value="<?php if($item->status == 1)
      {
        echo "Đã xử lí";
      }else{
        echo "Chưa xử lí";
      } ?>"></input>
    </td>
    <td>
    <a href="{{asset('admin/deleteOrder/'.$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn hủy?')"  class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hủy</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $orders->links() }}
<script>


  $(document).ready(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $(".status1").click(function(){
    $(this).toggleClass("btn-warning")
    $(this).toggleClass("btn-success")
    let value = $(this).val()
    let id = $(this).data('id');
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