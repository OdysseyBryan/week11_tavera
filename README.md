# Bank of Odysseus - CSRF & XSS Protection Lab

A CodeIgniter 4 banking application demonstrating CSRF protection and XSS prevention techniques.

## Features

- Secure bank transfer form with CSRF protection
- Real-time transfer calculator (exchange rates + 1% fee)
- XSS vulnerability demonstration (bonus challenge)
- MySQL database storage
- Responsive design with Poppins typography

## Setup

```bash
composer install
php spark migrate
php spark serve
```

## Testing Instructions

### 1. Normal Transfer
1. Visit http://localhost:8080/transfer
2. Fill in: Recipient Name, Account Number, Amount, Currency
3. Click "Send Transfer"
4. See entry appear in Recent Transfers list

### 2. CSRF Protection Test
1. Visit http://localhost:8080/attacker.html
2. Should see "403 BLOCKED - CSRF WORKING!"
3. The hidden form auto-submits without CSRF token
4. Server rejects with 403 Forbidden

### 3. XSS Bonus Challenge
1. Visit http://localhost:8080/transfer
2. Scroll to "XSS Vulnerability Demonstration"
3. Enter `<script>document.title='HACKED'</script>` in BOTH inputs
4. Click "Render" on each side
5. LEFT: Tab title changes to "HACKED" (vulnerable!)
6. RIGHT: Shows escaped text as plain HTML

### 4. Valid Transfer Display
All transfers in the list use `esc()` - XSS scripts are neutralized.

## Screenshot Checklist

- [ ] Folder structure (app/Controllers, app/Models, app/Views, public/attacker.html)
- [ ] Main transfer page with calculator
- [ ] CSRF 403 error on attacker page
- [ ] XSS bonus challenge showing both outputs
- [ ] Successful transfer in list (with badge)
- [ ] GitHub repo: https://github.com/OdysseyBryan/week11_tavera

## Tech Stack

- CodeIgniter 4
- MySQL
- jQuery (for dynamic calculator)
- Google Fonts (Poppins)

## Security

- CSRF globally enabled in `app/Config/Filters.php`
- All user inputs escaped with `esc($data, 'html')`
- Form includes `<?= csrf_field() ?>`