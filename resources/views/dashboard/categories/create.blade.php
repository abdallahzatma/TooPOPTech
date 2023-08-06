@extends('layout.dashboard')
@section('title', __('site.category'))
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">@lang('site.category')</a></li>
<li class="breadcrumb-item"><a href="#">@lang('site.create')</a></li>
@endsection
@section('content')
<h1>@lang('site.create')</h1>
@if($errors->any())
@foreach ($errors->all() as $error )
<div class="alert alert-danger" role="alert">
    @lang($error)
</div>
@endforeach
@endif
<form enctype="multipart/form-data" action="{{ route('dashboard.categories.index') }}" method="POST">
    @csrf
    <div>
        <label for="name">@lang('site.name')</label>
        <input name="name" value="{{ old('name') }}" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="category_id">@lang('site.category')</label>
        <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="parent_id" >
            <option value="">--@lang('site.no_parent') --</option>
            @foreach($parents as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
        <input name="status" value="0" type="radio"  checked @checked(old('status') == '0')>
        <label for="">@lang('site.active')</label>
        <input name="status" value="1" type="radio" @checked(old('status') == '1')>
        <label for="">@lang('site.inactive')</label>
    </div>
    <div>
        <label for="image">@lang('site.image')</label>
        <input name="image" type="file" class="form-control">
    </div>
<br>
    <button class="btn btn-primary">@lang('site.create')</button>
</form>

@endsection
