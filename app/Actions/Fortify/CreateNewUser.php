<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'nombre_fiscal' => ['required', 'string', 'max:255'],
            'direccion_fiscal' => ['required', 'string', 'max:255'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'numero_colegiado' => ['required', 'string', 'max:255'],
            'colegio_dentistas' => ['required', 'string', 'max:255'],
            'direccion_envio' => ['required', 'string', 'max:255'],
            'persona_contacto' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'cif' => $input['cif'],
            'nombre_fiscal' => $input['nombrefiscal'],
            'direccion_fiscal' => $input['direccionfiscal'],
            'nombre' => $input['nombre'],
            'apellidos' => $input['apellidos'],
            'numero_colegiado' => $input['numero_colegiado'],
            'colegio_dentistas' => $input['colegio_dentistas'],
            'direccion_envio' => $input['direccion_envio'],
            'persona_contacto' => $input['persona_contacto'],
            'telefono' => $input['telefono'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}