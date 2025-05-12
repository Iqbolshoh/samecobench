<x-filament-panels::page>
    <x-filament::card class="p-6">
        <div class="flex items-center gap-4">
            <img class="w-16 h-16 rounded-full border-2 border-primary-500"
                src="https://ui-avatars.com/api/?name={{ urlencode($name) }}&color=FFFFFF&background=09090b"
                alt="{{ $name }}" loading="lazy">
            <div>
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">{{ $name }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $email }}</p>
                <div class="mt-2 flex flex-wrap gap-2">
                    @forelse ($roles as $role)
                        <span
                            class="inline-block px-3 py-1 text-xs font-semibold text-white bg-primary-600 rounded-full hover:bg-primary-700 transition-colors">
                            {{ $role }}
                        </span>
                    @empty
                        <span
                            class="inline-block px-3 py-1 text-xs font-semibold text-gray-500 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-400">
                            No roles assigned
                        </span>
                    @endforelse
                </div>
            </div>
        </div>
        <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">Joined on: {{ $joined }}</p>
        @if($lastLogin !== 'Not available')
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Last login: {{ $lastLogin }}</p>
        @endif
    </x-filament::card>
</x-filament-panels::page>