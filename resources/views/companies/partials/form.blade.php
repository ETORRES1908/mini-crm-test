<div class="mb-4">
    <x-input-label for="name" :value="__('Nombre')" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
        value="{{ old('name', $company->name ?? '') }}" required autofocus />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input type="email" name="email" id="email" value="{{ old('email', $company->email ?? '') }}"
        class="mt-1 block w-full" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>
@if ($company->logo ?? false)
    <div class="mb-4">
        <x-input-label :value="__('Logo Actual')" class="block text-gray-700 text-sm font-bold mb-2" />
        <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo actual" class="w-32 h-32 object-cover rounded">
    </div>
@endif
<div class="mb-4">
    <x-input-label for="logo" :value="__('Logo')" />
    <x-text-input type="file" name="logo" id="logo" class="mt-1 block w-full"
        onchange="previewLogo(event)" />
    <div id="preview-container" class="mt-4 hidden">
        <x-input-label :value="__('Vista previa')" class="block text-gray-700 text-sm font-bold mb-2" />
        <img id="preview" class="w-32 h-32 object-cover rounded">
    </div>
    <x-input-error :messages="$errors->get('logo')" class="mt-2" />
</div>

<div class="mb-4">
    <x-input-label for="website" :value="__('Website')"
        class="block font-medium text-sm text-gray-700 dark:text-gray-300" />
    <x-text-input type="text" name="website" id="website" value="{{ old('website', $company->website ?? '') }}"
        class="form-input w-full mt-1" />
    <x-input-error :messages="$errors->get('website')" class="mt-2" />
</div>
@push('scripts')
    <script>
        function previewLogo(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
            const container = document.getElementById('preview-container');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                container.classList.add('hidden');
            }
        }
    </script>
@endpush
