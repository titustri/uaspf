<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./style/style.css" />
    <title>Sistem Informasi Supermarket</title>
  </head>
  <body>
    <!----------------------- Main Container -------------------------->
    <div
      class="container d-flex justify-content-center align-items-center min-vh-100"
    >
      <!----------------------- Login Container -------------------------->
      <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <!--------------------------- Left Box ----------------------------->
        <div
          class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
          style="background-image: url(/asset/login-cover.jpg)"
        >
          <p class="text-white fs-2" style="background-color: black">
            Sistem Informasi Supermarket
          </p>
        </div>
        <!-------------------- ------ Right Box ---------------------------->

        <div class="col-md-6 right-box">
          <div class="row align-items-center">
            <div class="header-text mb-4">
              <h2>Masuk Kasir</h2>
              <p>Untuk akses semua fitur</p>
            </div>
            <form action="<?= base_url('proses-login'); ?>" method="post" id="form-login">
            <div class="input-group mb-3">
              <input
                type="text"
                class="form-control form-control-lg bg-light fs-6"
                placeholder="Username"
                name="username"
              />
            </div>
            <div class="input-group mb-1">
              <input
                type="password"
                class="form-control form-control-lg bg-light fs-6"
                placeholder="Password"
                name="password"
              />
            </div>
            <div class="input-group mb-5 d-flex justify-content-between">
            </div>
            <div class="input-group mb-3">
              <button class="btn btn-lg btn-primary w-100 fs-6" type="submit" id="btn-login">Masuk</button>
            </div>
            </form>
            <div class="input-group mb-3"></div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
    $("#form-login").submit(function (e) {
      e.preventDefault();
      $("#btn-login").prop('disabled', true);

      jQuery.ajax({
        url: $("#form-login").attr('action'),
        type: $("#form-login").attr('method'),
        data: $("#form-login").serialize(),
        dataType: 'json',
        complete: function(xhr, textStatus) {
          $("#btn-login").prop('disabled', false);
        },
        success: function(data, textStatus, xhr) {
          if (data.success) {
            window.location.href = '<?= base_url('dashboard'); ?>';
          } else {
            Swal.fire('Gagal', data.message, 'error');

          }
        },
        error: function(xhr, textStatus, errorThrown) {
          Swal.fire('Gagal', 'Terjadi kesalahan pada server, silahkan coba lagi', 'error');
          console.log(textStatus);
        }
      });
      
    });
    </script>
  </body>
</html>

