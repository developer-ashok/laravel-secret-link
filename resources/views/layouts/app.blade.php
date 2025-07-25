<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One-Time Secret Link Generator</title>
    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: #e3f0fc;
            font-family: 'Montserrat', sans-serif;
        }
        .brand-logo {
            font-weight: 700;
            letter-spacing: 1px;
            font-family: 'Montserrat', sans-serif;
            position: relative;
            display: inline-block;
        }
        .brand-logo::after {
            content: '';
            display: block;
            width: 100%;
            height: 3px;
            background: #1976d2;
            border-radius: 2px;
            position: absolute;
            left: 0;
            bottom: -6px;
            transform: scaleX(0);
            transition: transform 0.3s cubic-bezier(.4,0,.2,1);
        }
        .brand-logo:hover::after {
            transform: scaleX(1);
        }
        .hero-img {
            max-width: 340px;
            width: 90vw;
            margin: 2.5rem auto 1.5rem auto;
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px 0 rgba(25, 118, 210, 0.10);
            display: block;
            opacity: 0;
            animation: fadeIn 1.2s 0.1s forwards;
        }
        .fadein-main {
            opacity: 0;
            animation: fadeIn 1.2s 0.3s forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: none; }
        }
        .glass-card, .card {
            background: #fff !important;
            border-radius: 20px;
            box-shadow: 0 4px 24px 0 rgba(25, 118, 210, 0.08);
            border: none;
            transition: transform 0.2s cubic-bezier(.4,0,.2,1), box-shadow 0.2s;
        }
        .glass-card:hover, .card:hover {
            transform: scale(1.025);
            box-shadow: 0 8px 32px 0 rgba(25, 118, 210, 0.16);
        }
        .fab-create {
            position: fixed;
            bottom: 32px;
            right: 32px;
            z-index: 1000;
            background: #1976d2 !important;
            color: #fff !important;
            box-shadow: 0 4px 16px 0 rgba(25, 118, 210, 0.18);
            border-radius: 50%;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .fab-create:hover {
            box-shadow: 0 8px 32px 0 rgba(25,118,210,0.25);
            transform: scale(1.08);
        }
        .footer {
            background: transparent;
            color: #1976d2;
            font-size: 1rem;
            letter-spacing: 1px;
            margin-top: 3rem;
            padding-bottom: 2rem;
        }
        @keyframes slideInTagline {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: none; }
        }
        .header-nav {
            transition: box-shadow 0.2s, background 0.2s;
        }
        @media (max-width: 600px) {
            .header-nav .nav-wrapper {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 0.5rem;
                min-height: 100px !important;
            }
            .header-lock {
                margin: 0 0 0.5rem 0 !important;
            }
            .header-tagline {
                font-size: 0.98rem !important;
                margin-top: 0.3rem !important;
                white-space: normal !important;
            }
        }
        @keyframes fadeInHeader {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: none; }
        }
    </style>
</head>
<body>
    <nav class="header-nav" style="background:#e3f0fc; border-bottom:2px solid #1976d2; min-height:80px; box-shadow:0 2px 12px 0 rgba(25,118,210,0.06); animation:fadeInHeader 1.1s 0.1s both;">
        <div class="nav-wrapper container" style="display:flex;align-items:center;min-height:80px;gap:1.5rem;">
            <span class="header-lock" style="display:flex;align-items:center;justify-content:center;width:54px;height:54px;background:#1976d2;border-radius:50%;margin-right:1rem;box-shadow:0 2px 8px #1976d233;">
                <svg width="32" height="32" fill="none" viewBox="0 0 24 24"><rect width="24" height="24" fill="none"/><path d="M7 10V7a5 5 0 0 1 10 0v3" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><rect x="5" y="10" width="14" height="10" rx="2" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="16" r="1.5" fill="#fff"/></svg>
            </span>
            <div style="display:flex;flex-direction:column;flex:1;min-width:0;">
                <span class="brand-logo" style="font-size:2rem;font-weight:800;letter-spacing:2px;color:#1976d2;line-height:1.1;">Secret Link Generator</span>
                <span class="header-tagline" style="font-size:1.08rem;color:#1976d2b3;font-weight:500;margin-top:2px;letter-spacing:1px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Share secrets securely, one time only.</span>
            </div>
        </div>
    </nav>
    <main class="fadein-main">
        @yield('content')
    </main>
    <a href="/" class="btn-floating btn-large blue darken-2 fab-create tooltipped" data-tooltip="Create Secret"><i class="material-icons">add</i></a>
    <footer class="footer page-footer mt-5">
        <div class="container center-align">
            &copy; {{ date('Y') }} One-Time Secret Link Generator &middot; Crafted with <i class="material-icons tiny red-text">favorite</i> by Open Source
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>document.addEventListener('DOMContentLoaded', function() { M.AutoInit(); });</script>
</body>
</html> 