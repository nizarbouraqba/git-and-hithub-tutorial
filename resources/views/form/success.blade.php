@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden p-8 text-center transition-all duration-300 hover:shadow-2xl">
        <!-- Animation de validation -->
        <div class="flex justify-center mb-8">
            <div class="relative">
                <div class="bg-gradient-to-r from-green-400 to-teal-500 text-white rounded-full p-5 w-24 h-24 flex items-center justify-center shadow-lg animate-bounce-slow">
                    <i class="fas fa-check-circle text-4xl"></i>
                </div>
                <div class="absolute -inset-2 rounded-full bg-green-200 opacity-0 animate-ping-slow"></div>
            </div>
        </div>

        <!-- Titre avec effet de dégradé -->
        <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-teal-700 mb-6">
            {{ __('messages.registration_success_title') }}
        </h2>

        <!-- Message -->
        <p class="text-gray-600 mb-8 text-lg leading-relaxed">
            {{ __('messages.registration_success_message') }}<br>
            <span class="font-medium text-green-600">{{ __('messages.registration_success_submessage') }}</span>
        </p>

        <!-- Bouton avec effet -->
        <div class="mt-10">
            <a href="{{ route('members.step1') }}" 
               class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-green-500 to-teal-600 hover:from-green-600 hover:to-teal-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <i class="fas fa-home mr-3"></i> {{ __('messages.back_to_home') }}
            </a>
        </div>

        <!-- Info supplémentaire -->
        <div class="mt-8 pt-6 border-t border-gray-100">
            <p class="text-sm text-gray-500">
                {{ __('messages.have_questions') }} <a href="#" class="font-medium text-green-600 hover:text-green-800">{{ __('messages.contact_us') }}</a>
            </p>
        </div>
    </div>
</div>
@endsection
