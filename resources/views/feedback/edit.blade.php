@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6 text-deep-blue">Modifier un feedback</h1>
    <form method="POST" action="{{ route('feedback.update', $feedback->id) }}" class="bg-white p-8 rounded-xl shadow-lg space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-1 font-semibold" for="user_id">Utilisateur</label>
            <div class="relative">
    <input type="number" name="user_id" id="user_id" value="{{ $feedback->user_id }}" class="w-full rounded-xl border border-gray-200 bg-gray-50 focus:ring-4 focus:ring-electric-blue/20 focus:border-electric-blue transition-all duration-200 pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="ID utilisateur">
    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-electric-blue">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
    </span>
</div>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="type_feedback">Type de feedback</label>
            <select name="type_feedback" id="type_feedback" class="w-full rounded-lg border-gray-300 focus:ring-electric-blue focus:border-electric-blue">
                <option value="Suggestion" @if($feedback->type_feedback == 'Suggestion') selected @endif>Suggestion</option>
                <option value="Problème technique" @if($feedback->type_feedback == 'Problème technique') selected @endif>Problème technique</option>
                <option value="Question" @if($feedback->type_feedback == 'Question') selected @endif>Question</option>
                <option value="Autre" @if($feedback->type_feedback == 'Autre') selected @endif>Autre</option>
            </select>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="message">Message</label>
            <textarea name="message" id="message" rows="4" class="w-full rounded-lg border-gray-300 focus:ring-electric-blue focus:border-electric-blue">{{ $feedback->message }}</textarea>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="satisfaction">Satisfaction</label>
            <input type="number" name="satisfaction" id="satisfaction" min="1" max="5" value="{{ $feedback->satisfaction }}" class="w-full rounded-lg border-gray-300 focus:ring-electric-blue focus:border-electric-blue">
        </div>
        <button type="submit" class="w-full py-2 px-4 bg-electric-orange text-white rounded-lg font-semibold shadow hover:bg-vibrant-orange transition">Mettre à jour</button>
    </form>
@endsection
