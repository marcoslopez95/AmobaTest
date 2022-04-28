<?php

namespace App\Http\Repositories;

use App\Models\Person;

class PersonRepository {
    protected $model;
    protected $object;

    public function __construct(Person $model)
    {
        $this->model = $model;
    }

    public function index($request = null){
        return $this->model->all();
    }

    public function show($id){
        $this->object = $this->model->find($id);
        return $this->object;
    }

    public function store($data){
        return $this->model->create($data);
    }

    public function update($id,$data){
        self::show($id);
        $this->object->update($data);
        $this->object->refresh();
        return $this->object;
    }

    public function delete($id){
        self::show($id);
        return $this->object->delete();
    }
}
