<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>
<main role="main" class="container">
	<h1>Order <?php echo $id ?> </h1>

	<!-- File Header -->
	<?php echo form_open('Admin/Order/transaction/'.$id); ?>
	<div class="form-group">
		<label for="">Harga PerKilo</label>
		<input type="number" min="1" id="perkilo" value="<?php echo $perkilo ?>" class="form-control" readonly>
	</div>
	<div class="form-group">
		<label for="">Kilo</label>
		<input type="number" min="1" value="1" name="weight" class="form-control">
		<?php echo form_error('weight') ?>
		<script>
			$("input[name='weight']").change(function(){
				var perkilo = $("#perkilo").val();
				var weight = $(this).val();
				var total = perkilo*weight;
				$("#total").val(total);
		})
	</script>
	</div>
	<div class="form-group">
		<label for="">Total Harga</label>
		<input type="number" min="1" id="total" value="<?php echo $perkilo ?>" class="form-control" readonly>
	</div>
	<button type="submit" class="btn btn-primary">Transaction</button>
	<?php echo form_close(); ?>
</main>
<?php $this->load->view('admin/footer') ?>