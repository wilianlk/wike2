<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    public const MONTHS = [
        'january' => 'enero',
        'february' => 'febrero',
        'march' => 'marzo',
        'april' => 'abril',
        'may' => 'mayo',
        'june' => 'junio',
        'july' => 'julio',
        'august' => 'agosto',
        'september' => 'septiembre',
        'october' => 'octubre',
        'november' => 'noviembre',
        'december' => 'diciembre',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customers.index', ['customers' => Customer::all(), 'services' => Service::where('state', 1)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'id_number' => 'required|integer|digits_between:8,11|unique:customers,id_number',
            'cellphone_number' => 'required|integer|digits_between:7,10',
            'birthday' => 'required',
            'genre' => 'required|max:1'
        ]);

        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->id_number = $request->input('id_number');
        $customer->cellphone_number = $request->input('cellphone_number');
        $customer->birthday = $request->input('birthday');
        $customer->genre = $request->input('genre');

        if ($customer->save()) {
            $request->session()->flash('status_success', 'Cliente creado!');
            return redirect()->route('customers.index');
        }
        $request->session()->flash('status_error', 'Error al crear el cliente!');
        return redirect()->route('customers.create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|max:255',
            'id_number' => 'required|integer|digits_between:8,11|unique:customers,id_number,' . $customer->id,
            'cellphone_number' => 'required|integer|digits_between:7,10',
            'birthday' => 'required',
            'genre' => 'required|max:1'
        ]);

        $customer->name = $request->input('name');
        $customer->id_number = $request->input('id_number');
        $customer->cellphone_number = $request->input('cellphone_number');
        $customer->birthday = $request->input('birthday');
        $customer->genre = $request->input('genre');
        $customer->state = $request->input('state');

        if ($customer->save()) {
            $request->session()->flash('status_success', 'Cliente modificado!');
            return redirect()->route('customers.index');
        }
        $request->session()->flash('status_error', 'Error al modificar el cliente!');
        return redirect()->route('customers.edit', $customer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function birthdays()
    {
        date_default_timezone_set('America/Bogota');
        $customers = null;
        if (env('DB_CONNECTION') === 'mysql') {
            $customers = DB::table('customers')->whereRaw('MONTH(birthday)=' . date('n'))->where('state', 1)->get();
        } else if (env('DB_CONNECTION') === 'pgsql') {
            $customers = DB::table('customers')->whereRaw('EXTRACT(month  from birthday)=' . date('n'))->where('state', 1)->get();
        }
        setlocale(LC_ALL, 'es_ES');
        $date = Carbon::parse(date('d-m-Y'));
        $month = strtolower($date->formatLocalized('%B'));

        if(array_key_exists($month, self::MONTHS)){
            $month = self::MONTHS[$month];
        }

        return view('customers.birthdays', ['customers' => $customers, 'month' => $month]);
    }

    public function redeem(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|max:255|exists:customers,id',
            'points' => 'required|integer|min:1',
        ]);

        $customer = Customer::find($request->input('customer_id'));
        if ($customer->points >= $request->input('points')) {
            $customer->points -= $request->input('points');
        }

        if ($customer->save()) {
            $request->session()->flash('status_success', 'Puntos canjeados!');

        } else {
            $request->session()->flash('status_error', 'Error al canjear los puntos!');
        }
        return redirect()->route('customers.index');
    }
}
