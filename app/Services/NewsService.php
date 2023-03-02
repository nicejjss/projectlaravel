<?php


namespace App\Services;




use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsService{

    public function news_layout()
    {
        return News::all();
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

    }
}
