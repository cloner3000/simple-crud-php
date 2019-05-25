<?php
require_once('koneksi.php');

$query = "SELECT *,(SELECT fullname FROM tbl_user WHERE tbl_user.id=tbl_request.request_user) AS fullname,
(SELECT nm_driver FROM tbl_driver WHERE tbl_driver.id=tbl_request.id_driver) AS nm_driver,
(SELECT police_number FROM tbl_vehicle WHERE tbl_vehicle.id=tbl_request.id_vehicle) AS police_number FROM tbl_request";
$urlcrud = "index.php?page=request/";
?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h1>Request</h1>
				<a href="<?= $urlcrud . 'create' ?>" class="btn btn-outline-success btn-sm">Tambah Data</a>
			</div>
			<div class="card-body">
				<table class="table table-hover table-bordered" style="margin-top: 10px">
					<tr class="success">
						<th width="50px">No</th>
						<th>id Request</th>
						<th>Tanggal</th>
						<th>User</th>
						<th>Driver</th>
						<th>Vehicle</th>
						<th style="text-align: center;">Actions</th>
					</tr>
					<?php
					if ($data = mysqli_query($koneksi, $query)) {
						$a = 1;
						while ($obj = mysqli_fetch_object($data)) {
							?>
							<tr>
								<td><?php echo $a; ?></td>
								<td><?php echo $obj->id; ?></td>
								<td><?php echo $obj->request_date; ?></td>
								<td><?php echo $obj->fullname; ?></td>
								<td><?php echo $obj->nm_driver; ?></td>
								<td><?php echo $obj->police_number; ?></td>
								<td style="text-align: center;">
									<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="<?= $urlcrud . 'hapus&id=' . $obj->id ?>" class="btn btn-outline-danger btn-sm">Hapus</a>
									<a href="<?= $urlcrud . 'edit&id=' . $obj->id ?>" class="btn btn-outline-info btn-sm">Ubah</a>
								</td>
							</tr>
							<?php
							$a++;
						}
						mysqli_free_result($data);
					}
					?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
mysqli_close($koneksi);
?>