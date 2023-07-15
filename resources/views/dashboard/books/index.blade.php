    @extends('layout.dashboard')
    @section('title','Book')
    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="#">Book</a></li>

    @endsection
    @section('content')
    <h1>welcome in Book <a href="{{ route('dashboard.books.create') }}" class="btn-sm btn-primary">Create</a>
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
            <th scope="col">Name</th>
            <th scope="col">Category Name</th>
            <th scope="col">Author_name</th>
            <th scope="col">Publication_date</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th colspan="2" scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($books as $Book)
            <tr>
                <th scope="row">{{ $Book->id }}</th>
                <td>{{ $Book->name }}</td>
                <td>{{ $Book->category ? $Book->category->name : ""; }}</td>
                <td>{{ $Book->author_name }}</td>
                <td>{{ $Book->publication_date }}</td>
                <td>{{ $Book->description }}</td>
                <td>{{ $Book->Price }}</td>
             
                <td><a href="{{ route('dashboard.books.edit',$Book->id) }}" class="btn btn-info">Edit</a></td>
                <td><form action="{{ route('dashboard.books.destroy',$Book->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Delete</button>
                </form></td>
            </tr>
            @empty
                <tr>

                    <td colspan="8">No Data</td>
                </tr>
            @endforelse


        </tbody>
    </table>

    @endsection
    {{ $books->links() }}

