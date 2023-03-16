@extends('layouts.admin.layout')
@section('content')
    <div class="col-md-10 col-md-offset-1">
        <!--    <div style="margin-bottom: 5px;"><a href="admin.php?controller=add_edit_category_product&act=add" class="btn btn-primary">Add</a></div>-->
        <div class="panel panel-primary">
            <div class="panel-heading">Khách Hàng</div>
            <div class="panel-body">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>Tên Khách Hàng</th>
                        <th style="width: 200px;">SĐT</th>
                        <th style="width: 200px;">Địa Chỉ</th>
                        <th style="width: 200px;">Email</th>
                        <th style="width: 100px;">
                        </th>
                    </tr>
                  @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->email}}</td>
                    </tr>
                    @endforeach
                </table>
                <ul class="pagination" style="padding:0px; margin:0px;">
                    <li><a href="#">Trang</a></li>
                   @for($i =1 ;$i<= $customers->lastPage();$i++)
                    <li><a href="{{route('admin.customers',['page'=>$i])}}">{{$i}}</a></li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
@endsection
