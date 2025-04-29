@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-green-600 text-white px-6 py-4">
            <h2 class="text-2xl font-bold">3. Confirmation</h2>
            <p class="text-green-100">Vérifiez vos informations avant soumission</p>
        </div>

        <form method="POST" action="{{ route('members.submit') }}" enctype="multipart/form-data">
            @csrf

            <div class="p-6">
                <div class="bg-green-50 border-l-4 border-green-600 p-4 mb-6">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-600 mr-2 text-xl"></i>
                        <p class="text-green-800 font-medium">Votre inscription est presque terminée</p>
                    </div>
                    <p class="text-green-700 mt-1">Veuillez vérifier les informations ci-dessous avant de soumettre définitivement.</p>
                </div>

                <!-- Section Informations Personnelles -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">
                        <i class="fas fa-user-circle text-blue-500 mr-2"></i>
                        Informations Personnelles
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-600">Nom complet:</p>
                            <p class="font-medium">{{ $memberData['first_name'] }} {{ $memberData['last_name'] }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Date de naissance:</p>
                            <p class="font-medium">{{ \Carbon\Carbon::parse($memberData['date_of_birth'])->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Genre:</p>
                            <p class="font-medium">
                                @switch($memberData['gender'])
                                    @case('male') Masculin @break
                                    @case('female') Féminin @break
                                    @case('other') Autre @break
                                    @default Préfère ne pas dire
                                @endswitch
                            </p>
                        </div>
                        <div>
                            <p class="text-gray-600">Téléphone:</p>
                            <p class="font-medium">{{ $memberData['phone'] }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Email:</p>
                            <p class="font-medium">{{ $memberData['email'] }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Ville:</p>
                            <p class="font-medium">{{ $memberData['city'] }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Province:</p>
                            <p class="font-medium">{{ $memberData['province'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Section Situation -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">
                        <i class="fas fa-briefcase text-blue-500 mr-2"></i>
                        Situation
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-600">Statut actuel:</p>
                            <p class="font-medium">
                                @switch($memberData['current_status'])
                                    @case('student') Étudiant @break
                                    @case('graduate_seeking_employment') Diplômé chercheur d'emploi @break
                                    @case('employee') Employé @break
                                    @case('entrepreneur') Entrepreneur @break
                                    @default {{ $memberData['current_status_other'] ?? 'Autre' }}
                                @endswitch
                            </p>
                        </div>
                        <div>
                            <p class="text-gray-600">Niveau d'éducation:</p>
                            <p class="font-medium">
                                @switch($memberData['education_level'])
                                    @case('no_diploma') Aucun diplôme @break
                                    @case('middle_school') Niveau collège @break
                                    @case('high_school') Baccalauréat @break
                                    @case('bac_plus_2') Bac+2 @break
                                    @case('bachelor') Licence (Bac+3) @break
                                    @case('master') Master (Bac+5) @break
                                    @case('phd') Doctorat @break
                                    @default Autre
                                @endswitch
                            </p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-gray-600">Domaine d'étude:</p>
                            <p class="font-medium">{{ $memberData['field_of_study'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Section Documents -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">
                        <i class="fas fa-file-alt text-blue-500 mr-2"></i>
                        Documents
                    </h3>
                    
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i class="fas fa-file-pdf text-red-500 mr-3 text-xl"></i>
                            <div>
                                <p class="font-medium">CV</p>
                                <p class="text-sm text-gray-600">{{ basename($memberData['cv_path']) }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <i class="fas fa-id-card text-blue-500 mr-3 text-xl"></i>
                            <div>
                                <p class="font-medium">Carte d'Identité</p>
                                <p class="text-sm text-gray-600">{{ basename($memberData['cin_path']) }}</p>
                            </div>
                        </div>
                        
                        @if(isset($memberData['motivation_letter_path']))
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-yellow-500 mr-3 text-xl"></i>
                            <div>
                                <p class="font-medium">Lettre de Motivation</p>
                                <p class="text-sm text-gray-600">{{ basename($memberData['motivation_letter_path']) }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Section Consentement -->
                <div class="mb-8 p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-start mb-4">
                        <input type="checkbox" id="data_consent" name="data_consent" class="mt-1 mr-2" required>
                        <label for="data_consent" class="text-gray-700">
                            J'autorise le FMDD à utiliser mes informations uniquement dans le cadre de ses projets et activités.
                        </label>
                    </div>
                    
                    <div class="flex items-start">
                        <input type="checkbox" id="values_consent" name="values_consent" class="mt-1 mr-2" required>
                        <label for="values_consent" class="text-gray-700">
                            Je m'engage à respecter les valeurs et le règlement intérieur du FMDD.
                        </label>
                    </div>
                </div>

                <!-- Boutons -->
                <div class="flex justify-between border-t pt-6">
                    <a href="{{ route('members.step2') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i> Retour
                    </a>
                    
                    <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                        <i class="fas fa-check-circle mr-2"></i> Soumettre mon inscription
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
