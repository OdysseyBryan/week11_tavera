<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank of Odysseus - Secure Transfer</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0A1929 0%, #1a3a5c 100%);
            min-height: 100vh;
            color: #333;
        }
        .header {
            background: rgba(10, 25, 41, 0.95);
            padding: 20px 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #2E7D32, #4CAF50);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            font-weight: bold;
        }
        .brand-name {
            font-size: 28px;
            font-weight: 700;
            color: white;
            letter-spacing: 1px;
        }
        .brand-name span {
            color: #2E7D32;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .flash-success {
            background: #2E7D32;
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
            animation: slideIn 0.5s ease;
        }
        .flash-error {
            background: #c62828;
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .main-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .main-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 70px rgba(0,0,0,0.35);
        }
        .card-title {
            font-size: 24px;
            font-weight: 600;
            color: #0A1929;
            margin-bottom: 30px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .card-title::before {
            content: '🔒';
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group.full-width {
            grid-column: span 2;
        }
        label {
            display: block;
            font-weight: 500;
            color: #0A1929;
            margin-bottom: 8px;
            font-size: 14px;
        }
        input, select {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #2E7D32;
            box-shadow: 0 0 0 4px rgba(46, 125, 50, 0.15);
            background: white;
        }
        .calculator-box {
            background: linear-gradient(135deg, #0A1929, #1a3a5c);
            border-radius: 15px;
            padding: 25px;
            margin: 25px 0;
            color: white;
        }
        .calc-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
            color: #4CAF50;
        }
        .calc-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .calc-row:last-child {
            border-bottom: none;
            font-weight: 600;
            font-size: 18px;
            color: #4CAF50;
            margin-top: 10px;
        }
        .calc-label {
            color: rgba(255,255,255,0.8);
        }
        .calc-value {
            font-weight: 500;
        }
        .btn-group {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }
        .btn {
            flex: 1;
            padding: 16px 30px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background: linear-gradient(135deg, #2E7D32, #4CAF50);
            color: white;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(46, 125, 50, 0.4);
        }
        .btn-secondary {
            background: #e0e0e0;
            color: #666;
        }
        .btn-secondary:hover {
            background: #d0d0d0;
        }
        .transfers-section {
            margin-top: 40px;
        }
        .section-title {
            font-size: 22px;
            font-weight: 600;
            color: white;
            margin-bottom: 20px;
            text-align: center;
        }
        .transfer-list {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        .transfer-item {
            padding: 20px 25px;
            border-bottom: 1px solid #eee;
            transition: background 0.2s ease;
        }
        .transfer-item:hover {
            background: #f8f9fa;
        }
        .transfer-item:last-child {
            border-bottom: none;
        }
        .transfer-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .transfer-recipient {
            font-weight: 600;
            color: #0A1929;
        }
        .transfer-amount {
            font-weight: 700;
            color: #2E7D32;
            font-size: 18px;
        }
        .transfer-details {
            font-size: 13px;
            color: #666;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            background: #e8f5e9;
            color: #2E7D32;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            margin-left: 10px;
        }
        .bonus-section {
            margin-top: 40px;
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        .bonus-title {
            font-size: 20px;
            font-weight: 600;
            color: #0A1929;
            margin-bottom: 20px;
            text-align: center;
        }
        .xss-demo {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }
        .xss-box {
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .xss-unsafe {
            background: #ffebee;
            border: 2px solid #c62828;
        }
        .xss-safe {
            background: #e8f5e9;
            border: 2px solid #2E7D32;
        }
        .xss-label {
            font-weight: 600;
            margin-bottom: 15px;
            display: block;
        }
        .xss-unsafe .xss-label {
            color: #c62828;
        }
        .xss-safe .xss-label {
            color: #2E7D32;
        }
        .xss-test-input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            margin-bottom: 15px;
        }
        .xss-btn {
            padding: 10px 25px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .xss-unsafe .xss-btn {
            background: #c62828;
            color: white;
        }
        .xss-safe .xss-btn {
            background: #2E7D32;
            color: white;
        }
        .xss-btn:hover {
            transform: scale(1.05);
        }
        .explanation {
            margin-top: 25px;
            padding: 20px;
            background: #fff3e0;
            border-radius: 10px;
            border-left: 4px solid #ff9800;
        }
        .explanation h4 {
            color: #e65100;
            margin-bottom: 10px;
        }
        .explanation p {
            color: #555;
            font-size: 14px;
            line-height: 1.6;
        }
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }
        .empty-state::before {
            content: '📭';
            font-size: 48px;
            display: block;
            margin-bottom: 15px;
        }
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            .form-group.full-width {
                grid-column: span 1;
            }
            .xss-demo {
                grid-template-columns: 1fr;
            }
            .btn-group {
                flex-direction: column;
            }
            .main-card {
                padding: 25px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo-container">
            <div class="logo-icon">O</div>
            <h1 class="brand-name">Bank of <span>Odysseus</span></h1>
        </div>
    </header>

    <div class="container">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="flash-success">
                <?= esc(session()->getFlashdata('success'), 'html') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="flash-error">
                <?= esc(session()->getFlashdata('error'), 'html') ?>
            </div>
        <?php endif; ?>

        <div class="main-card">
            <h2 class="card-title">Secure Bank Transfer</h2>
            
            <form action="/transfer/submit" method="POST">
                <?= csrf_field() ?>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="recipient_name">Recipient Name</label>
                        <input type="text" id="recipient_name" name="recipient_name" required placeholder="Enter recipient name">
                    </div>

                    <div class="form-group">
                        <label for="account_number">Account Number</label>
                        <input type="text" id="account_number" name="account_number" required placeholder="Enter account number">
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" id="amount" name="amount" step="0.01" min="0.01" required placeholder="0.00">
                    </div>

                    <div class="form-group">
                        <label for="currency">Currency</label>
                        <select id="currency" name="currency" required>
                            <option value="USD">USD - US Dollar</option>
                            <option value="EUR">EUR - Euro</option>
                            <option value="GBP">GBP - British Pound</option>
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <div class="calculator-box">
                            <div class="calc-title">Transfer Calculator</div>
                            <div class="calc-row">
                                <span class="calc-label">Amount</span>
                                <span class="calc-value" id="calc-amount">$0.00</span>
                            </div>
                            <div class="calc-row">
                                <span class="calc-label">Exchange Rate</span>
                                <span class="calc-value" id="calc-rate">1 USD = 1.00</span>
                            </div>
                            <div class="calc-row">
                                <span class="calc-label">Fee (1%)</span>
                                <span class="calc-value" id="calc-fee">$0.00</span>
                            </div>
                            <div class="calc-row">
                                <span>Total</span>
                                <span id="calc-total">$0.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Send Transfer</button>
                    <button type="button" class="btn btn-secondary" onclick="resetForm()">Reset Form</button>
                </div>
            </form>
        </div>

        <div class="transfers-section">
            <h2 class="section-title">Recent Transfers</h2>
            
            <div class="transfer-list">
                <?php if (!empty($transfers)): ?>
                    <?php foreach ($transfers as $transfer): ?>
                        <div class="transfer-item">
                            <div class="transfer-header">
                                <span class="transfer-recipient">
                                    <?= esc($transfer['recipient_name'], 'html') ?>
                                </span>
                                <span class="transfer-amount">
                                    <?= esc($transfer['amount'], 'html') ?> <?= esc($transfer['currency'], 'html') ?>
                                    <span class="badge">XSS Protected</span>
                                </span>
                            </div>
                            <div class="transfer-details">
                                Account: <?= esc($transfer['account_number'], 'html') ?> | 
                                Date: <?= esc($transfer['created_at'], 'html') ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-state">
                        No transfers yet. Make your first secure transfer above!
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="bonus-section">
            <h2 class="bonus-title">XSS Vulnerability Demonstration</h2>
            
            <p style="text-align:center;margin-bottom:20px;color:#666;">Enter <strong><script>document.title='HACKED'</script></strong> in both inputs to see the difference!</p>
            
            <div class="xss-demo">
                <div class="xss-box xss-unsafe">
                    <span class="xss-label">❌ UNSAFE - Raw Input Display</span>
                    <input type="text" id="xss-input-unsafe" class="xss-test-input" placeholder="Enter JavaScript code...">
                    <button class="xss-btn" onclick="testUnsafeXSS()">Render</button>
                    <div id="unsafe-output" style="margin-top:15px;padding:15px;background:rgba(255,255,255,0.9);border-radius:8px;color:#333;min-height:50px;"></div>
                </div>
                
                <div class="xss-box xss-safe">
                    <span class="xss-label">✅ SAFE - With esc() Applied</span>
                    <input type="text" id="xss-input-safe" class="xss-test-input" placeholder="Enter JavaScript code...">
                    <button class="xss-btn" onclick="testSafeXSS()">Render</button>
                    <div id="safe-output" style="margin-top:15px;padding:15px;background:rgba(255,255,255,0.9);border-radius:8px;color:#333;min-height:50px;"></div>
                </div>
            </div>

            <div class="explanation">
                <h4>Understanding XSS Attacks</h4>
                <p><strong>UNSAFE (left):</strong> User input is displayed as-is without escaping. If someone enters <code><script>alert('xss')</script></code>, the browser executes it!</p>
                <p style="margin-top: 10px;"><strong>SAFE (right):</strong> Input is passed through <code>esc()</code> which converts HTML special characters to entities. <code><script></code> becomes <code>&lt;script&gt;</code>.</p>
                <p style="margin-top: 10px;"><strong>Bank of Odysseus ALWAYS uses esc()</strong> on every user-supplied field - this prevents XSS attacks!</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        var exchangeRates = {
            USD: { rate: 1.00, symbol: '$' },
            EUR: { rate: 1.20, symbol: '€' },
            GBP: { rate: 1.35, symbol: '£' }
        };
        var feePercent = 1;

        function calculateTransfer() {
            var amount = parseFloat(jQuery('#amount').val()) || 0;
            var currency = jQuery('#currency').val();
            var rate = exchangeRates[currency].rate;
            var symbol = exchangeRates[currency].symbol;
            var fee = amount * (feePercent / 100);
            var total = amount + fee;
            var convertedAmount = total * rate;

            jQuery('#calc-amount').text(symbol + amount.toFixed(2) + ' ' + currency);
            jQuery('#calc-rate').text('1 USD = ' + rate.toFixed(2) + ' ' + currency);
            jQuery('#calc-fee').text(symbol + fee.toFixed(2));
            jQuery('#calc-total').text(symbol + convertedAmount.toFixed(2) + ' ' + currency);
        }

        jQuery(document).ready(function() {
            jQuery('#amount').on('input keyup', function() {
                calculateTransfer();
            });
            jQuery('#currency').change(function() {
                calculateTransfer();
            });
            calculateTransfer();
        });

        function resetForm() {
            jQuery('#recipient_name').val('');
            jQuery('#account_number').val('');
            jQuery('#amount').val('');
            jQuery('#currency').val('USD');
            calculateTransfer();
        }

        function testUnsafeXSS() {
            var input = jQuery('#xss-input-unsafe').val();
            jQuery('#unsafe-output').html(input);
        }

        function testSafeXSS() {
            var input = jQuery('#xss-input-safe').val();
            var escaped = input.replace(/&/g, '&').replace(/</g, '<').replace(/>/g, '>').replace(/"/g, '"').replace(/'/g, '&#039;');
            jQuery('#safe-output').html(escaped);
        }
    </script>
</body>
</html>
