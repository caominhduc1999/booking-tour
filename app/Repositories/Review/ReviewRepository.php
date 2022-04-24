<?php

namespace App\Repositories\Review;

use App\Models\Review;
use App\Repositories\RepositoryAbstract;

class ReviewRepository extends RepositoryAbstract implements ReviewRepositoryInterface
{
    public function __construct(Review $review)
    {
        $this->model = $review;
    }

    public function paginate($perPage, $conditions)
    {
        return $this->model
            ->when(isset($conditions['tour_id']), function ($q) use ($conditions) {
                $q->where('tour_id', $conditions['tour_id']);
            })
            ->when(isset($conditions['stars']), function ($q) use ($conditions) {
                $q->where('stars', $conditions['stars']);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
}