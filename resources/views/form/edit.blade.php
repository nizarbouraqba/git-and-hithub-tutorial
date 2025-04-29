@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                Modifier le membre
            </h1>
            <p class="mt-2 text-lg text-gray-600">Mise à jour des informations de {{ $member->name }}</p>
        </div>

        <!-- Edit Form Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                <div class="flex items-center">
                    <div class="p-2 rounded-lg bg-white bg-opacity-20 mr-3">
                        <i class="fas fa-user-edit text-white"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-white">Formulaire de modification</h2>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-6 sm:p-8">
                <form action="{{ route('members.update', $member->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-signature text-blue-500 mr-2"></i>Nom complet
                        </label>
                        <input type="text" name="name" id="name" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               value="{{ $member->name }}"
                               required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope text-blue-500 mr-2"></i>Adresse email
                        </label>
                        <input type="email" name="email" id="email" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               value="{{ $member->email }}"
                               required>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Field -->
                    <div class="mb-8">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-user-shield text-blue-500 mr-2"></i>Statut du membre
                        </label>
                        <div class="relative">
                            <select name="status" id="status" 
                                    class="appearance-none w-full px-4 py-3 pr-10 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 bg-white">
                                <option value="pending_payment" {{ $member->status == 'pending_payment' ? 'selected' : '' }} class="py-2">
                                    ⌛ En attente de paiement
                                </option>
                                <option value="payment_received" {{ $member->status == 'payment_received' ? 'selected' : '' }} class="py-2">
                                    💰 Paiement reçu
                                </option>
                                <option value="completed" {{ $member->status == 'completed' ? 'selected' : '' }} class="py-2">
                                    ✅ Complété
                                </option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-700">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-200">
                        <a href="{{ route('members.show', $member->id) }}" class="px-6 py-3 text-center border border-gray-300 rounded-lg font-medium text-gray-700 hover:bg-gray-50 transition duration-300">
                            <i class="fas fa-times mr-2"></i> Annuler
                        </a>
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 rounded-lg font-medium text-white shadow-md hover:shadow-lg transition duration-300">
                            <i class="fas fa-save mr-2"></i> Sauvegarder
                        </button>

                        <!-- Delete Button -->
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 rounded-lg font-medium text-white shadow-md hover:shadow-lg transition duration-300">
                                <i class="fas fa-trash-alt mr-2"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Style personnalisé pour les options du select */
    select option {
        padding: 12px;
        background-color: white;
    }
    select option:checked {
        background-color: #e0e7ff;
        color: #4f46e5;
    }
    select option:hover {
        background-color: #f3f4f6;
    }
    
    /* Animation pour le bouton */
    .hover\:shadow-lg:hover {
        transform: translateY(-1px);
    }
    
    /* Transition pour les inputs */
    .transition {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms;
    }
</style>
@endsection
