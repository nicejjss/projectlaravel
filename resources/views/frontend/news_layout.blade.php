@foreach($news as $news_item)
<div class="item">
    <div class="article"><a href="index.php?controller=news_detail&id={{$news_item->id}}}" class="image"> <img
                alt="{{$news_item->title}}"
                class="img-responsive"
                src="{{asset('upload/news/'.$news_item->img)}}"
                title="{{$news_item->title}}"> </a>
        <div class="info">
            <h3><a href="index.php?controller=news_detail&id={{$news_item->id}}">{{$news_item->name}}</a></h3>
            <p class="desc">
            <p>{{$news_item->description}}</p>
            </p>
        </div>
    </div>
</div>
@endforeach


