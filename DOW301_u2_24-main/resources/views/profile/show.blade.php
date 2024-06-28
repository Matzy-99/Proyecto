
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil de Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3>{{ $user->name }}</h3>
                    <p>{{ $user->email }}</p>
                    <!-- Puedes mostrar más detalles según tu modelo de usuario -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
