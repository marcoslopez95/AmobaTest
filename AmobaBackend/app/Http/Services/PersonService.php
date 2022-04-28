<?php

namespace App\Http\Services;

use App\Http\Repositories\PersonRepository;
use Illuminate\Http\Request;

class PersonService {
    protected $repository;

    public function __construct(PersonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($request){
        return $this->repository->index($request);
    }

    public function show($id){
        return $this->repository->show($id);
    }

    public function store(Request $request){
        $data = $request->only(['first_name',
        'last_name',
        'ima_profile',
        'document']);

        return $this->repository->store($data);
    }

    public function update($id, Request $request){
        $data = $request->only(['first_name',
        'last_name',
        'ima_profile',
        'document']);

        return $this->repository->update($id,$data);
    }

    public function delete($id){
        return $this->repository->delete($id);
    }
}
