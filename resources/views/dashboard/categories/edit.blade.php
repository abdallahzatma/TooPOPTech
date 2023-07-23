@extends('layout.dashboard')
@section('title','Category')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">Category</a></li>
<li class="breadcrumb-item"><a href="#">Edit </a></li>

@endsection
@section('content')
<h1>Edit   Category</h1>
@if($errors->any())
@foreach ($errors->all() as $error )
<div class="alert alert-danger" role="alert">
    {{ $error}}
  </div>

@endforeach
@endif
<form enctype="multipart/form-data" action="{{ route('dashboard.categories.update',$category->id) }}" method="post">
    @csrf
    @method('put')
    <div>
        <label for="">Name</label>
        <input name="name" type="text" class="form-control" value="{{ old('name',$category->name) }}">
    </div>
    <div class="form-group">
        <label for="category_id">{{ __('Category Parent') }}</label>
        <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="parent_id" >
            <option value="">--No parent --</option>
            @foreach($parents as $item)
                <option value="{{ $item->id }}" @selected($item->id == $category->parent_id)>{{ $item->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div>
        <label for="">Status</label>
        <input name="status" value="0" type="radio" @checked(old('status',$category->status) == "active")>

        <label for="">active</label>
      <input name="status" value="1" type="radio" @checked(old('status',$category->status) == "inactive" )>
        <label for="">inactive</label>
    </div>
    <div>
        <label for="">Image</label>
        <input name="image" type="file" class="form-control">
    </div>
<br>
    <button class="btn btn-primary">Edit </button>
</form>
<br>
<img width="150" height="150" src="{{ asset('images/'.$category->image) }}" alt="">
@endsection

