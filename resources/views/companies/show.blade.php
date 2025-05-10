<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalle de Empresa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-sm text-gray-800 dark:text-gray-100">
                <div><strong>Nombre:</strong> {{ $company->name }}</div>
                <div><strong>Email:</strong> {{ $company->email }}</div>
                <div><strong>Website:</strong> <a href="{{ $company->website }}" class="text-blue-500 underline"
                        target="_blank">{{ $company->website }}</a></div>
                @if ($company->logo)
                    <div>
                        <strong>Logo:</strong><br>
                        <img src="{{ asset('storage/' . $company->logo) }}" class="w-24 h-24 rounded">
                    </div>
                @endif
                <div class="mt-6">
                    <x-link href="{{ route('companies.edit', $company) }}"
                        class="text-gray-600 hover:underline">Editar</x-link>
                    <x-link href="{{ route('companies.index') }}"
                        class="ml-4 text-gray-600 hover:underline">Volver</x-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
