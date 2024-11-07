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

        .total {
            text-align: right;
            font-weight: bold;
        }

        .header,
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Invoice</h1>
        <p>RFC: {{ $rfc }}</p>
    </div>

    <h2>Billing Address</h2>
    <p>{{ $address->street }}, #{{ $address->number }}</p>
    <p>{{ $address->neighborhood }}, Zip Code: {{ $address->zip_code }}</p>

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
            @php $total = 0; @endphp
            @foreach($cartItems as $item)
            @php $total += $item['subtotal']; @endphp

            <tr>
                <td>{{ $item['stock']['product']['name'] }}</td>
                <td>{{ $item['stock']['product']['description'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>${{ number_format($item['stock']['product']['price'], 2) }}</td>
                <td>${{ number_format($item['subtotal'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="total">Total: ${{ number_format($total, 2) }}</h3>

    <div class="footer">
        <p>Thank you for your purchase!</p>
    </div>
</body>

</html>
