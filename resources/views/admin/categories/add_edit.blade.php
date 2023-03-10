@extends('layouts.admin.layout')
@section('content')
<div class="container" style="margin-top: 30px;">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm Danh Mục Sản Phẩm</div>
            <form method="post" action="">
                @csrf
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">Tên Danh Mục </div>
                        <div class="col-md-9"><input type="text" name="c_name" required class="form-control"></div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <input type="submit" value="Thêm Danh Mục" class="btn btn-primary">
                            <input type="reset" value="Reset" class="btn btn-danger">
                            <a href="admin.php?controller=category_product" class="btn btn-warningr"> Huy </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
