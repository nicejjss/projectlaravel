@extends('layouts.admin.layout')
@section('content')
<div class="col-md-10 col-md-offset-1">
	<div style="margin-bottom: 5px;"><a href="{{route('admin.category.add')}}" class="btn btn-primary">Add</a></div>
	<div class="panel panel-primary">
		<div class="panel-heading">Danh Mục Sản Phẩm</div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<tr>
					<th>Tên danh mục</th>
					<th style="width: 200px;">Hiển thị trang chủ</th>
                    <th>Số Lượng SP</th>
					<th style="width: 100px;">
					</th>
				</tr>
                @foreach($categories as $category)
{{--                    {{dd($category)}}--}}
				<tr>
					<td>{{$category->name}}</td>
					<td style="text-align: center;">
                        @if($category['home'])
						<span class="glyphicon glyphicon-check"></span>
                        @endif
					</td>
                    <td>{{$category['totalNumber']}}</td>
					<td style="text-align: center;">
						<a href="{{route('admin.category.edit',['id'=>$category['id']])}}">Edit</a>&nbsp;&nbsp;
						<a onclick="return window.confirm('Are you sure?');" href="{{route('admin.category.delete',['id'=>$category['id']])}}">Delete</a>
					</td>
				</tr>
                @endforeach
			</table>
			<ul class="pagination" style="padding:0px; margin:0px;">
				<li><a href="#">Trang</a></li>
{{--				<li><a href="admin.php?controller=category_product&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>--}}
                @for($i=1;$i<=$categories->lastPage();$i++)
                    <li><a href="{{route('admin.categories',['page'=>$i])}}">{{$i}}</a></li>
                @endfor
			</ul>
		</div>
	</div>
</div>
@endsection
