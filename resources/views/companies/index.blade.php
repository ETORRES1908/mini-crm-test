<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Empresas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4 flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                <div class="sm:w-auto">
                    <a href="{{ route('companies.create') }}"
                        class="block text-center sm:inline-block rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                        Nueva empresa
                    </a>
                </div>

                <div class="w-full sm:max-w-[70%]">
                    <form method="GET" action="{{ route('companies.index') }}"
                        class="flex flex-col sm:flex-row w-full sm:items-end gap-2 sm:gap-4">
                        <input type="text" name="search" placeholder="Buscar por nombre, email o website..."
                            value="{{ request('search') }}"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white shadow-sm text-sm px-4 py-2">
                        <button type="submit"
                            class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm px-4 py-2 rounded">
                            Filtrar
                        </button>
                    </form>
                </div>
            </div>


            <!-- Tabla para escritorio y tablets -->
            <div class="overflow-x-auto rounded-lg bg-white shadow dark:bg-gray-800 hidden md:block">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                Logo</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                Nombre</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                Email</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                Website</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($companies as $company)
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if ($company->logo)
                                        <img src="{{ asset('storage/' . $company->logo) }}" width="50"
                                            height="50" class="rounded">
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                    {{ $company->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                    {{ $company->email }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <a href="{{ $company->website }}"
                                        class="text-blue-600 underline hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300"
                                        target="_blank">{{ $company->website }}</a>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('companies.show', $company) }}"
                                            class="btn btn-sm bg-indigo-600 text-white px-3 py-1 rounded">Ver</a>
                                        <a href="{{ route('companies.edit', $company) }}"
                                            class="btn btn-sm bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                                        <form action="{{ route('companies.destroy', $company) }}" method="POST"
                                            onsubmit="return confirm('¿Eliminar?')">
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

                <div class="px-6 py-4">
                    {{ $companies->links() }}
                </div>
            </div>

            <!-- Tarjetas para móviles -->
            <div class="space-y-4 md:hidden">
                @foreach ($companies as $company)
                    <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800">
                        <div class="flex items-center space-x-4 mb-2">
                            @if ($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" class="w-12 h-12 rounded">
                            @endif
                            <div class="text-sm text-gray-900 dark:text-gray-100 font-semibold">
                                {{ $company->name }}
                            </div>
                        </div>
                        <div class="text-sm text-gray-700 dark:text-gray-300">
                            <p><strong>Email:</strong> {{ $company->email }}</p>
                            <p><strong>Website:</strong>
                                <a href="{{ $company->website }}" target="_blank"
                                    class="text-blue-600 dark:text-blue-400 underline">
                                    {{ $company->website }}
                                </a>
                            </p>
                        </div>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <a href="{{ route('companies.show', $company) }}"
                                class="btn btn-sm bg-indigo-600 text-white px-3 py-1 rounded">Ver</a>
                            <a href="{{ route('companies.edit', $company) }}"
                                class="btn btn-sm bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                            <form action="{{ route('companies.destroy', $company) }}" method="POST"
                                onsubmit="return confirm('¿Eliminar?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="btn btn-sm bg-red-600 text-white px-3 py-1 rounded">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <div class="px-2">
                    {{ $companies->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
