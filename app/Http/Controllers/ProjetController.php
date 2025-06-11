<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function index() { $projets = Projet::all(); return view('projets.index', compact('projets')); }
    public function create() { return view('projets.create'); }
    public function store(Request $request) {
    $validated = $request->validate([
        'titre_projet' => 'required|string|max:255',
        'description_projet' => 'required|string',
        'date_projet' => 'required|date',
        'statut_projet' => 'required|string',
        'image_file' => 'required|image|mimes:jpg,jpeg,png,gif|max:4096',
    ], [
        'titre_projet.required' => 'Le titre du projet est obligatoire.',
        'description_projet.required' => 'La description du projet est obligatoire.',
        'date_projet.required' => 'La date du projet est obligatoire.',
        'statut_projet.required' => 'Le statut du projet est obligatoire.',
        'image_file.required' => 'L\'image est obligatoire.',
        'image_file.image' => 'Le fichier doit être une image.',
        'image_file.mimes' => 'Le format de l\'image doit être JPG, JPEG, PNG ou GIF.',
        'image_file.max' => 'L\'image ne doit pas dépasser 4Mo.',
    ]);

    $data = $request->except('image_file');
    if ($request->hasFile('image_file')) {
        $file = $request->file('image_file');
        $path = $file->store('images/projets', 'public');
        $data['image'] = '/storage/' . $path;
    }
    $projet = Projet::create($data);
    return redirect()->route('projets.index');
}
    public function show($id) { $projet = Projet::findOrFail($id); return view('projets.show', compact('projet')); }
    public function edit($id) { $projet = Projet::findOrFail($id); return view('projets.edit', compact('projet')); }
    public function update(Request $request, $id) {
        $projet = Projet::findOrFail($id);
        $data = $request->except('image_file');
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $path = $file->store('images/projets', 'public');
            $data['image'] = '/storage/' . $path;
        }
        $projet->update($data);
        return redirect()->route('projets.index');
    }
    public function destroy($id) { $projet = Projet::findOrFail($id); $projet->delete(); return redirect()->route('projets.index'); }
}
