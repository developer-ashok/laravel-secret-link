@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="row center-align" style="margin-bottom: 3rem;">
        <div class="col s12">
            <h1 style="font-size: 3rem; font-weight: 800; color: #fff; text-shadow: 0 4px 8px rgba(0,0,0,0.3); margin-bottom: 1rem;">
                Create Your Secret
            </h1>
            <p style="font-size: 1.2rem; color: rgba(255,255,255,0.9); max-width: 600px; margin: 0 auto;">
                Share sensitive information securely with a one-time access link that disappears after viewing.
            </p>
        </div>
    </div>

    <!-- Create Secret Form - First Section -->
    <div class="row" style="margin-bottom: 4rem;">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card glass-card">
                <div class="card-content">
                    <span class="card-title" style="color: #fff; font-weight: 700; margin-bottom: 2rem;">
                        <i class="material-icons left" style="margin-right: 10px;">create</i>
                        New Secret Message
                    </span>
                    
                    @if ($errors->any())
                        <div class="card-panel red lighten-4 red-text text-darken-4" style="border-radius: 12px;">
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('secret.store') }}">
                        @csrf
                        
                        <div class="input-field">
                            <textarea 
                                id="secret_text" 
                                name="secret_text" 
                                class="materialize-textarea"
                                placeholder="Enter your secret message here..."
                                required
                                style="min-height: 120px;"
                            >{{ old('secret_text') }}</textarea>
                            <label for="secret_text" style="color: rgba(255,255,255,0.8);">Secret Message</label>
                        </div>

                        <div class="input-field">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                value="{{ old('password') }}"
                                placeholder="Optional password (leave blank for no password)"
                            >
                            <label for="password" style="color: rgba(255,255,255,0.8);">Password (Optional)</label>
                        </div>

                        <div class="input-field">
                            <select name="expiry_time" id="expiry_time">
                                <option value="1day" {{ old('expiry_time') == '1day' ? 'selected' : '' }}>1 Day (Default)</option>
                                <option value="1hr" {{ old('expiry_time') == '1hr' ? 'selected' : '' }}>1 Hour</option>
                                <option value="5min" {{ old('expiry_time') == '5min' ? 'selected' : '' }}>5 Minutes</option>
                            </select>
                            <label style="color: rgba(255,255,255,0.8);">Expiry Time</label>
                        </div>

                        <div class="center-align" style="margin-top: 2rem;">
                            <button type="submit" class="btn-large waves-effect waves-light" style="background: #667eea; color: #fff; border: none; border-radius: 12px; font-weight: 600; letter-spacing: 0.5px; display: inline-flex; align-items: center; justify-content: center; gap: 8px;">
                                <i class="material-icons">send</i>
                                Create Secret Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bento Box Features -->
    <div class="bento-container">
        <div class="bento-card feature">
            <div class="icon">🔒</div>
            <h3>End-to-End Encryption</h3>
            <p>Your secrets are encrypted using military-grade encryption before being stored. Only you and the recipient can access the content.</p>
        </div>
        
        <div class="bento-card security">
            <div class="icon">⚡</div>
            <h3>One-Time Access</h3>
            <p>Each secret can only be viewed once. After the first access, the link becomes invalid and the content is permanently deleted.</p>
        </div>
        
        <div class="bento-card simple">
            <div class="icon">🛡️</div>
            <h3>Password Protection</h3>
            <p>Add an optional password to your secrets for an extra layer of security. Perfect for sharing sensitive information.</p>
        </div>
        
        <div class="bento-card instant">
            <div class="icon">⏰</div>
            <h3>Auto-Expiration</h3>
            <p>Set custom expiration times (5 minutes to 1 day). Secrets automatically delete when they expire, even if not viewed.</p>
        </div>
    </div>

    <!-- How It Works -->
    <div class="row" style="margin-top: 4rem;">
        <div class="col s12">
            <h2 class="center-align" style="color: #fff; font-weight: 700; margin-bottom: 2rem; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                How It Works
            </h2>
        </div>
    </div>

    <div class="bento-container">
        <div class="bento-card">
            <div class="icon">📝</div>
            <h3>1. Write Your Secret</h3>
            <p>Enter your sensitive information in the form above. Add an optional password for extra security.</p>
        </div>
        
        <div class="bento-card">
            <div class="icon">🔗</div>
            <h3>2. Get Your Link</h3>
            <p>We'll generate a unique, secure link that you can share with your intended recipient.</p>
        </div>
        
        <div class="bento-card">
            <div class="icon">👁️</div>
            <h3>3. Share & Access</h3>
            <p>Send the link to your recipient. They can view the secret once, then it's gone forever.</p>
        </div>
        
        <div class="bento-card">
            <div class="icon">🗑️</div>
            <h3>4. Auto-Cleanup</h3>
            <p>Secrets are automatically deleted after viewing or when they expire, ensuring your privacy.</p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Materialize components
    M.FormSelect.init(document.querySelectorAll('select'));
    M.CharacterCounter.init(document.querySelectorAll('textarea'));
    
    // Auto-resize textarea
    const textarea = document.getElementById('secret_text');
    textarea.addEventListener('input', function() {
        M.textareaAutoResize(this);
    });
});
</script>
@endsection
