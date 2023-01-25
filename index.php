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
        <?php
        session_start();
        if (isset($_SESSION['msg'])) {
            $msg = $_SESSION['msg'];
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            unset($_SESSION['msg']);
        }
        ?>

        <a href="tambah.php" class="btn mb-4" style="background-color: #3088c8; color: white;" onmouseover="this.style.backgroundColor='#bcdffb'; this.style.color='white'; this.firstElementChild.style.color='white';" onmouseout="this.style.backgroundColor='#3088c8'; this.style.color='white'; this.firstElementChild.style.color='white';">
            <i class="fas fa-plus"></i> Tambah Data
        </a>



        <table class="table table-hover text-center">
            <thead style="background-color: #3088c8; color: white;">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "db_conn.php";
                $sql = "select * from `produk`";
                $result = mysqli_query($conn, $sql);
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>

                    <tr>
                        <th><?php echo $i ?></th>
                        <th><?php echo $row['nama_produk'] ?></th>
                        <th><?php echo $row['keterangan'] ?></th>
                        <th><?php echo $row['harga'] ?></th>
                        <th><?php echo $row['jumlah'] ?></th>

                        <td>
                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="hapus.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>

                    </tr>
                <?php
                    $i++;
                }
                ?>

            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>