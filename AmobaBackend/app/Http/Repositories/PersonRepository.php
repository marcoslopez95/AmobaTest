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
        $personas = $this->model->Filtro($request)->get();
        foreach($personas as $person){
            $person->avatar = env('APP_URL') . $person->ima_profile;
            unset($person['ima_profile']);
        }
        return $personas;
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
