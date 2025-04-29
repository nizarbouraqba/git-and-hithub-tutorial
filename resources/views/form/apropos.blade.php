@extends('layouts.app')

@section('title', 'À propos - FMDD')

@section('content')
<div class="relative bg-white overflow-hidden">
    <!-- Hero section -->
    <div class="relative bg-gradient-to-r from-deep-blue to-electric-blue py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight">
                À propos du FMDD
            </h1>
            <p class="mt-6 max-w-3xl mx-auto text-xl text-light-blue">
                Découvrez notre mission, notre vision et les valeurs qui guident nos actions
            </p>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Section Mission -->
        <div class="lg:grid lg:grid-cols-12 lg:gap-8 mb-20">
            <div class="lg:col-span-6">
                <div class="relative h-64 sm:h-72 md:h-96 lg:h-full">
                    <img class="absolute inset-0 w-full h-full object-cover rounded-xl shadow-xl" 
                         src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                         alt="Équipe FMDD">
                </div>
            </div>
            <div class="mt-10 lg:mt-0 lg:col-span-6 lg:pl-8 flex items-center">
                <div>
                    <h2 class="text-3xl font-extrabold text-deep-blue mb-6">
                        Notre Mission
                    </h2>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Le Forum Marocain pour le Développement Durable (FMDD) est une initiative citoyenne qui vise à promouvoir la durabilité, l'inclusion et la transition verte au Maroc à travers des actions concrètes et des partenariats stratégiques.
                    </p>
                    <div class="bg-light-blue p-6 rounded-lg border-l-4 border-electric-orange">
                        <p class="italic text-deep-blue font-medium">
                            "Créer un avenir durable où croissance économique, progrès social et préservation de l'environnement vont de pair."
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Valeurs -->
        <div class="py-16 bg-light-blue rounded-xl">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center mb-12">
                <h2 class="text-3xl font-extrabold text-deep-blue">
                    Nos Valeurs Fondamentales
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    Ces principes guident chacune de nos actions et décisions
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto px-4 sm:px-6">
                <!-- Valeur 1 -->
                <div class="bg-white p-8 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow">
                    <div class="mx-auto h-16 w-16 bg-electric-blue rounded-full flex items-center justify-center text-white mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-deep-blue mb-3">Intégrité</h3>
                    <p class="text-gray-600">
                        Nous agissons avec transparence, éthique et responsabilité dans toutes nos initiatives.
                    </p>
                </div>
                
                <!-- Valeur 2 -->
                <div class="bg-white p-8 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow">
                    <div class="mx-auto h-16 w-16 bg-electric-blue rounded-full flex items-center justify-center text-white mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-deep-blue mb-3">Inclusion</h3>
                    <p class="text-gray-600">
                        Nous croyons en la force de la diversité et œuvrons pour une société ouverte à tous.
                    </p>
                </div>
                
                <!-- Valeur 3 -->
                <div class="bg-white p-8 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow">
                    <div class="mx-auto h-16 w-16 bg-electric-blue rounded-full flex items-center justify-center text-white mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-deep-blue mb-3">Innovation</h3>
                    <p class="text-gray-600">
                        Nous encourageons les solutions créatives pour relever les défis du développement durable.
                    </p>
                </div>
            </div>
        </div>

        <!-- Section Histoire -->
        <div class="py-16">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center mb-12">
                <h2 class="text-3xl font-extrabold text-deep-blue">
                    Notre Histoire
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    Le parcours qui a façonné notre organisation
                </p>
            </div>
            <div class="max-w-4xl mx-auto">
                <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-gray-300 before:to-transparent">
                    <!-- Étape 1 -->
                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-electric-blue text-white border-4 border-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2">
                            2015
                        </div>
                        <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-4 rounded-lg border border-gray-200 shadow">
                            <div class="flex items-center justify-between">
                                <h3 class="font-bold text-deep-blue">Fondation</h3>
                            </div>
                            <p class="mt-1 text-gray-600">
                                Création du FMDD par un groupe de professionnels engagés pour répondre aux enjeux environnementaux au Maroc.
                            </p>
                        </div>
                    </div>

                    <!-- Étape 2 -->
                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-electric-blue text-white border-4 border-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2">
                            2018
                        </div>
                        <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-4 rounded-lg border border-gray-200 shadow">
                            <div class="flex items-center justify-between">
                                <h3 class="font-bold text-deep-blue">Premier Forum National</h3>
                            </div>
                            <p class="mt-1 text-gray-600">
                                Organisation de notre premier grand événement rassemblant 500 participants autour des ODD.
                            </p>
                        </div>
                    </div>

                    <!-- Étape 3 -->
                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-electric-blue text-white border-4 border-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2">
                            2021
                        </div>
                        <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-4 rounded-lg border border-gray-200 shadow">
                            <div class="flex items-center justify-between">
                                <h3 class="font-bold text-deep-blue">Expansion Régionale</h3>
                            </div>
                            <p class="mt-1 text-gray-600">
                                Ouverture de 3 antennes régionales et lancement de programmes locaux de sensibilisation.
                            </p>
                        </div>
                    </div>

                    <!-- Étape 4 -->
                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-electric-blue text-white border-4 border-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2">
                            2023
                        </div>
                        <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-4 rounded-lg border border-gray-200 shadow">
                            <div class="flex items-center justify-between">
                                <h3 class="font-bold text-deep-blue">Reconnaissance Internationale</h3>
                            </div>
                            <p class="mt-1 text-gray-600">
                                Prix de l'innovation durable décerné par l'ONU pour notre programme d'économie circulaire.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Équipe -->
        <div class="py-16 bg-light-blue rounded-xl">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center mb-12">
                <h2 class="text-3xl font-extrabold text-deep-blue">
                    Notre Équipe
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    Des experts passionnés par le développement durable
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto px-4 sm:px-6">
                <!-- Membre 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                    <img class="w-full h-64 object-cover" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Directeur">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-deep-blue">Karim El Mansouri</h3>
                        <p class="text-electric-orange font-medium">Directeur Général</p>
                        <p class="mt-2 text-gray-600">
                            Expert en politiques environnementales avec 15 ans d'expérience.
                        </p>
                    </div>
                </div>
                
                <!-- Membre 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                    <img class="w-full h-64 object-cover" src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Coordinatrice">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-deep-blue">Amina Benjelloun</h3>
                        <p class="text-electric-orange font-medium">Coordinatrice des Projets</p>
                        <p class="mt-2 text-gray-600">
                            Spécialiste en économie sociale et solidaire.
                        </p>
                    </div>
                </div>
                
                <!-- Membre 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                    <img class="w-full h-64 object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Responsable">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-deep-blue">Mehdi Zouhair</h3>
                        <p class="text-electric-orange font-medium">Responsable R&D</p>
                        <p class="mt-2 text-gray-600">
                            Ingénieur en énergies renouvelables et innovation.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="py-16 text-center">
            <h2 class="text-3xl font-extrabold text-deep-blue mb-6">
                Prêt à nous rejoindre dans cette aventure ?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8">
                Que vous soyez un particulier, une entreprise ou une institution, il existe de nombreuses façons de contribuer à notre mission.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-electric-blue to-electric-orange hover:from-electric-blue-dark hover:to-electric-orange-dark">
                    Devenir Membre
                </a>
                <a href="#" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-deep-blue bg-white hover:bg-gray-50 border-deep-blue">
                    Nos Programmes
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .timeline-step {
        transition: all 0.3s ease;
    }
    .timeline-step:hover {
        transform: translateY(-5px);
    }
    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush