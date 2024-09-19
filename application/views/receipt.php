<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .receipt {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 0; 
        }

        .header p {
            margin-top: 5px;
        }

        .header .receipt-number {
            overflow: auto;
            margin: 10px;
        }

        .header .receipt-number h1,
        .header .receipt-number span {
            display: inline-block;
            margin: 0;
        }

        .details {
            margin-bottom: 15px;
        }

        .input-fields {
            margin-bottom: 20px;
        }

        .underline-input {
            border: none;
            border-bottom: 1px solid #000;
            outline: none;
            width: 100%;
        }

        .date-input {
            border: none;
            border-bottom: 1px solid #000;
            outline: none;
            width: 100%;
        }

        .footer {
            margin-top: 20px;
        }

        .footer span {
            display: block;
            margin-bottom: 5px;
        }

        .signature-container {
            text-align: right;
        }

        .signature {
            border: none;
            border-bottom: 1px solid #000;
            outline: none;
            padding: 5px;
            width: 100%;
        }

        @media (min-width: 768px) {
            .underline-input,
            .date-input,
            .signature {
                width: 80%;
            }
        }
    </style>
</head>
<body>

<div class="receipt">
    <div class="header">
        <h1>OBAFEMI -OWODE LOCAL GOVERNMENT OWODE EGBA, OGUN STATE</h1>
        <p>IN CONJUNCTION WITH AMIKABLEKUNLE VENTURES</p>
        <div class="receipt-number">
            <h1>REVENUE RECEIPT</h1>
            <span>No: 0000358</span>
        </div>
    </div>

    <div class="details">
        <div class="input-fields">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required class="date-input">
        </div>

        <div class="input-fields">
            <label for="username">Received from:</label>
            <input type="text" id="username" name="username" required class="underline-input">
        </div>

        <div class="input-fields">
            <label for="amount">the sum of:</label>
            <input type="text" id="amount" name="amount" required class="underline-input" oninput="formatAmount(this)" />
        </div>

        <div class="input-fields">
            <label for="purpose">on account of:</label>
            <input type="text" id="purpose" name="purpose" required class="underline-input"/>
        </div>
    </div>

    <div class="signature-container">
        <input type="text" id="signature" name="signature" required class="underline-input signature"/>
        <div class="footer">
            <span>Signature of Cashier/Revenue Collector</span>
        </div>
    </div>

    <span>OGPC 11</span>
</div>

<script type="text/javascript">
    function formatAmount(input) {
        let value = input.value.replace(/[^0-9]/g, '');
        value = new Intl.NumberFormat().format(value);
        input.value = value;
    }
</script>

</body>
</html>
