<?php

namespace App\Http\Services;

use App\Http\Repositories\PersonRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PersonService
{
    protected $repository;

    public function __construct(PersonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($request)
    {
        return $this->repository->index($request);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function store(Request $request)
    {

        $path = $request->avatar->store('public/avatars');
        $path = explode('/', $path);
        $request['ima_profile'] = 'storage/' . $path[1] . '/' . $path[2];
        $data = $request->only([
            'first_name',
            'last_name',
            'ima_profile',
            'document'
        ]);

        return $this->repository->store($data);
    }

    public function update($id, Request $request)
    {
        $person = $this->repository->show($id);

        if ($request->hasFile('avatar')) {
            Storage::delete($person->ima_profile);
            $path = $request->avatar->store('public/avatars');
            $path = explode('/', $path);
            $request['ima_profile'] = 'storage/' . $path[1] . '/' . $path[2];
        }

        $data = $request->only([
            'first_name',
            'last_name',
            'ima_profile',
            'document'
        ]);

        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}