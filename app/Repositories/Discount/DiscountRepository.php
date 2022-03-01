<?php

namespace App\Repositories\Discount;

use App\Models\Discount;
use App\Repositories\RepositoryAbstract;
use Carbon\Carbon;

class DiscountRepository extends RepositoryAbstract implements DiscountRepositoryInterface
{
    public function __construct(Discount $discount)
    {
        $this->model = $discount;
    }

    public function paginate($perPage, $conditions)
    {
        return $this->model
            ->when(isset($conditions['code']), function ($q) use ($conditions) {
                $q->where('code', $conditions['code']);
            })
            ->when(isset($conditions['start_date_from']), function ($q) use ($conditions) {
                $q->whereDate('start_date', '>=', Carbon::parse($conditions['start_date_from']));
            })
            ->when(isset($conditions['start_date_to']), function ($q) use ($conditions) {
                $q->whereDate('start_date', '<=', Carbon::parse($conditions['start_date_to']));
            })
            ->when(isset($conditions['end_date_from']), function ($q) use ($conditions) {
                $q->whereDate('end_date', '>=', Carbon::parse($conditions['end_date_from']));
            })
            ->when(isset($conditions['end_date_to']), function ($q) use ($conditions) {
                $q->whereDate('end_date', '<=', Carbon::parse($conditions['end_date_to']));
            })
            ->when(isset($conditions['discount_rate_from']), function ($q) use ($conditions) {
                $q->where('discount_rate', '>=', $conditions['discount_rate_from']);
            })
            ->when(isset($conditions['discount_rate_to']), function ($q) use ($conditions) {
                $q->where('discount_rate', '>=', $conditions['discount_rate_to']);
            })
            ->when(isset($conditions['remain_number_from']), function ($q) use ($conditions) {
                $q->where('remain_number', '>=', $conditions['remain_number_from']);
            })
            ->when(isset($conditions['remain_number_to']), function ($q) use ($conditions) {
                $q->where('remain_number', '>=', $conditions['remain_number_to']);
            })
            ->paginate($perPage);
    }
}