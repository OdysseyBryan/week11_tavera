# Bank of Odysseus - Anti-Hacker Lab

## Overview

This is a **CodeIgniter 4** bank transfer simulation demonstrating **CSRF and XSS protection** as part of Week 11's cybersecurity lab. The application simulates a secure banking interface with real security features to help students understand web vulnerabilities and defenses.

## Features

- **Secure Bank Transfer Form** - Send money to recipients with dynamic currency conversion
- **CSRF Protection** - Global CSRF filter blocks unauthorized form submissions
- **XSS Protection** - All user input is escaped to prevent script injection
- **Interactive Calculator** - Real-time exchange rates and fee calculation
- **Bonus XSS Challenge** - Interactive demonstration of safe vs unsafe output

## Tech Stack

- **Framework:** CodeIgniter 4.7.3
- **Database:** MySQL (bank_of_odysseus)
- **Styling:** Custom CSS with Poppins font

## Installation

1. Install dependencies:
```bash
composer install
```

2. Create the database:
```bash
mysql -u root -e "CREATE DATABASE IF NOT EXISTS bank_of_odysseus;"
```

3. Run migrations:
```bash
php spark migrate
```

4. Start the server:
```bash
php spark serve
```

## How to Use This Lab

### 1. Start the Server
```bash
php spark serve
```

### 2. Access the Main Page
- **URL:** http://localhost:8080/transfer
- Fill in the transfer form with recipient name, account number, amount, and currency
- Click "Send Transfer" to submit

### 3. Test CSRF Protection
- **Normal submission:** Works fine - form includes CSRF token
- **CSRF attack simulation:** Open `http://localhost:8080/attacker.html`
- **Result:** Returns **403 Forbidden** (proving CSRF protection works!)

### 4. Test XSS Protection
- Enter in any field: `<script>alert('XSS')</script>`
- **Result:** Displays as plain text, NOT executed (thanks to `esc()`)

### 5. Bonus Challenge - XSS Title Hacker
- Scroll to the "XSS Title Hacker Challenge" section
- Enter `<script>document.title='HACKED'</script>` in both test boxes
- **Left side (unsafe):** Without `esc()` - changes your browser tab title
- **Right side (safe):** With `esc()` - displays the script as plain text

## Project Structure

```
week11_tavera/
├── app/
│   ├── Config/
│   │   ├── Filters.php       # CSRF global filter enabled
│   │   ├── Routes.php     # Application routes
│   │   └── Database.php  # MySQL connection
│   ├── Controllers/
│   │   └── Transfer.php  # Transfer controller
│   ├── Models/
│   │   └── TransferModel.php  # Transfer model
│   ├── Views/
│   │   └── transfer/
│   │       └── index.php  # Main transfer view
│   └── Database/
│       └── Migrations/
│           └── 2026-05-29-142450_CreateTransfersTable.php
├── public/
│   └── attacker.html     # CSRF attack simulation page
└── README.md
```

## Security Implemented

### CSRF Protection
- Enabled globally in `app/Config/Filters.php`:
```php
public array $globals = [
    'before' => [
        'csrf',
    ],
    ...
];
```
- Form includes `<?= csrf_field() ?>` helper

### XSS Protection
- All user output escaped with `esc($data, 'html')`
- Prevents script execution from user input

## Screenshots

The application features:
- Modern banking interface with navy (#0A1929) and green (#2E7D32) theme
- Dynamic transfer calculator with exchange rates
- Recent transfers list with XSS protection badges
- Interactive XSS challenge demonstration

## License

MIT License - Created as educational material for Week 11 Cybersecurity Lab.