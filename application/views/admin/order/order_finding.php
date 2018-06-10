<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>
<main role="main" class="container">
	<h1>Order finding</h1>

	<!-- File Header -->
	<table class="table table-striped table-bordered" width="100%" id="example">
		<thead>
			<tr>
				<!-- Sesuaikan Column Table -->
				<th>#</th>
				<th>Date</th>
				<th>Address</th>
				<th>Cost</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($list_order as $key => $value): ?>
				<tr>
					<!-- Sesuaikan Column Table -->
					<td><?php echo ++$key ?></td>
					<td><?php echo $value['order_date'] ?></td>
					<td><?php echo $value['order_address'] ?></td>
					<td><?php echo $value['order_cost'] ?></td>
					<td>
						<a href="<?php echo base_url('Admin/Order/come/'.$value['order_id']) ?>" class="btn btn-sm btn-primary">Come</a>
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