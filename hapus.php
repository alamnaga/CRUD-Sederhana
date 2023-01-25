<?php
include "db_conn.php";
  $id = $_GET['id'];
  $sql = "DELETE FROM produk WHERE id='$id'";
  $result = mysqli_query($conn, $sql);

  session_start();
  if ($result) {
    $_SESSION['msg'] = "Data berhasil dihapus";
    header("Location: index.php");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
