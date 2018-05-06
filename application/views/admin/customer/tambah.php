<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>
<main role="main" class="container">
	<h1>Tambah Customer</h1>

	<!-- load header -->
	<!-- action akan dilakukan ke controller product dengan fungsi tambah -->
	<!-- PS : 
	name pada input harus sama dengan table didatabase
	intinya hanya pada syntax input dan form saja lainnya dari bootstrap e
-->
<?php echo form_open_multipart('customer/tambah'); ?>
<div class="form-group row">
	<label for="customer_firstname" class="col-sm-2 col-form-label">First Name</label>
	<div class="col-sm-10">
		<input type="text" name="customer_firstname" class="form-control" id="customer_firstname" value="" placeholder="customer_firstname">
		<?php echo form_error('customer_firstname') ?> <!-- menampilkan error saat rule customer_firstname gagal -->
	</div>
</div>
<div class="form-group row">
	<label for="customer_lastname" class="col-sm-2 col-form-label">Last Name</label>
	<div class="col-sm-10">
		<input type="text" name="customer_lastname" class="form-control" id="customer_lastname" value="" placeholder="customer_lastname">
		<?php echo form_error('customer_lastname') ?> <!-- menampilkan error saat rule price gagal -->
	</div>
</div>
<div class="form-group row">
	<label for="customer_address" class="col-sm-2 col-form-label">Address</label>
	<div class="col-sm-10">
		<input type="text" name="customer_address" class="form-control" id="customer_address" value="" placeholder="customer_address">
		<?php echo form_error('customer_address') ?> <!-- menampilkan error saat rule customer_address gagal -->
	</div>
</div>
<div class="form-group row">
	<label for="customer_telp" class="col-sm-2 col-form-label">Telp</label>
	<div class="col-sm-10">
		<input type="text" name="customer_telp" class="form-control" id="customer_telp" value="" placeholder="customer_telp">
		<?php echo form_error('customer_telp') ?> <!-- menampilkan error saat rule customer_telp gagal -->
	</div>
</div>
<div class="form-group row">
	<label for="customer_email" class="col-sm-2 col-form-label">Email</label>
	<div class="col-sm-10">
		<input type="text" name="customer_email" class="form-control" id="customer_email" value="" placeholder="customer_email">
		<?php echo form_error('customer_email') ?> <!-- menampilkan error saat rule customer_email gagal -->
	</div>
</div>
<div class="form-group row">
	<label for="customer_password" class="col-sm-2 col-form-label">Password</label>
	<div class="col-sm-10">
		<input type="text" name="customer_password" class="form-control" id="customer_password" value="" placeholder="customer_password">
		<?php echo form_error('customer_password') ?> <!-- menampilkan error saat rule customer_password gagal -->
	</div>
</div>
<div class="form-group">
	<label for="customer_image">Image</label>
	<input type="file" name="customer_image">
	<?php echo $message ?>
</div>
<div class="form-group row">
	<label for="col-sm-2"></label>
	<input type="submit" class="btn btn-primary" value="Tambah">
</div>
</form>
<!-- load footer -->


</main>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>
<?php $this->load->view('admin/footer') ?>