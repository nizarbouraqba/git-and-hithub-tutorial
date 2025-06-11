@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-deep-blue">Liste des Actualités</h1>
        <a href="{{ route('actualites.create') }}" class="px-4 py-2 bg-electric-orange text-white rounded-lg font-semibold shadow hover:bg-vibrant-orange transition">Ajouter une actualité</a>
    </div>
    @if($actualites->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded mb-8">
            Aucune actualité pour le moment.
        </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($actualites as $actualite)
            <div class="bg-white rounded-2xl shadow-2xl p-8 flex flex-col transition-all duration-200 hover:shadow-electric-blue/50 hover:border-2 hover:border-electric-blue">
                <h2 class="text-xl font-semibold text-deep-blue mb-2 truncate">{{ $actualite->titre }}</h2>
                
                <p class="text-gray-700 mb-4 line-clamp-3">{{ $actualite->description }}</p>
                <div class="flex justify-between mt-auto">
                    <a href="{{ route('actualites.show', $actualite->id) }}" class="text-electric-blue hover:underline">Voir</a>
                    <a href="{{ route('actualites.edit', $actualite->id) }}" class="text-vibrant-orange hover:underline">Modifier</a>
                    <form method="POST" action="{{ route('actualites.destroy', $actualite->id) }}" onsubmit="return confirm('Supprimer cette actualité ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
