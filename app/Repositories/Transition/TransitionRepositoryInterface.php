<?php

namespace App\Repositories\Transition;

use App\Repositories\RepositoryInterface;

interface TransitionRepositoryInterface extends RepositoryInterface
{
    public function paginate($perPage, $conditions);
}