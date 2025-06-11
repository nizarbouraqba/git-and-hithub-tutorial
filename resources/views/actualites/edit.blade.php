@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6 text-deep-blue">Modifier une actualité</h1>
    <form method="POST" action="{{ route('actualites.update', $actualite->id) }}" class="bg-white p-8 rounded-xl shadow-lg space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-1 font-semibold" for="titre">Titre</label>
            <div class="relative">
    <input type="text" name="titre" id="titre" value="{{ $actualite->titre }}" class="w-full rounded-xl border border-gray-200 bg-gray-50 focus:ring-4 focus:ring-electric-blue/20 focus:border-electric-blue transition-all duration-200 pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Titre de l'actualité">
    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-electric-blue">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 8h10M7 12h6"/></svg>
    </span>
</div>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="image">Image (fichier)</label>
@if($actualite->image)
    <div class="mb-2">
        <img src="{{ asset($actualite->image) }}" alt="Image actuelle" class="rounded-lg max-h-40 object-cover w-full">
        <p class="text-xs text-gray-500">Image actuelle</p>
    </div>
@endif
<div id="dropzone-image-edit" class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-electric-blue bg-gray-50 rounded-xl cursor-pointer transition hover:bg-blue-50 relative">
    <div id="dropzone-image-edit-content" class="flex flex-col items-center justify-center w-full h-40">
        <svg class="w-12 h-12 text-electric-blue mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 16v-4a4 4 0 0 0-8 0v4"/><path d="M12 12v6"/><path d="M8 16h8"/><path d="M4 16v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/></svg>
        <p class="text-electric-blue font-semibold">Téléverser le fichier <label for="image-edit" class="underline cursor-pointer text-blue-600">Parcourir</label></p>
        <p class="text-gray-400 text-sm">Format image uniquement (JPG, PNG, GIF...)</p>
        <input type="file" name="image_file" id="image-edit" accept="image/*" class="hidden" onchange="handleImageUploadEdit(event)">
        @error('image_file')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div id="image-success-message-edit" class="hidden flex flex-col items-center justify-center w-full h-40 text-center">
        <span class="text-electric-blue font-semibold text-lg block w-full" id="selected-image-name-edit"></span>
        <span class="text-green-600 mt-2 block w-full">Image sélectionnée avec succès&nbsp;!</span>
    </div>
</div>
<script>
function handleImageUploadEdit(e) {
    const contentDiv = document.getElementById('dropzone-image-edit-content');
    const successDiv = document.getElementById('image-success-message-edit');
    const nameSpan = document.getElementById('selected-image-name-edit');
    const file = e.target.files[0];
    if (file) {
        contentDiv.classList.add('hidden');
        successDiv.classList.remove('hidden');
        nameSpan.textContent = file.name;
    }
}
document.getElementById('dropzone-image-edit').addEventListener('click', function() {
    document.getElementById('image-edit').click();
});
</script>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="description">Description</label>
            <textarea name="description" id="description" rows="3" class="w-full rounded-lg border-gray-300 focus:ring-electric-blue focus:border-electric-blue">{{ $actualite->description }}</textarea>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="description_detaille">Description détaillée</label>
            <textarea name="description_detaille" id="description_detaille" rows="4" class="w-full rounded-xl border border-gray-200 bg-gray-50 focus:ring-4 focus:ring-electric-blue/20 focus:border-electric-blue transition-all duration-200 p-4 placeholder-gray-400 text-lg shadow-sm" placeholder="Description détaillée">{{ $actualite->description_detaille }}</textarea>
        </div>
        <button type="submit" class="w-full py-2 px-4 bg-electric-orange text-white rounded-lg font-semibold shadow hover:bg-vibrant-orange transition">Mettre à jour</button>
    </form>
</div>
@endsection
