@extends('admin')
@section('content')
<table class="table">
<a style="float: right;" class="btn btn-success" href="{{ route('addCategories') }}" role="button">Thêm mới</a>


  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Hành động</th>
      <th scope="col">
     </th>
    </tr>
  </thead>
  <tbody>
  @foreach($category as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->category_name}}</td>
      <td>
      <div class="row">
      <div style = "padding-right: 10px">
      <a class="btn btn-primary" href="{{asset('admin/editCategories/'.$item->id)}}" role="button">Sửa</a>
      </div>
      <div>
      <a class="btn btn-primary" href="{{asset('admin/deleteCategories/'.$item->id)}}" role="button">Xóa</a>
      </div>
      </div>
      </td>
    </tr> 
    @endforeach  
  </tbody>
</table>
@endsection