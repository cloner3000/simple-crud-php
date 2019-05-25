<script src="vendor/sweetalert/sweetalert2.all.js"></script>
<?php
require_once('koneksi.php');
$urlcrud = "index.php?page=vehicle/";
if ($_POST) {

	$sql = "UPDATE tbl_vehicle SET police_number='" . $_POST['police_number'] . "' WHERE id=" . $_POST['id'];

	if ($koneksi->query($sql) === TRUE) {
		echo "<script>
		swal.fire({position: 'top-end', type: 'success', title: 'Vehicle',  text: 'Data berhasil di Ubah', showConfirmButton: false});
		setInterval(function(){window.location.href='index.php?page=vehicle/index';}, 2000);
	</script>";
	} else {
		echo "Gagal: " . $koneksi->error;
	}

	$koneksi->close();
} else {
	$query = $koneksi->query("SELECT * FROM tbl_vehicle WHERE id=" . $_GET['id']);

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
							<label>Nomor Polisi</label>
							<input type="text" value="<?= $data->police_number ?>" class="form-control" name="police_number">
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