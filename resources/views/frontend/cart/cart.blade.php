@extends('layouts.layout')
@section('content')
<div class="template-cart">
    @if(empty($cartProducts))
        <p style="margin-top: 20px; font-size: 20px">Khong Co San Pham Nao</p>
    @else
        <form action="/cart/update" method="post">
            @csrf
            <div class="table-responsive">
                <table class="table table-cart">
                    <thead>
                    <tr>
                        <th class="image">Ảnh sản phẩm</th>
                        <th class="name">Tên sản phẩm</th>
                        <th class="price">Giá bán lẻ</th>
                        <th class="quantity">Số lượng</th>
                        <th class="price">Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartProducts as $key=> $cartProduct)
                        <tr>
                            <td><img src="{{asset('upload/product/'.$cartProduct['img'])}}" class="img-responsive" /></td>
                            <td><a href="product/{{$cartProduct['id']}}">{{$cartProduct['name']}}</a></td>
                            <td> {{number_format($cartProduct['price'],0,'','.')}}₫ </td>
                            <td><input type="number" id="qty" min="1" class="input-control" value="{{$cartProduct['quantity']}}" name="{{$key}}" required="Không thể để trống"></td>
                            <td><p><b>{{number_format($cartProduct['price'] * $cartProduct['quantity'],0,'','.')}}₫</b></p></td>
                            <td><a href="{{route('cart.delete',['id'=>$cartProduct['id']])}}" data-id="2479395"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6"><a href="{{route('cart.destroy')}}" class="button pull-left">Xóa toàn bộ</a> <a href="/" class="button pull-right black">Tiếp tục mua hàng</a>
                            <input type="submit" class="button pull-right" value="Cập nhật"></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </form>
        <div class="total-cart"> Tổng thanh toán:
            {{number_format($total,0,'','.')}}₫ <br>
            <a href="/checkout" class="button black">Thanh toán</a>
        </div>
    @endif

</div>
@endsection
