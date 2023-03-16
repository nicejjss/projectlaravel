@extends('layouts.admin.layout')
@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div style="margin-bottom: 5px;"><a href="{{route('admin.news.add')}}" class="btn btn-primary">Add</a></div>
        <div class="panel panel-primary">
            <!--        <div style="margin-bottom: 5px;"><a href="admin.php?controller=add_edit_category_product&act=add" class="btn btn-primary">Add</a></div>-->

            <div class="panel-heading">Tin Tức</div>
            <div class="panel-body">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th style="width: 300px;">Ảnh Tin</th>
                        <th style="width: 200px;">Tên Tin</th>
                        <th style="width: 100px;">
                        </th>
                    </tr>
                    @foreach($listNews as $news)
                        <tr>
                            <td><img width="100%" src="{{asset('upload/news/'.$news->img)}}" alt="{{$news->img}}"></td>
                            <td>{{$news->title}}</td>
                            <td><a href="{{route('admin.news.edit',['id'=>$news->id])}}">Edit</a></td>
                            <td><a href="{{route('admin.news.delete',['id'=>$news->id])}}">Delete</a></td>
                        </tr>
                    @endforeach
                </table>
                <ul class="pagination" style="padding:0px; margin:0px;">
                    <li><a href="#">Trang</a></li>
                    @for($i=1;$i<=$listNews->lastPage();$i++)
                        <li><a href="{{route('admin.news',['page'=>$i])}}">{{$i}}</a></li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
@endsection
