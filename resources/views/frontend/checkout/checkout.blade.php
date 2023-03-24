@extends('layouts.layout')
@section('content')
<h1>Hóa Đơn Thanh Toán</h1>
@if(empty($products))
    <p style="margin-top: 20px; font-size: 20px">Khong Co San Pham Nao</p>
@else
<form method="post" action="{{route('checkout.pay')}}" style="margin-top: 20px">
    @csrf
    <label>Ho Ten: </label> <label>{{auth('customer')->user()->name}}</label>
    <br>
    <br>
    <label>Dia Chi: </label> <label>{{auth('customer')->user()->address}}</label>
    <div class="template-cart">
        <form action="" method="post">
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
@foreach($products as $key => $product)
                        <tr>
                            <td><img src="{{asset('upload/product/'.$product['img'])}}" class="img-responsive" /></td>
                            <td><a href="{{route('product',$key)}}">{{$product['name']}}</a></td>
                            <td> {{number_format($product['price'],0,'','.')}}₫ </td>
                            <td>{{$product['quantity']}}</td>
                            <td><p><b>{{number_format($product['price']*$product['quantity'],0,'','.')}}₫</b></p></td>
                        </tr>
@endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6"><a href="{{route('cart.destroy')}}" class="button pull-left">Huy Don hang</a>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </form>
        <div class="total-cart"> Tổng tiền thanh toán:

            {{number_format($total,0,'','.')}}₫ <br>
           <input type="submit" value="Thanh Toan Hoa Don"></div>
    </div>
</form>
@endif
@endsection
