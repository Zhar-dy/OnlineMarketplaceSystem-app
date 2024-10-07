<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4CAF50;
            padding: 10px;
            color: white;
            text-align: center;
        }
        .header h1 {
            margin: 0;
        }
        .content {
            padding: 20px;
            line-height: 1.6;
        }
        .content h2 {
            color: #333;
        }
        .content p {
            color: #555;
        }
        .payment-details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .payment-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .payment-details th, .payment-details td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .payment-details th {
            background-color: #4CAF50;
            color: white;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Payment Receipt</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <h2>Hello, {{$order->user->name}}</h2>
            <p>Thank you for your payment. Here are the details of your transaction:</p>

            <!-- Payment Details -->
            <div class="payment-details">
                <table>
                    <tr>
                        <th>Payment ID</th>
                        <td>{{$order->payment->id}}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{$order->payment->payment_date}}</td>
                    </tr>
                    <tr>
                        <th>Payment Method</th>
                        <td>{{$order->payment->payment_method}}</td>
                    </tr>
                </table>
            </div>

            <p>If you have any questions, feel free to contact us.</p>

            <p>Best regards,<br>onlinemarket</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2024 Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
