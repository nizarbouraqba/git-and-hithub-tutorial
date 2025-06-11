<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    public function index() { $actualites = Actualite::all(); return view('actualites.index', compact('actualites')); }
    public function create() { return view('actualites.create'); }
    public function store(Request $request) {
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'description_detaille' => 'required|string',
        'image_file' => 'required|image|mimes:jpg,jpeg,png,gif|max:4096',
    ], [
        'titre.required' => 'Le titre est obligatoire.',
        'description.required' => 'La description est obligatoire.',
        'description_detaille.required' => 'La description détaillée est obligatoire.',
        'image_file.required' => 'L\'image est obligatoire.',
        'image_file.image' => 'Le fichier doit être une image.',
        'image_file.mimes' => 'Le format de l\'image doit être JPG, JPEG, PNG ou GIF.',
        'image_file.max' => 'L\'image ne doit pas dépasser 4Mo.',
    ]);

    $data = $request->except('image_file');
    if ($request->hasFile('image_file')) {
        $file = $request->file('image_file');
        $path = $file->store('images/actualites', 'public');
        $data['image'] = '/storage/' . $path;
    }
    $actualite = Actualite::create($data);
    return redirect()->route('actualites.index');
}
    public function show($id) { $actualite = Actualite::findOrFail($id); return view('actualites.show', compact('actualite')); }
    public function edit($id) { $actualite = Actualite::findOrFail($id); return view('actualites.edit', compact('actualite')); }
    public function update(Request $request, $id) {
        $actualite = Actualite::findOrFail($id);
        $data = $request->except('image_file');
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $path = $file->store('images/actualites', 'public');
            $data['image'] = '/storage/' . $path;
        }
        $actualite->update($data);
        return redirect()->route('actualites.index');
    }
    public function destroy($id) { $actualite = Actualite::findOrFail($id); $actualite->delete(); return redirect()->route('actualites.index'); }
}
