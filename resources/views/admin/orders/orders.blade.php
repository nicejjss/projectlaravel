@extends('layouts.admin.layout')
@section('content')
    <div class="col-md-10 col-md-offset-1">
        <!--    <div style="margin-bottom: 5px;"><a href="admin.php?controller=add_edit_category_product&act=add" class="btn btn-primary">Add</a></div>-->
        <div class="panel panel-primary">
            <div class="panel-heading">Đơn Hàng</div>
            <div class="panel-body">
                <form action="{{route('admin.orders.update')}}" method="post">
                    @csrf
                    @method('put')
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>ID Hoa Don</th>
                            <th style="width: 200px;">Khach Hang</th>
                            <th style="width: 200px;">Ngay Mua</th>
                            <th style="width: 200px;">Trang Thai Thanh Toan</th>
                            <th style="width: 100px;">
                            </th>
                        </tr>
                        @foreach($orders as $order)
                        <tr id="order_{{$order->id}}">
                            <td>{{$order->id}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->buy_date}}</td>
                            <td>
                                <input style="width: 100%" width="100%" name="order_{{$order->id}}" type="number" id="qty" min="0" max="1" class="input-control" value="{{$order->status?1:0}}" required="Không thể để trống">
                            </td>
                            <td><a href="{{route('admin.order.detail',['id'=>$order->id])}}">Detail</a></td>
                            <td><a href="{{route('admin.order.delete',['id'=>$order->id])}}">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                    <button type="submit">Cap Nhat Trang Thai Don Hang</button>
                </form>
                <ul class="pagination" style="padding:0px; margin:0px;">
                    <li><a href="#">Trang</a></li>
                    @for($i =1 ; $i<= $orders->lastPage();$i++)
                    <li><a href="{{route('admin.orders',['page'=>$i])}}">{{$i}}</a></li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
@endsection
