<?php

namespace App\Services;

use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class UserService {
    protected $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;        
    }

    public function getAll()
    {
        return $this->userRepository->all();
    }
    
    public function paginate($perPage, $conditions) 
    {
        return $this->userRepository->paginate($perPage, $conditions);
    }

    public function find($id)
    {
        return $this->userRepository->findOrFail($id);
    }

    public function store($data) 
    {
        try {
            $this->userRepository->store($data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function update($id, $data) 
    {
        try {
            $this->userRepository->update($id, $data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function delete($id) 
    {
        try {
            $user = $this->userRepository->findOrFail($id);
            $user->delete();

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    } 

    public function findByField($field, $value)
    {
        return $this->userRepository->findByField($field, $value);
    }
}