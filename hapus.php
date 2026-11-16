<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");
}

header("Location: index.php?pesan=hapus_sukses");
exit;
?>

