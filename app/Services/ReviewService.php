<?php

namespace App\Services;

use App\Repositories\Review\ReviewRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class ReviewService
{
    protected $reviewRepository;

    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function getAll()
    {
        return $this->reviewRepository->all();
    }

    public function find($id)
    {
        return $this->reviewRepository->findOrFail($id);
    }

    public function paginate($perPage, $conditions) 
    {
        return $this->reviewRepository->paginate($perPage, $conditions);
    }

    public function update($id, $data) 
    {
        try {
            $this->reviewRepository->update($id, $data);

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    }

    public function delete($id) 
    {
        try {
            $review = $this->reviewRepository->findOrFail($id);
            $review->delete();

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    } 
}