<?php

namespace App\Http\Controllers\Authentification;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'address' => ['string', 'max:255'],
            'profession' => ['string', 'max:255'],
            'phone' => ['string', regex('^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[456789]\d{9}|(\d[ -]?){10}\d$')],
        ]);
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'address' => $request->input('address'),
            'profession' => $request->input('profession'),
            'phone' => $request->input('phone')
        ]);

        return response('Congratulation, welcome ' . $user['name'], 201);
    }


}
