@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-xl rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
        <!-- En-tête avec dégradé -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white px-8 py-6">
            <h2 class="text-2xl font-bold">{{ __('messages.documents_required') }}</h2>
            <p class="text-blue-100 opacity-90 mt-1">{{ __('messages.please_upload_required_documents') }}</p>
        </div>

        <form method="POST" action="{{ route('members.storeStep2') }}" enctype="multipart/form-data" class="p-8">
            @csrf

            <!-- Motivation -->
            <div class="mb-8">
                <label for="motivation" class="block text-gray-700 mb-3 font-medium flex items-center">
                    <i class="fas fa-comment-alt text-blue-500 mr-2"></i>
                    {{ __('messages.motivation') }} *
                </label>
                <textarea name="motivation" id="motivation" rows="3" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">{{ old('motivation') }}</textarea>
                @error('motivation') 
                    <span class="text-red-500 text-sm mt-1 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Previously Participated -->
            <div class="mb-8">
                <label class="block text-gray-700 mb-3 font-medium flex items-center">
                    <i class="fas fa-history text-blue-500 mr-2"></i>
                    {{ __('messages.previously_participated') }} *
                </label>
                <div class="flex items-center">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="previously_participated" value="1" 
                               {{ old('previously_participated') ? 'checked' : '' }}
                               class="form-checkbox h-5 w-5 text-blue-600 transition duration-150 ease-in-out rounded">
                        <span class="ml-2 text-gray-700">{{ __('messages.yes') }}</span>
                    </label>
                </div>
                @error('previously_participated') 
                    <span class="text-red-500 text-sm mt-1 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Hear About Us -->
            <div class="mb-8">
                <label class="block text-gray-700 mb-3 font-medium flex items-center">
                    <i class="fas fa-bullhorn text-blue-500 mr-2"></i>
                    {{ __('messages.about_us') }} *
                </label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    @foreach(['social_media', 'friend_referral', 'poster'] as $option)
                    <label class="flex items-center space-x-2 p-3 border border-gray-300 rounded-lg hover:bg-blue-50 transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" name="hear_about_us[]" value="{{ $option }}" 
                               {{ in_array($option, old('hear_about_us', [])) ? 'checked' : '' }}
                               class="form-checkbox h-5 w-5 text-blue-600 rounded">
                        <span>{{ __('messages.'.$option) }}</span>
                    </label>
                    @endforeach
                </div>
                @error('hear_about_us') 
                    <span class="text-red-500 text-sm mt-1 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Interests -->
            <div class="mb-8">
                <label class="block text-gray-700 mb-3 font-medium flex items-center">
                    <i class="fas fa-heart text-blue-500 mr-2"></i>
                    {{ __('messages.interests') }} *
                </label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    @foreach(['personal_development', 'job_search', 'business_creation'] as $interest)
                    <label class="flex items-center space-x-2 p-3 border border-gray-300 rounded-lg hover:bg-blue-50 transition-colors duration-200 cursor-pointer">
                        <input type="checkbox" name="interests[]" value="{{ $interest }}" 
                               {{ in_array($interest, old('interests', [])) ? 'checked' : '' }}
                               class="form-checkbox h-5 w-5 text-blue-600 rounded">
                        <span>{{ __('messages.'.$interest) }}</span>
                    </label>
                    @endforeach
                </div>
                @error('interests') 
                    <span class="text-red-500 text-sm mt-1 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- CV -->
            <div class="mb-8">
                <label class="block text-gray-700 mb-3 font-medium flex items-center">
                    <i class="fas fa-file-alt text-blue-500 mr-2"></i>
                    {{ __('messages.cv') }} (PDF) *
                </label>
                <div class="file-upload-container">
                    <input type="file" name="cv" id="cv" class="hidden" accept=".pdf" required>
                    <label for="cv" class="file-upload-label">
                        <div class="file-upload-box">
                            <i class="fas fa-cloud-upload-alt text-4xl text-blue-500 mb-3 transition-transform duration-300 group-hover:scale-110"></i>
                            <p class="text-gray-600">{{ __('messages.upload_file') }} <span class="text-blue-600 font-medium">{{ __('messages.browse') }}</span></p>
                            <p class="text-sm text-gray-500 mt-1">{{ __('messages.file_format') }}</p>
                            <p id="cv-file-name" class="file-name-display"></p>
                        </div>
                    </label>
                </div>
                @error('cv') 
                    <span class="text-red-500 text-sm mt-1 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- CIN -->
            <div class="mb-8">
                <label class="block text-gray-700 mb-3 font-medium flex items-center">
                    <i class="fas fa-id-card text-blue-500 mr-2"></i>
                    {{ __('messages.cin') }} *
                </label>
                <div class="file-upload-container">
                    <input type="file" name="cin" id="cin" class="hidden" accept=".pdf,.jpg,.png" required>
                    <label for="cin" class="file-upload-label">
                        <div class="file-upload-box">
                            <i class="fas fa-cloud-upload-alt text-4xl text-blue-500 mb-3 transition-transform duration-300 group-hover:scale-110"></i>
                            <p class="text-gray-600">{{ __('messages.upload_file') }} <span class="text-blue-600 font-medium">{{ __('messages.browse') }}</span></p>
                            <p class="text-sm text-gray-500 mt-1">{{ __('messages.file_format_images') }}</p>
                            <p id="cin-file-name" class="file-name-display"></p>
                        </div>
                    </label>
                </div>
                @error('cin') 
                    <span class="text-red-500 text-sm mt-1 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Lettre de motivation -->
            <div class="mb-8">
                <label class="block text-gray-700 mb-3 font-medium flex items-center">
                    <i class="fas fa-envelope-open-text text-blue-500 mr-2"></i>
                    {{ __('messages.motivation_letter') }} ({{ __('messages.optional') }})
                </label>
                <div class="file-upload-container">
                    <input type="file" name="motivation_letter" id="motivation_letter" class="hidden" accept=".pdf,.doc,.docx">
                    <label for="motivation_letter" class="file-upload-label">
                        <div class="file-upload-box">
                            <i class="fas fa-cloud-upload-alt text-4xl text-blue-500 mb-3 transition-transform duration-300 group-hover:scale-110"></i>
                            <p class="text-gray-600">{{ __('messages.upload_file') }} <span class="text-blue-600 font-medium">{{ __('messages.browse') }}</span></p>
                            <p class="text-sm text-gray-500 mt-1">{{ __('messages.file_format_word') }}</p>
                            <p id="motivation-letter-file-name" class="file-name-display"></p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Boutons de navigation -->
            <div class="flex flex-col sm:flex-row justify-between mt-12 space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('members.step1') }}" class="btn-secondary">
                    <i class="fas fa-arrow-left mr-2"></i> {{ __('messages.back') }}
                </a>
                <button type="submit" class="btn-primary">
                    {{ __('messages.next') }} <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Styles globaux */
    .file-upload-container {
        position: relative;
    }

    .file-upload-label {
        display: block;
        cursor: pointer;
    }

    .file-upload-box {
        border: 2px dashed #d1d5db;
        border-radius: 0.75rem;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        background-color: #f9fafb;
    }

    .file-upload-box:hover {
        border-color: #3b82f6;
        background-color: #f0f7ff;
        transform: translateY(-2px);
    }

    .file-name-display {
        color: #10b981;
        font-weight: 500;
        margin-top: 1rem;
        word-break: break-all;
    }

    /* Boutons */
    .btn-primary {
        background-color: #3b82f6;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 1;
    }

    .btn-primary:hover {
        background-color: #2563eb;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
    }

    .btn-secondary {
        background-color: #f3f4f6;
        color: #374151;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 1;
    }

    .btn-secondary:hover {
        background-color: #e5e7eb;
        transform: translateY(-1px);
    }

    /* Animation pour les erreurs */
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        20%, 60% { transform: translateX(-5px); }
        40%, 80% { transform: translateX(5px); }
    }

    .error-shake {
        animation: shake 0.5s ease-in-out;
    }

    /* Responsive */
    @media (max-width: 640px) {
        .file-upload-box {
            padding: 1.5rem;
        }
    }
</style>

<script>
    // Afficher le nom des fichiers sélectionnés avec animation
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function(e) {
            const fileNameDisplay = document.getElementById(this.id + '-file-name');
            if (e.target.files.length > 0) {
                fileNameDisplay.textContent = e.target.files[0].name;
                fileNameDisplay.classList.add('animate-pulse');
                setTimeout(() => fileNameDisplay.classList.remove('animate-pulse'), 1000);
            } else {
                fileNameDisplay.textContent = '';
            }
        });
    });

    // Ajouter une classe d'erreur pour les champs invalides
    document.addEventListener('DOMContentLoaded', function() {
        const errorElements = document.querySelectorAll('.text-red-500');
        errorElements.forEach(el => {
            const input = document.getElementById(el.getAttribute('for'));
            if (input) {
                input.classList.add('border-red-500', 'error-shake');
                setTimeout(() => input.classList.remove('error-shake'), 500);
            }
        });
    });
</script>
@endsection