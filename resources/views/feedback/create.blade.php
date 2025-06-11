@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6 text-deep-blue">Ajouter un feedback</h1>
    <form method="POST" action="{{ route('feedback.store') }}" class="bg-white p-8 rounded-xl shadow-lg space-y-5">
        @csrf
        <div>
            <label class="block mb-1 font-semibold" for="user_id">ID utilisateur</label>
            <div class="relative">
    <div class="relative">
  <input type="number" name="user_id" id="user_id" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-4 focus:ring-electric-blue/20 focus:border-electric-blue transition-all duration-200 pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="ID utilisateur">
  <span class="absolute left-3 top-1/2 -translate-y-1/2 text-electric-blue">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 8h10M7 12h6"/></svg>
  </span>
</div>
</div>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="type_feedback">Type de feedback</label>
            <select name="type_feedback" id="type_feedback" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-4 focus:ring-electric-blue/20 focus:border-electric-blue transition-all duration-200 py-3 placeholder-gray-400 text-lg shadow-sm">
  <option value="Suggestion">Suggestion</option>
  <option value="Problème technique">Problème technique</option>
  <option value="Question">Question</option>
  <option value="Autre">Autre</option>
</select>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="message">Message</label>
            <div class="relative">
  <textarea name="message" id="message" rows="4" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-4 focus:ring-electric-blue/20 focus:border-electric-blue transition-all duration-200 pl-12 py-3 placeholder-gray-400 text-lg resize-none" placeholder="Message"></textarea>
  <span class="absolute left-3 top-4 text-electric-blue">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
  </span>
</div>
        </div>
        <div>
            <label class="block mb-1 font-semibold" for="satisfaction">Satisfaction (1-5)</label>
            <div class="relative">
  <input type="number" name="satisfaction" id="satisfaction" min="1" max="5" class="w-full rounded-xl border border-transparent bg-gray-50 focus:ring-4 focus:ring-electric-blue/20 focus:border-electric-blue transition-all duration-200 pl-12 py-3 placeholder-gray-400 text-lg shadow-sm" placeholder="Satisfaction (1-5)">
  <span class="absolute left-3 top-1/2 -translate-y-1/2 text-electric-blue">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 8h10M7 12h6"/></svg>
  </span>
</div>
        </div>
        <button type="submit" class="w-full py-2 px-4 bg-electric-orange text-white rounded-lg font-semibold shadow hover:bg-vibrant-orange transition">Créer</button>
        <button type="submit">Créer</button>
    </form>
@endsection
