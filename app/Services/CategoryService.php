<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryService {
    protected $categoryRepository;
    
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;        
    }
    
    public function paginate($perPage, $conditions) 
    {
        return $this->categoryRepository->paginate($perPage, $conditions);
    }

    public function find($id)
    {
        return $this->categoryRepository->findOrFail($id);
    }

    public function store($data) 
    {
        try {
            $this->categoryRepository->store($data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function update($id, $data) 
    {
        try {
            $this->categoryRepository->update($id, $data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function delete($id) 
    {
        try {
            $category = $this->categoryRepository->findOrFail($id);
            $category->delete();

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    } 
}