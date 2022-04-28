<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonIndexRequest;
use App\Http\Requests\PersonStoreRequest;
use App\Http\Requests\PersonUpdateRequest;
use App\Http\Services\PersonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    protected $service;

    public function __construct(PersonService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PersonIndexRequest $request)
    {
        try {
            $persons = $this->service->index($request);

            return custom_response(true, 'Index', $persons);
        } catch (\Exception $e) {

            custom_Loggin($e);
            return custom_response(false, 'No se pudo guardar el registro', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonStoreRequest $request)
    {
        DB::beginTransaction();
        try {

            $object = $this->service->store($request);
            DB::commit();
            return custom_response(true, 'Guardado con éxito', $object);
        } catch (\Exception $e) {
            DB::rollback();
            custom_Loggin($e);
            return custom_response(false, 'No se pudo guardar el registro', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $object = $this->service->show($id);
            return custom_response(true, 'Show', $object);
        } catch (\Exception $e) {

            custom_Loggin($e);
            return custom_response(false, 'Error al consultar el registro', $e->getMessage());
        }
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $object = $this->service->update($id, $request);
            DB::commit();
            return custom_response(true, 'Actualizado', $object);
        } catch (\Exception $e) {
            DB::rollback();
            custom_Loggin($e);
            return custom_response(false, 'No se pudo actualizar el registro', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $this->service->delete($id);
            DB::commit();
            return custom_response(true, 'Registro eliminado');
        } catch (\Exception $e) {
            DB::rollback();
            custom_Loggin($e);
            return custom_response(false, 'No se pudo eliminar el registro', $e->getMessage());
        }
    }
}