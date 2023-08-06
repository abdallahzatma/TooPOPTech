<!-- resources/views/translations/edit.blade.php -->

@extends('layout.dashboard') <!-- Assuming you have a layout file for your app -->

@section('content')
    <h1>Edit Translation</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.translations.update', $translation->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Add the method spoofing for PUT request -->

        <label for="source_text">Source Text:</label>
        <textarea name="source_text" id="source_text" rows="4" cols="50" required>{{ $translation->source_text }}</textarea>
        <br>

        <label for="arabic_translation">Arabic Translation:</label>
        <textarea name="arabic_translation" id="arabic_translation" rows="4" cols="50" required>{{ $translation->arabic_translation }}</textarea>
        <br>

        <label for="english_translation">English Translation:</label>
        <textarea name="english_translation" id="english_translation" rows="4" cols="50" required>{{ $translation->english_translation }}</textarea>
        <br>

        <label for="french_translation">French Translation:</label>
        <textarea name="french_translation" id="french_translation" rows="4" cols="50" required>{{ $translation->french_translation }}</textarea>
        <br>

        <input type="submit" value="Update Translation">
    </form>
@endsection
