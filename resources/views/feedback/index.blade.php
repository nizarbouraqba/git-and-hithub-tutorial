@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-deep-blue">Liste des Feedbacks</h1>

    </div>
    @if($feedbacks->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded mb-8">
            Aucun feedback pour le moment.
        </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($feedbacks as $feedback)
            <div class="bg-white rounded-2xl shadow-2xl p-8 flex flex-col transition-all duration-200 hover:shadow-electric-orange/50 hover:border-2 hover:border-electric-orange">
                <h2 class="text-xl font-semibold text-deep-blue mb-2 truncate">{{ $feedback->nom }}</h2>
                <p class="text-gray-700 mb-4 line-clamp-3">{{ $feedback->message }}</p>
                <div class="flex justify-between mt-auto">
                    <a href="{{ route('feedback.show', $feedback->id) }}" class="text-electric-blue hover:underline">Voir</a>
                    <a href="{{ route('feedback.edit', $feedback->id) }}" class="text-vibrant-orange hover:underline">Modifier</a>
                    <form method="POST" action="{{ route('feedback.destroy', $feedback->id) }}" onsubmit="return confirm('Supprimer ce feedback ?');">
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
