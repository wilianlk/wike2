@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('services.title') }}
                        <div class="float-right">
                            <a href="{{ route('home') }}" class="mr-3"><em class="fa fa-chevron-left"></em></a>
                            <a href="{{ route('services.create') }}"><em class="fa fa-plus"></em></a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(count($services) > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Costo</th>
                                    <th scope="col">Puntos</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->cost }}</td>
                                        <td>{{ $service->points }}</td>
                                        <td>
                                            <a href="{{ route('services.edit', $service->id) }}">
                                                <em class="fa fa-edit"></em>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    @else
                        {{ __('services.no_services') }}
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
