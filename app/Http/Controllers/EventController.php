<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() { $events = Event::all(); return view('events.index', compact('events')); }
    public function create() { return view('events.create'); }
    public function store(Request $request) {
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'prix' => 'nullable|numeric|min:0',
        'categorie' => 'nullable|string|max:255',
        'description_detaillee' => 'nullable|string',
        'date' => 'required|date',
        'heure' => 'required',
        'ville' => 'required|string',
        'image_file' => 'required|image|mimes:jpg,jpeg,png,gif|max:4096',
    ], [
        'titre.required' => 'Le titre est obligatoire.',
        'description.required' => 'La description est obligatoire.',
        'date.required' => 'La date est obligatoire.',
        'heure.required' => 'L\'heure est obligatoire.',
        'ville.required' => 'La ville est obligatoire.',
        'image_file.required' => 'L\'image est obligatoire.',
        'image_file.image' => 'Le fichier doit être une image.',
        'image_file.mimes' => 'Le format de l\'image doit être JPG, JPEG, PNG ou GIF.',
        'image_file.max' => 'L\'image ne doit pas dépasser 4Mo.',
    ]);

    $data = $request->except('image_file');
    // Gestion correcte du booléen is_a_venir
    $data['is_a_venir'] = $request->has('is_a_venir') ? 1 : 0;
    // Ajout explicite des champs day, month, heure_event, date_limite_inscription et heure_limite_inscription
    $data['day'] = $request->input('day');
    $data['month'] = $request->input('month');
    $data['heure_event'] = $request->input('heure_event');
    $data['date_limite_inscription'] = $request->input('date_limite_inscription');
    $data['heure_limite_inscription'] = $request->input('heure_limite_inscription');
    if ($request->hasFile('image_file')) {
        $file = $request->file('image_file');
        $path = $file->store('images/events', 'public');
        $data['image'] = '/storage/' . $path;
    }
    $event = Event::create($data);
    return redirect()->route('events.index');
}
    public function show($id) { $event = Event::findOrFail($id); return view('events.show', compact('event')); }
    public function edit($id) { $event = Event::findOrFail($id); return view('events.edit', compact('event')); }
    public function update(Request $request, $id) {
        $event = Event::findOrFail($id);
        $data = $request->except('image_file');
        // Gestion correcte du booléen is_a_venir
        $data['is_a_venir'] = $request->has('is_a_venir') ? 1 : 0;
        // Récupération explicite des champs day, month, heure_event, date/heure limite
        $data['day'] = $request->input('day');
        $data['month'] = $request->input('month');
        $data['heure_event'] = $request->input('heure_event');
        $data['date_limite_inscription'] = $request->input('date_limite_inscription');
        $data['heure_limite_inscription'] = $request->input('heure_limite_inscription');
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $path = $file->store('images/events', 'public');
            $data['image'] = '/storage/' . $path;
        }
        $event->update($data);
        return redirect()->route('events.index');
    }
    public function destroy($id) { $event = Event::findOrFail($id); $event->delete(); return redirect()->route('events.index'); }
}
