<?php

namespace App\Repositories\TourGuide;

use App\Models\TourGuide;
use App\Repositories\RepositoryAbstract;

class TourGuideRepository extends RepositoryAbstract implements TourGuideRepositoryInterface
{
    public function __construct(TourGuide $tourGuide)
    {
        $this->model = $tourGuide;
    }

    public function paginate($perPage, $conditions)
    {
        return $this->model
            ->when(isset($conditions['name']), function ($q) use ($conditions) {
                $q->where('name', 'like', '%' . $conditions['name'] . '%');
            })
            ->when(isset($conditions['phone']), function ($q) use ($conditions) {
                $q->where('phone',  $conditions['phone']);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
}