@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary: #3b82f6;
        --primary-hover: #2563eb;
        --secondary: #10b981;
        --danger: #ef4444;
        --text: #1f2937;
        --text-light: #6b7280;
        --bg-light: #f9fafb;
        --border: #e5e7eb;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Base Styles */
    .form-container {
        max-width: 900px;
        margin: 2rem auto;
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Header Styles */
    .form-header {
        background: linear-gradient(135deg, var(--primary), #1d4ed8);
        color: white;
        padding: 7rem 2rem;
        border-radius: 0.5rem 0.5rem 0 0;
        box-shadow: var(--shadow);
        position: relative;
        overflow: hidden;
    }

    .form-header::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%);
    }

    .form-header h2 {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
        position: relative;
        z-index: 1;
    }

    .form-header p {
        opacity: 0.9;
        font-size: 0.95rem;
        position: relative;
        z-index: 1;
    }

    /* Auth Section */
    .auth-container {
        position: absolute;
        top: 1.5rem;
        right: 2rem;
        z-index: 100;
    }

    .user-dropdown {
        position: relative;
    }

    .user-profile-btn {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        padding: 0.6rem 1.2rem;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        min-width: 180px;
    }

    .user-profile-btn:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .user-avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, #4f46e5, #4338ca);
        color: white;
        font-weight: 600;
    }

    .dropdown-menu {
        position: absolute;
        right: 0;
        top: calc(100% + 10px);
        min-width: 220px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 1000;
        padding: 0.5rem 0;
    }

    .user-dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .logout-item {
        width: 100%;
        padding: 0.75rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: #ef4444;
        background: none;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        text-align: left;
    }

    .logout-item:hover {
        background: rgba(239, 68, 68, 0.1);
    }

    .logout-item .icon {
        width: 1.1rem;
        height: 1.1rem;
    }


    /* Style pour l'utilisateur connecté */
    .user-dropdown {
        position: relative;
    }

    .user-profile-btn {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        padding: 0.5rem 1rem;
        color: white;
        cursor: pointer;
        transition: var(--transition);
    }

    .user-profile-btn:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .user-avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--primary-hover));
        color: white;
        font-weight: 600;
    }

    .user-greeting {
        font-weight: 500;
    }

    .dropdown-arrow {
        width: 1rem;
        height: 1rem;
        transition: var(--transition);
    }

    .user-dropdown:hover .dropdown-arrow {
        transform: rotate(180deg);
    }

    .dropdown-menu {
        position: absolute;
        right: 0;
        top: calc(100% + 0.5rem);
        min-width: 200px;
        background: white;
        border-radius: 0.5rem;
        box-shadow: var(--shadow-hover);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: var(--transition);
        z-index: 1000;
    }

    .user-dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        width: 100%;
        padding: 0.75rem 1rem;
        text-align: left;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: var(--text);
        background: none;
        border: none;
        cursor: pointer;
        transition: var(--transition);
    }

    .dropdown-item:hover {
        background: var(--bg-light);
        color: var(--primary);
    }

    .dropdown-item .icon {
        width: 1rem;
        height: 1rem;
    }


    /* Form Content */
    .form-content {
        background-color: white;
        padding: 2rem;
        border-radius: 0 0 0.5rem 0.5rem;
        box-shadow: var(--shadow);
    }

    .step-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--border);
    }

    .step-header h1 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text);
        position: relative;
    }

    .step-header h1::after {
        content: '';
        position: absolute;
        bottom: -1rem;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: var(--primary);
        border-radius: 3px;
    }

    /* Form Sections */
    .form-section {
        margin-bottom: 2rem;
        padding: 1.5rem;
        background-color: var(--bg-light);
        border-radius: 0.5rem;
        transition: var(--transition);
        border-left: 4px solid transparent;
    }

    .form-section:hover {
        border-left-color: var(--primary);
        transform: translateX(5px);
    }

    .form-section h3 {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }

    .form-section h3 svg {
        margin-right: 0.75rem;
        color: var(--primary);
    }

    /* Form Grid */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    /* Form Elements */
    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--text);
        font-size: 0.95rem;
    }

    .form-label.required::after {
        content: ' *';
        color: var(--danger);
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border);
        border-radius: 0.5rem;
        font-size: 1rem;
        transition: var(--transition);
        background-color: white;
    }

    .form-input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        outline: none;
    }

    .form-input::placeholder {
        color: var(--text-light);
        opacity: 0.6;
    }

    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7' /%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 1.25rem;
    }

    /* Radio & Checkbox */
    .option-group {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .option-item {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .form-radio, .form-checkbox {
        width: 1.1rem;
        height: 1.1rem;
        margin-right: 0.5rem;
        accent-color: var(--primary);
        cursor: pointer;
    }

    .option-label {
        cursor: pointer;
        transition: var(--transition);
    }

    .option-label:hover {
        color: var(--primary);
    }

    /* Textarea */
    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }

    /* Phone Input */
    .phone-input {
        display: flex;
    }

    .phone-prefix {
        display: flex;
        align-items: center;
        padding: 0 1rem;
        background-color: var(--bg-light);
        border: 1px solid var(--border);
        border-right: none;
        border-radius: 0.5rem 0 0 0.5rem;
        color: var(--text-light);
    }

    /* Submit Button */
    .submit-btn {
        background-color: var(--primary);
        color: white;
        padding: 0.875rem 2rem;
        border-radius: 0.5rem;
        font-weight: 600;
        font-size: 1rem;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        box-shadow: var(--shadow);
    }

    .submit-btn:hover {
        background-color: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .submit-btn:active {
        transform: translateY(0);
    }

    .submit-btn svg {
        margin-left: 0.5rem;
        transition: var(--transition);
    }

    .submit-btn:hover svg {
        transform: translateX(3px);
    }

    /* Error Messages */
    .error-message {
        display: block;
        margin-top: 0.25rem;
        font-size: 0.85rem;
        color: var(--danger);
        animation: shake 0.3s ease-in-out;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        20%, 60% { transform: translateX(-5px); }
        40%, 80% { transform: translateX(5px); }
    }

    .has-error .form-input, .has-error .form-select {
        border-color: var(--danger);
    }

    .has-error .form-input:focus, .has-error .form-select:focus {
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .auth-container {
            position: static;
            margin: 1rem 0;
            width: 100%;
        }
        
        .user-profile-btn {
            width: 100%;
            justify-content: center;
        }
        
        .dropdown-menu {
            width: 100%;
            right: auto;
            left: 0;
        }
    }

    /* Custom Animations */
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
        100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
    }
/* Animation */
@keyframes subtleBounce {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-3px); }
}

.language-switcher {
  font-family: 'Inter', system-ui, sans-serif;
}

/* Style des boutons */
.language-switcher a {
  position: relative;
  overflow: hidden;
  will-change: transform, background-color;
}

/* Effet de hover */
.language-switcher a:hover {
  transform: translateY(-1px);
}

/* Animation pour la langue active */
.language-switcher a[class*="bg-"]:not(:hover) {
  animation: subtleBounce 2s ease-in-out infinite;
}

/* Style des drapeaux */
.flag-container {
  position: relative;
  width: 20px;
  height: 16px;
}

.flag-icon {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  transition: transform 0.3s ease;
}

.language-switcher a:hover .flag-icon {
  transform: scale(1.1);
}

/* Tooltip */
.language-switcher a::after {
  content: attr(data-tooltip);
  position: absolute;
  right: calc(100% + 12px);
  top: 50%;
  transform: translateY(-50%);
  background: rgba(15, 23, 42, 0.95);
  color: white;
  padding: 6px 12px;
  border-radius: 6px;
  font-size: 0.8rem;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s ease;
}

.language-switcher a:hover::after {
  opacity: 1;
  right: calc(100% + 8px);
}

/* Effet de clic */
.language-switcher a:active {
  transform: scale(0.98) !important;
}

/* Accessibilité */
.language-switcher a:focus-visible {
  outline: 2px solid currentColor;
  outline-offset: 2px;
}
    
</style>
<div class="language-switcher fixed bottom-8 right-8 z-50">
  <!-- Conteneur principal -->
  <div class="flex flex-col gap-3 p-2 bg-white/80 backdrop-blur-lg rounded-xl shadow-lg border border-gray-100">
    
    <!-- Bouton Français -->
    <a href="{{ route('setLocale', ['locale' => 'fr']) }}" 
       class="relative w-12 h-12 flex flex-col items-center justify-center rounded-lg transition-all duration-300
              {{ app()->getLocale() == 'fr' ? 
                 'bg-blue-50 text-blue-600 ring-2 ring-blue-400' : 
                 'text-gray-500 hover:bg-gray-100' }}"
       data-tooltip="Français">
       
      <div class="relative z-10 flex flex-col items-center">
        <!-- Drapeau avec effet de profondeur -->
        <div class="flag-container relative">
          <span class="flag-icon flag-icon-fr w-5 h-4 rounded-sm shadow-xs"></span>
          <span class="absolute inset-0 rounded-sm bg-white/20"></span>
        </div>
        <span class="text-xs font-medium mt-1">FR</span>
      </div>
      
      <!-- Indicateur actif -->
      <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-blue-500 rounded-full border-2 border-white 
            {{ app()->getLocale() == 'fr' ? 'scale-100' : 'scale-0' }} transition-transform"></span>
    </a>
    
    <!-- Séparateur -->
    <div class="border-t border-gray-200 mx-2"></div>
    
    <!-- Bouton Arabe -->
    <a href="{{ route('setLocale', ['locale' => 'ar']) }}" 
       class="relative w-12 h-12 flex flex-col items-center justify-center rounded-lg transition-all duration-300
              {{ app()->getLocale() == 'ar' ? 
                 'bg-green-50 text-green-600 ring-2 ring-green-400' : 
                 'text-gray-500 hover:bg-gray-100' }}"
       data-tooltip="العربية"
       dir="rtl">
       
      <div class="relative z-10 flex flex-col items-center">
        <div class="flag-container relative">
          <span class="flag-icon flag-icon-ma w-5 h-4 rounded-sm shadow-xs"></span>
          <span class="absolute inset-0 rounded-sm bg-white/20"></span>
        </div>
        <span class="text-xs font-medium mt-1">AR</span>
      </div>
      
      <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-green-500 rounded-full border-2 border-white 
            {{ app()->getLocale() == 'ar' ? 'scale-100' : 'scale-0' }} transition-transform"></span>
    </a>
  </div>
</div>


<div class="form-container">
    <div class="form-header">
        <div>
            <h2>{{ __('messages.personal_info_title') }}</h2>
            <p>{{ __('messages.join_text') }}</p>
           
        </div>
        
        <!-- Remplacez la section auth-container dans votre code par ceci -->
        <div class="auth-container">
            @auth
                <div class="user-dropdown">
                    <button class="user-profile-btn">
                        <span class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                        <span class="user-greeting">{{ __('messages.welcome') }}, {{ Auth::user()->name }}</span>
                        <svg class="dropdown-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item logout-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                {{ __('messages.logout') }}
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="auth-buttons">
                    <a href="{{ route('login') }}" class="auth-btn login-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        {{ __('messages.login') }}
                    </a>
                    <a href="{{ route('register') }}" class="auth-btn register-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6z" />
                        </svg>
                        {{ __('messages.register') }}
                    </a>
                </div>
            @endauth
        </div>
    </div>

    <div class="form-content">
        <div class="step-header">
            <h1>{{ __('messages.registration_form') }} - {{ __('messages.step') }} 1</h1>
        </div>

        <form method="POST" action="{{ route('members.storeStep1') }}">
            @csrf

            <!-- Section 1: Informations de base -->
            <div class="form-section">
                <h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    {{ __('messages.personal_information') }}
                </h3>
                
                <div class="form-grid">
                    <!-- Prénom -->
                    <div class="form-group @error('first_name') has-error @enderror">
                        <label for="first_name" class="form-label required">{{ __('messages.first_name') }}</label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" 
                               class="form-input" placeholder="{{ __('messages.first_name_placeholder') }}" required>
                        @error('first_name') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <!-- Nom -->
                    <div class="form-group @error('last_name') has-error @enderror">
                        <label for="last_name" class="form-label required">{{ __('messages.last_name') }}</label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                               class="form-input" placeholder="{{ __('messages.last_name_placeholder') }}" required>
                        @error('last_name') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <!-- Date de naissance -->
                    <div class="form-group @error('date_of_birth') has-error @enderror">
                        <label for="date_of_birth" class="form-label required">{{ __('messages.birth_date') }}</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}"
                               class="form-input" required>
                        @error('date_of_birth') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <!-- Genre -->
                    <div class="form-group @error('gender') has-error @enderror">
                        <label for="gender" class="form-label required">{{ __('messages.gender') }}</label>
                        <select id="gender" name="gender" class="form-input form-select" required>
                            <option value="">{{ __('messages.select_gender') }}</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>{{ __('messages.male') }}</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>{{ __('messages.female') }}</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>{{ __('messages.other') }}</option>
                            <option value="prefer_not_to_say" {{ old('gender') == 'prefer_not_to_say' ? 'selected' : '' }}>{{ __('messages.prefer_not_to_say') }}</option>
                        </select>
                        @error('gender') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <!-- Téléphone -->
                    <div class="form-group @error('phone') has-error @enderror">
                        <label class="form-label required">{{ __('messages.phone') }}</label>
                        <div class="phone-input">
                            <span class="phone-prefix">+212</span>
                            <input type="tel" name="phone" value="{{ old('phone') }}" 
                                   class="form-input rounded-l-none" 
                                   placeholder="{{ __('messages.phone_placeholder') }}" required>
                        </div>
                        @error('phone') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group @error('email') has-error @enderror">
                        <label for="email" class="form-label required">{{ __('messages.email') }}</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                               class="form-input" placeholder="{{ __('messages.email_placeholder') }}" required>
                        @error('email') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <!-- Ville -->
                    <div class="form-group @error('city') has-error @enderror">
                        <label for="city" class="form-label required">{{ __('messages.city') }}</label>
                        <select id="city" name="city" class="form-input form-select" required>
                            <option value="">{{ __('messages.select_city') }}</option>
                            @foreach(['Casablanca', 'Rabat', 'Marrakech', 'Fès', 'Tanger', 'Agadir', 'Meknès', 'Oujda', 'Kénitra', 'Tétouan', 'Safi', 'El Jadida'] as $city)
                                <option value="{{ $city }}" {{ old('city') == $city ? 'selected' : '' }}>{{ __('messages.'.$city) }}</option>
                            @endforeach
                        </select>
                        @error('city') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <!-- Province -->
                    <div class="form-group @error('province') has-error @enderror">
                        <label for="province" class="form-label required">{{ __('messages.province') }}</label>
                        <select id="province" name="province" class="form-input form-select" required>
                            <option value="">{{ __('messages.select_province') }}</option>
                            @foreach(['Casablanca-Settat', 'Rabat-Salé-Kénitra', 'Marrakech-Safi', 'Fès-Meknès', 'Tanger-Tétouan-Al Hoceïma', 'Oriental', 'Béni Mellal-Khénifra', 'Souss-Massa', 'Guelmim-Oued Noun', 'Laâyoune-Sakia El Hamra', 'Dakhla-Oued Ed-Dahab'] as $province)
                                <option value="{{ $province }}" {{ old('province') == $province ? 'selected' : '' }}>{{ __('messages.'.$province) }}</option>
                            @endforeach
                        </select>
                        @error('province') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Section 2: Situation -->
            <div class="form-section">
                <h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    {{ __('messages.current_situation') }}
                </h3>
                
                <!-- Statut actuel -->
                <div class="form-group @error('current_status') has-error @enderror">
                    <label class="form-label required">{{ __('messages.current_status') }}</label>
                    <div class="space-y-3">
                        @foreach([
                            'student' => __('messages.student'),
                            'graduate_seeking_employment' => __('messages.graduate_seeking_employment'),
                            'employee' => __('messages.employee'),
                            'entrepreneur' => __('messages.entrepreneur'),
                            'other' => __('messages.other')
                        ] as $value => $label)
                        <div class="option-item">
                            <input type="radio" id="status_{{ $value }}" name="current_status" value="{{ $value }}" 
                                   {{ old('current_status') == $value ? 'checked' : '' }} class="form-radio" required>
                            <label for="status_{{ $value }}" class="option-label">{{ $label }}</label>
                            @if($value == 'other')
                            <input type="text" name="current_status_other" value="{{ old('current_status_other') }}" 
                                   class="form-input ml-2" placeholder="{{ __('messages.specify') }}" style="{{ old('current_status') == 'other' ? '' : 'display: none;' }}">
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @error('current_status') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                <!-- Niveau d'éducation -->
                <div class="form-group @error('education_level') has-error @enderror">
                    <label for="education_level" class="form-label required">{{ __('messages.education_level') }}</label>
                    <select id="education_level" name="education_level" class="form-input form-select" required>
                        <option value="">{{ __('messages.select_education_level') }}</option>
                        @foreach([
                            'no_diploma' => __('messages.no_diploma'),
                            'middle_school' => __('messages.middle_school'),
                            'high_school' => __('messages.high_school'),
                            'bac_plus_2' => __('messages.bac_plus_2'),
                            'bachelor' => __('messages.bachelor'),
                            'master' => __('messages.master'),
                            'phd' => __('messages.phd'),
                            'other' => __('messages.other')
                        ] as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level') == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('education_level') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                <!-- Domaine d'étude -->
                <div class="form-group @error('field_of_study') has-error @enderror">
                    <label for="field_of_study" class="form-label required">{{ __('messages.field_of_study') }}</label>
                    <input type="text" id="field_of_study" name="field_of_study" value="{{ old('field_of_study') }}"
                           class="form-input" placeholder="{{ __('messages.field_of_study_placeholder') }}" required>
                    @error('field_of_study') <span class="error-message">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Section 3: Centres d'intérêt -->
            <div class="form-section">
                <h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    {{ __('messages.interests') }}
                </h3>
                <div class="form-group @error('interests') has-error @enderror">
                    <label class="form-label required">{{ __('messages.interests_question') }}</label>
                    <div class="option-group">
                        @foreach([
                            'personal_development' => __('messages.personal_development'),
                            'professional_training' => __('messages.professional_training'),
                            'job_search' => __('messages.job_search'),
                            'business_creation' => __('messages.business_creation'),
                            'community_projects' => __('messages.community_projects'),
                            'environment' => __('messages.environment'),
                            'technology' => __('messages.technology'),
                            'education' => __('messages.education'),
                            'health' => __('messages.health'),
                            'other' => __('messages.other')
                        ] as $value => $label)
                        <div class="option-item">
                            <input type="checkbox" id="interest_{{ $value }}" name="interests[]" value="{{ $value }}"
                                   {{ in_array($value, old('interests', [])) ? 'checked' : '' }} class="form-checkbox">
                            <label for="interest_{{ $value }}" class="option-label">{{ $label }}</label>
                        </div>
                        @endforeach
                    </div>
                    @error('interests') <span class="error-message">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Section 4: Motivation -->
            <div class="form-section">
                <h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    {{ __('messages.motivation') }}
                </h3>
                
                <!-- Pourquoi rejoindre FMDD -->
                <div class="form-group @error('motivation') has-error @enderror">
                    <label for="motivation" class="form-label required">{{ __('messages.why_join') }}</label>
                    <textarea id="motivation" name="motivation" class="form-input form-textarea" placeholder="{{ __('messages.motivation_placeholder') }}" required>{{ old('motivation') }}</textarea>
                    @error('motivation') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                <!-- Participation antérieure -->
                <div class="form-group @error('previously_participated') has-error @enderror">
                    <label class="form-label required">{{ __('messages.previously_participated') }}</label>
                    <div class="option-group">
                        <div class="option-item">
                            <input type="radio" id="participated_yes" name="previously_participated" value="1" 
                                   {{ old('previously_participated') == '1' ? 'checked' : '' }} class="form-radio" required>
                            <label for="participated_yes" class="option-label">{{ __('messages.yes') }}</label>
                        </div>
                        <div class="option-item">
                            <input type="radio" id="participated_no" name="previously_participated" value="0"
                                   {{ old('previously_participated') == '0' ? 'checked' : '' }} class="form-radio" required>
                            <label for="participated_no" class="option-label">{{ __('messages.no') }}</label>
                        </div>
                    </div>
                    @error('previously_participated') <span class="error-message">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Section 5: Comment nous avez-vous connu -->
            <div class="form-section">
                <h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    {{ __('messages.how_hear_us') }}
                </h3>
                <div class="form-group @error('hear_about_us') has-error @enderror">
                    <label class="form-label">{{ __('messages.select_all_that_apply') }}</label>
                    <div class="option-group">
                        @foreach([
                            'social_media' => __('messages.social_media'),
                            'friend_referral' => __('messages.friend_referral'),
                            'poster' => __('messages.poster'),
                            'event' => __('messages.event'),
                            'press' => __('messages.press'),
                            'search_engine' => __('messages.search_engine'),
                            'other' => __('messages.other')
                        ] as $value => $label)
                        <div class="option-item">
                            <input type="checkbox" id="hear_{{ $value }}" name="hear_about_us[]" value="{{ $value }}"
                                   {{ in_array($value, old('hear_about_us', [])) ? 'checked' : '' }} class="form-checkbox">
                            <label for="hear_{{ $value }}" class="option-label">{{ $label }}</label>
                        </div>
                        @endforeach
                    </div>
                    @error('hear_about_us') <span class="error-message">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Section 6: Newsletter -->
            <div class="form-section">
                <h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    {{ __('messages.communication') }}
                </h3>
                <div class="form-group @error('receive_newsletter') has-error @enderror">
                    <label class="form-label required">{{ __('messages.receive_newsletter') }}</label>
                    <div class="option-group">
                        <div class="option-item">
                            <input type="radio" id="newsletter_yes" name="receive_newsletter" value="1"
                                   {{ old('receive_newsletter') == '1' ? 'checked' : '' }} class="form-radio" required>
                            <label for="newsletter_yes" class="option-label">{{ __('messages.newsletter_yes') }}</label>
                        </div>
                        <div class="option-item">
                            <input type="radio" id="newsletter_no" name="receive_newsletter" value="0"
                                   {{ old('receive_newsletter') == '0' ? 'checked' : '' }} class="form-radio" required>
                            <label for="newsletter_no" class="option-label">{{ __('messages.newsletter_no') }}</label>
                        </div>
                    </div>
                    @error('receive_newsletter') <span class="error-message">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="submit-btn animate-pulse">
                    {{ __('messages.next') }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    
    // Script de débogage et correction
    document.addEventListener('DOMContentLoaded', function() {
     document.addEventListener('DOMContentLoaded', function() {
        const dropdown = document.querySelector('.user-dropdown');
        
        if (dropdown) {
            dropdown.addEventListener('click', function(e) {
                e.stopPropagation();
                const menu = this.querySelector('.dropdown-menu');
                menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
            });

            // Fermer quand on clique ailleurs
            document.addEventListener('click', function() {
                const menu = dropdown.querySelector('.dropdown-menu');
                if (menu) menu.style.display = 'none';
            });
        }
    });

    // Afficher/masquer le champ "Autre" pour le statut
    document.querySelectorAll('input[name="current_status"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const otherInput = document.querySelector('input[name="current_status_other"]');
            if (this.value === 'other' && otherInput) {
                otherInput.style.display = 'block';
                otherInput.focus();
            } else if (otherInput) {
                otherInput.style.display = 'none';
                otherInput.value = '';
            }
        });
    });

    // Animation pour les champs en erreur
    document.querySelectorAll('.has-error').forEach(field => {
        field.scrollIntoView({ behavior: 'smooth', block: 'center' });
    });

    // Confirmation avant de quitter la page si des données sont saisies
    window.addEventListener('beforeunload', function(e) {
        const form = document.querySelector('form');
        let formIsDirty = false;
        
        form.querySelectorAll('input, textarea, select').forEach(element => {
            if ((element.type !== 'radio' && element.type !== 'checkbox' && element.value) || 
                (element.checked && (element.type === 'radio' || element.type === 'checkbox'))) {
                formIsDirty = true;
            }
        });
        
        if (formIsDirty) {
            e.preventDefault();
            e.returnValue = 'Vous avez des modifications non enregistrées. Voulez-vous vraiment quitter ?';
        }
    });
</script>
@endsection