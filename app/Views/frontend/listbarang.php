<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List Barang</title>
    <link rel="stylesheet" href="/style/style.css" />
  </head>
  <body>
    <div class="container" style="width: 30%;">
      <h1 class="heading">List Barang</h1>
      <?php 
              function rupiah($angka){
	              $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	              return $hasil_rupiah;
              }
            ?>
      <div class="row">
      <?php foreach($barang as $data) : ?>
        <form action="addtransaksi" method="POST">
      <input type="hidden" id="barangid" name="barangid" value=<?php echo $data['barang_id'] ?>>
      <div class=col-sm>  
      <div class="box-container" style="padding-bottom: 10px">
        <div class="box">
        <img src="/asset/image/<?php echo $data['gambar'] ?>" alt="" />

          <h3><?php echo $data['nama'] ?></h3>
          <p>
            Harga <?php echo rupiah($data['harga']) ?>
          </p>
          jumlah : <input style="width: 10%; text-align: center;" type="number" name="jumlah" id="jumlah" placeholder="0" value="0"><br>
          <button class="btn" type="submit">Tambahkan</button>
        </div>
      </div>
      </div>
      </form>
      <?php endforeach ?>
      
      </div>
    </div>
  </body>
</html>
