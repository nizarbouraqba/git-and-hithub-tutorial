@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto py-10">
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold mb-4 text-deep-blue">{{ $projet->titre_projet }}</h1>
        <div class="space-y-3 mb-4">
            <div><span class="font-semibold">Description :</span> {{ $projet->description_projet }}</div>
            <div><span class="font-semibold">Description détaillée :</span><br><div class="bg-gray-50 p-4 rounded-lg text-gray-600 max-h-48 overflow-y-auto overflow-x-hidden whitespace-pre-line break-words">{{ $projet->description_detaillee }}</div></div>
            <div><span class="font-semibold">Thème :</span> {{ $projet->theme }}</div>
            <div><span class="font-semibold">Date du projet :</span> {{ $projet->date_projet }}</div>
            <div><span class="font-semibold">Statut :</span> {{ $projet->statut_projet }}</div>
            <div><span class="font-semibold">Organisateur :</span> {{ $projet->organisateur }}</div>
            <div><span class="font-semibold">Localisation :</span> {{ $projet->localisation }}</div>
            <div><span class="font-semibold">Durée :</span> {{ $projet->duree }}</div>
            <div><span class="font-semibold">Image partenaire :</span> {{ $projet->image_partenaire }}</div>
            <div><span class="font-semibold">Objectif :</span> {{ $projet->objectif_projet }}</div>
        </div>
        <div class="flex justify-between">
            <a href="{{ route('projets.index') }}" class="px-4 py-2 bg-electric-blue text-white rounded-lg font-semibold shadow hover:bg-vibrant-blue transition">Retour à la liste</a>
            <a href="{{ route('projets.edit', $projet->id) }}" class="px-4 py-2 bg-vibrant-blue text-white rounded-lg font-semibold shadow hover:bg-electric-blue transition">Modifier</a>
        </div>
    </div>
</div>
@endsection
