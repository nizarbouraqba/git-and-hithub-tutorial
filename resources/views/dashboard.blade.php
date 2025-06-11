@extends('layouts.app')
@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-4xl font-bold text-center mb-10 text-deep-blue animate-fade-in">Dashboard d'administration</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="group bg-white rounded-xl shadow-lg p-8 flex flex-col items-center hover:scale-105 hover:shadow-2xl transition-transform duration-300 ease-out cursor-pointer animate-slide-up" tabindex="0">
            <div class="bg-electric-blue text-white rounded-full p-4 mb-4 group-hover:animate-bounce">
    <!-- Icône Actualités : Newspaper -->
    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 8h10M7 12h6"/></svg>
</div>
            <h3 class="text-xl font-semibold mb-2 group-hover:text-electric-blue transition-colors">Actualités</h3>
            <a href="{{ route('actualites.index') }}" class="mt-2 px-4 py-2 bg-electric-orange text-white rounded-lg font-semibold shadow hover:bg-vibrant-orange transition-colors duration-200 focus:ring-4 focus:ring-electric-orange/50">Voir les actualités</a>
        </div>
        <div class="group bg-white rounded-xl shadow-lg p-8 flex flex-col items-center hover:scale-105 hover:shadow-2xl transition-transform duration-300 ease-out cursor-pointer animate-slide-up" tabindex="0">
            <div class="bg-vibrant-blue text-white rounded-full p-4 mb-4 group-hover:animate-bounce">
    <!-- Icône Événements : Calendar -->
    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
</div>
            <h3 class="text-xl font-semibold mb-2 group-hover:text-vibrant-blue transition-colors">Événements</h3>
            <a href="{{ route('events.index') }}" class="mt-2 px-4 py-2 bg-vibrant-blue text-white rounded-lg font-semibold shadow hover:bg-electric-blue transition-colors duration-200 focus:ring-4 focus:ring-vibrant-blue/50">Voir les événements</a>
        </div>
        <div class="group bg-white rounded-xl shadow-lg p-8 flex flex-col items-center hover:scale-105 hover:shadow-2xl transition-transform duration-300 ease-out cursor-pointer animate-slide-up" tabindex="0">
            <div class="bg-deep-orange text-white rounded-full p-4 mb-4 group-hover:animate-bounce">
    <!-- Icône Feedback : Comment -->
    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
</div>
            <h3 class="text-xl font-semibold mb-2 group-hover:text-deep-orange transition-colors">Feedback</h3>
            <a href="{{ route('feedback.index') }}" class="mt-2 px-4 py-2 bg-deep-orange text-white rounded-lg font-semibold shadow hover:bg-electric-orange transition-colors duration-200 focus:ring-4 focus:ring-deep-orange/50">Voir les feedbacks</a>
        </div>
        <div class="group bg-white rounded-xl shadow-lg p-8 flex flex-col items-center hover:scale-105 hover:shadow-2xl transition-transform duration-300 ease-out cursor-pointer animate-slide-up" tabindex="0">
            <div class="bg-vibrant-orange text-white rounded-full p-4 mb-4 group-hover:animate-bounce">
    <!-- Icône Projets : Folder -->
    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
</div>
            <h3 class="text-xl font-semibold mb-2 group-hover:text-vibrant-orange transition-colors">Projets</h3>
            <a href="{{ route('projets.index') }}" class="mt-2 px-4 py-2 bg-vibrant-orange text-white rounded-lg font-semibold shadow hover:bg-deep-orange transition-colors duration-200 focus:ring-4 focus:ring-vibrant-orange/50">Voir les projets</a>
        </div>
    </div>
</div>


@endsection
