<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Empresa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('companies.partials.form')
                    <div class="mt-4">
                        <x-primary-button>Guardar</x-primary-button>
                        <x-link href="{{ route('companies.index') }}"
                            class="ml-4 text-sm text-gray-600 hover:underline">Cancelar</x-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @stack('scripts')
</x-app-layout>
