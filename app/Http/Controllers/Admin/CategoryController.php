<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->index();
        return view('admin.categories.categories')->with(['categories' => $categories]);
    }

    public function addView()
    {
        return view('admin.categories.add');
    }

    public function add(CategoryRequest $request)
    {
        $this->categoryService->add($request->validated());
        return redirect()->route('admin.categories');
    }

    public function editView($id)
    {
        $category = $this->categoryService->view($id);
        return view('admin.categories.edit')->with(['category' => $category]);
    }

    public function edit(EditCategoryRequest $request, $id)
    {
        $data ['name'] = $request->validated()['name'];
        $data ['home'] = $request->input('home');
        $this->categoryService->edit($data, $id);
        return redirect()->route('admin.categories');
    }

    public function delete($id)
    {
        $this->categoryService->delete($id);
        return redirect()->route('admin.categories');
    }
}
