<script src="vendor/sweetalert/sweetalert2.all.js"></script>
<?php
require_once('koneksi.php');
$urlcrud = "index.php?page=vehicle/";
if (count($_POST) > 0) {
	try {
		$sql = "INSERT INTO tbl_vehicle (police_number) VALUES ('" . $_POST['police_number'] . "')";
		if (!$koneksi->query($sql)) {
			echo $koneksi->error;
			die();
		}
	} catch (Exception $e) {
		echo $e;
		die();
	}
	echo "<script>
	swal.fire({position: 'top-end', type: 'success', title: 'Vehicle',  text: 'Data berhasil di Simpan', showConfirmButton: false});
	setInterval(function(){window.location.href='index.php?page=vehicle/index';}, 2000);
	</script>";
}
?>
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h1>Create Driver</h1>
				<a href="<?= $urlcrud . 'index' ?>" class="btn btn-outline-secondary btn-sm">List Data</a>
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div class="form-group">
						<label>Nomor Polisi</label>
						<input type="text" value="" class="form-control" name="police_number">
					</div>
					<input type="submit" class="btn btn-warning btn-sm" name="create" value="Create">
				</form>
			</div>
		</div>
	</div>
</div>