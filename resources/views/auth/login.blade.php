@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary: #4f46e5;
        --primary-hover: #4338ca;
        --secondary: #10b981;
        --dark: #1e293b;
        --light: #f8fafc;
        --text: #334155;
        --text-light: #64748b;
        --error: #ef4444;
        --success: #10b981;
        --transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        --shadow-hover: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }

    body {
        background: linear-gradient(135deg, #e0f2fe 0%, #f0fdfa 100%);
        min-height: 100vh;
        font-family: 'Inter', sans-serif;
    }

    .auth-container {
        display: flex;
        min-height: 100vh;
        position: relative;
        overflow: hidden;
    }

    .auth-decoration {
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(79, 70, 229, 0.1) 0%, rgba(79, 70, 229, 0) 70%);
    }

    .decoration-1 {
        top: -100px;
        right: -100px;
        width: 500px;
        height: 500px;
    }

    .decoration-2 {
        bottom: -150px;
        left: -150px;
        width: 600px;
        height: 600px;
    }

    .login-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        box-shadow: var(--shadow);
        overflow: hidden;
        width: 100%;
        max-width: 480px;
        margin: auto;
        position: relative;
        z-index: 10;
        transform: scale(0.98);
        opacity: 0;
        animation: cardEntrance 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    @keyframes cardEntrance {
        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    .card-header {
        background: linear-gradient(135deg, var(--primary), var(--primary-hover));
        color: white;
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .card-header::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%);
    }

    .card-header h2 {
        font-size: 1.75rem;
        font-weight: 700;
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .card-body {
        padding: 2.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--text);
        font-weight: 500;
        transition: var(--transition);
        transform-origin: left center;
    }

    .form-control {
        width: 100%;
        padding: 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: var(--transition);
        background-color: #fff;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.2);
        outline: none;
    }

    .form-control.is-invalid {
        border-color: var(--error);
    }

    .invalid-feedback {
        color: var(--error);
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
        animation: shake 0.5s;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        20%, 60% { transform: translateX(-5px); }
        40%, 80% { transform: translateX(5px); }
    }

    .btn-login {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, var(--primary), var(--primary-hover));
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        box-shadow: var(--shadow);
        position: relative;
        overflow: hidden;
    }

    .btn-login:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-hover);
    }

    .btn-login::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(255,255,255,0.2), transparent);
        transform: translateX(-100%);
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .btn-login:hover::after {
        transform: translateX(100%);
    }

    .form-footer {
        text-align: center;
        margin-top: 1.5rem;
        color: var(--text-light);
    }

    .form-footer a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition);
    }

    .form-footer a:hover {
        color: var(--primary-hover);
        text-decoration: underline;
    }

    .footer {
        background: var(--dark);
        color: white;
        padding: 3rem 0;
        margin-top: auto;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .footer-logo {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: white;
    }

    .footer-description {
        color: rgba(255, 255, 255, 0.7);
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .footer-heading {
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: white;
    }

    .footer-links {
        list-style: none;
        padding: 0;
    }

    .footer-link {
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 0.75rem;
        display: block;
        transition: var(--transition);
        text-decoration: none;
    }

    .footer-link:hover {
        color: white;
        transform: translateX(5px);
    }

    .footer-bottom {
        text-align: center;
        padding-top: 2rem;
        margin-top: 2rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.5);
        font-size: 0.875rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .auth-container {
            padding: 1rem;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .footer-content {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="auth-container">
    <div class="auth-decoration decoration-1"></div>
    <div class="auth-decoration decoration-2"></div>
    
    <div class="login-card">
        <div class="card-header">
            <h2>Connexion</h2>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Adresse Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Se souvenir de moi
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    CONNEXION
                </button>

                <div class="form-footer">
                    Pas encore de compte ? <a href="{{ route('register') }}">Créer un compte</a>
                </div>
            </form>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="footer-content">
        <div>
            <div class="footer-logo">FMDD</div>
            <p class="footer-description">
                Engagés ensemble pour un Maroc durable et prospère.
            </p>
            <p>N° 123, Avant la réponse, Moham V., Raba</p>
            <p>+212 | 537 membres | 00 Événements</p>
            <p>Contact: contact@fmdd.ma</p>
        </div>

        <div>
            <h3 class="footer-heading">Liens utiles</h3>
            <ul class="footer-links">
                <li><a href="#" class="footer-link">Notre mission</a></li>
                <li><a href="#" class="footer-link">Nos projets</a></li>
                <li><a href="#" class="footer-link">Devenir membre</a></li>
                <li><a href="#" class="footer-link">Événements</a></li>
            </ul>
        </div>

        <div>
            <h3 class="footer-heading">Légal</h3>
            <ul class="footer-links">
                <li><a href="#" class="footer-link">Points de confidentialité</a></li>
                <li><a href="#" class="footer-link">Conditions d'utilisation</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        © 2025 Forum Marocain pour le Développement Durable. Tous droits réservés.
    </div>
</footer>

<script>
    // Effet de vague sur le bouton
    document.querySelectorAll('.btn-login').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Animation de clic
            this.style.transform = 'translateY(2px)';
            
            // Soumettre le formulaire après l'animation
            setTimeout(() => {
                this.form.submit();
            }, 300);
        });
    });
</script>
@endsection