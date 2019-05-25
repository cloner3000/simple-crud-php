<script src="vendor/sweetalert/sweetalert2.all.js"></script>
<?php
require_once('koneksi.php');
try {
	$sql = "DELETE FROM tbl_driver WHERE id=".$_GET['id'];
	$koneksi->query($sql);
} catch (Exception $e) {
	echo $e;
	die();
}
  echo "<script>
	swal.fire({position: 'top-end', type: 'success', title: 'Driver',  text: 'Data berhasil di Hapus', showConfirmButton: false});
	setInterval(function(){window.location.href='index.php?page=driver/index';}, 2000);
	</script>";
?>