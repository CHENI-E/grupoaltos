<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Grupo ALTOS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #2563eb 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        }
        
        .input-focus:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-6xl flex flex-col lg:flex-row items-center gap-8 lg:gap-16">
        
        <!-- Panel Izquierdo - Información -->
        <div class="w-full lg:w-1/2 text-white space-y-6 fade-in">
            <div class="space-y-4">
                <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
                    Bienvenido al Panel de Administración
                </h1>
                <p class="text-lg lg:text-xl text-blue-100">
                    Gestiona el contenido e imágenes de Grupo ALTOS de forma segura y eficiente
                </p>
            </div>
            
            <div class="hidden lg:block mt-12 floating">
                <svg class="w-80 h-80 opacity-20" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#FFFFFF" d="M45.3,-58.9C58.5,-50.5,69.1,-36.6,73.9,-20.9C78.7,-5.2,77.7,12.3,71.3,27.5C64.9,42.7,53.1,55.6,38.8,63.4C24.5,71.2,7.7,73.9,-8.6,71.8C-24.9,69.7,-40.7,62.8,-52.8,52.4C-64.9,42,-73.3,28.1,-75.9,12.8C-78.5,-2.5,-75.3,-19.2,-66.9,-32.5C-58.5,-45.8,-44.9,-55.7,-30.3,-63.6C-15.7,-71.5,0,-77.4,15.3,-76.1C30.6,-74.8,32.1,-67.3,45.3,-58.9Z" transform="translate(100 100)" />
                </svg>
            </div>
            
            <div class="grid grid-cols-2 gap-4 mt-8">
                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-4">
                    <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="font-semibold">Gestión de Imágenes</h3>
                    <p class="text-sm text-blue-100">Actualiza contenido visual</p>
                </div>
                
                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-4">
                    <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="font-semibold">Control de Contenido</h3>
                    <p class="text-sm text-blue-100">Edita textos y páginas</p>
                </div>
            </div>
        </div>
        
        <!-- Panel Derecho - Formulario Login -->
        <div class="w-full lg:w-1/2 max-w-md fade-in">
            <div class="glass-effect rounded-2xl p-8 lg:p-10 shadow-2xl">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl mb-4 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-800">Iniciar Sesión</h2>
                    <p class="text-gray-500 mt-2">Panel de Administración</p>
                </div>
                
                <!-- Formulario -->
                <form class="space-y-6" method="post" action="{{ route('login.post') }}">
                    @csrf
                    <!-- Campo Email -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            Correo Electrónico
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <input 
                                type="email" 
                                id="email"
                                name="email"
                                class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl input-focus transition-all duration-200"
                                placeholder="admin@grupoaltos.com"
                                required
                            >
                        </div>
                    </div>
                    
                    <!-- Campo Contraseña -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            Contraseña
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                id="password"
                                name="password"
                                class="w-full pl-10 pr-12 py-3 border-2 border-gray-200 rounded-xl input-focus transition-all duration-200"
                                placeholder="••••••••"
                                required
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center"
                            >
                                <svg id="eye-icon" class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Recordar y Olvidé contraseña -->
                    {{-- <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                            <span class="ml-2 text-gray-600">Recordarme</span>
                        </label>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium transition-colors">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div> --}}
                    
                    @error('email')
                        <div class="alert alert-danger mt-2">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <!-- Botón Submit -->
                    <button 
                        type="submit" 
                        class="w-full btn-primary text-white font-semibold py-3 rounded-xl shadow-lg"
                    >
                        Iniciar Sesión
                    </button>
                    
                    <!-- Soporte -->
                    {{-- <div class="text-center pt-4 border-t border-gray-200">
                        <p class="text-sm text-gray-500">
                            ¿Necesitas ayuda? 
                            <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Contacta soporte</a>
                        </p>
                    </div> --}}
                </form>
            </div>
            
            <!-- Footer -->
            <div class="text-center mt-6 text-white text-sm">
                <p>© {{ date('Y') }} Grupo ALTOS. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            }
        }
    </script>
</body>
</html>


