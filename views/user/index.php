<?php
require_once('koneksi.php');

$query = "SELECT * FROM tbl_user";
$urlcrud = "index.php?page=user/";
?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h1>User</h1>
				<a href="<?= $urlcrud . 'create' ?>" class="btn btn-outline-success btn-sm">Tambah Data</a>
			</div>
			<div class="card-body">
				<table class="table table-hover table-bordered" style="margin-top: 10px">
					<tr class="success">
						<th width="50px">No</th>
						<th>id User</th>
						<th>Username</th>
						<th>Fullname</th>
						<th>Tipe User</th>
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
								<td><?php echo $obj->username; ?></td>
								<td><?php echo $obj->fullname; ?></td>
								<td><?php echo $obj->type_user; ?></td>
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