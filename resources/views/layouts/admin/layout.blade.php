<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('backend/ckeditor/ckeditor.js')}}/"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Admin Page</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="active"><a href="{{route('admin.categories')}}">Danh mục sản phẩm</a></li>
                <li class="active"><a href="{{route('admin.products')}}">Danh sách sản phẩm</a></li>
                <li class="active"><a href="admin.php?controller=news">Tin tức</a></li>
                <li class="active"><a href="admin.php?controller=order">Đơn hàng</a></li>
                <li class="active"><a href="admin.php?controller=customer">Customer</a></li>
                <li class="active"><a href="{{route('admin.logout')}}">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container" style="margin-top: 80px;">
  @yield('content')
</div>
</body>
</html>
