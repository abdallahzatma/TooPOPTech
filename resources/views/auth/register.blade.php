@extends('layout.auth-master')

@section('content')
@include('layout.partials.messages')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <form method="post" action="{{ route('register.perform') }} ">

        @csrf
        
        <div class="text-center mb-4">
            <h1 class="display-4">{{__('site.register')}}</h1>
            <p>{{__('site.create')}}</p>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label for="firstname">{{__('site.first_name')}}</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="{{__('site.first_name')}}" required>
            </div>
            <div class="col-md-6">
                <label for="lastname">{{__('site.last_name')}}</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="{{__('site.last_name')}}" required>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label for="username">{{__('site.username')}}</label>
                <input type="text" class="form-control" id="username" placeholder="{{__('site.username')}}" name="username" required>
            </div>
            <div class="col-md-6">
                <label for="email">{{__('site.email')}}</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="{{__('site.email')}}" required>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label for="password">{{__('site.password')}}</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="{{__('site.password')}}" required>
            </div>
            <div class="col-md-6">
                <label for="password_confirmation">{{__('site.confirm_password')}}</label>
                <input type="password" class="form-control" id="password_confirmation" placeholder="{{__('site.confirm_password')}}" name="password_confirmation" required>
            </div>
            <div class="col-md-6">
                <label for="phone">{{__('site.phone')}}</label>
                <input type="tel" class="form-control" id="phone" placeholder="{{__('site.phone')}}" name="phone"  >
            </div>
        </div>

        <div class="form-group">
            <label for="address">{{__('site.address')}}</label>
            
            <input type="text" class="form-control" id="address" name="address" placeholder="{{__('site.address')}}"  >
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">{{__('site.register')}}</button>


    </form>
</div>
@endsection