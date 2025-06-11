@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto py-10">
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold mb-4 text-deep-blue">Feedback #{{ $feedback->id }}</h1>
        <p class="mb-2 text-gray-700 font-semibold">Utilisateur: {{ $feedback->user_id }}</p>
        <p class="mb-2 text-gray-700 font-semibold">Type: {{ $feedback->type_feedback }}</p>
        <div class="bg-gray-50 p-4 rounded-lg text-gray-600 mb-4">Message: {{ $feedback->message }}</div>
        <p class="mb-2 text-gray-700 font-semibold">Satisfaction: {{ $feedback->satisfaction }}</p>
        <div class="flex justify-between">
            <a href="{{ route('feedback.index') }}" class="px-4 py-2 bg-electric-blue text-white rounded-lg font-semibold shadow hover:bg-vibrant-blue transition">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
