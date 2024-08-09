<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sistem Informasi Supermarket</title>
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <main class="table" id="customers_table">
      <section class="table__header">
        <h1>List Transaksi</h1>
      </section>
      <section class="table__body" style="height: 70%;">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($detail_transaksi as $i => $data) : ?>
            <tr>
              <td><?php echo $i+1 ?></td>
              <td><?php echo $data['nama'] ?></td>
              <td><?php echo number_format($data['harga'],2,',','.') ?></td>
              <td><?php echo $data['jumlah_satuan'] ?></td>
              <td><strong><?php echo number_format($data['total_harga'],2,',','.') ?></strong></td>
            </tr>
            <?php endforeach ?>
          </tbody>
          <tbody>
            <tr>
              <td colspan="3"></td>
              <td><strong>TOTAL</strong></td>
              <td><strong><strong><?php echo "Rp " . number_format($transaksi['total_transaksi'],2,',','.') ?></strong></td>
            </tr>
          </tbody>
        </table>
      </section>
      <div class="bottom-button">
        <div class="input-group mb-3">
          <input
            type="text"
            class="form-control form-control-lg bg-light"
            value="<?= $customer['nama_customer'] ?>"
          />
        </div>
        <div class="row">
          <div class="button">
            <a href="/" class="btn btn-primary">Kembali</a>
          </div>
        </div>
      </div>
      
    </main>
  </body>
</html>
