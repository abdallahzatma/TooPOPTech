<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Translation;


class TranslationController extends Controller
{
    public function index()
    {
        // Get all translations from the database
        $translations = Translation::all();

        // Pass the translations data to the view
        return view('translations.index', compact('translations'));
    }
    public function create()
    {
        return view('translations.create');
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'source_text' => 'required',
            'arabic_translation' => 'required',
            'english_translation' => 'required',
        ]);
        Translation::create([
            'source_text' => $request->input('source_text'),
            'arabic_translation' => $request->input('arabic_translation'),
            'english_translation' => $request->input('english_translation'),
        ]);
             // Redirect to the index page with a success message
             return redirect()->route('dashboard.translations.index')
             ->with('success', 'Translation created successfully!');
}
public function edit($id)
{
    $translation = Translation::findOrFail($id);
    return view('translations.edit', compact('translation'));
}
public function update(Request $request, $id)
{
    $translation = Translation::findOrFail($id);

    // Validate the incoming request data
    $request->validate([
        'source_text' => 'required',
        'arabic_translation' => 'required',
        'english_translation' => 'required',
        'french_translation' => 'required',
    ]);

    // Update the translation data in the database
    $translation->update([
        'source_text' => $request->input('source_text'),
        'arabic_translation' => $request->input('arabic_translation'),
        'english_translation' => $request->input('english_translation'),
        'french_translation' => $request->input('french_translation'),
    ]);

    // Redirect to the index page with a success message
    return redirect()->route('dashboard.translations.index')
                     ->with('success', 'Translation updated successfully!');
}
public function destroy($id)
{
    $translation = Translation::findOrFail($id);
    $translation->delete();

    // Redirect to the index page with a success message
    return redirect()->route('dashboard.translations.index')
                     ->with('success', 'Translation deleted successfully!');
}
}
