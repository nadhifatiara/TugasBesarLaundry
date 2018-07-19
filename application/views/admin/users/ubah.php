<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>
<main role="main" class="container">
	<h1>Update Customer</h1>
	<!-- load header -->
	<!-- action akan dilakukan ke controller product dengan fungsi ubah -->
	<!-- PS : 
	name pada input harus sama dengan table didatabase
	intinya hanya pada syntax input dan form saja lainnya dari bootstrap e -->
	<?php echo form_open_multipart(''); ?>
	<div class="form-group row">
		<label for="firstname" class="col-sm-2 col-form-label">First Name</label>
		<div class="col-sm-10">
			<input type="text" name="firstname" class="form-control" id="firstname"  value="<?php echo $getData['firstname'] ?>" placeholder="firstname">
			<?php echo form_error('firstname') ?> <!-- menampilkan error saat rule firstname gagal -->
		</div>
	</div>
	<div class="form-group row">
		<label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
		<div class="col-sm-10">
			<input type="text" name="lastname" class="form-control" id="lastname"  value="<?php echo $getData['lastname'] ?>" placeholder="lastname">
			<?php echo form_error('lastname') ?> <!-- menampilkan error saat rule lastname gagal -->
		</div>
	</div>
	<div class="form-group row">
		<label for="address" class="col-sm-2 col-form-label">Address</label>
		<div class="col-sm-10">
			<input type="text" name="address" class="form-control" id="address"  value="<?php echo $getData['address'] ?>" placeholder="address">
			<?php echo form_error('address') ?> <!-- menampilkan error saat rule address gagal -->
		</div>
	</div>
	<div class="form-group row">
		<label for="telp" class="col-sm-2 col-form-label">Telp</label>
		<div class="col-sm-10">
			<input type="text" name="telp" class="form-control" id="telp"  value="<?php echo $getData['telp'] ?>" placeholder="telp">
			<?php echo form_error('telp') ?> <!-- menampilkan error saat rule telp gagal -->
		</div>
	</div>
	<div class="form-group row">
		<label for="username" class="col-sm-2 col-form-label">username</label>
		<div class="col-sm-10">
			<input type="text" name="username" class="form-control" id="username"  value="<?php echo $getData['username'] ?>" placeholder="username">
			<?php echo form_error('username') ?> <!-- menampilkan error saat rule username gagal -->
		</div>
	</div>
	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-10">
			<input type="text" name="password" class="form-control" id="password"  value="<?php echo $getData['password'] ?>" placeholder="password">
			<?php echo form_error('password') ?> <!-- menampilkan error saat rule password gagal -->
		</div>
	</div>
	<div class="form-group row">
	<label for="fk_id_level" class="col-sm-2 col-form-label">fk_id_level</label>
	<div class="col-sm-10">
		<select name="fk_id_level" class="form-control">
			<?php foreach ($level as $key => $value): ?>
				<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
			<?php endforeach ?>
		</select>
		<script>$("select[name='fk_id_level']").val("<?php echo $getData['fk_id_level'] ?>")</script>
	</div>
</div>
	<div class="form-group">
		<label for="image">Image</label>
		<input type="file" name="image">
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