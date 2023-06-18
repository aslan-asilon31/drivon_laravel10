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
        <h1 class="my-3">Toko Durian</h1>
        
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('assets/img/durian.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Durian Lokal <span class="badge bg-success">Rp. 100.000</span </h5>
              <p class="card-text">Durian lokal, rasanya manis dan ada pait-paitnya, dijamin weeeenak.</p>
              <form action="/checkout" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="qty" class="form-label">Mau Pesan Berapa ?</label>
                    <input type="number" name="qty" class="form-control" id="qty" placeholder="Jumlah yang dipesan">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pelanggan</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukan Nama Anda">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No Telp</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Masukan No HP">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea name="address" class="form-control" id="address" placeholder="Masukan Alamat"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Checkout</button>
              </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>