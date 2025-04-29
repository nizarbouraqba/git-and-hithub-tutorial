@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-8 px-4">
    <div class="max-w-5xl mx-auto">
        <!-- Header with back button -->
        <div class="flex items-center mb-8">
            <a href="{{ route('members.list') }}" class="flex items-center text-indigo-600 hover:text-indigo-800 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span class="font-medium">Retour à la liste</span>
            </a>
        </div>

        <!-- Profile Card -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <!-- Profile Header -->
            <div class="relative">
                <!-- Cover Photo -->
                <div class="h-40 bg-gradient-to-r from-indigo-500 to-purple-600"></div>
                
                <!-- Avatar -->
                <div class="absolute -bottom-16 left-6">
                    <div class="h-32 w-32 rounded-full border-4 border-white bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center text-white text-4xl font-bold shadow-md">
                        {{ strtoupper(substr($member->name, 0, 1)) }}
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="absolute bottom-4 right-6">
                    <a href="{{ route('members.edit', $member->id) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-200 rounded-lg shadow-xs text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Modifier
                    </a>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="pt-20 px-6 pb-8">
                <!-- Name and Status -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $member->name }}</h1>
                    <p class="text-gray-600 mt-1">{{ $member->email }}</p>
                    
                    <div class="flex items-center mt-4 space-x-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                            @if($member->status == 'active') bg-green-50 text-green-800
                            @elseif($member->status == 'pending') bg-yellow-50 text-yellow-800
                            @else bg-gray-50 text-gray-800 @endif">
                            @if($member->status == 'active')
                                <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>
                            @endif
                            {{ ucfirst($member->status) }}
                        </span>
                        
                        @if($member->created_at->diffInDays(now()) < 30)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-800">
                            Nouveau membre
                        </span>
                        @endif
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
                    <!-- Member Since -->
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <div class="flex items-center">
                            <div class="p-2 rounded-md bg-indigo-50 text-indigo-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-gray-500">Membre depuis</h3>
                                <p class="text-lg font-semibold text-gray-900">{{ $member->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Last Activity -->
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <div class="flex items-center">
                            <div class="p-2 rounded-md bg-green-50 text-green-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-gray-500">Dernière activité</h3>
                                <p class="text-lg font-semibold text-gray-900">
                                    @if($member->last_active_at)
                                        {{ $member->last_active_at->diffForHumans() }}
                                    @else
                                        Jamais
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Role -->
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <div class="flex items-center">
                            <div class="p-2 rounded-md bg-purple-50 text-purple-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-gray-500">Rôle</h3>
                                <p class="text-lg font-semibold text-gray-900">{{ $member->role ?? 'Membre' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="space-y-6">
                    <!-- Bio -->
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900 mb-3">À propos</h2>
                        <div class="prose max-w-none text-gray-600 bg-gray-50 p-4 rounded-lg border border-gray-200">
                            {{ $member->bio ?? 'Aucune information disponible.' }}
                        </div>
                    </div>
                    
                    <!-- Skills -->
                    @if($member->skills && count($member->skills) > 0)
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900 mb-3">Compétences</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($member->skills as $skill)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-50 text-indigo-700">
                                {{ $skill }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection