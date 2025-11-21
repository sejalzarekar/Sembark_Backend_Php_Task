<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Invitation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

public function create(array $input): User
{
    Validator::make($input, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => $this->passwordRules(),
        'role_id' => ['sometimes','nullable','exists:roles,id'], 
    ])->validate();

    if(isset($input['token']) && $input['token']) {
        $invitation = Invitation::where('token', $input['token'])->firstOrFail();

        return User::create([
            'name' => $input['name'],
            'email' => $invitation->email,
            'password' => Hash::make($input['password']),
            'role_id' => $invitation->role_id,
            'company_id' => $invitation->company_id,
        ]);
    }

    return User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
        'role_id' => $input['role_id'], 
    ]);
}

    
}
