@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto py-10">
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold mb-4 text-deep-blue">{{ $event->titre }}</h1>
        <div class="space-y-3 mb-4">
            <div><span class="font-semibold">Description :</span> {{ $event->description }}</div>
            <div><span class="font-semibold">Description détaillée :</span><br><div class="bg-gray-50 p-4 rounded-lg text-gray-600 max-h-48 overflow-y-auto overflow-x-hidden whitespace-pre-line break-words">{{ $event->description_detaillee }}</div></div>
            <div><span class="font-semibold">À venir :</span> {{ $event->is_a_venir ? 'Oui' : 'Non' }}</div>
            <div><span class="font-semibold">Catégorie :</span> {{ $event->categorie }}</div>
            <div><span class="font-semibold">Ville :</span> {{ $event->ville }}</div>
            <div><span class="font-semibold">Prix :</span> {{ $event->prix }}</div>
            <div><span class="font-semibold">Date :</span> {{ $event->date }}</div>
            <div><span class="font-semibold">Heure :</span> {{ $event->heure }}</div>
            <div><span class="font-semibold">Date limite d'inscription :</span> {{ $event->date_limite_inscription }}</div>
            <div><span class="font-semibold">Heure limite d'inscription :</span> {{ $event->heure_limite_inscription }}</div>
        </div>
        <div class="flex justify-between">
            <a href="{{ route('events.index') }}" class="px-4 py-2 bg-electric-blue text-white rounded-lg font-semibold shadow hover:bg-vibrant-blue transition">Retour à la liste</a>
            <a href="{{ route('events.edit', $event->id) }}" class="px-4 py-2 bg-vibrant-blue text-white rounded-lg font-semibold shadow hover:bg-electric-blue transition">Modifier</a>
        </div>
    </div>
</div>
@endsection
