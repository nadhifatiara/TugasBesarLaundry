<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/navbar') ?>
<main role="main" class="container">
	<h1>Update Level</h1>
	<!-- load header -->
	<!-- action akan dilakukan ke controller section dengan fungsi ubah -->
	<!-- PS : 
	name pada input harus sama dengan table didatabase
	intinya hanya pada syntax input dan form saja lainnya dari bootstrap e -->
	<?php echo form_open(''); ?>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
				<input type="text" name="name" class="form-control" id="name"  value="<?php echo $getData['name'] ?>" placeholder="name">
				<?php echo form_error('name') ?> <!-- menampilkan error saat rule name gagal -->
			</div>
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