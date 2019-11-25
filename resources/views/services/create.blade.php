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

                        <form method="POST" action="{{ route('services.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cost" class="col-sm-2 col-form-label">Costo</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="cost" name="cost" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="points" class="col-sm-2 col-form-label">Puntos</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="points" name="points" required>
                                </div>
                            </div>

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
