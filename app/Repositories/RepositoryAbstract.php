<?php

namespace App\Repositories;

use Exception;

abstract class RepositoryAbstract implements RepositoryInterface
{
    /**
     * @var object Model name
     */
    protected $model;

    /**
     * @var string Table name
     */
    protected $table;

    /**
     * @var array Validation rules for store
     */
    protected $storeRules;

    /**
     * @var array Validation rules for update
     */
    protected $updateRules;

    /**
     * @var array Column names
     */
    protected $columnNames;

    /**
     * Construct
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get all.
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find.
     *
     * @param int $id
     *
     * @return array
     */
    public function get($id)
    {
        $model = $this->model::findOrFail($id);

        return empty($model) ? [] : $model;
    }

    public function with(array $withModel = [''])
    {
        $model = $this->with($withModel);

        return $model;
    }

    /**
     * Store.
     *
     * @param array $data
     *
     * @return object
     */
    public function store($data)
    {
        return $this->model::create($data);
    }

    /**
     * Insert.
     *
     * @param array $data
     *
     * @return void
     */
    public function insert($data)
    {
        return $this->model::insert($data);
    }


    /**
     * Update.
     *
     * @param $id
     * @param array $data
     *
     * @return void
     */
    public function update($id, $data)
    {
        try {
            return $this->model::findOrFail($id)->update($data);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Destroy.
     *
     * @param Collection|array|int $ids
     *
     * @return void
     */
    public function destroy($ids)
    {
        $this->model::destroy($ids);
    }

    /**
     * Check exist.
     *
     * @param int $id
     *
     * @return boolean
     */
    public function exist($id)
    {
        return !empty($this->find($id));
    }

    /**
     * Get Total.
     *
     * @return int
     */
    public function total()
    {
        return count($this->model->all());
    }

    public function isFieldExist($field, $value)
    {
        return $this->model::where($field, $value)->count() > 0;
    }

    public function isFieldsExist($data)
    {
        return $this->model::where($data)->count() > 0;
    }

    public function updateOrCreate($condition, $data)
    {
        return $this->model->updateOrCreate($condition, $data);
    }

    public function findByField($field, $value)
    {
        return $this->model->where($field, $value);
    }

    public function findByFields($conditions)
    {
        return $this->model->where($conditions);
    }

    public function delete($conditions)
    {
        return $this->model::where($conditions)->delete();
    }

    public function find($id)
    {
        return $this->model::find($id);
    }

    public function upsert($data, $condition)
    {
        return $this->model->upsert($data, $condition, 'cancel_division');
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function firstOrCreate($condition, $data = [])
    {
        if (!$data) {
            $data = $condition;
        }

        return $this->model->firstOrCreate($condition, $data);
    }

    public function getLatest()
    {
        return $this->model->latest('id')->first();
    }

    public function forceDelete($condition)
    {
        return $this->model::where($condition)->forceDelete();
    }
}