@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4" >
                                <div class="card" style="height: 100px">
                                    <div class="card-body text-center">
                                        <em class="fa fa-user fa-2x"></em><br>
                                        <a href="{{ route('customers.index') }}">{{ __('customers.title') }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="card" style="height: 100px">
                                    <div class="card-body text-center">
                                        <em class="fa fa-birthday-cake fa-2x"></em><br>
                                        <a href="{{ route('birthdays') }}">{!! __('customers.birthdays') !!}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="card" style="height: 100px">
                                    <div class="card-body text-center">
                                        <em class="fa fa-concierge-bell fa-2x"></em><br>
                                        <a href="{{ route('services.index') }}">{!! __('services.title') !!}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
