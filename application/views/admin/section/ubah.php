<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/navbar') ?>
<main role="main" class="container">
	<h1>Table</h1>
	<!-- load header -->
	<!-- action akan dilakukan ke controller section dengan fungsi ubah -->
	<!-- PS : 
	name pada input harus sama dengan table didatabase
	intinya hanya pada syntax input dan form saja lainnya dari bootstrap e -->
	<form action="<?php echo base_url('section/ubah/'.$getData['section_id']); ?>" method="post">
		<div class="form-group row">
			<label for="section_name" class="col-sm-2 col-form-label">section_name</label>
			<div class="col-sm-10">
				<input type="text" name="section_name" class="form-control" id="section_name"  value="<?php echo $getData['section_name'] ?>" placeholder="section_name">
				<?php echo form_error('section_name') ?> <!-- menampilkan error saat rule section_name gagal -->
			</div>
		</div>
		<div class="form-group row">
			<label for="section_salary" class="col-sm-2 col-form-label">section_salary</label>
			<div class="col-sm-10">
				<input type="text" name="section_salary" class="form-control" id="section_salary"  value="<?php echo $getData['section_salary'] ?>" placeholder="section_salary">
				<?php echo form_error('section_salary') ?> <!-- menampilkan error saat rule section_salary gagal -->
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