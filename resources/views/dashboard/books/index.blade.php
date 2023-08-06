@extends('layout.dashboard')
@section('title', __('site.book'))
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">{{ __('site.book') }}</a></li>
@endsection

@section('content')
<h1> {{ __('site.book') }} <a href="{{ route('dashboard.books.create') }}" class="btn-sm btn-primary">{{ __('site.create') }}</a>
</h1>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('site.name') }}</th>
            <th scope="col">{{ __('site.category') }}</th>
            <th scope="col">{{ __('site.author') }}</th>
            <th scope="col">{{ __('site.publication') }}</th>
            <th scope="col">{{ __('site.description') }}</th>
            <th scope="col">{{ __('site.price') }}</th>
            <th colspan="2" scope="col">{{ __('site.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($books as $Book)
        <tr>
            <th scope="row">{{ $Book->id }}</th>
            <td>{{ $Book->name }}</td>
            <td>{{ $Book->category ? $Book->category->name : "" }}</td>
            <td>{{ $Book->author_name }}</td>
            <td>{{ $Book->publication_date }}</td>
            <td>{{ $Book->description }}</td>
            <td>{{ $Book->Price }}</td>

            <td><a href="{{ route('dashboard.books.edit',$Book->id) }}" class="btn btn-info">{{ __('site.edit') }}</a></td>
            <td>
                <form action="{{ route('dashboard.books.destroy',$Book->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">{{ __('site.delete') }}</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8">{{ __('site.no_data') }}</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $books->links() }}
@endsection
