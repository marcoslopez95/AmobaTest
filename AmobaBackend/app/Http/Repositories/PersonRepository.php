<?php

namespace App\Http\Repositories;

use App\Models\Person;

class PersonRepository
{
    protected $model;
    protected $object;

    public function __construct(Person $model)
    {
        $this->model = $model;
    }

    public function index($request = null)
    {
        return $this->model->filtro($request)->get();
    }

    public function show($id)
    {
        $this->object = $this->model->findOrFail($id);
        $this->object->avatar = env('APP_URL') . $this->object->ima_profile;
        unset($this->object->ima_profile);
        return $this->object;
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        self::show($id);
        unset($this->object->avatar);
        $this->object->update($data);
        $this->object->refresh();
        return $this->object;
    }

    public function delete($id)
    {
        self::show($id);
        return $this->object->delete();
    }
}