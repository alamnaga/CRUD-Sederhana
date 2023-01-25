<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
  $nama_produk = $_POST['nama_produk'];
  $keterangan = $_POST['keterangan'];
  $harga = $_POST['harga'];
  $jumlah = $_POST['jumlah'];


  $sql = "INSERT INTO `produk`(`id`, `nama_produk`, `keterangan`, `harga`, `jumlah`) VALUES (NULL,'$nama_produk','$keterangan','$harga','$jumlah')";

  $result = mysqli_query($conn, $sql);

  session_start();
  if ($result) {
    $_SESSION['msg'] = "Data sukses ditambahkan";
    header("Location: index.php");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD Sederhana</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <nav class="navbar justify-content-center fs-3 mb-5" style="color: #3088c8; border: 1px solid #3088c8;">CRUD SEDERHANA</nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3 style="color: #3088c8;">Tambah Data</h3>
      <p class="text-muted">Isi Form dibawah ini</p>
    </div>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width: 50vw; min-width:300px;">
        <div class="form-group">
          <label class="form-label" style="color: #3088c8;">Nama Produk</label>
          <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan nama produk">
        </div>
        <div class="form-group mt-2">
          <label class="form-label" style="color: #3088c8;">Keterangan</label>
          <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
        </div>
        <div class="form-group mt-2">
          <label class="form-label" style="color: #3088c8;">Harga</label>
          <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan harga produk">
        </div>
        <div class="form-group mt-2">
          <label class="form-label" style="color: #3088c8;">Jumlah</label>
          <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah produk">
        </div>

        <div>
          <button type="submit" name="submit" class="btn btn-primary mt-4">Save</button>
          <a href="index.php" class="btn btn-danger mt-4">Cancel</a>
        </div>

      </form>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>