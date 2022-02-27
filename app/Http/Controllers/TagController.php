<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }
    public function index(Request $request)
    {
        $perPage = 10;
        $conditions = [
            'name' => $request->name
        ];
        $tags = $this->tagService->paginate($perPage, $conditions);

        return view('admin.pages.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.pages.tag.create');
    }

    public function store(StoreTagRequest $request)
    {
        $result = $this->tagService->store($request->all());

        $messages = [
            'success' => 'Thêm mới thành công',
            'error' => 'Thêm mới thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('tags.index')->with($notify);
    }

    public function edit($id)
    {
        $tag = $this->tagService->find($id);

        return view('admin.pages.tag.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, $id)
    {
        $result = $this->tagService->update($id, $request->all());

        $messages = [
            'success' => 'Sửa thành công',
            'error' => 'Sửa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('tags.index')->with($notify);
    }

    public function destroy($id)
    {
        $result = $this->tagService->delete($id);

        $messages = [
            'success' => 'Xóa thành công',
            'error' => 'Xóa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('tags.index')->with($notify);
    }
}
