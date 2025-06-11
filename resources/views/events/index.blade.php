@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-deep-blue">Liste des Événements</h1>
        <a href="{{ route('events.create') }}" class="px-4 py-2 bg-vibrant-blue text-white rounded-lg font-semibold shadow hover:bg-electric-blue transition">Ajouter un événement</a>
    </div>
    @if($events->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded mb-8">
            Aucun événement pour le moment.
        </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($events as $event)
            <div class="bg-white rounded-2xl shadow-2xl p-8 flex flex-col transition-all duration-200 hover:shadow-vibrant-blue/50 hover:border-2 hover:border-vibrant-blue">
                <h2 class="text-xl font-semibold text-deep-blue mb-2 truncate">{{ $event->titre }}</h2>
                
                <p class="text-gray-700 mb-4 line-clamp-3">{{ $event->description }}</p>
                <div class="flex justify-between mt-auto">
                    <a href="{{ route('events.show', $event->id) }}" class="text-electric-blue hover:underline">Voir</a>
                    <a href="{{ route('events.edit', $event->id) }}" class="text-vibrant-orange hover:underline">Modifier</a>
                    <form method="POST" action="{{ route('events.destroy', $event->id) }}" onsubmit="return confirm('Supprimer cet événement ?');">
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
