<?php

namespace App\Repositories\Hotel;

use App\Models\Hotel;
use App\Repositories\RepositoryAbstract;

class HotelRepository extends RepositoryAbstract implements HotelRepositoryInterface
{
    public function __construct(Hotel $hotel)
    {
        $this->model = $hotel;
    }

    public function paginate($perPage, $conditions)
    {
        return $this->model
            ->when(isset($conditions['name']), function ($q) use ($conditions) {
                $q->where('name', 'like', '%' . $conditions['name'] . '%');
            })
            ->when(isset($conditions['hotline']), function ($q) use ($conditions) {
                $q->where('hotline',  $conditions['hotline']);
            })
            ->paginate($perPage);
    }
}