@extends('layouts.admin.layout')
@section('content')
<div class="col-md-10 col-md-offset-1">
    <div style="margin-bottom: 5px;"><a href="{{route('admin.product.add')}}" class="btn btn-primary">Add</a></div>
    <div class="panel panel-primary">
        <div class="panel-heading">Sản Phẩm</div>
        <div class="panel-body">
            <table class="table table-hover table-bordered">
                <tr>
                    <th width="15%">Ảnh SP </th>
                    <th>Tên SP</th>
                    <th>Danh Mục SP </th>
                    <th>Đơn Giá</th>
                    <th style="width: 100px;">
                    </th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td><img src="{{asset('upload/product/'.$product->img)}}" class="img-responsive" /></td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->category_name}}</td>
                    <td><p><b>{{number_format($product->price,'0','','.')}}₫</b></p></td>
                    <td style="text-align: center;">
                        <a href="">Edit</a>&nbsp;&nbsp;
                        <a onclick="return window.confirm('Are you sure?');" href="{{route('admin.product.delete',['id'=>$product->id])}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <ul class="pagination" style="padding:0px; margin:0px;">
                <li><a href="#">Trang</a></li>

                @for($i=1;$i<=$products->lastPage();$i++)
                    <li><a href="{{route('admin.products',['page'=>$i])}}">{{$i}}</a></li>
                @endfor
            </ul>
        </div>
    </div>
</div>
@endsection
