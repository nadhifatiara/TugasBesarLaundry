<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>
<main role="main" class="container">
	<h1>Perfume</h1>
	<a href="<?php echo base_url('perfume/tambah') ?>" class="btn btn-primary mb-3">Tambah</a>

	<!-- File Header -->
	<table class="table table-striped table-bordered" width="100%" id="example">
		<thead>
			<tr>
				<!-- Sesuaikan Column Table -->
				<th>ID</th>
				<th>Name</th>
				<th>Cost Per Kilo</th>
				<th>Image</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($getData as $key => $value): ?>
				<tr>
					<!-- Sesuaikan Column Table -->
					<td><?php echo $value['perfume_id'] ?></td>
					<td><?php echo $value['perfume_name'] ?></td>
					<td><?php echo $value['perfume_costperkilo'] ?></td>
					<td><img src="<?php echo base_url("assets/upload/perfume/".$value['perfume_image']); ?>" alt="" style="width: 100px"></td>
					<td>
						<!-- --AKSI-- -->
						<a href="<?php echo base_url('perfume/ubah/'.$value['perfume_id']) ?>" class="btn btn-sm btn-success">Ubah</a>
						<a href="<?php echo base_url('perfume/hapus/'.$value['perfume_id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<!-- File Footer -->

</main>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>
<?php $this->load->view('admin/footer') ?>