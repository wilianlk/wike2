@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('customers.title') }}
                        <div class="float-right">
                            <a href="{{ route('home') }}" class="mr-3"><em class="fa fa-chevron-left"></em></a>
                            <a href="{{ route('customers.create') }}"><em class="fa fa-plus"></em></a>
                        </div>
                    </div>

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="m-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(count($customers) > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fecha de nacimiento</th>
                                    <th scope="col">Puntos</th>

                                    <th scope="col">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->birthday }}</td>
                                        <td>{{ $customer->points }}</td>
                                        <td>
                                            <a href="{{ route('customers.edit', $customer->id) }}" class="mr-3">
                                                <em class="fa fa-edit"></em>
                                            </a>
                                            <a href="#" class="showModalSale  mr-3 d-block d-md-inline" data-id="{{$customer->id}}"
                                               data-name="{{$customer->name}}">
                                                <em class="fa fa-plus-circle "></em>Registrar venta
                                            </a>
                                            @if($customer->points > 0)
                                                <a href="#" class="showModalRedeem d-block d-md-inline" data-id="{{$customer->id}}"
                                                   data-points="{{$customer->points}}"
                                                   data-name="{{$customer->name}}">
                                                    <em class="fa fa-circle-notch"></em> Canjear puntos
                                                </a>
                                            @endif
                                        </td>
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
    </div>

    <div class="modal fade" id="registerAttention" tabindex="-1" role="dialog" aria-labelledby="registerAttentionLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerAttentionLabel">Registrar venta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('salesLog.store') }}" id="formRegisterAttention" name="formRegisterAttention"
                          method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="customerName" class="col-sm-2 col-form-label">Cliente</label>
                            <div class="col-sm-10">
                                <input type="text" id="customerName" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service_id" class="col-sm-2 col-form-label">Servicio</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="service_id" name="service_id">
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}">{{ $service->name }} - {{ $service->points }}
                                            puntos
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <input type="hidden" id="customer_id" name="customer_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formRegisterAttention" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Redeem" tabindex="-1" role="dialog" aria-labelledby="RedeemLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="RedeemLabel">Canjear puntos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('redeem') }}" id="formRedeem" name="formRedeem"
                          method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="customerName" class="col-sm-2 col-form-label">Cliente</label>
                            <div class="col-sm-10">
                                <input type="text" id="customerNameRedeem" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service_id" class="col-sm-2 col-form-label">Puntos</label>
                            <div class="col-sm-10">
                                <input type="number" name="points" id="redeem_points" class="form-control">
                            </div>
                        </div>

                        <input type="hidden" id="customer_id_redeem" name="customer_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formRedeem" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
