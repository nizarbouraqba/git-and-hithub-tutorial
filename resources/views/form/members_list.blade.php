@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">
    <!-- Navbar intégrée depuis le layout -->
    
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Barre de recherche -->
        <div class="mb-12 px-4 sm:px-6">
            <div class="relative max-w-2xl mx-auto">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <form action="{{ route('members.index') }}" method="GET" class="relative">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        class="block w-full pl-10 pr-3 py-4 border border-gray-300 rounded-2xl bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-lg placeholder-gray-400 transition-all duration-300 hover:shadow-md" 
                        placeholder="Rechercher un membre..." 
                        autocomplete="off"
                    >
                    <button type="submit" class="absolute right-2.5 top-2.5 px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium rounded-xl text-sm shadow-sm hover:shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300">
                        Rechercher
                    </button>
                </form>
            </div>
            
            @if(request()->has('search') && !empty(request('search')))
            <div class="text-center mt-4">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                    Résultats pour : "{{ request('search') }}"
                    <a href="{{ route('members.index') }}" class="ml-2 p-1 rounded-full hover:bg-indigo-200 transition-colors">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                </span>
            </div>
            @endif
        </div>

        <!-- Contenu principal -->
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
            <!-- État vide -->
            <div class="text-center py-20 rounded-3xl bg-white/80 backdrop-blur-sm shadow-xl max-w-2xl mx-auto border border-gray-200/60 transition-all duration-500 hover:shadow-2xl">
                <div class="mx-auto h-24 w-24 text-indigo-400 mb-6 animate-bounce">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Aucun membre</h3>
                <p class="text-gray-500 mb-8">Soyez le premier à nous rejoindre</p>
                <a href="{{ route('register') }}" class="relative inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium rounded-full shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105 overflow-hidden">
                    <span class="relative z-10">Rejoindre</span>
                </a>
            </div>
        @else
            <!-- Grille des membres -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($members as $member)
                <div class="relative group">
                    <div class="relative h-full bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 h-16 w-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center text-white text-2xl font-bold border-2 border-white/30">
                                    {{ strtoupper(substr($member->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white">{{ $member->name }}</h3>
                                    <p class="text-blue-100 text-sm">{{ $member->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
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
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('input[name="search"]');
    const memberCards = document.querySelectorAll('.group');
    
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            
            memberCards.forEach(card => {
                const cardText = card.textContent.toLowerCase();
                card.style.display = cardText.includes(searchTerm) ? 'block' : 'none';
            });
        });
        
        if (new URLSearchParams(window.location.search).has('search')) {
            searchInput.focus();
        }
    }
});
</script>
@endsection