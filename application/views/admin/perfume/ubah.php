<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>
<main role="main" class="container">
	<h1>Table</h1>
	<!-- load header -->
	<!-- action akan dilakukan ke controller perfume dengan fungsi ubah -->
	<!-- PS : 
	name pada input harus sama dengan table didatabase
	intinya hanya pada syntax input dan form saja lainnya dari bootstrap e -->
	<form action="<?php echo base_url('perfume/ubah/'.$getData['perfume_id']); ?>" method="post">
		<div class="form-group row">
			<label for="perfume_name" class="col-sm-2 col-form-label">perfume_name</label>
			<div class="col-sm-10">
				<input type="text" name="perfume_name" class="form-control" id="perfume_name"  value="<?php echo $getData['perfume_name'] ?>" placeholder="perfume_name">
				<?php echo form_error('perfume_name') ?> <!-- menampilkan error saat rule perfume_name gagal -->
			</div>
		</div>
		<div class="form-group row">
			<label for="perfume_costperkilo" class="col-sm-2 col-form-label">perfume_costperkilo</label>
			<div class="col-sm-10">
				<input type="text" name="perfume_costperkilo" class="form-control" id="perfume_costperkilo"  value="<?php echo $getData['perfume_costperkilo'] ?>" placeholder="perfume_costperkilo">
				<?php echo form_error('perfume_costperkilo') ?> <!-- menampilkan error saat rule perfume_costperkilo gagal -->
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