<?php

namespace SebastianJung\Vault423\Http\Middleware;

use Closure;
use Illuminate\Contracts\Encryption\DecryptException;

class Vault423
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $passwordString = config('vault-423.passwords');
        $passwords = explode(',', $passwordString);

        $isPasswordSet = !empty($passwords[0]);
        $isOnWhitelist = in_array($request->getClientIp(), config('vault-423.whitelist'));
        $isCookiePasswordCorrect = false;
        // we are not using session cookies here for 3 reasons
            // 1. shorter and less complex code cause after api call to /check-password we can immediately set cookie with javascript without hitting another route which sets the session cookie (i might be wrong on that)
            // 2. we can use javascript to manipulate the cookie
            // 3. password protection is independent from session cookie lifetime (!!)
        if (isset($_COOKIE['vault-423'])) {
            $isCookiePasswordCorrect = in_array($_COOKIE['vault-423'], $passwords);
        }

        // ACCESS GRANTED
        if (!$isPasswordSet || $isOnWhitelist || $isCookiePasswordCorrect) {
            return $next($request);
        }

        // ACCESS RESTRICTED
        return response(view('vault-423::vault-423'), 423);
    }
}
