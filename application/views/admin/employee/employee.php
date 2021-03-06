<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>
<main role="main" class="container">
	<h1>Employee</h1>
	<a href="<?php echo base_url('employee/tambah') ?>" class="btn btn-primary mb-3">Tambah</a>

	<!-- File Header -->
	<table class="table table-striped table-bordered" width="100%" id="example">
		<thead>
			<tr>
				<!-- Sesuaikan Column Table -->
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Address</th>
				<th>Telp</th>
				<th>Email</th>
				<th>Password</th>
				<th>Image</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($getData as $key => $value): ?>
				<tr>
					<!-- Sesuaikan Column Table -->
					<td><?php echo $value['employee_id'] ?></td>
					<td><?php echo $value['employee_firstname'] ?></td>
					<td><?php echo $value['employee_lastname'] ?></td>
					<td><?php echo $value['employee_address'] ?></td>
					<td><?php echo $value['employee_telp'] ?></td>
					<td><?php echo $value['employee_email'] ?></td>
					<td><?php echo $value['employee_password'] ?></td>
					<td><img src="<?php echo base_url() ?>/assets/upload/employee/<?php echo $value['employee_image'] ?>" alt="" width="100px" height="80px"></td>
					<td>
						<!-- --AKSI-- -->
						<a href="<?php echo base_url('employee/ubah/'.$value['employee_id']) ?>" class="btn btn-sm btn-success">Ubah</a>
						<a href="<?php echo base_url('employee/hapus/'.$value['employee_id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
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