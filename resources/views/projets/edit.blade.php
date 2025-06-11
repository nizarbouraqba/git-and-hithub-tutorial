@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6 text-deep-blue">Modifier un projet</h1>
    <form method="POST" action="{{ route('projets.update', $projet->id) }}" class="bg-white p-8 rounded-xl shadow-lg space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-1 font-semibold" for="titre_projet">Titre du projet</label>
            <div class="relative">
    <input type="text" name="titre_projet" id="titre_projet" value="{{ $projet->titre_projet }}" class="w-full rounded-xl border border-gray-200 bg-gray-50 focus:ring-4 focus:ring-vibrant-orange/20 focus:border-vibrant-orange transition-all duration-200 pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Titre du projet">
    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-vibrant-orange">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
    </span>
</div>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="description_projet">Description du projet</label>
            <textarea name="description_projet" id="description_projet" rows="3" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">{{ $projet->description_projet }}</textarea>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="theme">Thème</label>
            <input type="text" name="theme" id="theme" value="{{ $projet->theme }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-semibold" for="date_projet">Date du projet</label>
                <input type="datetime-local" name="date_projet" id="date_projet" value="{{ $projet->date_projet }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
            <div>
                <label class="block mb-1 font-semibold" for="statut_projet">Statut</label>
                <input type="text" name="statut_projet" id="statut_projet" value="{{ $projet->statut_projet }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="image">Image (fichier)</label>
@if($projet->image)
    <div class="mb-2">
        <img src="{{ asset($projet->image) }}" alt="Image actuelle" class="rounded-lg max-h-40 object-cover w-full">
        <p class="text-xs text-gray-500">Image actuelle</p>
    </div>
@endif
<div id="dropzone-image-edit-projet" class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-vibrant-orange bg-gray-50 rounded-xl cursor-pointer transition hover:bg-blue-50 relative">
    <div id="dropzone-image-edit-content-projet" class="flex flex-col items-center justify-center w-full h-40">
        <svg class="w-12 h-12 text-vibrant-orange mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 16v-4a4 4 0 0 0-8 0v4"/><path d="M12 12v6"/><path d="M8 16h8"/><path d="M4 16v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/></svg>
        <p class="text-vibrant-orange font-semibold">Téléverser le fichier <label for="image-edit-projet" class="underline cursor-pointer text-blue-600">Parcourir</label></p>
        <p class="text-gray-400 text-sm">Format image uniquement (JPG, PNG, GIF...)</p>
        <input type="file" name="image_file" id="image-edit-projet" accept="image/*" class="hidden" onchange="handleImageUploadEditProjet(event)">
        @error('image_file')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div id="image-success-message-edit-projet" class="hidden flex flex-col items-center justify-center w-full h-40 text-center">
        <span class="text-vibrant-orange font-semibold text-lg block w-full" id="selected-image-name-edit-projet"></span>
        <span class="text-green-600 mt-2 block w-full">Image sélectionnée avec succès&nbsp;!</span>
    </div>
</div>
<script>
function handleImageUploadEditProjet(e) {
    const contentDiv = document.getElementById('dropzone-image-edit-content-projet');
    const successDiv = document.getElementById('image-success-message-edit-projet');
    const nameSpan = document.getElementById('selected-image-name-edit-projet');
    const file = e.target.files[0];
    if (file) {
        contentDiv.classList.add('hidden');
        successDiv.classList.remove('hidden');
        nameSpan.textContent = file.name;
    }
}
document.getElementById('dropzone-image-edit-projet').addEventListener('click', function() {
    document.getElementById('image-edit-projet').click();
});
</script>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="description_detaillee">Description détaillée</label>
            <textarea name="description_detaillee" id="description_detaillee" rows="3" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">{{ $projet->description_detaillee }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-semibold" for="organisateur">Organisateur</label>
                <input type="text" name="organisateur" id="organisateur" value="{{ $projet->organisateur }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
            <div>
                <label class="block mb-1 font-semibold" for="localisation">Localisation</label>
                <input type="text" name="localisation" id="localisation" value="{{ $projet->localisation }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-semibold" for="duree">Durée</label>
                <input type="text" name="duree" id="duree" value="{{ $projet->duree }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
            <div>
                <label class="block mb-1 font-semibold" for="image_partenaire">Image partenaire (URL)</label>
                <input type="text" name="image_partenaire" id="image_partenaire" value="{{ $projet->image_partenaire }}" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="objectif_projet">Objectif du projet</label>
            <textarea name="objectif_projet" id="objectif_projet" rows="2" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">{{ $projet->objectif_projet }}</textarea>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="grande_description">Grande description</label>
            <textarea name="grande_description" id="grande_description" rows="3" class="w-full rounded-lg border-gray-300 focus:ring-vibrant-blue focus:border-vibrant-blue">{{ $projet->grande_description }}</textarea>
        </div>
        <button type="submit" class="w-full py-2 px-4 bg-vibrant-blue text-white rounded-lg font-semibold shadow hover:bg-electric-blue transition">Mettre à jour</button>
    </form>
</div>
@endsection
