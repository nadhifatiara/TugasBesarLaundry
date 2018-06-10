<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>
<main role="main" class="container">
	<h1>Order</h1>

	<!-- File Header -->
	<?php echo form_open('Admin/Order/transaction/'.$id); ?>
	<div class="form-group">
		<label for="">Type Laundry</label>
		<select name="fk_typelaundry_id" id="" class="form-control">	
		<?php foreach ($typelaundry as $key => $value): ?>
			<option value="<?php echo $value['typelaundry_id'] ?>"><?php echo $value['typelaundry_name'] ?></option>
		<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label for="">Kilo</label>
		<input type="number" min="1" value="1" name="order_kilo" class="form-control">
	</div>
	<button type="submit" class="btn btn-primary">Transaction</button>
	<?php echo form_close(); ?>
</main>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>
<?php $this->load->view('admin/footer') ?>