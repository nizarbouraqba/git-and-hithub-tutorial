@extends('layouts.app')

@section('title', 'Contactez-nous - FMDD')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-light-blue to-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- En-tête avec icône -->
        <div class="text-center mb-10">
            <div class="mx-auto w-20 h-20 bg-electric-blue rounded-full flex items-center justify-center shadow-lg mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <h2 class="text-3xl font-extrabold text-deep-blue mb-2">Contactez-nous</h2>
            <p class="text-lg text-gray-600">Nous sommes à votre écoute pour répondre à toutes vos questions</p>
        </div>

        <!-- Carte du formulaire -->
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
            <div class="md:flex">
                <!-- Informations de contact -->
                <div class="md:w-1/3 bg-deep-blue text-white p-8 md:p-10">
                    <h3 class="text-xl font-bold mb-6">Nos coordonnées</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-electric-orange mr-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div>
                                <p class="font-medium">Adresse</p>
                                <p class="text-light-blue">123 Avenue Mohammed VI, Rabat</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-electric-orange mr-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <div>
                                <p class="font-medium">Téléphone</p>
                                <p class="text-light-blue">+212 5 37 00 00 00</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-electric-orange mr-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <p class="font-medium">Email</p>
                                <p class="text-light-blue">contact@fmdd.ma</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <h4 class="font-bold mb-4">Suivez-nous</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 rounded-full bg-electric-blue flex items-center justify-center text-white hover:bg-electric-orange transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-electric-blue flex items-center justify-center text-white hover:bg-electric-orange transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-electric-blue flex items-center justify-center text-white hover:bg-electric-orange transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Formulaire -->
                <div class="md:w-2/3 p-8 md:p-10">
                    <h3 class="text-xl font-bold text-deep-blue mb-6">Envoyez-nous un message</h3>
                    
                    <form action="#" method="POST" class="space-y-5">
                        @csrf
                        
                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                                <input type="text" id="name" name="name" required 
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="email" name="email" required 
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all">
                            </div>
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Sujet</label>
                            <input type="text" id="subject" name="subject" 
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all">
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="message" name="message" rows="4" required
                                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all"></textarea>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="checkbox" id="consent" name="consent" required 
                                   class="h-4 w-4 text-electric-blue focus:ring-electric-blue border-gray-300 rounded">
                            <label for="consent" class="ml-2 block text-sm text-gray-700">
                                J'accepte que mes données soient utilisées pour répondre à ma demande
                            </label>
                        </div>
                        
                        <div class="pt-2">
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-electric-blue to-electric-orange hover:from-electric-blue-dark hover:to-electric-orange-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-electric-blue transition-all transform hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Envoyer le message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Carte Google Maps -->
        <div class="mt-12 bg-white rounded-xl shadow-2xl overflow-hidden">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3307.041834075862!2d-6.849422984785192!3d33.9969809806138!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda76d8e0a9a1a27%3A0x7a3c4a7a3b4b5b6b!2sRabat!5e0!3m2!1sen!2sma!4v1620000000000!5m2!1sen!2sma" 
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" class="rounded-xl"></iframe>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .form-input:focus, .form-textarea:focus {
        box-shadow: 0 0 0 3px rgba(0, 166, 251, 0.2);
    }
    .btn-submit:hover {
        transform: translateY(-2px);
    }
</style>
@endpush