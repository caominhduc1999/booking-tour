<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Services\CategoryService;
use App\Services\TagService;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Services\TourService;

class ArticleController extends Controller
{
    protected $articleService;
    protected $categoryService;
    protected $tagService;
    protected $tourService;

    public function __construct(
        ArticleService $articleService,
        CategoryService $categoryService,
        TagService $tagService,
        TourService $tourService
    ) {
        $this->articleService = $articleService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
        $this->tourService = $tourService;
    }

    public function index(Request $request)
    {
        $perPage = 10;
        $conditions = [ 
            'title' => $request->title,
            'tour_id' => $request->tour_id,
            'category_id' => $request->category_id
        ];
        $articles = $this->articleService->paginate($perPage, $conditions);
        $categories = $this->categoryService->getAll();
        $tours = $this->tourService->getAll();

        return view('admin.pages.article.index', compact('articles', 'categories', 'tours'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAll();
        $tags = $this->tagService->getAll();
        $tours = $this->tourService->getAll();

        return view('admin.pages.article.create', compact('categories', 'tags', 'tours'));
    }

    public function store(StoreArticleRequest $request)
    {
        $result = $this->articleService->store($request->all());

        $messages = [
            'success' => 'Thêm mới thành công',
            'error' => 'Thêm mới thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('articles.index')->with($notify);
    }

    public function edit($id)
    {
        $article = $this->articleService->find($id);
        $categories = $this->categoryService->getAll();
        $tags = $this->tagService->getAll();
        $tours = $this->tourService->getAll();
        $initialTagIds = $article->tags->pluck('id')->toArray();

        return view('admin.pages.article.edit', compact('article', 'categories', 'tags', 'tours', 'initialTagIds'));
    }

    public function update(UpdateArticleRequest $request, $id)
    {
        $result = $this->articleService->update($id, $request->all());

        $messages = [
            'success' => 'Sửa thành công',
            'error' => 'Sửa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('articles.index')->with($notify);
    }

    public function destroy($id)
    {
        $result = $this->articleService->delete($id);

        $messages = [
            'success' => 'Xóa thành công',
            'error' => 'Xóa thất bại'
        ];
        $notify = $this->notify($result, $messages);

        return redirect()->route('articles.index')->with($notify);
    }
}
