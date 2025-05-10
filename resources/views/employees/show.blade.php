<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalle de Empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-sm text-gray-800 dark:text-gray-100">
                <p><strong>Nombre:</strong> {{ $employee->first_name }}</p>
                <p><strong>Apellido:</strong> {{ $employee->last_name }}</p>
                <p><strong>Email:</strong> {{ $employee->email }}</p>
                <p><strong>Teléfono:</strong> {{ $employee->phone }}</p>
                <p><strong>Empresa:</strong> {{ $employee->company->name ?? '—' }}</p>

                <div class="mt-6">
                    <x-link href="{{ route('employees.edit', $employee) }}"
                        class="text-gray-600 hover:underline">Editar</x-link>
                    <x-link href="{{ route('employees.index') }}"
                        class="ml-4 text-gray-600 hover:underline">Volver</x-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
