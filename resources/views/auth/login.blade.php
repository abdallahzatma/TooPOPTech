
@extends('layout.auth-master')

@section('content')
    <form method="post" action="{{ route('login.perform') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{__('site.login')}}</div>
                        <div class="card-body">
                            @include('layout.partials.messages')
                            
                            <div class="form-group">
                                <label for="email">{{__('site.email')}}</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{__('site.email')}}" required="required" autofocus>
                            </div>
                            
                            <div class="form-group">
                                <label for="password">{{__('site.password')}}</label>
                                <input type="password" class="form-control" name="password" placeholder="{{__('site.password')}}" required="required">
                            </div>
                            
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember">
                                    <label class="custom-control-label" for="remember">{{__('site.remember_me')}}</label>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">{{__('site.login')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection