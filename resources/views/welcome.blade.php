<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lapor Pak! - Campus Complaint System</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-100 dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="relative flex justify-center items-center min-h-screen bg-dots-darker bg-center selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center animate-slide-up">
                    <h1 class="text-6xl font-bold text-gray-900 dark:text-white mb-8 drop-shadow-lg">Lapor Pak!</h1>
                </div>

                <div class="text-center animate-fade-in" style="animation-delay: 0.3s; opacity: 0; animation-fill-mode: forwards;">
                    <p class="text-xl text-gray-600 dark:text-gray-400 mb-8 max-w-2xl mx-auto leading-relaxed">
                        Sistem Pelaporan Fasilitas Kampus Terpusat.<br>
                        Laporkan kerusakan fasilitas kampus dengan mudah dan cepat.
                    </p>

                    <div class="flex justify-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-white dark:text-gray-400 dark:hover:text-white hover:bg-red-600 dark:hover:bg-red-600 transition-all duration-300 transform hover:scale-105 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bg-white dark:bg-gray-800 py-3 px-8 rounded-full shadow-lg hover:shadow-red-500/30">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-white dark:text-gray-400 dark:hover:text-white hover:bg-red-600 dark:hover:bg-red-600 transition-all duration-300 transform hover:scale-105 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bg-white dark:bg-gray-800 py-3 px-8 rounded-full shadow-lg hover:shadow-red-500/30">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-white hover:text-white dark:text-white dark:hover:text-white bg-red-600 hover:bg-red-700 transition-all duration-300 transform hover:scale-105 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 py-3 px-8 rounded-full shadow-lg hover:shadow-red-600/50">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>

                <div class="mt-16 flex justify-center">
                   <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                        <div class="scale-100 p-6 bg-white/80 dark:bg-gray-800/50 backdrop-blur-md dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-2xl shadow-xl flex flex-col items-center text-center animate-slide-up hover:shadow-2xl hover:shadow-red-500/10 transition-all duration-500 hover:-translate-y-2 group" style="animation-delay: 0.5s; opacity: 0; animation-fill-mode: forwards;">
                             <div class="bg-red-100 dark:bg-red-900/30 p-4 rounded-full mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-red-600 dark:text-red-400">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="mt-2 text-xl font-bold text-gray-900 dark:text-white group-hover:text-red-500 transition-colors">Mudah</h2>
                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Cukup foto dan upload laporan kamu dengan cepat dan praktis.
                                </p>
                            </div>
                        </div>

                        <div class="scale-100 p-6 bg-white/80 dark:bg-gray-800/50 backdrop-blur-md dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-2xl shadow-xl flex flex-col items-center text-center animate-slide-up hover:shadow-2xl hover:shadow-red-500/10 transition-all duration-500 hover:-translate-y-2 group" style="animation-delay: 0.7s; opacity: 0; animation-fill-mode: forwards;">
                             <div class="bg-red-100 dark:bg-red-900/30 p-4 rounded-full mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-red-600 dark:text-red-400">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                             <div>
                                <h2 class="mt-2 text-xl font-bold text-gray-900 dark:text-white group-hover:text-red-500 transition-colors">Terpantau</h2>
                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Pantau status laporan kamu secara realtime dari dashboard.
                                </p>
                            </div>
                        </div>

                        <div class="scale-100 p-6 bg-white/80 dark:bg-gray-800/50 backdrop-blur-md dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-2xl shadow-xl flex flex-col items-center text-center animate-slide-up hover:shadow-2xl hover:shadow-red-500/10 transition-all duration-500 hover:-translate-y-2 group" style="animation-delay: 0.9s; opacity: 0; animation-fill-mode: forwards;">
                             <div class="bg-red-100 dark:bg-red-900/30 p-4 rounded-full mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-red-600 dark:text-red-400">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                             <div>
                                <h2 class="mt-2 text-xl font-bold text-gray-900 dark:text-white group-hover:text-red-500 transition-colors">Responsif</h2>
                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Admin akan segera menindaklanjuti keluhan tanpa birokrasi berbelit.
                                </p>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </body>
</html>
