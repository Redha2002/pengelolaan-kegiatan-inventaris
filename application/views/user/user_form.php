<!doctype html>
<html>
<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-U5A7wkzVE5fqk+uRO6E3Aqo9xXTZbiIGr4C3QJnySzn8pHPEo8pPjSpRL/JKGnBRC9cPUnwXNmmj/iW7KYwLQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-cancel {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card shadow">
                    <div class="card-header bg-danger text-white">
                        <h5 class="m-0 font-weight-bold">USER LIST</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $action; ?>" method="post">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="nippos">NIPPOS</label>
                                <input type="text" class="form-control" name="nippos" id="nippos" placeholder="NIPPOS" value="<?php echo $nippos; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="hak_akses">Hak Akses</label>
                                <select class="custom-select" name="hak_akses">
                                    <option value="1" <?php echo ($hak_akses == 1) ? 'selected' : ''; ?>>Pemohon</option>
                                    <option value="2" <?php echo ($hak_akses == 2) ? 'selected' : ''; ?>>Admin</option>
                                    <option value="3" <?php echo ($hak_akses == 3) ? 'selected' : ''; ?>>Vice President</option>
                                </select>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('user') ?>" class="btn btn-danger btn-cancel"><i class="fas fa-times-circle"></i> Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
  function showSuccessMessage() {
      let nama_lengkap = document.getElementById('nama_lengkap').value;
      let username = document.getElementById('username').value;
      let password = document.getElementById('password').value;

      if (nama_lengkap === "" || username === "" || password === ""  ) {
         // Jika ada input yang belum diisi, tampilkan pesan error
         alert("Harap isi semua input terlebih dahulu!");
      } else {
         alert("Create User Berhasil!");
      }
}


</script>