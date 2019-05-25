<script src="vendor/sweetalert/sweetalert2.all.js"></script>
<?php
require_once('koneksi.php');
$urlcrud = "index.php?page=user/";
if (count($_POST) > 0) {
	try {
		$sql = "INSERT INTO tbl_user (username, fullname, pass, type_user) VALUES ('" . $_POST['username'] . "','" . $_POST['fullname'] . "','" . $_POST['pass'] . "','" . $_POST['type_user'] . "')";
		if (!$koneksi->query($sql)) {
			echo $koneksi->error;
			die();
		}
	} catch (Exception $e) {
		echo $e;
		die();
	}
	echo "<script>
	swal.fire({position: 'top-end', type: 'success', title: 'User',  text: 'Data berhasil di Simpan', showConfirmButton: false});
	setInterval(function(){window.location.href='index.php?page=user/index';}, 2000);
	</script>";
}
?>
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h1>Create User</h1>
				<a href="<?= $urlcrud . 'index' ?>" class="btn btn-outline-secondary btn-sm">List Data</a>
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div class="form-group">
						<label>Username</label>
						<input type="text" value="" class="form-control" name="username">
					</div>
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" value="" class="form-control" name="fullname">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="text" value="" class="form-control" name="pass">
					</div>
					<div class="form-group">
						<label>Tipe User</label>
						<select class="custom-select" name="type_user">
							<option selected>Pilih Salah Satu...</option>
							<option value="Administration">Administration</option>
							<option value="Employee">Employee</option>
							<option value="Driver & Vehicle">Driver & Vehicle</option>
							<option value="Security Person">Security Person</option>
							<option value="Admin Security">Admin Security</option>
							<option value="Manager">Manager</option>
						</select>
					</div>
					<input type="submit" class="btn btn-warning btn-sm" name="create" value="Create">
				</form>
			</div>
		</div>
	</div>
</div>