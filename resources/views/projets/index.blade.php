@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-deep-blue">Liste des Projets</h1>
        <a href="{{ route('projets.create') }}" class="px-4 py-2 bg-vibrant-blue text-white rounded-lg font-semibold shadow hover:bg-electric-blue transition">Ajouter un projet</a>
    </div>
    @if($projets->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded mb-8">
            Aucun projet pour le moment.
        </div>
    @else
    <div id="loader" class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50 hidden">
    <div class="w-20 h-20 border-8 border-electric-blue border-t-transparent rounded-full animate-spin"></div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($projets as $projet)
            <div class="bg-white rounded-2xl shadow-2xl p-8 flex flex-col transition-all duration-200 hover:shadow-vibrant-orange/50 hover:border-2 hover:border-vibrant-orange">
                <h2 class="text-xl font-semibold text-deep-blue mb-2 truncate">{{ $projet->titre_projet }}</h2>
                
                <p class="text-gray-700 mb-4 line-clamp-3">{{ $projet->description_projet }}</p>
                <div class="flex justify-between mt-auto">
                    <a href="{{ route('projets.show', $projet->id) }}" class="text-electric-blue hover:underline">Voir</a>
                    <a href="{{ route('projets.edit', $projet->id) }}" class="text-vibrant-orange hover:underline">Modifier</a>
                    <button onclick="openDeleteModal({{ $projet->id }})" class="text-red-600 hover:underline">Supprimer</button>
<!-- Modale de confirmation -->
<div id="delete-modal-{{ $projet->id }}" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-sm w-full animate-fade-in">
        <h3 class="text-xl font-bold mb-4 text-deep-orange">Confirmer la suppression</h3>
        <p class="mb-6">Voulez-vous vraiment supprimer ce projet ?</p>
        <div class="flex justify-end space-x-3">
            <button onclick="closeDeleteModal({{ $projet->id }})" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300">Annuler</button>
            <form method="POST" action="{{ route('projets.destroy', $projet->id) }}" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">Supprimer</button>
            </form>
        </div>
    </div>
</div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
