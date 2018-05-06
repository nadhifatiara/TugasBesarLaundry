<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>
<main role="main" class="container">
	<h1>Table</h1>
	<!-- load header -->
	<!-- action akan dilakukan ke controller employee dengan fungsi ubah -->
	<!-- PS : 
	name pada input harus sama dengan table didatabase
	intinya hanya pada syntax input dan form saja lainnya dari bootstrap e -->
	<?php echo form_open_multipart('employee/ubah/'.$getData['employee_id']); ?>
	<div class="form-group row">
		<label for="employee_firstname" class="col-sm-2 col-form-label">employee_firstname</label>
		<div class="col-sm-10">
			<input type="text" name="employee_firstname" class="form-control" id="employee_firstname"  value="<?php echo $getData['employee_firstname'] ?>" placeholder="employee_firstname">
			<?php echo form_error('employee_firstname') ?> <!-- menampilkan error saat rule employee_firstname gagal -->
		</div>
	</div>
	<div class="form-group row">
		<label for="employee_lastname" class="col-sm-2 col-form-label">employee_lastname</label>
		<div class="col-sm-10">
			<input type="text" name="employee_lastname" class="form-control" id="employee_lastname"  value="<?php echo $getData['employee_lastname'] ?>" placeholder="employee_lastname">
			<?php echo form_error('employee_lastname') ?> <!-- menampilkan error saat rule employee_lastname gagal -->
		</div>
	</div>
	<div class="form-group row">
		<label for="employee_address" class="col-sm-2 col-form-label">employee_address</label>
		<div class="col-sm-10">
			<input type="text" name="employee_address" class="form-control" id="employee_address"  value="<?php echo $getData['employee_address'] ?>" placeholder="employee_address">
			<?php echo form_error('employee_address') ?> <!-- menampilkan error saat rule employee_address gagal -->
		</div>
	</div>
	<div class="form-group row">
		<label for="employee_telp" class="col-sm-2 col-form-label">employee_telp</label>
		<div class="col-sm-10">
			<input type="text" name="employee_telp" class="form-control" id="employee_telp"  value="<?php echo $getData['employee_telp'] ?>" placeholder="employee_telp">
			<?php echo form_error('employee_telp') ?> <!-- menampilkan error saat rule employee_telp gagal -->
		</div>
	</div>
	<div class="form-group row">
		<label for="employee_email" class="col-sm-2 col-form-label">employee_email</label>
		<div class="col-sm-10">
			<input type="text" name="employee_email" class="form-control" id="employee_email"  value="<?php echo $getData['employee_email'] ?>" placeholder="employee_email">
			<?php echo form_error('employee_email') ?> <!-- menampilkan error saat rule employee_email gagal -->
		</div>
	</div>
	<div class="form-group row">
		<label for="employee_password" class="col-sm-2 col-form-label">employee_password</label>
		<div class="col-sm-10">
			<input type="text" name="employee_password" class="form-control" id="employee_password"  value="<?php echo $getData['employee_password'] ?>" placeholder="employee_password">
			<?php echo form_error('employee_password') ?> <!-- menampilkan error saat rule employee_password gagal -->
		</div>
	</div>
	<div class="form-group">
		<label for="employee_image">employee_image</label>
		<input type="file" name="employee_image">
		<?php echo $message ?>
	</div>
	<div class="form-group row">
		<label for="col-sm-2"></label>
		<input type="submit" class="btn btn-success" value="Ubah">
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