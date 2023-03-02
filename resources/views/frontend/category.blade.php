@foreach($categories as $category)
    <li><a href="index.php?controller=product&act=category&id={{$category->id}}&name={{$category->name}}">{{$category->name}}</a></li>
@endforeach


