@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('customers.title') }}
                        <div class="float-right">
                            <a href="{{ route('customers.index') }}"><em class="fa fa-chevron-left"></em></a>
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

                        <form method="post" action="{{ route('customers.update', $customer->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_number" class="col-sm-2 col-form-label">Identificaci&oacute;n</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="id_number" name="id_number" value="{{ $customer->id_number }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cellphone_number" class="col-sm-2 col-form-label">Celular</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="cellphone_number" name="cellphone_number" value="{{ $customer->cellphone_number }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthday" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $customer->getOriginal('birthday') }}" autocomplete="off" required>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Genero</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="genre"
                                                   id="hombre" value="h" @if($customer->genre === 'h') checked @endif>
                                            <label class="form-check-label" for="hombre">
                                                Hombre
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="genre"
                                                   id="mujer" value="m" @if($customer->genre === 'm') checked @endif>
                                            <label class="form-check-label" for="mujer">
                                                Mujer
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group row">
                                <label for="state" class="col-sm-2 col-form-label">Estado</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="state" name="state" >
                                        <option value="0" @if($customer->state == 0) selected @endif>Inactivo</option>
                                        <option value="1" @if($customer->state == 1) selected @endif>Activo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Modificar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
