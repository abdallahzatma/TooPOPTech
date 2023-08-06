<!-- resources/views/translations/create.blade.php -->

@extends('layout.dashboard') <!-- Assuming you have a layout file for your app -->

@section('content')
    <h1>Add New Translation</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.translations.store') }}" method="POST">
        @csrf
        <label for="source_text">Source Text:</label>
        <textarea name="source_text" id="source_text" rows="4" cols="50" required></textarea>
        <br>

        <label for="arabic_translation">Arabic Translation:</label>
        <textarea name="arabic_translation" id="arabic_translation" rows="4" cols="50" required></textarea>
        <br>

        <label for="english_translation">English Translation:</label>
        <textarea name="english_translation" id="english_translation" rows="4" cols="50" required></textarea>
        <br>

      

        <input type="submit" value="Save Translation">
    </form>
@endsection
