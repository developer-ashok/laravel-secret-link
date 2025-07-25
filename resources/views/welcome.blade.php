<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One-Time Secret Link Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="display-4 fw-bold mb-3">One-Time Secret Link Generator</h1>
            <p class="lead mb-4">
                Securely share sensitive information with a single-use, self-destructing link.<br>
                Paste your secret message, optionally set a password and expiry time, and generate a one-time-use URL.<br>
                Once accessed, the secret is viewable only once and then becomes invalid forever.
            </p>
            <ul class="list-group list-group-flush mb-4 text-start mx-auto" style="max-width: 500px;">
                <li class="list-group-item">🔒 <strong>Encrypted:</strong> Secrets are encrypted and never stored in plain text.</li>
                <li class="list-group-item">🕒 <strong>Expiry:</strong> Choose expiry: 5 minutes, 1 hour, or 1 day (default).</li>
                <li class="list-group-item">🔑 <strong>Password Protection:</strong> Optionally require a password to view the secret.</li>
                <li class="list-group-item">🗑️ <strong>One-Time Access:</strong> Link self-destructs after first view or expiry.</li>
                <li class="list-group-item">🚫 <strong>No Account Needed:</strong> No sign-up or login required.</li>
            </ul>
            <a href="/" class="btn btn-primary btn-lg px-5">Create a Secret</a>
        </div>
        <footer class="mt-auto py-4 text-center w-100 text-muted small">
            &copy; {{ date('Y') }} One-Time Secret Link Generator &middot; Built with Laravel 11 &amp; Bootstrap 5
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
