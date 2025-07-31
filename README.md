# One-Time Secret Link Generator

A modern Laravel 11 application to securely share sensitive information via one-time, self-destructing links. Paste your secret, optionally set a password and expiry, and generate a unique URL that can be viewed only once.

---

## Features

- **One-Time Secret Links:** Share secrets that can be viewed only once.
- **Password Protection:** Optionally require a password to view the secret.
- **Expiry Options:** Set expiry to 5 minutes, 1 hour, or 1 day (default).
- **Encryption:** Secrets are encrypted using Laravel’s `Crypt::encryptString()`.
- **Self-Destruct:** Link is invalid after first view or expiry.
- **No Authentication:** No sign-up or login required.
- **Modern UI:** Clean, animated, and responsive Material Design-inspired interface.
- **Scheduler:** Daily cleanup of expired or viewed secrets.

---

## Screenshots

> ![Create Secret](https://user-images.githubusercontent.com/placeholder/create-secret.png)
> ![View Secret](https://user-images.githubusercontent.com/placeholder/view-secret.png)

---

## Getting Started

### Prerequisites
- PHP 8.2+
- Composer
- MySQL (or compatible database)
- Node.js & npm (for asset compilation, optional)

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/developer-ashok/laravel-secret-link.git
   cd laravel-secret-link
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Copy and configure your environment:**
   ```bash
   cp .env.example .env
   # Edit .env and set your DB credentials (DB_DATABASE=laravel_secret_links, etc.)
   ```

4. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

5. **Run migrations:**
   ```bash
   php artisan migrate
   ```

6. **(Optional) Compile assets:**
   ```bash
   npm install && npm run build
   ```

7. **Start the development server:**
   ```bash
   php artisan serve
   # Visit http://localhost:8000
   ```

### Scheduler Setup
To enable daily cleanup of expired/viewed secrets, add this to your server's cron:

```
* * * * * cd /path/to/laravel-secret-link && php artisan schedule:run >> /dev/null 2>&1
```

---

## Usage

- Go to `/` to create a secret.
- Set your message, optional password, and expiry.
- Share the generated link. It can be viewed only once.
- If password-protected, the viewer must enter the password.
- After viewing or expiry, the link is destroyed.

---

## Contact

**Developer:** Ashok Chandrapal

- **Phone:** [+91 9033359874](tel:+919033359874)
- **Email:** [developer7039@gmail.com](mailto:developer7039@gmail.com)
- **GitHub:** [@developer-ashok](https://github.com/developer-ashok)
- **LinkedIn:** [ashok-chandrapal](https://www.linkedin.com/in/ashok-chandrapal/)

---

## Contributing

Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

---

## License

[MIT](LICENSE)
