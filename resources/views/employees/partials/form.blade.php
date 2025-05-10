<div class="mb-4">
    <x-input-label for="first_name" :value="__('Nombre')" />
    <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full"
        value="{{ old('first_name', $employee->first_name ?? '') }}" required autofocus />
    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="last_name" :value="__('Apellido')" />
    <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full"
        value="{{ old('last_name', $employee->last_name ?? '') }}" required />
    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
        value="{{ old('email', $employee->email ?? '') }}" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="phone" :value="__('Teléfono')" />
    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
        value="{{ old('phone', $employee->phone ?? '') }}" />
    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="company_id" :value="__('Empresa')" />
    <x-select-input name="company_id" id="company_id" class="mt-1 block w-full">
        @foreach ($companies as $company)
            <option value="{{ $company->id }}" @selected(old('company_id', $employee->company_id ?? '') == $company->id)>
                {{ $company->name }}
            </option>
        @endforeach
    </x-select-input>
    <x-input-error :messages="$errors->get('company_id')" class="mt-2" />
</div>
