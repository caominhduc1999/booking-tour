<?php

namespace App\Services;

use App\Repositories\Transition\TransitionRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class TransitionService {
    protected $transitionRepository;
    
    public function __construct(TransitionRepository $transitionRepository)
    {
        $this->transitionRepository = $transitionRepository;        
    }

    public function paginate($perPage, $conditions) 
    {
        return $this->transitionRepository->paginate($perPage, $conditions);
    }
}