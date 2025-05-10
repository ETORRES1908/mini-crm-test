<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-sm">
                <form action="{{ route('employees.update', $employee) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('employees.partials.form')
                    <div class="mt-4">
                        <x-primary-button>Guardar</x-primary-button>
                        <x-link href="{{ route('employees.index') }}"
                            class="ml-4 text-sm text-gray-600 hover:underline">Cancelar</x-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
