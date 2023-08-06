<!-- resources/views/translations/index.blade.php -->

@extends('layout.dashboard') <!-- Assuming you have a layout file for your app -->

@section('content')

    <h1>Translations<a class="btn-sm btn-primary" href="{{route('dashboard.translations.create')}}">@lang('site.create')</a></h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Source Text</th>
                <th>Arabic Translation</th>
                <th>English Translation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($translations as $translation)
                <tr>
                    <td>{{ $translation->id }}</td>
                    <td>{{ $translation->source_text }}</td>
                    <td>{{ $translation->arabic_translation }}</td>
                    <td>{{ $translation->english_translation }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <!-- Edit button with left margin -->
                            <a href="{{ route('dashboard.translations.edit', $translation->id) }}" class="btn btn-primary btn-sm mr-1">Edit</a>

                            <!-- Delete button -->
                            <form action="{{ route('dashboard.translations.destroy', $translation->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
