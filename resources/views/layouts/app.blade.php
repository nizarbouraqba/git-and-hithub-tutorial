<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Forum Marocain pour le Développement Durable</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        electric: {
                            orange: '#FF6B35',
                            blue: '#00A6FB'
                        },
                        vibrant: {
                            orange: '#FF9F1C',
                            blue: '#2EC4B6'
                        },
                        deep: {
                            blue: '#0A2463',
                            orange: '#D36135'
                        },
                        light: {
                            blue: '#CBF3F0',
                            orange: '#FFE4D6'
                        }
                    },
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif']
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 2s infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'wave': 'wave 3s linear infinite'
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        wave: {
                            '0%': { transform: 'rotate(0deg)' },
                            '10%': { transform: 'rotate(14deg)' },
                            '20%': { transform: 'rotate(-8deg)' },
                            '30%': { transform: 'rotate(14deg)' },
                            '40%': { transform: 'rotate(-4deg)' },
                            '50%': { transform: 'rotate(10deg)' },
                            '60%': { transform: 'rotate(0deg)' },
                            '100%': { transform: 'rotate(0deg)' }
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .btn-electric {
            background: linear-gradient(45deg, #FF6B35 0%, #00A6FB 100%);
            @apply text-white font-bold py-3 px-6 rounded-full shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-xl;
        }
        
        .btn-vibrant {
            background: linear-gradient(45deg, #FF9F1C 0%, #2EC4B6 100%);
            @apply text-white font-bold py-3 px-6 rounded-full shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-xl;
        }
        
        .nav-link {
            @apply relative overflow-hidden px-4 py-2 font-semibold;
        }
        
        .nav-link::after {
            content: '';
            @apply absolute bottom-0 left-0 w-full h-1 bg-electric-orange transform scale-x-0 origin-left transition-transform duration-300;
        }
        
        .nav-link:hover::after {
            @apply scale-x-100;
        }
        
        .card-hover {
            @apply transition-all duration-500 transform hover:-translate-y-2 hover:shadow-2xl;
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        .waving {
            animation: wave 3s linear infinite;
            transform-origin: 70% 70%;
            display: inline-block;
        }
        
        .dynamic-bg {
            background: linear-gradient(-45deg, #0A2463, #00A6FB, #FF6B35, #FF9F1C);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }
        
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .progress-bar {
            background: linear-gradient(to right, #FF6B35, #00A6FB);
            height: 6px;
            border-radius: 3px;
            transition: width 0.5s ease;
        }
        
        .required-field::after {
            content: " *";
            color: #FF6B35;
        }
    </style>
</head>
<body class="font-sans bg-gray-50 min-h-screen">
   
    <header class="dynamic-bg text-white shadow-xl sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="bg-white p-2 rounded-full shadow-lg waving">
                        <i class="fas fa-leaf text-electric-orange text-2xl"></i>
                    </div>
                    <h1 class="text-2xl font-extrabold tracking-tight">FMDD</h1>
                </div>
                
                <div class="flex items-center space-x-6">
                    <nav class="hidden md:flex items-center space-x-2">
    <a href="/" class="nav-link text-white p-6">Accueil</a>
    <a href="{{ route('apropos') }}" class="nav-link text-white p-6">À propos</a>
    <a href="{{ route('contact') }}" class="nav-link text-white p-6">Contact</a>
    @if (request()->is('/') )
    <a href="/dashboard" class="ml-2 px-5 py-2 bg-electric-blue text-white rounded-lg font-bold shadow hover:bg-vibrant-blue transition-all duration-200 focus:ring-4 focus:ring-electric-blue/50">Dashboard</a>
@endif
</nav>
                    
                    <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
  
        <div id="mobile-menu" class="hidden md:hidden bg-deep-blue pb-4">
            <div class="container mx-auto px-6 flex flex-col space-y-3">
                <a href="/" class="nav-link text-white py-3">Accueil</a>
                <a href="{{ route('apropos') }}" class="nav-link text-white py-3">À propos</a>
                <a href="{{ route('contact') }}" class="nav-link text-white py-3">Contact</a>
            </div>
        </div>
    </header>

    @if(Request::is('inscription*'))
    <div class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4">
            <div class="max-w-3xl mx-auto">
                <div class="flex justify-between relative mb-3">
                    
                    <div class="flex flex-col items-center z-10">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-lg border-4 border-white shadow-lg
                            @if(Request::is('inscription') || Request::is('inscription/step1')) bg-electric-orange text-white
                            @elseif(Request::is('inscription/documents') || Request::is('inscription/confirmation')) bg-electric-blue text-white
                            @else bg-gray-200 text-gray-500 @endif">
                            @if(Request::is('inscription') || Request::is('inscription/step1')) 1
                            @else <i class="fas fa-check"></i> @endif
                        </div>
                        <span class="mt-2 text-xs font-bold @if(Request::is('inscription') || Request::is('inscription/step1')) text-electric-orange @else text-electric-blue @endif">
                            Informations
                        </span>
                    </div>
                    
                    <div class="flex flex-col items-center z-10">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-lg border-4 border-white shadow-lg
                            @if(Request::is('inscription/documents')) bg-electric-orange text-white
                            @elseif(Request::is('inscription/confirmation')) bg-electric-blue text-white
                            @elseif(Session::has('member_data.step1')) bg-electric-blue text-white
                            @else bg-gray-200 text-gray-500 @endif">
                            @if(Request::is('inscription/documents')) 2
                            @elseif(Request::is('inscription/confirmation') || Session::has('member_data.step1')) <i class="fas fa-check"></i>
                            @else 2 @endif
                        </div>
                        <span class="mt-2 text-xs font-bold @if(Request::is('inscription/documents')) text-electric-orange @else text-electric-blue @endif">
                            Documents
                        </span>
                    </div>
                    
                    <div class="flex flex-col items-center z-10">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-lg border-4 border-white shadow-lg
                            @if(Request::is('inscription/confirmation')) bg-electric-orange text-white
                            @elseif(Session::has('member_data.step2')) bg-electric-blue text-white
                            @else bg-gray-200 text-gray-500 @endif">
                            @if(Request::is('inscription/confirmation')) 3
                            @elseif(Session::has('member_data.step2')) <i class="fas fa-check"></i>
                            @else 3 @endif
                        </div>
                        <span class="mt-2 text-xs font-bold @if(Request::is('inscription/confirmation')) text-electric-orange @else text-electric-blue @endif">
                            Confirmation
                        </span>
                    </div>
                    
                    <div class="absolute top-6 left-16 right-16 h-3 bg-gray-200 rounded-full z-0"></div>
                    <div class="progress-bar absolute top-6 left-16 z-0 rounded-full"
                         style="width: 
                            @if(Request::is('inscription/confirmation')) calc(100% - 8rem)
                            @elseif(Request::is('inscription/documents')) calc(50% - 4rem)
                            @else 0% @endif">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <main class="container mx-auto px-6 py-8">
        @if(session('success'))
        <div class="bg-light-blue border-l-4 border-electric-blue rounded-lg shadow-md mb-6 overflow-hidden">
            <div class="p-4 flex items-center">
                <div class="bg-electric-blue p-3 rounded-full mr-4">
                    <i class="fas fa-check-circle text-white"></i>
                </div>
                <div>
                    <p class="font-bold text-deep-blue">{{ session('success') }}</p>
                </div>
            </div>
        </div>
        @endif

        @if($errors->any())
        <div class="bg-light-orange border-l-4 border-electric-orange rounded-lg shadow-md mb-6 overflow-hidden">
            <div class="p-4 flex items-center">
                <div class="bg-electric-orange p-3 rounded-full mr-4">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                </div>
                <div>
                    <p class="font-bold text-deep-orange">Veuillez corriger les erreurs suivantes :</p>
                    <ul class="mt-1 text-sm text-deep-orange">
                        @foreach($errors->all() as $error)
                        <li class="flex items-start">
                            <i class="fas fa-circle text-xs mt-1 mr-2"></i>
                            <span>{{ $error }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-deep-blue text-white pt-12 pb-6">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <div class="flex items-center mb-4">
                        <div class="bg-white p-2 rounded-full mr-3 shadow-lg">
                            <i class="fas fa-leaf text-electric-orange text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-extrabold">FMDD</h3>
                    </div>
                    <p class="text-light-blue mb-6">Engagés ensemble pour un Maroc durable et prospère.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-electric-blue rounded-full flex items-center justify-center text-white hover:bg-electric-orange transition-colors duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-electric-blue rounded-full flex items-center justify-center text-white hover:bg-electric-orange transition-colors duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-electric-blue rounded-full flex items-center justify-center text-white hover:bg-electric-orange transition-colors duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-electric-blue rounded-full flex items-center justify-center text-white hover:bg-electric-orange transition-colors duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4 text-electric-orange">Liens utiles</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-light-blue hover:text-white transition-colors duration-200">Notre mission</a></li>
                        <li><a href="#" class="text-light-blue hover:text-white transition-colors duration-200">Nos projets</a></li>
                        <li><a href="#" class="text-light-blue hover:text-white transition-colors duration-200">Devenir membre</a></li>
                        <li><a href="#" class="text-light-blue hover:text-white transition-colors duration-200">Événements</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4 text-electric-orange">Contactez-nous</h4>
                    <ul class="space-y-3 text-light-blue">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-electric-orange"></i>
                            <span>123 Avenue Mohammed VI, Rabat</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-electric-orange"></i>
                            +212 5 37 00 00 00
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-electric-orange"></i>
                            contact@fmdd.ma
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-electric-blue mt-8 pt-6 flex flex-col md:flex-row justify-between items-center">
                <p class="text-light-blue text-sm">© {{ date('Y') }} Forum Marocain pour le Développement Durable. Tous droits réservés.</p>
                <div class="mt-4 md:mt-0">
                    <a href="#" class="text-light-blue hover:text-white text-sm mr-4">Politique de confidentialité</a>
                    <a href="#" class="text-light-blue hover:text-white text-sm">Conditions d'utilisation</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Menu mobile
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Animation au scroll
        document.addEventListener('DOMContentLoaded', function() {
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.card-hover, .btn-electric, .btn-vibrant');
                
                elements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.3;
                    
                    if(elementPosition < screenPosition) {
                        element.classList.add('animate__animated', 'animate__fadeInUp');
                    }
                });
            };
            
            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Initial check
        });

        // Effet de vague au survol
        document.querySelectorAll('.waving').forEach(item => {
            item.addEventListener('mouseenter', () => {
                item.style.animation = 'wave 0.5s linear';
            });
            
            item.addEventListener('mouseleave', () => {
                item.style.animation = 'wave 3s linear infinite';
            });
        });
    </script>
    
    @stack('scripts')
<script>
// Loader global
function showLoader() {
    document.getElementById('loader').classList.remove('hidden');
}
function hideLoader() {
    document.getElementById('loader').classList.add('hidden');
}
// Modale de suppression (projets)
function openDeleteModal(id) {
    document.getElementById('delete-modal-' + id).classList.remove('hidden');
}
function closeDeleteModal(id) {
    document.getElementById('delete-modal-' + id).classList.add('hidden');
}
// Afficher le loader lors de la soumission de tout formulaire CRUD
window.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            // Ne pas afficher le loader pour les recherches ou les formulaires GET
            if(form.method.toLowerCase() === 'post' || form.method.toLowerCase() === 'put' || form.method.toLowerCase() === 'delete') {
                showLoader();
            }
        });
    });
});
// Ajout d'animations personnalisées Tailwind
if(window.tailwind !== undefined) {
    tailwind.config = tailwind.config || {};
    tailwind.config.theme = tailwind.config.theme || {};
    tailwind.config.theme.extend = tailwind.config.theme.extend || {};
    tailwind.config.theme.extend.animation = {
        ...tailwind.config.theme.extend.animation,
        'fade-in': 'fadeIn 0.5s ease-out',
        'slide-up': 'slideUp 0.8s cubic-bezier(0.4,0,0.2,1)',
        'spin': 'spin 1s linear infinite'
    };
    tailwind.config.theme.extend.keyframes = {
        ...tailwind.config.theme.extend.keyframes,
        fadeIn: {
            '0%': { opacity: '0', transform: 'translateY(30px)' },
            '100%': { opacity: '1', transform: 'translateY(0)' }
        },
        slideUp: {
            '0%': { opacity: '0', transform: 'translateY(40px)' },
            '100%': { opacity: '1', transform: 'translateY(0)' }
        }
    };
}
</script>
</body>
</html>