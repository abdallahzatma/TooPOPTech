@extends('layout.dashboard')
@section('title','Category')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">Category</a></li>

@endsection
@section('content')
<h1>welcome in Category <a href="{{ route('dashboard.categories.create') }}" class="btn-sm btn-primary">Create</a>
</h1>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>


@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">image</th>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">status</th>
        <th colspan="2" scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <th scope="row"><img width="200" height="200" src="{{ asset('images/'.$category->image) }}" alt=""></th>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->name }}</td>
            <td>{{ $category->status }}</td>
            <td><a href="{{ route('dashboard.categories.edit',$category->id) }}" class="btn btn-info">Edit</a></td>
            <td><form action="{{ route('dashboard.categories.destroy',$category->id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger   ">Delete</button>
            </form></td>
          </tr>
        @empty
            <tr>

                <td colspan="8">No Data</td>
              </tr>
        @endforelse


    </tbody>
  </table>
  {{ $categories->links() }}

@endsection

