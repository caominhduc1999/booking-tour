<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Services\CategoryService;
use App\Services\TagService;
use Illuminate\Http\Request;
use App\Services\TourService;

class HomeController extends Controller
{
    protected $tourService;
    protected $articleService;
    protected $categoryService;
    protected $tagService;

    public function __construct(
        TourService $tourService,
        ArticleService $articleService,
        CategoryService $categoryService,
        TagService $tagService
    ) {
        $this->tourService = $tourService;
        $this->articleService = $articleService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
    }

    public function index()
    {
        $tours = $this->tourService->getFeatureTours();
        $articles = $this->articleService->getLatestArticlesByLimit(2);

        return view('client.index', compact('tours', 'articles'));
    }

    public function tourList()
    {
        $tours = $this->tourService->paginate(4, []);

        return view('client.tour_list', compact('tours'));
    }

    public function tourDetail($id)
    {
        $tour = $this->tourService->find($id);

        return view('client.tour_detail', compact('tour'));
    }

    public function articleList(Request $request)
    {
        $categories = $this->categoryService->getAll();
        $latestArticles = $this->articleService->getLatestArticlesByLimit(3);
        $tags = $this->tagService->getAll();
        if (isset($request->category_id)) {
            $articles = $this->articleService->getByCategoryId($request->category_id, 6);
        } elseif (isset($request->tag_id)) {
            $articles = $this->articleService->getByTagId($request->tag_id, 6);
        } elseif (isset($request->search)) {
            $articles = $this->articleService->search($request->search, 6);
        } else {
            $articles = $this->articleService->getPaginate(4);
        }

        return view('client.article_list', compact('articles', 'categories', 'latestArticles', 'tags'));
    }

    public function articleDetail($id)
    {
        $article = $this->articleService->find($id);
        $categories = $this->categoryService->getAll();
        $latestArticles = $this->articleService->getLatestArticlesByLimit(3);
        $tags = $this->tagService->getAll();

        return view('client.article_detail',  compact('article', 'categories', 'latestArticles', 'tags'));
    }

    public function getLogin()
    {
        return view('client.login');
    }

    public function booking()
    {
        return view('client.booking');
    }
}
