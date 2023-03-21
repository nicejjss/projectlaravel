@extends('layouts.admin.layout')
@section('content')
    <div class="container" style="margin-top: 30px;">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Sửa Danh Mục Sản Phẩm</div>
                <form method="post" action="{{route('admin.category.edit',['id'=>$category->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="panel-body">
                        <!-- row -->
                        <div class="row">
                            <div class="col-md-4">Tên Danh Mục :</div>
                            <div class="col-md-8"><input required value="{{$category->name}}" type="text" name="name"
                                                         class="form-control"></div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-4">Hiển Thị Trang Chủ:</div>
                            <div class="col-md-8">
                                <input id="c_home1" type="radio" name="home" value="1"
                                       {{$category->home==1?'checked':''}} required><label for="c_home1">Yes</label>
                                <input id="c_home0" type="radio" name="home" value="0"
                                       {{$category->home==0?'checked':''}} required><label for="c_home0">No</label>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row" style="margin-top:5px;">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <input type="submit" value="Sua Danh Mục" class="btn btn-primary">
                                <input type="reset" value="Reset" class="btn btn-danger">
                                <a href="{{route('admin.categories')}}" class="btn btn-warningr"> Huy </a>

                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
