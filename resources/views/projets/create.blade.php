@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6 text-deep-blue">Ajouter un projet</h1>
    <form method="POST" action="{{ route('projets.store') }}" enctype="multipart/form-data" class="bg-white p-8 rounded-xl shadow-lg space-y-5">
        @csrf
        <div>
            <label class="block mb-1 font-semibold" for="titre_projet">Titre du projet</label>
            <div class="relative">
  <input type="text" name="titre_projet" id="titre_projet" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-4 focus:ring-vibrant-orange/20 focus:border-vibrant-orange transition-all duration-200 pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Titre du projet">
@error('titre_projet')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
  <span class="absolute left-3 top-1/2 -translate-y-1/2 text-vibrant-orange flex items-center" style="height: 100%;">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M8 8h8M8 12h8M8 16h4"/></svg>
  </span>
</div>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="description_projet">Description du projet</label>
            <div class="relative">
  <textarea name="description_projet" id="description_projet" rows="3" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-vibrant-blue focus:border-vibrant-blue pl-12 py-3 placeholder-gray-400 text-lg resize-none" placeholder="Description du projet"></textarea>
@error('description_projet')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
  <span class="absolute left-3 top-4 text-vibrant-blue">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h7"/></svg>
  </span>
</div>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="theme">Thème</label>
            <div class="relative">
                <input type="text" name="theme" id="theme" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-vibrant-blue focus:border-vibrant-blue pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Thème">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-vibrant-blue flex items-center" style="height: 100%;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="8.5" cy="10.5" r="1.5"/><circle cx="15.5" cy="10.5" r="1.5"/><circle cx="12" cy="16" r="1.5"/></svg>
                </span>
            </div>
@error('theme')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="date_projet">Date du projet</label>
            <div class="relative">
                <input type="datetime-local" name="date_projet" id="date_projet" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-vibrant-blue focus:border-vibrant-blue pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Date du projet">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-vibrant-blue flex items-center" style="height: 100%;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </span>
            </div>
@error('date_projet')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="statut_projet">Statut</label>
            <div class="relative">
                <input type="text" name="statut_projet" id="statut_projet" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-vibrant-blue focus:border-vibrant-blue pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Statut du projet">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-vibrant-blue flex items-center" style="height: 100%;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 12V7a2 2 0 0 0-2-2h-5l-7 7a2 2 0 0 0 0 2.83l5 5a2 2 0 0 0 2.83 0l7-7z"/></svg>
                </span>
            </div>
@error('statut_projet')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="organisateur">Organisateur</label>
            <div class="relative">
                <input type="text" name="organisateur" id="organisateur" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-vibrant-blue focus:border-vibrant-blue pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Organisateur">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-vibrant-blue flex items-center" style="height: 100%;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M16 16v2a4 4 0 0 1-8 0v-2"/></svg>
                </span>
            </div>
@error('organisateur')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="localisation">Localisation</label>
            <div class="relative">
                <input type="text" name="localisation" id="localisation" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-vibrant-blue focus:border-vibrant-blue pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Localisation">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-vibrant-blue flex items-center" style="height: 100%;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </span>
            </div>
@error('localisation')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="duree">Durée</label>
            <div class="relative">
                <input type="text" name="duree" id="duree" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-vibrant-blue focus:border-vibrant-blue pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Durée">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-vibrant-blue flex items-center" style="height: 100%;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4"/><path d="M16 12h-4"/></svg>
                </span>
            </div>
@error('duree')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="objectif_projet">Objectif du projet</label>
            <div class="relative">
                <textarea name="objectif_projet" id="objectif_projet" rows="2" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-vibrant-blue focus:border-vibrant-blue pl-12 py-3 placeholder-gray-400 text-lg resize-none" placeholder="Objectif du projet"></textarea>
                <span class="absolute left-3 top-4 text-vibrant-blue">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><path d="M12 8v4M12 16h.01"/></svg>
                </span>
            </div>
@error('objectif_projet')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="image">Image (fichier)</label>
            <div id="dropzone-image-projet" class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-vibrant-orange bg-gray-50 rounded-xl transition hover:bg-orange-50 relative">
    <div id="dropzone-image-projet-content" class="flex flex-col items-center justify-center w-full h-40">
        <svg class="w-12 h-12 text-vibrant-orange mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 16v-4a4 4 0 0 0-8 0v4"/><path d="M12 12v6"/><path d="M8 16h8"/><path d="M4 16v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/></svg>
        <p class="text-vibrant-orange font-semibold">Téléverser le fichier <label for="image-projet" class="underline cursor-pointer text-orange-600">Parcourir</label></p>
        <p class="text-gray-400 text-sm">Format image uniquement (JPG, PNG, GIF...)</p>
        <input type="file" name="image_file" id="image-projet" accept="image/*" class="hidden" onchange="handleImageUploadProjet(event)">
@error('image_file')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
@enderror
    </div>
    <div id="image-success-message-projet" class="hidden flex flex-col items-center justify-center w-full h-40 text-center">
    <span class="text-vibrant-orange font-semibold text-lg block w-full" id="selected-image-name-projet"></span>
    <span class="text-green-600 mt-2 block w-full">Image sélectionnée avec succès&nbsp;!</span>
</div>
</div>
<script>
const dropzoneProjet = document.getElementById('dropzone-image-projet');
dropzoneProjet.addEventListener('dragover', function(e) {
    e.preventDefault();
    dropzoneProjet.classList.add('ring', 'ring-vibrant-orange');
});
dropzoneProjet.addEventListener('dragleave', function(e) {
    dropzoneProjet.classList.remove('ring', 'ring-vibrant-orange');
});
dropzoneProjet.addEventListener('drop', function(e) {
    e.preventDefault();
    dropzoneProjet.classList.remove('ring', 'ring-vibrant-orange');
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        document.getElementById('image-projet').files = files;
        handleImageUploadProjet({target: {files}});
    }
});
</script>
        </div>
        <script>
            function handleImageUploadProjet(e) {
    const contentDiv = document.getElementById('dropzone-image-projet-content');
    const successDiv = document.getElementById('image-success-message-projet');
    const nameSpan = document.getElementById('selected-image-name-projet');
                const file = e.target.files[0];
                if (file) {
        contentDiv.classList.add('hidden');
        successDiv.classList.remove('hidden');
        nameSpan.textContent = file.name;

                    document.getElementById('image-url-preview-projet').value = url;
                } else {
                    document.getElementById('image-url-preview-projet').value = '';
                }
            }
            document.getElementById('dropzone-image-projet').addEventListener('click', function() {
                document.getElementById('image-projet').click();
            });
        </script>
        <button type="submit" class="w-full py-2 px-4 bg-vibrant-blue text-white rounded-lg font-semibold shadow hover:bg-electric-blue transition">Créer</button>
    </form>
</div>
@endsection
