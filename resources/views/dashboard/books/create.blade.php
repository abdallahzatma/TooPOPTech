@extends('layout.dashboard')
@section('title','Book')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">Book</a></li>
<li class="breadcrumb-item"><a href="#">Create</a></li>

@endsection
@section('content')
<h1>Create New Book</h1>
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
                <div class="card-header">{{ __('Create Book') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.books.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Book Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="author_name">{{ __('Author Name') }}</label>
                            <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value="{{ old('author_name') }}" required>
                            @error('author_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">{{ __('Category') }}</label>
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
                            <label for="publication_date">{{ __('Publication Date') }}</label>
                            <input id="publication_date" type="date" class="form-control @error('publication_date') is-invalid @enderror" name="publication_date" value="{{ old('publication_date') }}" required>
                            @error('publication_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Price">{{ __('Price') }}</label>
                            <input id="Price" type="number" step="0.01" class="form-control @error('Price') is-invalid @enderror" name="Price" value="{{ old('Price') }}" required>
                            @error('Price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
