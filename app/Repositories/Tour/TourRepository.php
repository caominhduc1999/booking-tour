<?php

namespace App\Repositories\Tour;

use App\Models\Tour;
use App\Repositories\RepositoryAbstract;
use Illuminate\Support\Carbon;

class TourRepository extends RepositoryAbstract implements TourRepositoryInterface
{
    public function __construct(Tour $tour)
    {
        $this->model = $tour;
    }

    public function paginate($perPage, $conditions)
    {
        return $this->model
            ->when(isset($conditions['name']), function ($q) use ($conditions) {
                $q->where('name', 'like', '%' . $conditions['name'] . '%');
            })
            ->when(isset($conditions['code']), function ($q) use ($conditions) {
                $q->where('code', $conditions['code']);
            })
            ->when(isset($conditions['tour_guide_id']), function ($q) use ($conditions) {
                $q->where('tour_guide_id', $conditions['tour_guide_id']);
            })
            ->when(isset($conditions['frequency']), function ($q) use ($conditions) {
                $q->where('frequency', $conditions['frequency']);
            })
            ->when(isset($conditions['is_feature']), function ($q) use ($conditions) {
                $q->where('is_feature', $conditions['is_feature']);
            })
            ->when(isset($conditions['people_limit_from']), function ($q) use ($conditions) {
                $q->where('people_limit', '>=', $conditions['people_limit_from']);
            })
            ->when(isset($conditions['people_limit_to']), function ($q) use ($conditions) {
                $q->where('people_limit', '<=', $conditions['people_limit_to']);
            })
            ->when(isset($conditions['days_from']), function ($q) use ($conditions) {
                $q->where('days', '>=', $conditions['days_from']);
            })
            ->when(isset($conditions['days_to']), function ($q) use ($conditions) {
                $q->where('days', '<=', $conditions['days_to']);
            })
            ->when(isset($conditions['type']), function ($q) use ($conditions) {
                $q->where('type', $conditions['type']);
            })
            ->when(isset($conditions['departure']), function ($q) use ($conditions) {
                $q->where('departure', 'like', '%' . $conditions['departure'] . '%');
            })
            ->when(isset($conditions['destination']), function ($q) use ($conditions) {
                $q->where('destination', 'like', '%' . $conditions['destination'] . '%');
            })
            ->when(isset($conditions['adult_price_from']), function ($q) use ($conditions) {
                $q->where('adult_price', '>=', $conditions['adult_price_from']);
            })
            ->when(isset($conditions['adult_price_to']), function ($q) use ($conditions) {
                $q->where('adult_price', '<=', $conditions['adult_price_to']);
            })
            ->when(isset($conditions['children_price_from']), function ($q) use ($conditions) {
                $q->where('children_price', '>=', $conditions['children_price_from']);
            })
            ->when(isset($conditions['children_price_to']), function ($q) use ($conditions) {
                $q->where('children_price', '<=', $conditions['children_price_to']);
            })
            ->when(isset($conditions['baby_price_from']), function ($q) use ($conditions) {
                $q->where('baby_price', '>=', $conditions['baby_price_from']);
            })
            ->when(isset($conditions['baby_price_to']), function ($q) use ($conditions) {
                $q->where('baby_price', '<=', $conditions['baby_price_to']);
            })
            ->paginate($perPage);
    }

    public function getFeatureTours()
    {
        return $this->model->where('is_feature', 1)->orderBy('created_at', 'desc')->limit(6)->get();
    }

    public function getLatestTourByLimit($limit)
    {
        return $this->model->latest()->limit(3)->get();
    }

    public function search($search, $perPage)
    {
        return $this->model
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('journey', 'like', '%' . $search . '%')
            ->paginate($perPage);
    }

    public function findByCondition($conditions, $perPage)
    {
        return $this->model
            ->when(isset($conditions['name']), function($q) use ($conditions) {
                return $q->where('name', 'like', '%' . $conditions['name'] . '%')
                ->orWhere('journey', 'like', '%' . $conditions['name'] . '%');
            })
            ->when(isset($conditions['from_price']), function($q) use ($conditions) {
                return $q->where('adult_price', '>=', $conditions['from_price']);
            })
            ->when(isset($conditions['to_price']), function($q) use ($conditions) {
                return $q->where('adult_price', '<=', $conditions['to_price']);
            })
            ->when(isset($conditions['type']), function($q) use ($conditions) {
                return $q->where('type', $conditions['type']);
            })
            ->when(isset($conditions['frequency']), function($q) use ($conditions) {
                return $q->where('frequency', $conditions['frequency']);
            })
            ->when(isset($conditions['from_days']), function($q) use ($conditions) {
                return $q->where('days', '>=', $conditions['from_days']);
            })
            ->when(isset($conditions['to_days']), function($q) use ($conditions) {
                return $q->where('days', '<=', $conditions['to_days']);
            })
            ->paginate($perPage);
    }
}