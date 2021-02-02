<html>
<?php
include '../koneksi.php';
if (isset($_POST['update'])) {
    $sql = "UPDATE tb_mahasiswa SET npm='".$_POST['npm']."', nama='".$_POST['nama']."', tempat_lahir='".$_POST['tempat_lahir']."', tanggal_lahir='".$_POST['tanggal_lahir']."', jenis_kelamin='".$_POST['jenis_kelamin']."', alamat='".$_POST['alamat']."', kode_pos='".$_POST['kode_pos']."' WHERE id_mhs=".$_POST['id_mhs'];
    if (mysqli_query($koneksi,$sql)){
        echo "<script>alert('Data Mahasiswa berhasil diperbarui!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=../crud/index_mhs.php">';
    }else{
        echo 'Terjadi kesalahan pada edit Mahasiswa: '.mysqli_error($koneksi);
    }
} else {
    $id_mhs = $_GET['id_mhs'];
    $sql = "select * from tb_mahasiswa where id_mhs='$id_mhs'";
    $exe = mysqli_query($koneksi,$sql);
    $row = mysqli_fetch_array($exe);
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
                <input type="hidden" autocomplete="off" name="id_mhs" value="<?php echo $row['id_mhs'];?>"  class="form-control col-sm-10" required>
			<div class="form-group row">
				<label for="nama_kelas" class="col-sm-2">NPM</label>
				<input type="text" autocomplete="off" name="npm" value="<?php echo $row['npm'];?>" class="form-control col-sm-10" required>
			</div>
			<div class="form-group row">
				<label for="nama_kelas" class="col-sm-2">Nama Mahasiswa</label>
				<input type="text" autocomplete="off" name="nama" value="<?php echo $row['nama'];?>" class="form-control col-sm-10" required>
			</div>
			<div class="form-group row">
				<label for="nama_kelas" class="col-sm-2">Tempat,Tanggal Lahir</label>
				<input type="text" autocomplete="off" name="tempat_lahir" value="<?php echo $row['tempat_lahir'];?>" class="form-control col-sm-5" required>
				<span class="col-sm-1"></span>
				<input type="date" autocomplete="off" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir'];?>" class="form-control col-sm-4" required>
			</div>
			<div class="form-group row">
				<label for="nama_kelas" class="col-sm-2">Alamat</label>
				<input type="text" autocomplete="off" name="alamat" value="<?php echo $row['alamat'];?>" class="form-control col-sm-10"required>
			</div>
			<div class="form-group row">
				<label for="nama_kelas" class="col-sm-2">Kode Pos</label>
				<input type="text" autocomplete="off" name="kode_pos" value="<?php echo $row['kode_pos'];?>" class="form-control col-sm-10"required>
			</div>
            </div>
				<div class="form-group row">
				<label for="nama_kelas" class="col-sm-2">Jenis Kelamin</label>
				<div class="col-sm-5">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="jenis_kelamin" value="L" <?php if($row['jenis_kelamin']=='L')echo' checked';?>>
					<label class="form-check-label">Laki-laki</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="jenis_kelamin" value="P" <?php if($row['jenis_kelamin']=='P')echo' checked';?>>
					<label class="form-check-label">Perempuan</label>
					</div>
				</div>
			<div class="form-group row">
				<button type="submit" name="update" class="btn btn-primary">Update</button>
			</div>
		</form>
	</div>
</div>
</body>
</html>	
	<?php } ?>