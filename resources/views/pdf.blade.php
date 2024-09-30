<h1>Payments</h1>

<table>
    <tr>
        <th>Buyer Name</th>
        <th>Product Name</th>
        <th>Payment Status</th>
        <th>Order Status</th>
    </tr>
    <tr>
        <td>{{ $payment->order->user->name }}</td>
        <td>{{ $payment->order->product->name }}</td>
        <td>{{ $payment->payment_status }}</td>
        <td>{{ $payment->order->status }}</td>
    </tr>
</table>
