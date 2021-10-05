<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <x-jet-label for="cif" value="{{ __('CIF/NIF') }} *" />
                <x-jet-input id="cif" class="block mt-1 w-full" type="text" name="cif" :value="old('cif')" required autofocus autocomplete="cif" />
            </div>

            <div class="mt-4">
                <x-jet-label for="nombrefiscal" value="{{ __('Nombre Fiscal') }} *" />
                <x-jet-input id="nombrefiscal" class="block mt-1 w-full" type="text" name="nombrefiscal" :value="old('nombrefiscal')" required autofocus autocomplete="nombrefiscal" />
            </div>

            <div class="mt-4">
                <x-jet-label for="direccionfiscal" value="{{ __('Dirección Fiscal') }} *" />
                <x-jet-input id="direccionfiscal" class="block mt-1 w-full" type="text" name="direccionfiscal" :value="old('direccionfiscal')" required autofocus autocomplete="direccionfiscal" />
            </div>

            <div class="mt-4">
                <x-jet-label for="nombre" value="{{ __('Nombre') }} *" />
                <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            </div>

            <div class="mt-4">
                <x-jet-label for="apellidos" value="{{ __('Apellidos') }} *" />
                <x-jet-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" />
            </div>

            <div class="mt-4">
                <x-jet-label for="numerocolegiado" value="{{ __('Número de Colegiado') }} *" />
                <x-jet-input id="numerocolegiado" class="block mt-1 w-full" type="text" name="numerocolegiado" :value="old('numerocolegiado')" required autofocus autocomplete="numerocolegiado" />
            </div>

            <div class="mt-4">
                <x-jet-label for="colegiodentistas" value="{{ __('Colegio de Dentistas') }} *" />
                <x-jet-input id="colegiodentistas" class="block mt-1 w-full" type="text" name="colegiodentistas" :value="old('colegiodentistas')" required autofocus autocomplete="colegiodentistas" />
            </div>

            <div class="mt-4">
                <x-jet-label for="direccionenvio" value="{{ __('Dirección de Envio') }} *" />
                <x-jet-input id="direccionenvio" class="block mt-1 w-full" type="text" name="direccionenvio" :value="old('direccionenvio')" required autofocus autocomplete="direccionenvio" />
            </div>

            <div class="mt-4">
                <x-jet-label for="personacontacto" value="{{ __('Persona de Contacto de la Clínica') }}" />
                <x-jet-input id="personacontacto" class="block mt-1 w-full" type="text" name="personacontacto" :value="old('personacontacto')"  autofocus autocomplete="personacontacto" />
            </div>

            <div class="mt-4">
                <x-jet-label for="telefono" value="{{ __('Teléfono') }} *" />
                <x-jet-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
            </div>            

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }} *" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }} *" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }} *" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya tiene usuario registrado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
