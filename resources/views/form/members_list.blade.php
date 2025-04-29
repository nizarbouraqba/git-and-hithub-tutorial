@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- En-tête animé -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 mb-4">
                <span class="inline-block transition-transform duration-300 hover:scale-105">Community</span> 
                <span class="inline-block transition-transform duration-300 hover:scale-105">Members</span>
            </h1>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-400 to-indigo-500 mx-auto mb-6 rounded-full"></div>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Découvrez notre <span class="text-indigo-600 font-medium">réseau dynamique</span>
            </p>
        </div>

        @if($members->isEmpty())
            <!-- État vide animé -->
            <div class="text-center py-20 rounded-3xl bg-white/80 backdrop-blur-sm shadow-xl max-w-2xl mx-auto border border-gray-200/60 transition-all duration-500 hover:shadow-2xl">
                <div class="mx-auto h-24 w-24 text-indigo-400 mb-6 animate-bounce">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Aucun membre</h3>
                <p class="text-gray-500 mb-8">Soyez le premier à nous rejoindre</p>
                <button class="relative inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium rounded-full shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105 overflow-hidden">
                    <span class="relative z-10">Rejoindre</span>
                </button>
            </div>
        @else
            <!-- Grille interactive -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($members as $member)
                <div class="relative group">
                    <!-- Carte de membre -->
                    <div class="relative h-full bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <!-- En-tête avec gradient -->
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">
                            <div class="flex items-center space-x-4">
                                <!-- Avatar dynamique -->
                                <div class="flex-shrink-0 h-16 w-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center text-white text-2xl font-bold border-2 border-white/30">
                                    {{ strtoupper(substr($member->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white">{{ $member->name }}</h3>
                                    <p class="text-blue-100 text-sm">{{ $member->email }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Détails -->
                        <div class="p-6">
                            <!-- Statut -->
                            <div class="mb-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                    @if($member->status == 'active') 
                                        bg-green-100 text-green-800
                                    @elseif($member->status == 'pending')
                                        bg-yellow-100 text-yellow-800
                                    @else
                                        bg-gray-100 text-gray-800
                                    @endif">
                                    {{ ucfirst($member->status) }}
                                </span>
                            </div>

                            <!-- Statistiques -->
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <p class="text-xs text-gray-500">Membre depuis</p>
                                    <p class="font-semibold text-gray-900">
                                        {{ $member->created_at->format('M Y') }}
                                    </p>
                                </div>
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <p class="text-xs text-gray-500">Activité</p>
                                    <p class="font-semibold text-gray-900">
                                        @if($member->last_active_at)
                                            {{ $member->last_active_at->diffForHumans() }}
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- Bouton d'action -->
                            <a href="{{ route('members.show', $member->id) }}" class="block w-full bg-indigo-50 hover:bg-indigo-100 text-indigo-600 py-2 px-4 rounded-lg text-sm font-medium text-center transition-colors duration-300">
                                Voir le profil
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if(method_exists($members, 'links'))
            <div class="mt-16">
                {{ $members->links() }}
            </div>
            @endif
        @endif
    </div>



<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-6px); }
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
    
    .animate-fade-in {
        animation: fade-in 0.8s ease-out forwards;
    }
    
    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    
    .animate-bounce {
        animation: bounce 0.8s ease infinite;
    }
    
    .delay-75 {
        animation-delay: 75ms;
    }
    
    .delay-100 {
        animation-delay: 100ms;
    }
    
    .perspective-1000 {
        perspective: 1000px;
    }
    
    .transform-style-preserve-3d {
        transform-style: preserve-3d;
    }
    
    .backface-hidden {
        backface-visibility: hidden;
    }
    
    .group-hover\:rotate-y-10:hover {
        transform: rotateY(10deg);
    }
    
    /* Custom pagination style */
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
    }
    
    .page-item {
        margin: 0 4px;
    }
    
    .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 12px;
        font-weight: 500;
        color: #4b5563;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .page-item.active .page-link {
        background: linear-gradient(135deg, #3b82f6, #6366f1);
        color: white;
        box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
    }
    
    .page-item:not(.active) .page-link:hover {
        background-color: #f3f4f6;
        color: #3b82f6;
        transform: translateY(-2px);
    }
    
    .page-item.disabled .page-link {
        color: #9ca3af;
        pointer-events: none;
    }
</style>
</div>
@endsection