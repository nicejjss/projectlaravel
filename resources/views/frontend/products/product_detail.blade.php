@extends('layouts.layout')
@section('content')
<div class="product-detail" itemscope itemtype="http://schema.org/Product">
    <meta itemprop="url" content="//dktstore-theme.bizwebvietnam.net/microsoft-lumia-950-xl-mau-den">
    <meta itemprop="image" content="public/frontend/images/msc.jpg?v=1469340617533">
    <meta itemprop="shop-currency" content="VND">
    <div class="top">
        <div class="row">
            <div class="col-xs-12 col-md-6 product-image">
                <div class="featured-image"> <img src="{{asset('upload/product/'.$product->img)}}" class="img-responsive" id="large-image" itemprop="image" data-zoom-image="//bizweb.dktcdn.net/100/047/633/products/msc.jpg?v=1469340617533"

                                                  alt="MICROSOFT LUMIA 950 XL"
                    /> </div>
            </div>
            <div class="col-xs-12 col-md-6 info">
                <h1 itemprop="name">{{$product->name}}</h1>
                <p class="sku">Mã sản phẩm:&nbsp; <span>{{$product->id}}</span></p>
                <p class="vendor">Nhà sản xuất:&nbsp; <span>MICROSOFT</span></p>
                <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price"> {{number_format($product->price, 0, '', '.')}}₫ </span> </span> </p>
                <p class="desc rte">{{$product->description}}</p>
                <form action="{{route('cart.add',['id'=>$product->id])}}" method="post" enctype="multipart/form-data" class="product-form">
                    @csrf
<!--                    <select id="product-selectors" name="variantId" style="display:none">-->
<!--                        <option  selected="selected"  value="1853207">Đen - 15.990.000₫</option>-->
<!--                        <option  value="1853286">Trắng - 14.500.000₫</option>-->
<!--                    </select>-->
                    <div class="quantity">
                        <label>Số lượng</label>
                        <input type="number" id="qty" name="quantity" value="1" min="1" class="input-control" required="Không thể để trống">
                    </div>
                    <div class="action-btn">
                       <button type="submit" style="display: none" class="button product-add-to-cart">Cho vào giỏ hàng</button>
                        <button type="submit" style="background-color: #77ca64;
    border: none;
    padding: 13px 25px;
    color: #fff;
    outline: none;
    text-decoration: none;
    border: 0;
    display: inline-block;
    background: #77ca64;
    padding: 7px;
    text-transform: uppercase;
    line-height: 12px;
    border-radius: 20px;
    padding: 13px 25px;"  >Cho vào Giỏ Hàng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="middle">
        <ul class="list-unstyled navtabs">
            <li><a href="#tab1" class="head-tabs head-tab1 active" data-src=".head-tab1">Chi tiết sản phẩm</a></li>
        </ul>
        <div class="tab-container">
            <!-- chi tiet -->
            <div id="tab1" class="content-tabs">
                <div class="rte">
                    <p style="text-align: justify;">{{$product->content}}</p>
<!--                    <p style="text-align: justify;"><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>-->
<!--                    <ul>-->
<!--                        <li style="text-align: justify;">Hệ điều hành Windows Phone 10 mới nhất, nhanh và tối ưu</li>-->
<!--                        <li style="text-align: justify;">Màn hình WQHD (2560 x 1440) kích thước 5.7 inches với cảm ứng siêu nhạy</li>-->
<!--                        <li style="text-align: justify;">Camera "khủng" 20MP, quay phim 4K; Camera trước góc rộng 5MP quay phim Full HD</li>-->
<!--                        <li style="text-align: justify;">Chip 8 nhân Snapdragon 810 mạnh mẽ, Ram 3GB</li>-->
<!--                        <li style="text-align: justify;">Bộ nhớ trong 32GB, có khe cắm thẻ nhớ ngoài (hỗ trợ tối đa 200GB)</li>-->
<!--                        <li style="text-align: justify;">Dung lượng pin 3340 mAh cho thời gian sử dụng dài ngày</li>-->
<!--                    </ul>-->
                </div>
            </div>
            <!-- chi tiet -->
        </div>
    </div>
</div>
@endsection
