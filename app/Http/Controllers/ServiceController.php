<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('services.index', ['services' => Service::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'cost' => 'required|integer',
            'points' => 'required|integer'
        ]);

        $service = new Service();
        $service->name = $request->input('name');
        $service->cost = $request->input('cost');
        $service->points = $request->input('points');

        if($service->save()){
            $request->session()->flash('status_success', 'Servicio creado!');
            return redirect()->route('services.index');
        }
        $request->session()->flash('status_error', 'Error al crear el servicio!');
        return redirect()->route('services.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|max:255',
            'cost' => 'required|integer',
            'points' => 'required|integer',
            'state' => 'required|integer',
        ]);

        $service->name = $request->input('name');
        $service->cost = $request->input('cost');
        $service->points = $request->input('points');
        $service->state = $request->input('state');

        if($service->save()){
            $request->session()->flash('status_success', 'Servicio modificado!');
            return redirect()->route('services.index');
        }
        $request->session()->flash('status_error', 'Error al modificar el servicio!');
        return redirect()->route('services.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
