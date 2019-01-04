<?php

namespace SebastianJung\Vault423\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Vault423Controller extends Controller
{
    public function checkPassword(Request $request)
    {
        $passwordString = config('vault-423.passwords');
        $passwords = explode(',', $passwordString);
        $inputPassword = $request->get('vault-423-password');
        $isInputPasswordCorrect = in_array($inputPassword, $passwords);

        if ($isInputPasswordCorrect) {
            return response('password correct', 200);
        } else {
            return response('password incorrect', 423);
        }
    }
}
