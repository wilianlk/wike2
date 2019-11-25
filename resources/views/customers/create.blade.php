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

                        <form method="POST" action="{{ route('customers.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_number" class="col-sm-2 col-form-label">Identificaci&oacute;n</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="id_number" name="id_number" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cellphone_number" class="col-sm-2 col-form-label">Celular</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="cellphone_number" name="cellphone_number" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthday" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="birthday" name="birthday" autocomplete="off" required>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Genero</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="genre"
                                                   id="hombre" value="h" checked>
                                            <label class="form-check-label" for="hombre">
                                                Hombre
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="genre"
                                                   id="mujer" value="m">
                                            <label class="form-check-label" for="mujer">
                                                Mujer
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Crear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
