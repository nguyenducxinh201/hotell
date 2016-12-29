<?php

namespace App\Repositories;


 abstract class BaseRepository
 {

    protected $model;

    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $value, $attribute = "id")
    {
        return $this->model->where($attribute, '=', $value)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function findBy($attribute, $value, $columns = array('id'))
    {
        return $this->model->where($attribute, '=', $value)->get();
    }

 }
 