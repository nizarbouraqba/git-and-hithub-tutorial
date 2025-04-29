@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-blue-600 text-white px-6 py-4">
            <h2 class="text-2xl font-bold">2. Documents à Fournir</h2>
            <p class="text-blue-100">Veuillez télécharger les documents requis</p>
        </div>

        <form method="POST" action="{{ route('members.storeStep2') }}" enctype="multipart/form-data" class="p-6">
            @csrf

            <!-- Motivation -->
            <div class="mb-8">
                <label for="motivation" class="block text-gray-700 mb-3 font-medium">Motivation *</label>
                <input type="text" name="motivation" value="{{ old('motivation') }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                @error('motivation') 
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Previously Participated -->
            <div class="mb-8">
                <label for="previously_participated" class="block text-gray-700 mb-3 font-medium">Previously Participated *</label>
                <input type="checkbox" name="previously_participated" value="1" {{ old('previously_participated') ? 'checked' : '' }} class="text-blue-600">
                @error('previously_participated') 
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Hear About Us -->
            <div class="mb-8">
                <label for="hear_about_us" class="block text-gray-700 mb-3 font-medium">How did you hear about us? *</label>
                <select name="hear_about_us[]" multiple required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <option value="social_media" {{ in_array('social_media', old('hear_about_us', [])) ? 'selected' : '' }}>Social Media</option>
                    <option value="friend_referral" {{ in_array('friend_referral', old('hear_about_us', [])) ? 'selected' : '' }}>Friend Referral</option>
                    <option value="poster" {{ in_array('poster', old('hear_about_us', [])) ? 'selected' : '' }}>Poster</option>
                </select>
                @error('hear_about_us') 
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Interests -->
            <div class="mb-8">
                <label for="interests" class="block text-gray-700 mb-3 font-medium">Interests *</label>
                <select name="interests[]" multiple required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <option value="personal_development" {{ in_array('personal_development', old('interests', [])) ? 'selected' : '' }}>Personal Development</option>
                    <option value="job_search" {{ in_array('job_search', old('interests', [])) ? 'selected' : '' }}>Job Search</option>
                    <option value="business_creation" {{ in_array('business_creation', old('interests', [])) ? 'selected' : '' }}>Business Creation</option>
                </select>
                @error('interests') 
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- CV -->
            <div class="mb-8">
                <label class="block text-gray-700 mb-3 font-medium">CV (PDF) *</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                    <input type="file" name="cv" id="cv" class="hidden" accept=".pdf" required>
                    <label for="cv" class="cursor-pointer">
                        <i class="fas fa-cloud-upload-alt text-4xl text-blue-500 mb-2"></i>
                        <p class="text-gray-600">Glissez-déposez votre CV ou <span class="text-blue-600 font-medium">parcourir</span></p>
                        <p class="text-sm text-gray-500 mt-1">Format PDF uniquement (max 2MB)</p>
                        <p id="cv-file-name" class="text-green-600 mt-2 font-medium"></p>
                    </label>
                </div>
                @error('cv') 
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- CIN -->
            <div class="mb-8">
                <label class="block text-gray-700 mb-3 font-medium">Carte Nationale d'Identité *</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                    <input type="file" name="cin" id="cin" class="hidden" accept=".pdf,.jpg,.png" required>
                    <label for="cin" class="cursor-pointer">
                        <i class="fas fa-cloud-upload-alt text-4xl text-blue-500 mb-2"></i>
                        <p class="text-gray-600">Glissez-déposez votre CIN ou <span class="text-blue-600 font-medium">parcourir</span></p>
                        <p class="text-sm text-gray-500 mt-1">PDF, JPG ou PNG (max 2MB)</p>
                        <p id="cin-file-name" class="text-green-600 mt-2 font-medium"></p>
                    </label>
                </div>
                @error('cin') 
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Lettre de motivation (optionnelle) -->
            <div class="mb-8">
                <label class="block text-gray-700 mb-3 font-medium">Lettre de Motivation (Optionnelle)</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                    <input type="file" name="motivation_letter" id="motivation_letter" class="hidden" accept=".pdf,.doc,.docx">
                    <label for="motivation_letter" class="cursor-pointer">
                        <i class="fas fa-cloud-upload-alt text-4xl text-blue-500 mb-2"></i>
                        <p class="text-gray-600">Glissez-déposez votre lettre ou <span class="text-blue-600 font-medium">parcourir</span></p>
                        <p class="text-sm text-gray-500 mt-1">PDF ou Word (max 2MB)</p>
                        <p id="motivation-letter-file-name" class="text-green-600 mt-2 font-medium"></p>
                    </label>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <a href="{{ route('members.step1') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i> Retour
                </a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    Suivant <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Afficher le nom des fichiers sélectionnés
    document.getElementById('cv').addEventListener('change', function(e) {
        document.getElementById('cv-file-name').textContent = e.target.files[0]?.name || '';
    });

    document.getElementById('cin').addEventListener('change', function(e) {
        document.getElementById('cin-file-name').textContent = e.target.files[0]?.name || '';
    });

    document.getElementById('motivation_letter').addEventListener('change', function(e) {
        document.getElementById('motivation-letter-file-name').textContent = e.target.files[0]?.name || '';
    });
</script>
@endsection
