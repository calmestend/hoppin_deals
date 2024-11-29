<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .total,
        .subtotal,
        .iva {
            text-align: right;
            font-weight: bold;
        }

        .header,
        .footer {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Invoice</h1>
        <p><strong>Issuer:</strong> {{ $issuer['name'] }} - RFC: {{ $issuer['rfc'] }}</p>
        <p><strong>Receiver:</strong> Name: {{$receiver['name']}} - RFC: {{ $receiver['rfc'] }}</p>
    </div>

    <h2>Billing Address</h2>
    <p>{{ $receiver['address']->street }}, #{{ $receiver['address']->number }}</p>
    <p>{{ $receiver['address']->neighborhood }}, Zip Code: {{ $receiver['address']->zip_code }}</p>

    <h2>Items</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            @php
            $itemSubtotal = $item['stock']['product']['price'] * $item['quantity'];
            @endphp

            <tr>
                <td>{{ $item['stock']['product']['name'] }}</td>
                <td>{{ $item['stock']['product']['description'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>${{ number_format($item['stock']['product']['price'], 2) }}</td>
                <td>${{ number_format($itemSubtotal, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="subtotal">Subtotal (without VAT): ${{ number_format($subtotal, 2) }}</h3>
    <h3 class="iva">VAT (16%): ${{ number_format($iva, 2) }}</h3>
    <h3 class="total">Total (with VAT): ${{ number_format($total, 2) }}</h3>

    <div class="qr-code">
        <img src="https://api.qrserver.com/v1/create-qr-code/?data=Invoice%20of%20{{ $total }}&size=150x150"
            alt="QR Code">
    </div>

    <div class="footer">
        <p>Thank you for your purchase!</p>
    </div>
</body>

</html>
