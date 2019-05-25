<script src="vendor/sweetalert/sweetalert2.all.js"></script>
<?php
require_once('koneksi.php');
$urlcrud = "index.php?page=user/";
if ($_POST) {

	$sql = "UPDATE tbl_user SET username='" . $_POST['username'] . "', fullname='" . $_POST['fullname'] . "', pass='" . $_POST['pass'] . "', type_user='" . $_POST['type_user'] . "' WHERE id=" . $_POST['id'];

	if ($koneksi->query($sql) === TRUE) {
		echo "<script>
		swal.fire({position: 'top-end', type: 'success', title: 'User',  text: 'Data berhasil di Ubah', showConfirmButton: false});
		setInterval(function(){window.location.href='index.php?page=user/index';}, 2000);
	</script>";
	} else {
		echo "Gagal: " . $koneksi->error;
	}

	$koneksi->close();
} else {
	$query = $koneksi->query("SELECT * FROM tbl_user WHERE id=" . $_GET['id']);

	if ($query->num_rows > 0) {
		$data = mysqli_fetch_object($query);
	} else {
		echo "data tidak tersedia";
		die();
	}
	?>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h1>Update User</h1>
					<a href="<?= $urlcrud . 'index' ?>" class="btn btn-outline-secondary btn-sm">List Data</a>
				</div>
				<div class="card-body">
					<form action="" method="POST">
						<input type="hidden" name="id" value="<?= $data->id ?>">
						<div class="form-group">
							<label>Username</label>
							<input type="text" value="<?php echo $data->username; ?>" class="form-control" name="username">
						</div>
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" value="<?php echo $data->fullname; ?>" class="form-control" name="fullname">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="text" value="<?php echo $data->pass; ?>" class="form-control" name="pass">
						</div>
						<div class="form-group">
							<label>Tipe User</label>
							<select class="custom-select" name="type_user">
								<option>Pilih Salah Satu...</option>
								<option value="Administration" <?php echo ($data->type_user == 'Administration') ? 'selected' : ''; ?>>Administration</option>
								<option value="Employee" <?php echo ($data->type_user == 'Employee') ? 'selected' : ''; ?>>Employee</option>
								<option value="Driver & Vehicle" <?php echo ($data->type_user == 'Driver & Vehicle') ? 'selected' : ''; ?>>Driver & Vehicle</option>
								<option value="Security Person" <?php echo ($data->type_user == 'Security Person') ? 'selected' : ''; ?>>Security Person</option>
								<option value="Admin Security" <?php echo ($data->type_user == 'Admin Security') ? 'selected' : ''; ?>>Admin Security</option>
								<option value="Manager" <?php echo ($data->type_user == 'Manager') ? 'selected' : ''; ?>>Manager</option>
							</select>
						</div>
						<input type="submit" class="btn btn-warning btn-sm" name="Update" value="Update">
					</form>
				</div>
			</div>
		</div>
	</div>
<?php
}
#mysqli_close($koneksi);
?>