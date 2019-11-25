<?php

namespace App\Http\Controllers;

use App\Customer;
use App\SalesLog;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'customer_id' => 'required|integer|exists:customers,id',
            'service_id' => 'required|integer|exists:customers,id',
        ]);

        $salesLog = new SalesLog();
        $salesLog->customer_id = $request->input('customer_id');
        $salesLog->service_id = $request->input('service_id');

        DB::beginTransaction();
        $result = false;

        if($salesLog->save()){
            $customer = Customer::find( $request->input('customer_id'));
            $service = Service::find( $request->input('service_id'));
            if($customer && $service){
                $customer->points += $service->points;
               if($customer->save()){
                   $result = true;
               }
            }
        }

        if($result){
            DB::commit();
            $request->session()->flash('status_success', 'Venta registrada!');
        }else{
            DB::rollBack();
            $request->session()->flash('status_error', 'Error al registrar la venta!');
        }
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesLog  $salesLog
     * @return \Illuminate\Http\Response
     */
    public function show(SalesLog $salesLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesLog  $salesLog
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesLog $salesLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesLog  $salesLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesLog $salesLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesLog  $salesLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesLog $salesLog)
    {
        //
    }
}
