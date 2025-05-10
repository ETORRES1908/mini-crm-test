<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-4 flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                <div class="sm:w-auto">
                    <a href="{{ route('employees.create') }}"
                        class="block text-center sm:inline-block rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                        Nuevo empleado
                    </a>
                </div>

                <div class="w-full sm:max-w-[65%]">
                    <form method="GET" action="{{ route('employees.index') }}"
                        class="flex flex-col sm:flex-row w-full sm:items-end gap-2 sm:gap-4">
                        <input type="text" name="search" placeholder="Buscar por nombre, apellido o email"
                            value="{{ request('search') }}"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white shadow-sm text-sm px-4 py-2">

                        <select name="company_id"
                            class="w-full sm:w-auto rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white shadow-sm text-sm px-4 py-2">
                            <option value="">Todas las empresas</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" @selected(request('company_id') == $company->id)>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit"
                            class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm px-4 py-2 rounded">
                            Filtrar
                        </button>
                    </form>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            <!-- Tabla para escritorio y tablets -->
            <div class="overflow-x-auto rounded-lg bg-white shadow dark:bg-gray-800 hidden md:block">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                Nombre</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                Apellido</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                Email</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                Teléfono</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                Empresa</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($employees as $employee)
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                    {{ $employee->first_name }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                    {{ $employee->last_name }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                    {{ $employee->email }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                    {{ $employee->phone }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                    {{ $employee->company->name ?? '—' }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('employees.show', $employee) }}"
                                            class="btn btn-sm bg-indigo-600 text-white px-3 py-1 rounded">Ver</a>
                                        <a href="{{ route('employees.edit', $employee) }}"
                                            class="btn btn-sm bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                                        <form action="{{ route('employees.destroy', $employee) }}" method="POST"
                                            onsubmit="return confirm('¿Eliminar este empleado?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm bg-red-600 text-white px-3 py-1 rounded">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4 px-4">
                    {{ $employees->links() }}
                </div>
            </div>

            <!-- Tarjetas para móviles -->
            <div class="space-y-4 md:hidden">
                @foreach ($employees as $employee)
                    <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800">
                        <div class="text-sm text-gray-900 dark:text-gray-100 font-semibold">
                            <p><strong>Nombre:</strong> {{ $employee->first_name }}</p>
                            <p><strong>Apellido:</strong> {{ $employee->last_name }}</p>
                            <p><strong>Email:</strong> {{ $employee->email }}</p>
                            <p><strong>Teléfono:</strong> {{ $employee->phone }}</p>
                            <p><strong>Empresa:</strong> {{ $employee->company->name ?? '—' }}</p>
                        </div>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <a href="{{ route('employees.show', $employee) }}"
                                class="btn btn-sm bg-indigo-600 text-white px-3 py-1 rounded">Ver</a>
                            <a href="{{ route('employees.edit', $employee) }}"
                                class="btn btn-sm bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST"
                                onsubmit="return confirm('¿Eliminar este empleado?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="btn btn-sm bg-red-600 text-white px-3 py-1 rounded">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <div class="px-2">
                    {{ $employees->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
