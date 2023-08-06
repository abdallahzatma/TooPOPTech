@extends('layout.dashboard')
@section('title', __('site.category'))
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">@lang('site.category')</a></li>
<li class="breadcrumb-item"><a href="#">@lang('site.edit')</a></li>
@endsection
@section('content')
<h1>@lang('site.edit')</h1>
@if($errors->any())
@foreach ($errors->all() as $error )
<div class="alert alert-danger" role="alert">
    @lang($error)
  </div>
@endforeach
@endif
<form enctype="multipart/form-data" action="{{ route('dashboard.categories.update', $category->id) }}" method="post">
    @csrf
    @method('put')
    <div>
        <label for="name">@lang('site.name')</label>
        <input name="name" type="text" class="form-control" value="{{ old('name', $category->name) }}">
    </div>
    <div class="form-group">
        <label for="category_id">@lang('site.category')</label>
        <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="parent_id" >
            <option value="">--@lang('site.no_parent') --</option>
            @foreach($parents as $item)
                <option value="{{ $item->id }}" @selected($item->id == $category->parent_id)>{{ $item->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>@lang($message)</strong>
            </span>
        @enderror
    </div>
    <div>
        <label for="status">@lang('site.status')</label>
        <input name="status" value="0" type="radio" @checked(old('status', $category->status) == 'active')>

        <label for="">@lang('site.active')</label>
        <input name="status" value="1" type="radio" @checked(old('status', $category->status) == 'inactive')>
        <label for="">@lang('site.inactive')</label>
    </div>
    <div>
        <label for="image">@lang('site.image')</label>
        <input name="image" type="file" class="form-control">
    </div>
<br>
    <button class="btn btn-primary">@lang('site.edit')</button>
</form>
<br>
<img width="150" height="150" src="{{ asset('images/'.$category->image) }}" alt="">
@endsection
