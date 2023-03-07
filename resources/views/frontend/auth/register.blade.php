@extends('layouts.layout')
@section('content')
<div class="template-customer">
    <h1>Đăng Ký tài khoản</h1>
    <p>Nếu bạn có tài khoản xin vui lòng đăng nhập</p>
    <div class="row" style="margin-top:50px;">
        <div class="col-md-6">
            <div class="wrapper-form">
               @isset($fail)
                   <p style="color: red">{{$fail}}</p>
                @endisset
                <form method='post' action="">
                    @csrf
                    <p class="title"><span>Đăng Ký tài khoản</span></p>
                    <div class="form-group">
                        <label>HoTen<b id="req">*</b></label>
                        <input type="text" class="input-control" name="name" required="">
                    </div>
                    <div class="form-group">
                        <label>Email:<b id="req">*</b></label>
                        <input type="email" class="input-control" name="email" required="">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu:<b id="req">*</b></label>
                        <input type="password" class="input-control" name="password" required="">
                    </div>
                    <div class="form-group">
                        <label>Dia Chi:<b id="req">*</b></label>
                        <input type="text" class="input-control" name="address" required="">
                    </div>
                    <div class="form-group">
                        <label>SDT: <b id="req">*</b></label>
                        <input type="text" class="input-control" name="phone" required="">
                    </div>
                    <input type="submit" class="button" value="Đăng Ky">
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="wrapper-form">
                <p class="title"><span>Tạo tài khoản mới</span></p>
                <p>Đăng ký tài khoản để mua hàng nhanh hơn. Theo dõi đơn đặt hàng, vận chuyển. Cập nhật các sự kiện và chương trình giảm giá của chúng tôi.</p>
                <a href="{{URL('login')}}" class="button">Đăng Nhap</a> </div>
        </div>
    </div>
</div>
@endsection
