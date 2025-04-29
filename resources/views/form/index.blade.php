@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- En-tête -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Liste des Membres</h1>
            <div class="w-20 h-1 bg-blue-500 mx-auto rounded-full"></div>
        </div>

      

        <!-- Liste des membres -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($members as $member)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                <div class="p-6">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="flex-shrink-0 h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xl">
                            {{ strtoupper(substr($member->first_name, 0, 1)) }}{{ strtoupper(substr($member->last_name, 0, 1)) }}
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $member->first_name }} {{ $member->last_name }}</h3>
                            <p class="text-gray-500 truncate">{{ $member->email }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-800">
                            Actif
                        </span>
                        <a href="{{ route('members.show', $member->id) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Voir profil →</a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $members->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>

<style>
    /* Animations */
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    
    /* Transition pour les cartes */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms;
    }
    
    /* Style personnalisé pour la pagination */
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
        width: 40px;
        height: 40px;
        border-radius: 10px;
        font-weight: 500;
        color: #4b5563;
        transition: all 0.3s ease;
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
</style>
@endsection