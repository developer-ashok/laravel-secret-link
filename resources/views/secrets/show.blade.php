@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 3rem;">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card glass-card z-depth-3" style="position:relative;overflow:hidden;">
                <i class="material-icons" style="position:absolute;opacity:0.07;font-size:10rem;left:-20px;top:-20px;pointer-events:none;">visibility</i>
                <div class="card-content">
                    <span class="card-title center-align blue-text text-darken-2" style="font-weight:700;letter-spacing:1px;"><i class="material-icons left">visibility</i>View Secret</span>
                    @if(isset($show_secret) && $show_secret)
                        <div class="card-panel green lighten-5 green-text text-darken-4 center-align glass-card" style="backdrop-filter:blur(4px);border-radius:1.5rem;">
                            <i class="material-icons left">lock_open</i>
                            <b>Secret:</b>
                            <div class="mt-3 mb-2" style="word-break:break-all;font-size:1.2rem;">{{ $secret_text }}</div>
                        </div>
                        <div class="center-align">
                            <a href="/" class="btn-large waves-effect waves-light blue darken-2 z-depth-1" style="border-radius:2rem;font-weight:600;letter-spacing:1px;">Create another secret</a>
                        </div>
                    @elseif(isset($password_required) && $password_required)
                        <form method="POST" action="{{ route('secret.authenticate', $token) }}">
                            @csrf
                            <div class="input-field">
                                <input type="password" name="password" id="password" class="@error('password') invalid @enderror" required autofocus>
                                <label for="password">Password</label>
                                @error('password')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                                @if(session('error'))
                                    <span class="helper-text red-text">{{ session('error') }}</span>
                                @endif
                            </div>
                            <div class="center-align" style="margin-top:2rem;">
                                <button type="submit" class="btn-large waves-effect waves-light blue darken-2 z-depth-1" style="border-radius:2rem;font-weight:600;letter-spacing:1px;"><i class="material-icons left">visibility</i>View Secret</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
