<?php

namespace App\Services;

use App\Repositories\TourGuide\TourGuideRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class TourGuideService {
    protected $tourGuideRepository;
    
    public function __construct(TourGuideRepository $tourGuideRepository)
    {
        $this->tourGuideRepository = $tourGuideRepository;        
    }

    public function getAll()
    {
        return $this->tourGuideRepository->all();
    }
    
    public function paginate($perPage, $conditions) 
    {
        return $this->tourGuideRepository->paginate($perPage, $conditions);
    }

    public function find($id)
    {
        return $this->tourGuideRepository->findOrFail($id);
    }

    public function store($data) 
    {
        try {
            $this->tourGuideRepository->store($data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function update($id, $data) 
    {
        try {
            $this->tourGuideRepository->update($id, $data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function delete($id) 
    {
        try {
            $tourGuide = $this->tourGuideRepository->findOrFail($id);
            $tourGuide->delete();

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    } 
}