<?php

namespace App\Repositories\Transition;

use App\Models\Transition;
use App\Repositories\RepositoryAbstract;

class TransitionRepository extends RepositoryAbstract implements TransitionRepositoryInterface
{
    public function __construct(Transition $transition)
    {
        $this->model = $transition;
    }

    public function paginate($perPage, $conditions)
    {
        return $this->model
            ->when(isset($conditions['transaction_code']), function ($q) use ($conditions) {
                $q->where('transaction_code', $conditions['transaction_code']);
            })
            ->when(isset($conditions['payment_method']), function ($q) use ($conditions) {
                $q->where('payment_method',  $conditions['payment_method']);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
}