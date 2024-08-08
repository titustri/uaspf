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
              <th>Id</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
          <?php 
              function rupiah($angka){
	              $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	              return $hasil_rupiah;
              }
              $id = 1;
            ?>
            <?php foreach($detail_transaksi as $data) : ?>
            <tr>
              <td><?php echo $id; $id++;?></td>
              <td><?php echo $data['nama'] ?></td>
              <td><?php echo rupiah($data['harga']) ?></td>
              <td><?php echo $data['jumlah_satuan'] ?></td>
              <td><strong><?php echo rupiah($data['total_harga']) ?></strong></td>
            </tr>
            <?php endforeach ?>
          </tbody>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><strong>TOTAL</strong></td>
              <td><strong><strong><?php echo rupiah($total_transaksi) ?></strong></td>
            </tr>
          </tbody>
        </table>
      </section>
      <div class="bottom-button">
        <div class="input-group mb-3">
          <input
            type="text"
            class="form-control form-control-lg bg-light"
            placeholder="Masukkan Nama Pelanggan"
          />
      </div>

      <button class="btn btn-warning mx-auto"><a href="/barang" style="color: inherit; text-decoration: inherit;">Tambah Barang</a></button>
      <form action="/bayar" method="POST">
        <input type="hidden" name="id" id="id" value="<?php echo $transaksi_id; ?>">
        <button type="submit" class="btn btn-success" style="color: black;">Bayar</button>
      </form>
      <form action="/cancel" method="POST">
      <input type="hidden" name="id" id="id" value="<?php echo $transaksi_id; ?>">
      <button class="btn btn-danger mx-auto">Cancel</button>
      </form>
      </div>
      
    </main>
  </body>
</html>
