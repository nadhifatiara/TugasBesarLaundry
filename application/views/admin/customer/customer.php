<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>
<main role="main" class="container">
	<?php if($this->session->flashdata('user_loggedin')): ?>
         <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
       <?php endif; ?>
	<h1>Customer</h1>
	<a href="<?php echo base_url('customer/tambah') ?>" class="btn btn-primary mb-3">Tambah</a>

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
				<th>Photo</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($getData as $key => $value): ?>
				<tr>
					<!-- Sesuaikan Column Table -->
					<td><?php echo $value['customer_id'] ?></td>
					<td><?php echo $value['customer_firstname'] ?></td>
					<td><?php echo $value['customer_lastname'] ?></td>
					<td><?php echo $value['customer_address'] ?></td>
					<td><?php echo $value['customer_telp'] ?></td>
					<td><?php echo $value['customer_email'] ?></td>
					<td><?php echo $value['customer_password'] ?></td>
					<td><img src="<?php echo base_url() ?>/assets/upload/customer/<?php echo $value['customer_image'] ?>" alt="" width="100px" height="80px"></td>
					<td>
						<!-- --AKSI-- -->
						<a href="<?php echo base_url('customer/ubah/'.$value['customer_id']) ?>" class="btn btn-sm btn-success">Ubah</a>
						<a href="<?php echo base_url('customer/hapus/'.$value['customer_id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
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