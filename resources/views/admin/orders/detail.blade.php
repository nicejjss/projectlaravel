@extends('layouts.admin.layout')
@section('content')
    <div class="template-cart">
        <form action="index.php?controller=cart&act=update" method="post">
            <label>Ho Ten: </label> <label>{{$data['cus']->name}}</label>
            <br>
            <label>Dia Chi: </label> <label>{{$data['cus']->address}}</label>
            <br>
            <label>Ngay Mua: </label> <label>{{$data['cus']->buy_date}}</label>
            <div class="table-responsive">
                <table class="table table-cart">
                    <thead>
                    <tr>
                        <th class="image">Ảnh sản phẩm</th>
                        <th class="name">Tên sản phẩm</th>
                        <th class="price">Giá bán lẻ</th>
                        <th class="quantity">Số lượng</th>
                        <th class="price">Thành tiền</th>

                    </tr>
                    </thead>
                    <tbody>

                   @foreach($data['order'] as $order)
                    <tr>
                        <td width="15%"><img src="{{asset('upload/product/'.$order->img)}}" class="img-responsive" /></td>
                        <td>{{$order->name}}</td>
                        <td>{{number_format( $order->price,0,'','.')}}₫</td>
                        <td>{{$order->number}}</td>
                        <td><p><b>{{number_format($order->price*$order->number,0,'','.')}}₫</b></p></td>
                    </tr>
                   @endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </form>
        <div class="total-cart"><b> Tổng thanh toán:{{number_format($data['total'],0,'','.')}}
                ₫</b>
            <br>
            <!--        <a href="index.php?controller=checkout" class="button black">Thanh toán</a>-->
        </div>
    </div>
@endsection
