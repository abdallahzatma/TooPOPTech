@extends('layout.dashboard')
@section('title','Category')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">Category</a></li>
<li class="breadcrumb-item"><a href="#">Create</a></li>

@endsection
@section('content')
<h1>Create New Category</h1>
@if($errors->any())
@foreach ($errors->all() as $error )
<div class="alert alert-danger" role="alert">
    {{ $error }}
  </div>

@endforeach
@endif
<form enctype="multipart/form-data" action="{{ route('dashboard.categories.index') }}" method="POST">
    @csrf
    <div>
        <label for="">Name</label>
        <input name="name" value="{{ old('name') }}" type="text" class="form-control">
    </div>
    <div>
        <label for="">Status</label>
        <input name="status" value="0" type="radio"  checked @checked(old('status') == '0')>
        <label for="">active</label>
        <input name="status" value="1" type="radio" @checked(old('status') == '1')>
        <label for="">inactive</label>
    </div>
    <div>
        <label for="">Image</label>
        <input name="image" type="file" class="form-control">
    </div>
<br>
    <button class="btn btn-primary">create</button>
</form>

@endsection