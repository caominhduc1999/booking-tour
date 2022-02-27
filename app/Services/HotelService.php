<?php

namespace App\Services;

use App\Repositories\Hotel\HotelRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class HotelService {
    protected $hotelRepository;
    
    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;        
    }

    public function getAll()
    {
        return $this->hotelRepository->all();
    }
    
    public function paginate($perPage, $conditions) 
    {
        return $this->hotelRepository->paginate($perPage, $conditions);
    }

    public function find($id)
    {
        return $this->hotelRepository->findOrFail($id);
    }

    public function store($data) 
    {
        try {
            $this->hotelRepository->store($data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function update($id, $data) 
    {
        try {
            $this->hotelRepository->update($id, $data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function delete($id) 
    {
        try {
            $hotel = $this->hotelRepository->findOrFail($id);
            $hotel->delete();

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    } 
}