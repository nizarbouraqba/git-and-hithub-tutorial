@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6 text-deep-blue">Modifier un événement</h1>
    <form method="POST" action="{{ route('events.update', $event->id) }}" class="bg-white p-8 rounded-xl shadow-lg space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-1 font-semibold" for="titre">Titre</label>
            <div class="relative">
    <input type="text" name="titre" id="titre" value="{{ $event->titre }}" class="w-full rounded-xl border border-gray-200 bg-gray-50 focus:ring-4 focus:ring-vibrant-blue/20 focus:border-vibrant-blue transition-all duration-200 pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Titre de l'événement">
    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-vibrant-blue">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
    </span>
</div>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="description">Description</label>
            <textarea name="description" id="description" rows="3" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">{{ $event->description }}</textarea>
        </div>
        <div class="flex items-center space-x-2">
            <input type="checkbox" name="is_a_venir" id="is_a_venir" @if($event->is_a_venir) checked @endif class="rounded">
            <label for="is_a_venir" class="font-semibold">À venir</label>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-2">
            <div>
                <label class="block mb-1 font-semibold" for="day">Jour</label>
                <input type="text" name="day" id="day" value="{{ $event->day }}" class="w-full rounded-xl border border-gray-200 bg-gray-50 focus:ring-4 focus:ring-vibrant-blue/20 focus:border-vibrant-blue transition-all duration-200 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Jour">
            </div>
            <div>
                <label class="block mb-1 font-semibold" for="month">Mois</label>
                <input type="text" name="month" id="month" value="{{ $event->month }}" class="w-full rounded-xl border border-gray-200 bg-gray-50 focus:ring-4 focus:ring-vibrant-blue/20 focus:border-vibrant-blue transition-all duration-200 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Mois">
            </div>
            <div>
                <label class="block mb-1 font-semibold" for="heure_event">Heure événement</label>
                <input type="text" name="heure_event" id="heure_event" value="{{ $event->heure_event }}" class="w-full rounded-xl border border-gray-200 bg-gray-50 focus:ring-4 focus:ring-vibrant-blue/20 focus:border-vibrant-blue transition-all duration-200 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Heure événement">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-semibold" for="date_limite">Date limite d'inscription</label>
                <input type="date" name="date_limite_inscription" id="date_limite" value="{{ $event->date_limite_inscription }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
            <div>
                <label class="block mb-1 font-semibold" for="heure_limite">Heure limite d'inscription</label>
                <input type="time" name="heure_limite_inscription" id="heure_limite" value="{{ $event->heure_limite_inscription }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-semibold" for="date">Date</label>
                <input type="date" name="date" id="date" value="{{ $event->date }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
            <div>
                <label class="block mb-1 font-semibold" for="heure">Heure</label>
                <input type="time" name="heure" id="heure" value="{{ $event->heure }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="ville">Ville</label>
            <input type="text" name="ville" id="ville" value="{{ $event->ville }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="image">Image (fichier)</label>
@if($event->image)
    <div class="mb-2">
        <img src="{{ asset($event->image) }}" alt="Image actuelle" class="rounded-lg max-h-40 object-cover w-full">
        <p class="text-xs text-gray-500">Image actuelle</p>
    </div>
@endif
<div id="dropzone-image-edit-event" class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-vibrant-blue bg-gray-50 rounded-xl cursor-pointer transition hover:bg-blue-50 relative">
    <div id="dropzone-image-edit-content-event" class="flex flex-col items-center justify-center w-full h-40">
        <svg class="w-12 h-12 text-vibrant-blue mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 16v-4a4 4 0 0 0-8 0v4"/><path d="M12 12v6"/><path d="M8 16h8"/><path d="M4 16v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/></svg>
        <p class="text-vibrant-blue font-semibold">Téléverser le fichier <label for="image-edit-event" class="underline cursor-pointer text-blue-600">Parcourir</label></p>
        <p class="text-gray-400 text-sm">Format image uniquement (JPG, PNG, GIF...)</p>
        <input type="file" name="image_file" id="image-edit-event" accept="image/*" class="hidden" onchange="handleImageUploadEditEvent(event)">
        @error('image_file')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div id="image-success-message-edit-event" class="hidden flex flex-col items-center justify-center w-full h-40 text-center">
        <span class="text-vibrant-blue font-semibold text-lg block w-full" id="selected-image-name-edit-event"></span>
        <span class="text-green-600 mt-2 block w-full">Image sélectionnée avec succès&nbsp;!</span>
    </div>
</div>
<script>
function handleImageUploadEditEvent(e) {
    const contentDiv = document.getElementById('dropzone-image-edit-content-event');
    const successDiv = document.getElementById('image-success-message-edit-event');
    const nameSpan = document.getElementById('selected-image-name-edit-event');
    const file = e.target.files[0];
    if (file) {
        contentDiv.classList.add('hidden');
        successDiv.classList.remove('hidden');
        nameSpan.textContent = file.name;
    }
}
document.getElementById('dropzone-image-edit-event').addEventListener('click', function() {
    document.getElementById('image-edit-event').click();
});
</script>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-semibold" for="prix">Prix</label>
                <input type="number" name="prix" id="prix" value="{{ $event->prix }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
            <div>
                <label class="block mb-1 font-semibold" for="categorie">Catégorie</label>
                <input type="text" name="categorie" id="categorie" value="{{ $event->categorie }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="description_detaillee">Description détaillée</label>
            <textarea name="description_detaillee" id="description_detaillee" rows="4" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">{{ $event->description_detaillee }}</textarea>
        </div>
        <button type="submit" class="w-full py-2 px-4 bg-vibrant-blue text-white rounded-lg font-semibold shadow hover:bg-electric-blue transition">Mettre à jour</button>
    </form>
</div>
@endsection
