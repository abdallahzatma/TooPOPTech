@extends('layout.dashboard')
@section('title', __('site.category'))
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">@lang('site.category')</a></li>

@endsection
@section('content')
<h1>@lang('site.category') <a href="{{ route('dashboard.categories.create') }}" class="btn-sm btn-primary">@lang('site.create')</a>
</h1>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    @lang(session('success'))
  </div>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">@lang('site.image')</th>
        <th scope="col">#</th>
        <th scope="col">@lang('site.name')</th>
        <th scope="col">@lang('site.status')</th>
        <th colspan="2" scope="col">@lang('site.action')</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <th scope="row"><img width="200" height="200" src="{{ asset('images/'.$category->image) }}" alt=""></th>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->name }}</td>
            <td>{{ $category->status }}</td>
            <td><a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-info">@lang('site.edit')</a></td>
            <td><form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger">@lang('site.delete')</button>
            </form></td>
          </tr>
        @empty
            <tr>
                <td colspan="8">@lang('site.no_data')</td>
              </tr>
        @endforelse
    </tbody>
  </table>
  {{ $categories->links() }}
@endsection
