<html>
<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $npm = $_POST['npm'];
	$nama = $_POST['nama'];
	$tempat = $_POST['tempat'];
	$tanggal = $_POST['tanggal'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
	$kd_pos = $_POST['kd_pos'];
	$sql = "insert into tb_mahasiswa (npm,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,alamat,kode_pos) values ('$npm','$nama','$tempat','$tanggal','$jk','$alamat','$kd_pos')";
	if (mysqli_query($koneksi,$sql)) {
		echo"<script>alert('Data Mahasiswa berhasil disimpan!');</script>";
		echo'<meta http-equiv="refresh" content="0; url=../crud/index_mhs.php">';
	}else{
		echo 'Terjadi kesalahan pada simpan kelas: '.mysqli_error($koneksi);
	}
}else{
?>
<head>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/style.css" rel="stylesheet">
<title>CRUD Mahasiswa</title>
</head>
<body>
<div class="container">
	<div class="col-lg-12 mt-3 ms-auto">
		<div class="header"><h2>Tambah Data Mahasiswa</h2></div>
		<form action="" method="post" class="mt-3">
			<div class="form-group row">
				<label for="nama_kelas" class="col-sm-2">NPM</label>
				<input type="text" autocomplete="off" name="npm" class="form-control col-sm-10" required>
			</div>
			<div class="form-group row">
				<label for="nama_kelas" class="col-sm-2">Nama Mahasiswa</label>
				<input type="text" autocomplete="off" name="nama" class="form-control col-sm-10" required>
			</div>
			<div class="form-group row">
				<label for="nama_kelas" class="col-sm-2">Tempat,Tanggal Lahir</label>
				<input type="text" autocomplete="off" name="tempat" class="form-control col-sm-5" required>
				<span class="col-sm-1"></span>
				<input type="date" autocomplete="off" name="tanggal" class="form-control col-sm-4" required>
			</div>
			<div class="form-group row">
				<label for="nama_kelas" class="col-sm-2">Alamat</label>
				<input type="text" autocomplete="off" name="alamat" class="form-control col-sm-10"required>
			</div>
			<div class="form-group row">
				<label for="nama_kelas" class="col-sm-2">Kode Pos</label>
				<input type="text" autocomplete="off" name="kd_pos" class="form-control col-sm-10"required>
			</div>
			</div>
				<div class="form-group row">
				<label for="nama_kelas" class="col-sm-2">Jenis Kelamin</label>
				<div class="col-sm-5">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="jk" value="L">
					<label class="form-check-label">Laki-laki</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="jk" value="P">
					<label class="form-check-label">Perempuan</label>
					</div>
				</div>
			<div class="form-group row">
				<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>
</body>
</html>	
	<?php } ?>