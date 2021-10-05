<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informacion de Usuario') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualizar los datos de usuario.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="cif" value="{{ __('CIF/NIF') }}" />
            <x-jet-input id="cif" type="text" class="mt-1 block w-full" wire:model.defer="state.cif" autocomplete="cif" />
            <x-jet-input-error for="cif" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nombrefiscal" value="{{ __('Nombre Fiscal') }}" />
            <x-jet-input id="nombrefiscal" type="text" class="mt-1 block w-full" wire:model.defer="state.nombrefiscal" autocomplete="nombrefiscal" />
            <x-jet-input-error for="nombrefiscal" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="direccionfiscal" value="{{ __('Dirección Fiscal') }}" />
            <x-jet-input id="direccionfiscal" type="text" class="mt-1 block w-full" wire:model.defer="state.direccionfiscal" autocomplete="direccionfiscal" />
            <x-jet-input-error for="direccionfiscal" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
            <x-jet-input id="nombre" type="text" class="mt-1 block w-full" wire:model.defer="state.nombre" autocomplete="nombre" />
            <x-jet-input-error for="nombre" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="apellidos" value="{{ __('Apellidos') }}" />
            <x-jet-input id="apellidos" type="text" class="mt-1 block w-full" wire:model.defer="state.apellidos" autocomplete="apellidos" />
            <x-jet-input-error for="apellidos" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="numerocolegiado" value="{{ __('Número de Colegiado') }}" />
            <x-jet-input id="numerocolegiado" type="text" class="mt-1 block w-full" wire:model.defer="state.numerocolegiado" autocomplete="numerocolegiado" />
            <x-jet-input-error for="numerocolegiado" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="colegiodentistas" value="{{ __('Colegio de Dentistas') }}" />
            <x-jet-input id="colegiodentistas" type="text" class="mt-1 block w-full" wire:model.defer="state.colegiodentistas" autocomplete="colegiodentistas" />
            <x-jet-input-error for="colegiodentistas" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="direccionenvio" value="{{ __('Dirección de Envio') }}" />
            <x-jet-input id="direccionenvio" type="text" class="mt-1 block w-full" wire:model.defer="state.direccionenvio" autocomplete="direccionenvio" />
            <x-jet-input-error for="direccionenvio" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="personacontacto" value="{{ __('Persona de Contacto') }}" />
            <x-jet-input id="personacontacto" type="text" class="mt-1 block w-full" wire:model.defer="state.personacontacto" autocomplete="personacontacto" />
            <x-jet-input-error for="personacontacto" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>





    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Guardado.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
