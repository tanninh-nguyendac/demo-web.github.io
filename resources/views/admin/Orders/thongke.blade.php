@extends('admin')
@section('content')

 
<table class="table">

<div class="container">

    <div class="row">
    <div class='col-sm-2'>
    <span>Thống kê theo ngày </span>
</div>
        <div class='col-sm-4'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
    <div class="row">
    <div class='col-sm-2'>
    <span>Thống kê theo tháng </span>
</div>
        <div class='col-sm-4'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>


  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Điện thoại</th>
      <th  scope="col">Địa chỉ</th>
      <th scope="col">Chi tiết</th>
      <th scope="col">Hình thức</th>
      <th scope="col">Trạng thái</th>
      
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