<?php

namespace App\Http\Controllers;

use App\Http\Services\PersonService;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        try{
            return $this->service->index($request);
        } catch (\Exception $e) {

            custom_Loggin($e);
            return custom_response(false,'No se pudo guardar el registro',$e->getMessage());

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            return $this->service->store($request);

        } catch (\Exception $e) {

            custom_Loggin($e);
            return custom_response(false,'No se pudo guardar el registro',$e->getMessage());

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
            return $this->service->show($id);
        } catch (\Exception $e) {

            custom_Loggin($e);
            return custom_response(false,'Error al consultar el registro',$e->getMessage());

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
    public function update(Request $request, $id)
    {
        try{
            return $this->service->update($id,$request);
        } catch (\Exception $e) {

            custom_Loggin($e);
            return custom_response(false,'No se pudo actualizar el registro',$e->getMessage());

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
        try{
            return $this->service->delete($id);
        } catch (\Exception $e) {

            custom_Loggin($e);
            return custom_response(false,'No se pudo eliminar el registro',$e->getMessage());

        }
    }
}
