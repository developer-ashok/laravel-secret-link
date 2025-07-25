@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 3rem;">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card glass-card z-depth-3" style="position:relative;overflow:hidden;">
                <i class="material-icons" style="position:absolute;opacity:0.07;font-size:10rem;right:-20px;top:-20px;pointer-events:none;">error_outline</i>
                <div class="card-content center-align">
                    <span class="card-title red-text text-darken-2" style="font-weight:700;letter-spacing:1px;"><i class="material-icons left">error_outline</i>Secret Unavailable</span>
                    <p class="grey-text mb-4" style="font-size:1.1rem;">This secret link has either already been viewed or has expired.</p>
                    <a href="/" class="btn-large waves-effect waves-light blue darken-2 z-depth-1" style="border-radius:2rem;font-weight:600;letter-spacing:1px;">Create a new secret</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
