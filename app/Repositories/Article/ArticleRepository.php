<?php

namespace App\Repositories\Article;

use App\Models\Article;
use App\Repositories\RepositoryAbstract;

class ArticleRepository extends RepositoryAbstract implements ArticleRepositoryInterface
{
    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    public function paginate($perPage, $conditions)
    {
        return $this->model
            ->when(isset($conditions['category_id']), function ($q) use ($conditions) {
                $q->where('category_id', $conditions['category_id']);
            })
            ->when(isset($conditions['tour_id']), function ($q) use ($conditions) {
                $q->where('tour_id', $conditions['tour_id']);
            })
            ->when(isset($conditions['title']), function ($q) use ($conditions) {
                $q->where('title', 'like', '%' . $conditions['title'] . '%');
            })
            ->paginate($perPage);
    }

    public function getLatestArticlesByLimit($limit)
    {
        return $this->model->orderBy('created_at', 'desc')->limit($limit)->get();
    }

    public function getPaginate($perPage)
    {
        return $this->model->paginate($perPage);
    }

    public function getByCategoryId($id, $perPage)
    {
        return $this->model->where('category_id', $id)->paginate($perPage);
    }

    public function getByTagId($id, $perPage)
    {
        return $this->model->whereHas('tags', function($q) use ($id) {
            return $q->where('tags.id', $id);
        })->paginate($perPage);
    }

    public function search($search, $perPage)
    {
        return $this->model
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('overall', 'like', '%' . $search . '%')
            ->paginate($perPage);
    }
}