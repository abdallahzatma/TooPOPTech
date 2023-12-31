@extends('layout.dashboard')
@section('title', __('site.book'))
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">@lang('site.book')</a></li>
<li class="breadcrumb-item"><a href="#">@lang('site.edit')</a></li>
@endsection
@section('content')
<h1>@lang('site.edit') @lang('site.book')</h1>
@if($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{ $error }}
</div>
@endforeach
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('site.edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.books.update', $book->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">{{ __('site.book') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $book->name) }}" required autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="author_name">{{ __('site.author') }}</label>
                            <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value="{{ old('author_name', $book->author_name) }}" required>
                            @error('author_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">{{ __('site.category') }}</label>
                            <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">-- @lang('site.select_category') --</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="publication_date">{{ __('site.publication') }}</label>
                            <input id="publication_date" type="date" class="form-control @error('publication_date') is-invalid @enderror" name="publication_date" value="{{ old('publication_date', $book->publication_date) }}" required>
                            @error('publication_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('site.description') }}</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description', $book->description) }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Price">{{ __('site.price') }}</label>
                            <input id="Price" type="number" step="0.01" class="form-control @error('Price') is-invalid @enderror" name="Price" value="{{ old('Price', $book->Price) }}" required>
                            @error('Price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('site.update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
