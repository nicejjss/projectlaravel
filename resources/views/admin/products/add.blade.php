@extends('layouts.admin.layout')
@section('content')
<div class="container" style="margin-top: 30px;">
    <div class="col-md-6 col-md-offset-3">
        <?php
        if(isset($_GET["err"])&&$_GET["err"]=="invalid")
        {
        ?>
        <div class="alert alert-danger">Anh Co Ten Bi Trung</div>
        <?php } ?>
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm Sản Phẩm</div>
            <form method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="panel-body">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-3">Tên SP </div>
                        <div class="col-md-9"><input type="text" name="name" required class="form-control"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Danh Mục SP </div>
                        <div class="col-md-9">
                            <select  style="padding: 5px;" id="fk_category-id" name="category_id">
                                @foreach($listCate as $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Mô Tả SP </div>
                        <div class="col-md-9"><textarea type="text" name="description" rows="5" required class="form-control"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Content SP </div>
                        <div class="col-md-9"><textarea type="text" name="content"  rows="5" required class="form-control"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Ảnh SP </div>
                        <div class="col-md-9"><input type="file" accept="image/png, image/gif, image/jpeg"  name="img" required class=""></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Giá SP </div>
                        <div class="col-md-9"><input type="number" name="price" required class="form-control"></div>
                    </div>
                    <!-- row -->
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <input type="submit" value="Thêm Sản Phẩm" class="btn btn-primary">
                            <input type="reset" value="Reset" class="btn btn-danger">
                            <a href="{{route('admin.products')}}" class="btn btn-warningr"> Huy </a>
                        </div>

                    </div>
                    <!-- end row -->
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
