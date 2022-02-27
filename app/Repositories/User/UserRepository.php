<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\RepositoryAbstract;

class UserRepository extends RepositoryAbstract implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function paginate($perPage, $conditions)
    {
        return $this->model
            ->when(isset($conditions['name']), function ($q) use ($conditions) {
                $q->where('name', 'like', '%' . $conditions['name'] . '%');
            })
            ->when(isset($conditions['email']), function ($q) use ($conditions) {
                $q->where('email', $conditions['email']);
            })
            ->when(isset($conditions['phone']), function ($q) use ($conditions) {
                $q->where('phone', $conditions['phone']);
            })
            ->when(isset($conditions['role']), function ($q) use ($conditions) {
                $q->where('role', $conditions['role']);
            })
            ->paginate($perPage);
    }
}