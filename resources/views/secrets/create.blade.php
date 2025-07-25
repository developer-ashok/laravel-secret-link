@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 3rem;">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card glass-card z-depth-3" style="position:relative;overflow:hidden;">
                <i class="material-icons" style="position:absolute;opacity:0.07;font-size:10rem;right:-20px;top:-20px;pointer-events:none;">lock</i>
                <div class="card-content">
                    <span class="card-title center-align blue-text text-darken-2" style="font-weight:700;letter-spacing:1px;">Create a One-Time Secret Link</span>
                    <p class="center-align grey-text text-darken-1 mb-3" style="font-size:1.1rem;">Share secrets securely, beautifully, and only once.</p>
                    @if(session('error'))
                        <div class="card-panel red lighten-4 red-text text-darken-4">{{ session('error') }}</div>
                    @endif
                    <form method="POST" action="{{ route('secret.store') }}">
                        @csrf
                        <div class="input-field">
                            <textarea name="secret_text" id="secret_text" class="materialize-textarea @error('secret_text') invalid @enderror" required>{{ old('secret_text') }}</textarea>
                            <label for="secret_text">Secret Message <span class="red-text">*</span></label>
                            @error('secret_text')
                                <span class="helper-text red-text">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" id="password" class="@error('password') invalid @enderror" autocomplete="new-password">
                            <label for="password">Password (optional)</label>
                            @error('password')
                                <span class="helper-text red-text">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field">
                            <select name="expiry_time" id="expiry_time" class="@error('expiry_time') invalid @enderror">
                                <option value="1day" {{ old('expiry_time', '1day') == '1day' ? 'selected' : '' }}>1 Day (default)</option>
                                <option value="1hr" {{ old('expiry_time') == '1hr' ? 'selected' : '' }}>1 Hour</option>
                                <option value="5min" {{ old('expiry_time') == '5min' ? 'selected' : '' }}>5 Minutes</option>
                            </select>
                            <label for="expiry_time">Expiry Time</label>
                            @error('expiry_time')
                                <span class="helper-text red-text">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="center-align" style="margin-top:2rem;">
                            <button type="submit" class="btn-large waves-effect waves-light blue darken-2 z-depth-1" style="border-radius:2rem;font-weight:600;letter-spacing:1px;"><i class="material-icons left">link</i>Generate Secret Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    M.FormSelect.init(elems);
});
</script>
@endsection
