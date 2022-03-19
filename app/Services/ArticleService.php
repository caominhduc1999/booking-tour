<?php

namespace App\Services;

use App\Repositories\Article\ArticleRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class ArticleService {
    protected $articleRepository;
    
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;        
    }
    
    public function paginate($perPage, $conditions) 
    {
        return $this->articleRepository->paginate($perPage, $conditions);
    }

    public function getAll()
    {
        return $this->articleRepository->all();
    }

    public function find($id)
    {
        return $this->articleRepository->findOrFail($id);
    }

    public function store($data) 
    {
        try {
            if ($data['image']) {
                $image = rand() . '.' . $data['image']->getClientOriginalExtension();
                $data['image']->move(storage_path('app/public/images'), $image);
                $data['image'] = $image;
            }

            $article = $this->articleRepository->store($data);
            if ($data['tag_ids']) {
                $article->tags()->attach($data['tag_ids']);
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
            $article = $this->articleRepository->findOrFail($id);
            $oldImage = 'images/' . $article->image;

            if (isset($data['image'])) {
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
                $image = rand() . '.' . $data['image']->getClientOriginalExtension();
                $a = $data['image']->move(storage_path('/app/public/images'), $image);
                $data['image'] = $image;
            }

            $this->articleRepository->update($id, $data);
            if ($data['tag_ids']) {
                $article->tags()->sync($data['tag_ids']);
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
            $article = $this->articleRepository->findOrFail($id);
            $article->tags()->detach();
            $oldImage = 'images/' . $article->image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $article->delete();

            return true;
        } catch (Exception $e){
            Log::info($e->getMessage());
            
            return false;
        }     
    } 
}