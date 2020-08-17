@extends('admin')
@section('content')
<table class="table">


<colgroup>
    <col span="2" >
  </colgroup>
  <form style="position: absolute;left: 30px;" class="form-inline" action="">
			<div class="form-group">
  				<input type="text" class="form-control" placeholder="Tên thành viên" name="name" value="">
			</div>
	</form>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Điện thoại</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Email</th>

      <th  scope="col">Hành động</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach ($members as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->member_name}}</td>
      <td>{{$item->member_phone}}</td>
     
    
      
    
      <td style="width: 250px;display: block;
  
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;" >{{$item->member_address}}</td>
   <td>
      
   {{$item->email}}
      </td>
    <td>
    <div class="row">
      <div style = "padding-right: 10px">
      <a class="btn btn-primary" href="{{asset('edituser/'.$item->id)}}" role="button">Sửa</a>
      </div>
      <div>
      <a class="btn btn-primary" href="{{asset('admin/deleteuser/'.$item->id)}}" role="button">Xóa</a>
      </div>
      </div>
    </td>

  
    </tr>
    @endforeach
  </tbody>
</table>
{{ $members->links() }}

<script>
@jquery
@toastr_js
@toastr_render
</script>
@endsection