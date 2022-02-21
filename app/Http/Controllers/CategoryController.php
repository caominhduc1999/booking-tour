<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index(Request $request)
    {
        $perPage = 3;
        $conditions = [
            'name' => $request->name
        ];
        $categories = $this->categoryService->paginate($perPage, $conditions);

        return view('admin.pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $result = $this->categoryService->store($request->all());

        $messages = [
            'success' => 'Thêm mới thành công',
            'error' => 'Thêm mới thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('categories.index')->with($notify);
    }

    public function edit($id)
    {
        $category = $this->categoryService->find($id);

        return view('admin.pages.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $result = $this->categoryService->update($id, $request->all());

        $messages = [
            'success' => 'Sửa thành công',
            'error' => 'Sửa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('categories.index')->with($notify);
    }

    public function destroy($id)
    {
        $result = $this->categoryService->delete($id);

        $messages = [
            'success' => 'Xóa thành công',
            'error' => 'Xóa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('categories.index')->with($notify);
    }
}