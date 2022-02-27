<?php

namespace App\Repositories\TourGuide;

use App\Repositories\RepositoryInterface;

interface TourGuideRepositoryInterface extends RepositoryInterface
{
    public function paginate($perPage, $conditions);
}