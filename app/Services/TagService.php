<?php

namespace App\Services;

use App\Repositories\Tag\TagRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class TagService {
    protected $tagRepository;
    
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;        
    }
    
    public function getAll()
    {
        return $this->tagRepository->all();
    }

    public function paginate($perPage, $conditions) 
    {
        return $this->tagRepository->paginate($perPage, $conditions);
    }

    public function find($id)
    {
        return $this->tagRepository->findOrFail($id);
    }

    public function store($data) 
    {
        try {
            $this->tagRepository->store($data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function update($id, $data) 
    {
        try {
            $this->tagRepository->update($id, $data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function delete($id) 
    {
        try {
            $tag = $this->tagRepository->findOrFail($id);
            $tag->delete();

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    } 
}