<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Durian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
        <h1 class="my-3">Invoice</h1>

        <h3>Detail Pesanan</h3>
        
        <div class="card" style="width: 18rem;">
            <table>
                <tr>
                    <td>Name</td>
                    <td>{{ $order->name }}</td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>{{ $order->phone }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $order->address }}</td>
                </tr>
                <tr>
                    <td>Qty</td>
                    <td>{{ $order->qty }}</td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td>{{ $order->total_price }}</td>
                </tr>
                <tr>
                    <td>Status Pembayaran</td>
                    <td>{{ $order->status }}</td>
                </tr>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>