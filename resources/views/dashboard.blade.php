<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Welcome Section -->
            <div class="animate-fade-in">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Selamat Datang, {{ Auth::user()->name }}! 👋
                </h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2">
                    Berikut adalah ringkasan laporan kampus hari ini, {{ now()->format('d M Y') }}.
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1: Total Reports -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm border border-gray-100/50 dark:border-gray-700 relative overflow-hidden group hover:shadow-lg transition-all duration-300 animate-slide-up" style="animation-delay: 0.1s;">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl -mr-16 -mt-16 group-hover:bg-blue-500/20 transition-all"></div>
                    <div class="relative z-10 flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Laporan</p>
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-2">
                                @php
                                   try {
                                       echo \App\Models\Ticket::count();
                                   } catch (\Exception $e) {
                                       echo '0';
                                   }
                                @endphp
                            </h3>
                        </div>
                        <div class="p-3 bg-blue-50 dark:bg-blue-900/30 rounded-xl text-blue-600 dark:text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Card 2: In Process -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm border border-gray-100/50 dark:border-gray-700 relative overflow-hidden group hover:shadow-lg transition-all duration-300 animate-slide-up" style="animation-delay: 0.2s;">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-500/10 rounded-full blur-2xl -mr-16 -mt-16 group-hover:bg-yellow-500/20 transition-all"></div>
                    <div class="relative z-10 flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Sedang Diproses</p>
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-2">
                                @php
                                   try {
                                       echo \App\Models\Ticket::where('status', 'process')->count();
                                   } catch (\Exception $e) {
                                       echo '0';
                                   }
                                @endphp
                            </h3>
                        </div>
                        <div class="p-3 bg-yellow-50 dark:bg-yellow-900/30 rounded-xl text-yellow-600 dark:text-yellow-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Completed -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm border border-gray-100/50 dark:border-gray-700 relative overflow-hidden group hover:shadow-lg transition-all duration-300 animate-slide-up" style="animation-delay: 0.3s;">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-green-500/10 rounded-full blur-2xl -mr-16 -mt-16 group-hover:bg-green-500/20 transition-all"></div>
                    <div class="relative z-10 flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Selesai</p>
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-2">
                                @php
                                   try {
                                       echo \App\Models\Ticket::where('status', 'done')->count();
                                   } catch (\Exception $e) {
                                       echo '0';
                                   }
                                @endphp
                            </h3>
                        </div>
                        <div class="p-3 bg-green-50 dark:bg-green-900/30 rounded-xl text-green-600 dark:text-green-400">
                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Action & Chart -->
                <div class="lg:col-span-2 space-y-8 animate-slide-up" style="animation-delay: 0.4s;">
                     <!-- Quick Actions Banner -->
                    <div class="bg-gradient-to-r from-red-600 to-red-500 rounded-2xl p-8 text-white shadow-lg relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-32 -mt-32"></div>
                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold">Ada fasilitas yang rusak?</h3>
                            <p class="mt-2 text-red-100 max-w-xl">Jangan ragu untuk melapor. Semakin cepat kamu melapor, semakin cepat kami perbaiki.</p>
                            <a href="{{ route('tickets.index') }}" class="inline-block mt-6 bg-white text-red-600 font-bold py-3 px-6 rounded-lg hover:bg-neutral-50 transition-colors shadow-sm">
                                Buat Laporan Baru
                            </a>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 dark:border-gray-700 flex justify-between items-center">
                            <h3 class="font-bold text-gray-900 dark:text-white">Aktivitas Terkini</h3>
                            <a href="{{ route('tickets.index') }}" class="text-sm text-red-600 hover:text-red-700 font-medium">Lihat Semua</a>
                        </div>
                        <div class="divide-y divide-gray-100 dark:divide-gray-700">
                            @php
                                $recentTickets = [];
                                try {
                                    $recentTickets = \App\Models\Ticket::with('user')->latest()->take(5)->get();
                                } catch (\Exception $e) {}
                            @endphp

                            @forelse($recentTickets as $ticket)
                            <div class="p-4 flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white truncate max-w-[200px]">{{ $ticket->title }}</p>
                                        <p class="text-xs text-gray-500">{{ $ticket->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($ticket->status == 'open') bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300
                                        @elseif($ticket->status == 'process') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300
                                        @elseif($ticket->status == 'done') bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300
                                        @else bg-red-100 text-red-800
                                        @endif
                                    ">
                                        {{ ucfirst($ticket->status) }}
                                    </span>
                                </div>
                            </div>
                            @empty
                            <div class="p-8 text-center text-gray-500">
                                Belum ada aktivitas laporan.
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="lg:col-span-1 space-y-6 animate-slide-up" style="animation-delay: 0.5s;">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-gray-700">
                        <h3 class="font-bold text-gray-900 dark:text-white mb-4">Informasi Penting</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start space-x-3 text-sm text-gray-600 dark:text-gray-400">
                                <span class="text-red-500 mt-0.5">•</span>
                                <span>Laporan yang masuk sebelum jam 12:00 akan diproses hari yang sama.</span>
                            </li>
                            <li class="flex items-start space-x-3 text-sm text-gray-600 dark:text-gray-400">
                                <span class="text-red-500 mt-0.5">•</span>
                                <span>Gunakan foto yang jelas saat melapor kerusakan fasilitas.</span>
                            </li>
                            <li class="flex items-start space-x-3 text-sm text-gray-600 dark:text-gray-400">
                                <span class="text-red-500 mt-0.5">•</span>
                                <span>Status "Selesai" berarti perbaikan telah diverifikasi oleh tim teknis.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
