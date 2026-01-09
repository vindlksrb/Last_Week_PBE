<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Tiket') }} #{{ $ticket->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Ticket Info -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="md:flex md:justify-between">
                        <div class="md:w-2/3">
                            <h3 class="text-2xl font-bold mb-2">{{ $ticket->title }}</h3>
                            <div class="flex items-center space-x-4 mb-4 text-sm text-gray-600">
                                <span><span class="font-bold">Kategori:</span> {{ $ticket->category->name }}</span>
                                <span><span class="font-bold">Lokasi:</span> {{ $ticket->location }}</span>
                                <span><span class="font-bold">Pelapor:</span> {{ $ticket->user->name }}</span>
                                <span><span class="font-bold">Tanggal:</span> {{ $ticket->created_at->format('d M Y H:i') }}</span>
                            </div>
                            
                            <div class="mb-6">
                                <h4 class="font-bold text-gray-700 mb-2">Deskripsi:</h4>
                                <p class="text-gray-800 whitespace-pre-line">{{ $ticket->description }}</p>
                            </div>

                            @if($ticket->image_path)
                                <div class="mb-6">
                                    <h4 class="font-bold text-gray-700 mb-2">Bukti Foto:</h4>
                                    <img src="{{ asset('storage/' . $ticket->image_path) }}" alt="Bukti Foto" class="max-w-lg rounded shadow">
                                </div>
                            @endif
                        </div>

                        <div class="md:w-1/3 md:pl-8 mt-6 md:mt-0 border-t md:border-t-0 md:border-l border-gray-200">
                            <!-- Status Management (Admin Only) -->
                            <div class="mb-6">
                                <h4 class="font-bold text-gray-700 mb-2">Status Saat Ini:</h4>
                                @php
                                    $statusClasses = [
                                        'pending' => 'bg-red-200 text-red-900',
                                        'in_progress' => 'bg-yellow-200 text-yellow-900',
                                        'resolved' => 'bg-green-200 text-green-900',
                                    ];
                                    $statusLabel = [
                                        'pending' => 'Pending',
                                        'in_progress' => 'In Progress',
                                        'resolved' => 'Resolved',
                                    ];
                                @endphp
                                <span class="inline-block px-3 py-1 font-semibold {{ $statusClasses[$ticket->status] }} rounded-full mb-4">
                                    {{ $statusLabel[$ticket->status] }}
                                </span>

                                @if(Auth::user()->is_admin)
                                    <form action="{{ route('tickets.update', $ticket) }}" method="POST" class="mt-4 p-4 bg-gray-50 rounded">
                                        @csrf
                                        @method('PUT')
                                        <label for="status" class="block text-sm font-bold text-gray-700 mb-2">Ubah Status:</label>
                                        <select name="status" id="status" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mb-3">
                                            <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="resolved" {{ $ticket->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                        </select>
                                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                            Update Status
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold mb-6">Diskusi / Komentar</h3>

                    <div class="space-y-6 mb-8">
                        @foreach($ticket->comments as $comment)
                            <div class="flex space-x-4 {{ $comment->user->is_admin ? 'bg-blue-50 p-4 rounded-lg' : '' }}">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="font-bold {{ $comment->user->is_admin ? 'text-blue-800' : 'text-gray-800' }}">
                                            {{ $comment->user->name }} {{ $comment->user->is_admin ? '(Admin)' : '' }}
                                        </span>
                                        <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-gray-700">{{ $comment->message }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Add Comment -->
                    <form action="{{ route('comments.store', $ticket) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Tambahkan Komentar</label>
                            <textarea name="message" id="message" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Tulis tanggapan anda..." required></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Kirim Komentar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
