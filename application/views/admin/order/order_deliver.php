<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>
<main role="main" class="container">
	<h1>Order <?php echo $id ?> </h1>

	<!-- File Header -->
	
	<a href="<?php echo base_url("admin/Order/del/".$id) ?>" class="btn btn-primary">Selesai</a>
</main>
<?php $this->load->view('admin/footer') ?>