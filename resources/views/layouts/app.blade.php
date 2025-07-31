<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One-Time Secret Link Generator</title>
    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="header-nav">
        <div class="nav-wrapper container" style="display:flex;align-items:center;min-height:80px;gap:1.5rem;">
            <span class="header-lock">
                <svg width="32" height="32" fill="none" viewBox="0 0 24 24"><rect width="24" height="24" fill="none"/><path d="M7 10V7a5 5 0 0 1 10 0v3" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><rect x="5" y="10" width="14" height="10" rx="2" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="16" r="1.5" fill="#fff"/></svg>
            </span>
            <div style="display:flex;flex-direction:column;flex:1;min-width:0;">
                <span class="brand-logo">Secret Link Generator</span>
                <span class="header-tagline">Share secrets securely, one time only.</span>
            </div>
        </div>
    </nav>
    
    <main class="fadein-main">
        @yield('content')
    </main>
    
    
    <!-- Floating Contact Button -->
    <button class="btn-floating btn-large fab-contact tooltipped" data-tooltip="Contact" onclick="openContactModal()">
        <i class="material-icons">contact_support</i>
    </button>
    
    <!-- Contact Modal -->
    <div id="contactModal" class="modal contact-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Contact Developer</h4>
                <span class="close" onclick="closeContactModal()">&times;</span>
            </div>
            <div class="modal-body">
                <div class="contact-item">
                    <i class="material-icons">person</i>
                    <span>Ashok Chandrapal</span>
                </div>
                <div class="contact-item phone">
                    <i class="material-icons">phone</i>
                    <a href="tel:+919033359874">+91 9033359874</a>
                </div>
                <div class="contact-item email">
                    <i class="material-icons">email</i>
                    <a href="mailto:developer7039@gmail.com">developer7039@gmail.com</a>
                </div>
                <div class="contact-item github">
                    <i class="material-icons">code</i>
                    <a href="https://github.com/developer-ashok" target="_blank">GitHub</a>
                </div>
                <div class="contact-item linkedin">
                    <i class="material-icons">work</i>
                    <a href="https://www.linkedin.com/in/ashok-chandrapal/" target="_blank">LinkedIn</a>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer page-footer">
        <div class="container center-align">
            &copy; {{ date('Y') }} One-Time Secret Link Generator &middot; Crafted with <i class="material-icons tiny red-text">favorite</i> by Open Source
        </div>
    </footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>document.addEventListener('DOMContentLoaded', function() { M.AutoInit(); });</script>
    <script>
        function openContactModal() {
            document.getElementById('contactModal').style.display = 'block';
        }
        
        function closeContactModal() {
            document.getElementById('contactModal').style.display = 'none';
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            var modal = document.getElementById('contactModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html> 