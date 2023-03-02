@extends('layouts.layout')
{{--asdasdsad--}}
@section('content')
<div class="special-collection">
    <div class="tabs-container">
        <div class="clearfix">
            <h2>Sản phẩm Hot</h2>
        </div>
    </div>
    <div class="tabs-content row">
        <div id="content-tabb1" class="content-tab content-tab-proindex" style="display:none">
            <div class="clearfix">
            @foreach($posts as $post)
                    <div class="col-xs-6 col-md-3 col-sm-6 ">
                        <div class="product-grid" id="product-1168979">
                            <div class="image">
                                <a href="/product/{{$post->id}}">
                                        <img title="Sản phẩm ..." alt="{{$post->name}}" class="img-responsive" src="../../public/upload/product/{{$post->img}}" style="max-width: 100px;">
                                </a>
                            </div>
                            <div class="info">
                                <h3 class="name"><a href="/product/{{$post->id}}">{{$post->name}}</a></h3>
                                <p class="price-box"> <span class="special-price"> <span class="price product-price"> {{number_format($post->price, 0, '', '.') }}₫ </span> </span> </p>
                                <div class="action-btn">
                                    <form action="cart/add" method="post" enctype="multipart/form-data" id="product-actions-1168979">
                                        <a href="/product/{{$post->id}}" class="button">Chọn sản phẩm</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
                <!-- end box product -->
                <!-- paging -->
                <div style="clear: both;"></div>
                <ul class="pagination pull-right" style="margin-top: 0px !important; padding-right: 15px;">
                    <li><a href="#">Trang</a></li>

                </ul>
                <!-- end box product -->
            </div>
        </div>
    </div>
</div>
@endsection
