<script src="vendor/sweetalert/sweetalert2.all.js"></script>
<?php
require_once('koneksi.php');
$urlcrud = "index.php?page=request/";
if ($_POST) {

	$sql = "UPDATE tbl_request SET request_date='" . $_POST['request_date'] . "', request_user='" . $_POST['request_user'] . "', id_driver='" . $_POST['id_driver'] . "', id_vehicle='" . $_POST['id_vehicle'] . "' WHERE id=" . $_POST['id'];

	if ($koneksi->query($sql) === TRUE) {
		echo "<script>
		swal.fire({position: 'top-end', type: 'success', title: 'Request',  text: 'Data berhasil di Ubah', showConfirmButton: false});
		setInterval(function(){window.location.href='index.php?page=request/index';}, 2000);
	</script>";
	} else {
		echo "Gagal: " . $koneksi->error;
	}

	$koneksi->close();
} else {
	$query = $koneksi->query("SELECT * FROM tbl_request WHERE id=" . $_GET['id']);

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
					<h1>Update Driver</h1>
					<a href="<?= $urlcrud . 'index' ?>" class="btn btn-outline-secondary btn-sm">List Data</a>
				</div>
				<div class="card-body">
					<form action="" method="POST">
						<input type="hidden" name="id" value="<?= $data->id ?>">
						<div class="form-group">
							<label>Tanggal</label>
							<input type="text" value="<?php echo $data->request_date; ?>" class="form-control" name="request_date" placeholder="Input Tahun(4)-Bulan(2)-Tanggal(2)">
						</div>
						<div class="form-group">
							<label>User</label>
							<select class="custom-select" name="request_user">
								<option selected>Pilih Salah Satu...</option>
								<?php
								$query = $koneksi->query("SELECT * FROM tbl_user");

								if ($query->num_rows > 0) {
									while ($obj = mysqli_fetch_object($query)) {
										if ($data->request_user == $obj->id) {
											echo '<option value="' . $obj->id . '" selected>' . $obj->fullname . '</option>';
										} else {
											echo '<option value="' . $obj->id . '">' . $obj->fullname . '</option>';
										}
									}
									mysqli_free_result($query);
								} else {
									echo "<option>Data Tidak Ada</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Driver</label>
							<select class="custom-select" name="id_driver">
								<option selected>Pilih Salah Satu...</option>
								<?php
								$query = $koneksi->query("SELECT * FROM tbl_driver");

								if ($query->num_rows > 0) {
									while ($obj = mysqli_fetch_object($query)) {
										if ($data->id_driver == $obj->id) {
											echo '<option value="' . $obj->id . '" selected>' . $obj->nm_driver . '</option>';
										} else {
											echo '<option value="' . $obj->id . '">' . $obj->nm_driver . '</option>';
										}
									}
									mysqli_free_result($query);
								} else {
									echo "<option>Data Tidak Ada</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Vehicle</label>
							<select class="custom-select" name="id_vehicle">
								<option selected>Pilih Salah Satu...</option>
								<?php
								$query = $koneksi->query("SELECT * FROM tbl_vehicle");

								if ($query->num_rows > 0) {
									while ($obj = mysqli_fetch_object($query)) {
										if ($data->id_driver == $obj->id) {
											echo '<option value="' . $obj->id . '" selected>' . $obj->police_number . '</option>';
										} else {
											echo '<option value="' . $obj->id . '">' . $obj->police_number . '</option>';
										}
									}
									mysqli_free_result($query);
								} else {
									echo "<option>Data Tidak Ada</option>";
								}
								?>
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