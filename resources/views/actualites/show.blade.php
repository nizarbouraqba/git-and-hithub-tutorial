@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto py-10">
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold mb-4 text-deep-blue">{{ $actualite->titre }}</h1>

        <div class="mb-4">
            <div class="space-y-3 mb-4">
                <div><span class="font-semibold">Description :</span> {{ $actualite->description }}</div>
                <div><span class="font-semibold">Description détaillée :</span><br><div class="bg-gray-50 p-4 rounded-lg text-gray-600 max-h-48 overflow-y-auto overflow-x-hidden whitespace-pre-line break-words">{{ $actualite->description_detaille }}</div></div>
            </div>
        </div>
        <div class="flex justify-between">
            <a href="{{ route('actualites.index') }}" class="px-4 py-2 bg-electric-blue text-white rounded-lg font-semibold shadow hover:bg-vibrant-blue transition">Retour à la liste</a>
            <a href="{{ route('actualites.edit', $actualite->id) }}" class="px-4 py-2 bg-electric-orange text-white rounded-lg font-semibold shadow hover:bg-vibrant-orange transition">Modifier</a>
        </div>
    </div>
</div>
@endsection
