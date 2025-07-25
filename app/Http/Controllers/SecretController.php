<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSecretRequest;
use App\Http\Requests\SecretPasswordRequest;
use App\Models\Secret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class SecretController extends Controller
{
    /**
     * Show the secret creation form.
     */
    public function create()
    {
        return view('secrets.create');
    }

    /**
     * Store the secret and return a unique link.
     */
    public function store(StoreSecretRequest $request)
    {
        // Determine expiry time
        $expiry = match ($request->input('expiry_time', '1day')) {
            '5min' => now()->addMinutes(5),
            '1hr' => now()->addHour(),
            default => now()->addDay(),
        };

        // Generate unique token
        do {
            $token = Str::random(32);
        } while (Secret::where('token', $token)->exists());

        // Encrypt the secret
        $encryptedSecret = Crypt::encryptString($request->input('secret_text'));

        // Hash the password if set
        $passwordHash = $request->filled('password') ? Hash::make($request->input('password')) : null;

        // Store in DB
        $secret = Secret::create([
            'token' => $token,
            'secret_text' => $encryptedSecret,
            'password_hash' => $passwordHash,
            'expires_at' => $expiry,
        ]);

        // Generate sharable link
        $link = url('/secret/' . $token);
        return view('secrets.link', compact('link'));
    }

    /**
     * View the secret (with password prompt if needed).
     */
    public function show($token)
    {
        $secret = Secret::where('token', $token)->first();
        // Check if secret exists, is not expired, and not viewed
        if (!$secret || $secret->is_viewed || now()->greaterThan($secret->expires_at)) {
            return view('secrets.expired');
        }
        // If password is set, prompt for password
        if ($secret->password_hash) {
            return view('secrets.show', [
                'password_required' => true,
                'token' => $token,
            ]);
        }
        // Show secret and mark as viewed
        $secretText = Crypt::decryptString($secret->secret_text);
        $secret->update([
            'viewed_at' => now(),
            'is_viewed' => true,
        ]);
        return view('secrets.show', [
            'show_secret' => true,
            'secret_text' => $secretText,
        ]);
    }

    /**
     * Submit password for protected secret.
     */
    public function authenticate(SecretPasswordRequest $request, $token)
    {
        $secret = Secret::where('token', $token)->first();
        // Check if secret exists, is not expired, and not viewed
        if (!$secret || $secret->is_viewed || now()->greaterThan($secret->expires_at)) {
            return view('secrets.expired');
        }
        // Validate password
        if (!Hash::check($request->input('password'), $secret->password_hash)) {
            return redirect()->back()->withInput()->with('error', 'Incorrect password.');
        }
        // Show secret and mark as viewed
        $secretText = Crypt::decryptString($secret->secret_text);
        $secret->update([
            'viewed_at' => now(),
            'is_viewed' => true,
        ]);
        return view('secrets.show', [
            'show_secret' => true,
            'secret_text' => $secretText,
        ]);
    }
}
