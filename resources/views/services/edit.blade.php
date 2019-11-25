@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('services.title') }}
                        <div class="float-right">
                            <a href="{{ route('services.index') }}"><em class="fa fa-chevron-left"></em></a>
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

                        <form method="post" action="{{ route('services.update', $service->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cost" class="col-sm-2 col-form-label">Costo</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="cost" name="cost" value="{{ $service->getOriginal('cost') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="points" class="col-sm-2 col-form-label">Puntos</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="points" name="points" value="{{ $service->points }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state" class="col-sm-2 col-form-label">Estado</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="state" name="state" >
                                        <option value="0" @if($service->state == 0) selected @endif>Inactivo</option>
                                        <option value="1" @if($service->state == 1) selected @endif>Activo</option>
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
