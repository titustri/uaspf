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
        <div class="row">
          <div class="col-5">
            <div class="input-group mb-3">
              <input
                type="text"
                class="form-control form-control-lg bg-light"
                placeholder="Masukkan Nama Pelanggan"
                id="txt-member"
              />
            </div>
          </div>
          <div class="col-7">
            <button type="button" class="btn btn-primary btn-lg" id="btn-cek">Cek</button>
          </div>
          <div class="col-12">
            <a href="/barang" class="btn btn-warning mx-auto">Tambah Barang</a>
          </div>
          <div class="col-12">
            <button class="btn btn-success" id="btn-bayar" style="width: 100px;">Bayar</button>
            <a href="/cancel/<?php echo $transaksi_id; ?>" class="btn btn-danger mx-auto" style="width: 100px;">Cancel</a>
          </div>
        </div>
      </div>
      
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
      let customer = {
        id: 1,
        nama: "Bukan Member"
      };
      $("#btn-cek").click(function(){
        $("#btn-cek").html('mengecek...').prop('disabled', true);
        var member = $("#txt-member").val();
        if(member == ""){
          Swal.fire('Peringatan', 'Nama pelanggan tidak boleh kosong', 'warning');
          $("#btn-cek").html('Cek').prop('disabled', false);
          return;
        }

        $.ajax({
          url: '/cek-member',
          type: 'POST',
          data: {member: member},
          dataType: 'json',
          complete: function(){
            $("#btn-cek").html('Cek').prop('disabled', false);
          },
          success: function(data){
            if(data.valid){
              customer = data.member
              Swal.fire('Berhasil', 'Member ditemukan', 'success');
            }else{
              $("#txt-member").val('');
              Swal.fire('Gagal', 'Member tidak ditemukan', 'error');
            }
          },
          error: function(){
            Swal.fire('Error', 'Terjadi kesalahan, silahkan coba lagi', 'error');
          }
        }); 
      });

      const totalBarang = <?= count($detail_transaksi) ?>;

      $("#btn-bayar").click(function(){
        if(totalBarang == 0){
          Swal.fire('Peringatan', 'Belum ada barang yang ditambahkan', 'warning');
          return;
        }

        Swal.fire({
          title: `Apakah anda yakin ingin memperoses transaksi ini dengan member ${customer.nama}?`,
          text: "Anda tidak dapat mengembalikan transaksi ini",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, bayar!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "/proses-bayar/<?php echo $transaksi_id; ?>/"+customer.id;
          }
        });
      });


    </script>
  </body>
</html>
