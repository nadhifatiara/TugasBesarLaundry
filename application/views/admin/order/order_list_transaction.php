<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>
<main role="main" class="container">
	<h1>Order Transaction</h1>

	<!-- File Header -->
	<table class="table table-striped table-bordered" width="100%" id="example">
		<thead>
			<tr>
				<!-- Sesuaikan Column Table -->
				<th>#</th>
				<th>Date</th>
				<th>Address</th>
				<th>Perfume</th>
				<th>Typelaundry</th>
				<th>Customers Name</th>
				<th>Weight</th>
				<th>Total</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($list_order as $key => $value): ?>
				<tr>
					<!-- Sesuaikan Column Table -->
					<td><?php echo ++$key ?></td>
					<td><?php echo $value['date'] ?></td>
					<td><?php echo $value['address'] ?></td>
					<td><?php echo $value['perfume'] ?></td>
					<td><?php echo $value['typelaundry'] ?></td>
					<td><?php echo $value['customer_name'] ?></td>
					<td><?php echo $value['weight'] ?></td>
					<td><?php echo $value['harga'] ?></td>
					<td>
						<a href="<?php echo base_url('Admin/Order/wash/'.$value['id']) ?>" class="btn btn-sm btn-primary">Wash</a>
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