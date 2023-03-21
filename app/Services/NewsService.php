<?php


namespace App\Services;


use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
use Illuminate\Support\Facades\File;
=======
>>>>>>> origin/master

class NewsService
{

    public function index()
    {
<<<<<<< HEAD
        return News::paginate(PER_PAGE);
    }

    public function add($request)
    {
        $data = $request->all();
        $imgName = time() . $data['img']->getClientOriginalName();
        $request->img->move(public_path('upload/news/'), $imgName);
        News::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
            'img' => $imgName,
        ]);
    }

    public function view($id)
    {
        return News::find($id);
    }

    public function edit($request, $news)
    {
        $data = $request->all();
        if (File::exists(public_path('upload/news/' . $news->img))) {
            File::delete(public_path('upload/news/' . $news->img));
        }
        $imgName = time() . $data['img']->getClientOriginalName();
        $request->img->move(public_path('upload/news/'), $imgName);
        $news->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
            'img' => $imgName,
        ]);
    }
    public function delete($id)
    {
        $news = News::find($id);
        if (File::exists(public_path('upload/news/' . $news->img))) {
            File::delete(public_path('upload/news/' . $news->img));
        }
        $news->delete();
=======
        return News::paginate(4);
    }

    public function create(array $data)
    {


    }

    public function find($id)
    {

    }

    public function update(array $data, int $id)
    {

    }

    public function remove($id)
    {

    }

    public function getPostsByType(int $type)
    {
>>>>>>> origin/master

    }
}
