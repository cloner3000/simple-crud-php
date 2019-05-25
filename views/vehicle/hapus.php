<script src="vendor/sweetalert/sweetalert2.all.js"></script>
<?php
require_once('koneksi.php');
try {
	$sql = "DELETE FROM tbl_vehicle WHERE id=".$_GET['id'];
	$koneksi->query($sql);
} catch (Exception $e) {
	echo $e;
	die();
}
  echo "<script>
	swal.fire({position: 'top-end', type: 'success', title: 'Vehicle',  text: 'Data berhasil di Hapus', showConfirmButton: false});
	setInterval(function(){window.location.href='index.php?page=vehicle/index';}, 2000);
	</script>";
?>