@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 3rem;">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card glass-card z-depth-3" style="position:relative;overflow:hidden;">
                <i class="material-icons" style="position:absolute;opacity:0.07;font-size:10rem;left:-20px;top:-20px;pointer-events:none;">check_circle</i>
                <div class="card-content center-align">
                    <span class="card-title green-text text-darken-2" style="font-weight:700;letter-spacing:1px;"><i class="material-icons left">check_circle</i>Your One-Time Secret Link</span>
                    <p class="grey-text mb-4">Share this link securely. It can be viewed only <b>once</b> and will expire after the set time or after being viewed.</p>
                    <div class="input-field" style="margin-top:2rem;">
                        <input type="text" id="secret-link" value="{{ $link }}" readonly class="validate center-align" style="font-size:1.1rem;background:rgba(255,255,255,0.7);border-radius:1rem;">
                        <label for="secret-link" class="active">Secret Link</label>
                        <button type="button" id="copy-btn" class="btn-floating btn-large waves-effect waves-light blue tooltipped" data-tooltip="Copy" style="position:absolute;right:10px;top:10px;transition:transform 0.2s;" onmouseover="this.style.transform='scale(1.15)'" onmouseout="this.style.transform='scale(1)'">
                            <i class="material-icons">content_copy</i>
                        </button>
                        <span id="copy-feedback" style="display:none;color:#388e3c;font-weight:500;margin-top:0.5rem;">Copied!</span>
                    </div>
                    <a href="/" class="btn-flat blue-text text-darken-2 waves-effect waves-blue">Create another secret</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var copyBtn = document.getElementById('copy-btn');
    var secretInput = document.getElementById('secret-link');
    var feedback = document.getElementById('copy-feedback');
    if(copyBtn && secretInput && feedback) {
        copyBtn.addEventListener('click', function() {
            secretInput.select();
            secretInput.setSelectionRange(0, 99999); // For mobile
            try {
                var successful = document.execCommand('copy');
                if (!successful && navigator.clipboard) {
                    navigator.clipboard.writeText(secretInput.value);
                }
            } catch (err) {
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(secretInput.value);
                }
            }
            feedback.style.display = 'inline-block';
            setTimeout(function() { feedback.style.display = 'none'; }, 1200);
        });
    }
});
</script>
@endsection
