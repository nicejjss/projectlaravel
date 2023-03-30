<?php


namespace App\Services;


use App\Models\News;
use Illuminate\Support\Facades\File;


class NewsService
{

    public function index()
    {
        return News::visible()->paginate(PER_PAGE);
    }

    public function add($data)
    {
        $imgPath = $this->uploadImage($data);
        News::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
            'img' => $imgPath,
            'visible' => FLAG_ON,
        ]);
    }

    public function view($id)
    {
        return News::find($id);
    }

    public function edit($data, $newsId)
    {
        $news = News::find($newsId);
        $imgPath = '';

        if (empty($data['img'])) {
            $imgPath = $news->img;
        } else {
            if (File::exists(public_path('upload/product/' . $news->img))) {
                File::delete(public_path('upload/product/' . $news->img));
            }

            $imgPath = $this->uploadImage($data);
        }

        $news->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
            'img' => $imgPath,
        ]);
    }

    public function uploadImage($data)
    {
        $imgFile = $data['img'];
        $imgPath = time() . $imgFile->getClientOriginalName();
        $imgFile->move(public_path('upload/news/'), $imgPath);
        return $imgPath;
    }

    public function delete($id)
    {
        $news = News::find($id);
        $news->visible = FLAG_OFF;
        $news->save();
    }

}
