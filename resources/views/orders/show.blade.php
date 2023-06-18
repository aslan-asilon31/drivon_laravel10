<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
    <title>Toko Durian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
        <h1 class="my-3">Detail Pesanan</h1>
        
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('assets/img/durian.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Durian Lokal</h5>
              <p class="card-text">Durian lokal, rasanya manis dan ada pait-paitnya, dijamin weeeenak.</p>
            </div>
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
            </table>
            <button class="mt-3 btn btn-success" id="pay-button">Bayar Sekarang</button>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
              /* You may add your own implementation here */
              alert("payment success!"); console.log(result);
            },
            onPending: function(result){
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function(result){
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function(){
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          })
        });
    </script>
  </body>
</html>