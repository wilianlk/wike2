@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php ?>
                        {{ __('customers.title') }} - {!! __('customers.birthdays') !!} {{ $month }}
                            <div class="float-right">
                                <a href="{{ route('home') }}"><em class="fa fa-chevron-left"></em></a>
                            </div>
                    </div>

                    <td class="card-body">
                        @if(count($customers) > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Puntos</th>
                                    <th scope="col">Fecha de nacimiento</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->points }}</td>
                                        <td>{{ date('d/m/Y', strtotime($customer->birthday)) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    @else
                        {{ __('customers.no_customers') }}
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
