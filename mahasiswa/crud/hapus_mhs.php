<?php
include '../koneksi.php';
if (isset($_GET['id_mhs'])) {
    $id_mhs = $_GET['id_mhs'];
    $sql = "delete from tb_mahasiswa where id_mhs = '$id_mhs'";
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Data berhasil dihapus!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=../crud/index_mhs.php">';
    } else {
        echo 'Terjadi kesalahan pada hapus mahasiswa: ' . mysqli_error($koneksi);
    }
}
