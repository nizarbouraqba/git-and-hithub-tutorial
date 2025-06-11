@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6 text-deep-blue">Ajouter un événement</h1>
    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" class="bg-white p-8 rounded-xl shadow-lg space-y-5">
        @csrf
        <div>
            <label class="block mb-1 font-semibold" for="titre">Titre</label>
            <div class="relative">
                <div class="relative">
  <input type="text" name="titre" id="titre" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-4 focus:ring-vibrant-blue/20 focus:border-vibrant-blue transition-all duration-200 pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Titre de l'événement">
@error('titre')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
  <span class="absolute left-3 top-1/2 -translate-y-1/2 text-vibrant-blue">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
  </span>
</div>
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-vibrant-blue">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                </span>
            </div>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="description">Description</label>
            <div class="relative">
  <textarea name="description" id="description" rows="3" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-vibrant-blue focus:border-vibrant-blue pl-12 py-3 placeholder-gray-400 text-lg resize-none" placeholder="Description"></textarea>
@error('description')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
  <span class="absolute left-3 top-4 text-vibrant-blue">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
  </span>
</div>
        </div>
        
        <div class="flex items-center space-x-2">
            <input type="checkbox" name="is_a_venir" id="is_a_venir" class="rounded">
            <label for="is_a_venir" class="font-semibold">À venir</label>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-2">
            <div>
                <label class="block mb-1 font-semibold" for="day">Jour</label>
                <input type="text" name="day" id="day" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-4 focus:ring-vibrant-blue/20 focus:border-vibrant-blue transition-all duration-200 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Jour">
            </div>
            <div>
                <label class="block mb-1 font-semibold" for="month">Mois</label>
                <input type="text" name="month" id="month" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-4 focus:ring-vibrant-blue/20 focus:border-vibrant-blue transition-all duration-200 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Mois">
            </div>
            <div>
                <label class="block mb-1 font-semibold" for="heure_event">Heure événement</label>
                <input type="text" name="heure_event" id="heure_event" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-4 focus:ring-vibrant-blue/20 focus:border-vibrant-blue transition-all duration-200 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Heure événement">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-semibold" for="date_limite">Date limite d'inscription</label>
                <input type="date" name="date_limite_inscription" id="date_limite" class="w-full rounded-lg border-transparent focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
            <div>
                <label class="block mb-1 font-semibold" for="heure_limite">Heure limite d'inscription</label>
                <input type="time" name="heure_limite_inscription" id="heure_limite" class="w-full rounded-lg border-transparent focus:ring-vibrant-blue focus:border-vibrant-blue">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-semibold" for="date">Date</label>
                <input type="date" name="date" id="date" class="w-full rounded-lg border-transparent focus:ring-vibrant-blue focus:border-vibrant-blue">
@error('date')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
            </div>
            <div>
                <label class="block mb-1 font-semibold" for="heure">Heure</label>
                <input type="time" name="heure" id="heure" class="w-full rounded-lg border-transparent focus:ring-vibrant-blue focus:border-vibrant-blue">
@error('heure')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
            </div>
        </div>
        <div>
    <label class="block mb-1 font-semibold" for="ville">Ville</label>
    <input type="text" name="ville" id="ville" class="w-full rounded-lg border-transparent focus:ring-vibrant-blue focus:border-vibrant-blue" placeholder="Ville">
    @error('ville')
        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>
<div>
    <label class="block mb-1 font-semibold" for="image">Image (fichier)</label>
    <div id="dropzone-image-event" class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-vibrant-blue bg-gray-50 rounded-xl transition hover:bg-blue-50 relative">
        <div id="dropzone-image-event-content" class="flex flex-col items-center justify-center w-full h-40">
            <svg class="w-12 h-12 text-vibrant-blue mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 16v-4a4 4 0 0 0-8 0v4"/><path d="M12 12v6"/><path d="M8 16h8"/><path d="M4 16v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/></svg>
            <p class="text-vibrant-blue font-semibold">Téléverser le fichier <label for="image-event" class="underline cursor-pointer text-blue-600">Parcourir</label></p>
            <p class="text-gray-400 text-sm">Format image uniquement (JPG, PNG, GIF...)</p>
            <input type="file" name="image_file" id="image-event" accept="image/*" class="hidden" onchange="handleImageUploadEvent(event)">
            @error('image_file')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div id="image-success-message-event" class="hidden flex flex-col items-center justify-center w-full h-40 text-center">
            <span class="text-vibrant-blue font-semibold text-lg block w-full" id="selected-image-name-event"></span>
            <span class="text-green-600 mt-2 block w-full">Image sélectionnée avec succès&nbsp;!</span>
        </div>
    </div>
</div>
<div>
    <label class="block mb-1 font-semibold" for="prix">Prix</label>
    <div class="relative">
        <input type="number" name="prix" id="prix" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-vibrant-blue focus:border-vibrant-blue transition-all duration-200 pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Prix de l'événement" min="0" step="0.01">
        @error('prix')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-vibrant-blue">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><text x="5" y="18" font-size="16">€</text></svg>
        </span>
    </div>
</div>
<div>
    <label class="block mb-1 font-semibold" for="categorie">Catégorie</label>
    <div class="relative">
        <input type="text" name="categorie" id="categorie" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-vibrant-blue focus:border-vibrant-blue transition-all duration-200 pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Catégorie de l'événement">
        @error('categorie')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-vibrant-blue">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 12l10 10 10-10M12 2v20"/></svg>
        </span>
    </div>
</div>
<div>
    <label class="block mb-1 font-semibold" for="description_detaillee">Description détaillée</label>
    <div class="relative">
        <textarea name="description_detaillee" id="description_detaillee" rows="4" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-vibrant-blue focus:border-vibrant-blue transition-all duration-200 pl-12 py-3 placeholder-gray-400 text-lg resize-none" placeholder="Description détaillée"></textarea>
        @error('description_detaillee')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
        <span class="absolute left-3 top-4 text-vibrant-blue">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </span>
    </div>
    <button type="submit" class="w-full py-2 px-4 bg-vibrant-blue text-white rounded-lg font-semibold shadow hover:bg-electric-blue transition mt-6">Créer</button>
</div>
        
        
<script>
const dropzoneEvent = document.getElementById('dropzone-image-event');
dropzoneEvent.addEventListener('dragover', function(e) {
    e.preventDefault();
    dropzoneEvent.classList.add('ring', 'ring-vibrant-blue');
});
dropzoneEvent.addEventListener('dragleave', function(e) {
    dropzoneEvent.classList.remove('ring', 'ring-vibrant-blue');
});
dropzoneEvent.addEventListener('drop', function(e) {
    e.preventDefault();
    dropzoneEvent.classList.remove('ring', 'ring-vibrant-blue');
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        document.getElementById('image-event').files = files;
        handleImageUploadEvent({target: {files}});
    }
});
</script>
            
        </div>
        
        <script>
            function handleImageUploadEvent(e) {
    const contentDiv = document.getElementById('dropzone-image-event-content');
    const successDiv = document.getElementById('image-success-message-event');
    const nameSpan = document.getElementById('selected-image-name-event');
    const file = e.target.files[0];
    if (file) {
        contentDiv.classList.add('hidden');
        successDiv.classList.remove('hidden');
        nameSpan.textContent = file.name;

                    document.getElementById('image-url-preview-event').value = url;
                } else {
                    document.getElementById('image-url-preview-event').value = '';
                }
            }
            document.getElementById('dropzone-image-event').addEventListener('click', function() {
                document.getElementById('image-event').click();
            });
        </script>
        
@endsection
