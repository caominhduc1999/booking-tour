<?php

namespace App\Services;

use App\Repositories\Tour\TourRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class TourService {
    protected $tourRepository;
    
    public function __construct(TourRepository $tourRepository)
    {
        $this->tourRepository = $tourRepository;        
    }

    public function getAll()
    {
        return $this->tourRepository->all();
    }
    
    public function paginate($perPage, $conditions) 
    {
        return $this->tourRepository->paginate($perPage, $conditions);
    }

    public function find($id)
    {
        return $this->tourRepository->findOrFail($id);
    }

    public function store($data) 
    {
        try {
            if ($data['image']) {
                $image = rand() . '.' . $data['image']->getClientOriginalExtension();
                $data['image']->move(storage_path('app/public/images'), $image);
                $data['image'] = $image;
            }

            $tour = $this->tourRepository->store($data);
            if ($data['hotel_ids']) {
                $tour->hotels()->attach($data['hotel_ids']);
            }

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function update($id, $data) 
    {
        try {
            $tour = $this->tourRepository->findOrFail($id);
            $oldImage = 'images/' . $tour->image;

            if (isset($data['image'])) {
                if (file_exists($oldImage) && !is_dir($oldImage)) {
                    unlink($oldImage);
                }
                $image = rand() . '.' . $data['image']->getClientOriginalExtension();
                $a = $data['image']->move(storage_path('/app/public/images'), $image);
                $data['image'] = $image;
            }

            $this->tourRepository->update($id, $data);
            if ($data['hotel_ids']) {
                $tour->hotels()->sync($data['hotel_ids']);
            }

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function delete($id) 
    {
        try {
            $tour = $this->tourRepository->findOrFail($id);
            // $tour->tags()->detach();
            $oldImage = 'images/' . $tour->image;
            if (file_exists($oldImage) && !is_dir($oldImage)) {
                unlink($oldImage);
            }
            $tour->delete();

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    } 

    public function getFeatureTours()
    {
        return $this->tourRepository->getFeatureTours();
    }

    public function getLatestTourByLimit($limit)
    {
        return $this->tourRepository->getLatestTourByLimit($limit);
    }

    public function search($search, $perPage)
    {
        return $this->tourRepository->search($search, $perPage);
    }

    public function findByCondition($conditions, $perPage)
    {
        return $this->tourRepository->findByCondition($conditions, $perPage);
    }
}