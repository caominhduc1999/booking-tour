<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get.
     *
     * @param int $id
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function get($id);

    /**
     * Get all.
     *
     * @return Collection
     */
    public function all();

    /**
     * Store.
     *
     * @param array $data
     *
     * @return
     */
    public function store($data);

    /**
     * Insert.
     *
     * @param array $data
     *
     * @return
     */
    public function insert($data);

    public function upsert($data, $condition);


    /**
     * Update.
     *
     * @param int $id
     * @param array $data
     *
     * @return Model
     */
    public function update($id, $data);

    /**
     * Delete.
     *
     * @param Collection|array|int $ids
     *
     * @return int
     */
    public function destroy($ids);

    /**
     * Check exist.
     *
     * @param int $id
     *
     * @return boolean
     */
    public function exist($id);

    public function with(array $withModel = ['']);

    public function isFieldExist($field, $value);

    public function isFieldsExist($data);

    public function updateOrCreate($condition, $data);

    public function findByField($field, $value);

    public function delete($conditions);

    public function findByFields($conditions);

    public function find($id);

    public function findOrFail($id);

    public function firstOrCreate($condition, $data = []);

    public function getLatest();

    public function forceDelete($condition);
}