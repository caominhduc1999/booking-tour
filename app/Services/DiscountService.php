<?php

namespace App\Services;

use App\Repositories\Discount\DiscountRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class DiscountService {
    protected $discountRepository;
    
    public function __construct(DiscountRepository $discountRepository)
    {
        $this->discountRepository = $discountRepository;        
    }

    public function getAll()
    {
        return $this->discountRepository->all();
    }
    
    public function paginate($perPage, $conditions) 
    {
        return $this->discountRepository->paginate($perPage, $conditions);
    }

    public function find($id)
    {
        return $this->discountRepository->findOrFail($id);
    }

    public function store($data) 
    {
        try {
            $this->discountRepository->store($data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function update($id, $data) 
    {
        try {
            $this->discountRepository->update($id, $data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function delete($id) 
    {
        try {
            $discount = $this->discountRepository->findOrFail($id);
            $discount->delete();

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    } 

    public function findByField($field, $value)
    {
        return $this->discountRepository->findByField($field, $value);
    }
}