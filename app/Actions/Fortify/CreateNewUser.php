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
            'nombrefiscal' => ['required', 'string', 'max:255'],
            'direccionfiscal' => ['required', 'string', 'max:255'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'numerocolegiado' => ['required', 'string', 'max:255'],
            'colegiodentistas' => ['required', 'string', 'max:255'],
            'direccionenvio' => ['required', 'string', 'max:255'],
            'personacontacto' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],           
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user =  User::create([
            'cif' => $input['cif'],
            'nombre_fiscal' => $input['nombrefiscal'],
            'direccion_fiscal' => $input['direccionfiscal'],
            'nombre' => $input['nombre'],
            'apellidos' => $input['apellidos'],
            'numero_colegiado' => $input['numerocolegiado'],
            'colegio_dentistas' => $input['colegiodentistas'],
            'direccion_envio' => $input['direccionenvio'],
            'persona_contacto' => $input['personacontacto'],
            'telefono' => $input['telefono'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

     //   $user->assignRole('cliente');

        return $user;

        
    }
}