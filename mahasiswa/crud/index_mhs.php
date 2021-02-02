<html>
<head>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/style.css" rel="stylesheet">
	<title>CRUD Mahasiswa</title>
</head>
<body>
 
<?php
include '../koneksi.php';
?>
</head><!--/head-->
<body>
    <div class="container">
    <div class="col-md-12 mx-auto mt-2">
    <center><h1>Daftar Data Mahasiswa</h1></center>
    <a href='../logout.php' class='btn btn-sm btn-primary'>Logout</a>
        <form class="form-inline float-right mb-2" name="search" method="post">
            <input class="form-control mr-2" autocomplete="off" name="cari" placeholder="Cari Nama">
            <button name="search_data" class="btn btn-outline-success" type="submit">Search</button>
            <a href="../crud/tambah_mhs.php" class="btn btn-sm btn-primary mb-1">Tambah Data</a>
        </form>
        <table class="table table-bordered table-striped table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Tempat Lahir,Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Kode Pos</th>
                    <th colspan="2">Operasi</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            if (isset($_POST['search_data'])) {
                $cari = $_POST['cari'];
                $query = "select * from tb_mahasiswa where npm like '%$cari%' or nama like '%$cari%' or tempat_lahir like '%$cari%' or jenis_kelamin like '%$cari%' or  alamat like '%$cari%' or kode_pos like '%$cari%'";
            } else {
                $query = "select * from tb_mahasiswa ";
            }
            $exe = mysqli_query($koneksi, $query);
            if (mysqli_num_rows($exe) > 0) {
                while ($a = mysqli_fetch_array($exe)) {
                    echo "<tr>
                    <td>$no</td>
                    <td>$a[npm]</td>
                    <td>$a[nama]</td>
                    <td>$a[tempat_lahir],".date("d-F-Y",strtotime($a['tanggal_lahir']))."</td>
                    <td>$a[jenis_kelamin]</td>
                    <td>$a[alamat]</td>
                    <td>$a[kode_pos]</td>
                    <td>
                    <div class='btn-group'>
                    <a href='../crud/edit_mhs.php?id_mhs=$a[0]'class='btn btn-sm btn-primary'>Edit</a>
                    <a href='../crud/hapus_mhs.php?id_mhs=$a[0]' onclick='return confirm(\"Hapus data ini?\");'
                    class='btn btn-sm btn-danger'>Hapus</a></div></td>
                    </tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan=7 class='text-center'>Data tidak ada</td></tr>";
            }
            ?>
	</table>
</body>
</html>
