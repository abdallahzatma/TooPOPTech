@extends('layout.dashboard')
@section('title', __('site.book'))
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">@lang("site.book")</a></li>
<li class="breadcrumb-item"><a href="#">@lang("site.create")</a></li>

@endsection
@section('content')
<h1>@lang("site.create") @lang('site.book')</h1>
@if($errors->any())
@foreach ($errors->all() as $error )
<div class="alert alert-danger" role="alert">
    {{ $error }}
  </div>

@endforeach
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang("site.create") </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.books.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">@lang("site.name") @lang('site.book')</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="author_name">@lang("site.create") @lang('site.author')</label>
                            <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value="{{ old('author_name') }}" required>
                            @error('author_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">@lang("site.create") @lang('site.category')</label>
                            <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id" >
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="publication_date">@lang('site.publication')</label>
                            <input id="publication_date" type="date" class="form-control @error('publication_date') is-invalid @enderror" name="publication_date" value="{{ old('publication_date') }}" required>
                            @error('publication_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">@lang('site.description')</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Price">@lang('site.price')</label>
                            <input id="Price" type="number" step="0.01" class="form-control @error('Price') is-invalid @enderror" name="Price" value="{{ old('Price') }}" required>
                            @error('Price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                            @lang('site.add')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
