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
      <section class="table__body" style="height: 75%;">
        <table>
          <thead>
            <tr>
              <th>Id</th>
              <th>tanggal Beli</th>
              <th>Nama</th>
              <th>Total Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              function rupiah($angka){
	              $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	              return $hasil_rupiah;
              }
            ?>
            <?php foreach($transaksi as $data) : ?>
            <tr>
              <td><?php echo $data['transaksi_id'] ?></td>
              <td><?php echo $data['created_at'] ?></td>
              <td><?php echo $data['nama_customer'] ?></td>
              <td><strong><?php echo rupiah($data['total_harga']) ?></strong></td>
              <td>
                <button class="btn btn-warning">Lihat</button>
                <button class="btn mx-2 btn-danger">Hapus</button>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </section>
      <br><div class="bottom-button">
          <button class="btn btn-success mx-auto"><a href="/addtransaksi" style="color: inherit; text-decoration: inherit;">Tambah Transaksi</a></button>
      </div>
    </main>
  </body>
</html>
