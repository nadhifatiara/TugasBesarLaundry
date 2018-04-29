<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>

<div class="container-fluid mt-3">  
  <div class="row">
    <div class="col">
      <?php echo validation_errors() ?>
      <form method="post" action="<?php echo base_url("admin/Typelaundry_c/input") ?>">
  <div class="form-group row">
    <label for="typelaundry_name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="typelaundry_name" class="form-control" id="typelaundry_name" value="">
    </div>
  </div>
  <div class="form-group row">
    <label for="typelaundry_costperkilo" class="col-sm-2 col-form-label">Cost Per Kilo</label>
    <div class="col-sm-10">
      <input type="number" name="typelaundry_costperkilo" class="form-control" id="typelaundry_costperkilo" value="" min="0">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
      <input type="submit" name="" class="btn btn-primary" id="" value="Input">
    </div>
  </div>
</form>
    </div>
  </div>
</div>
<?php $this->load->view('admin/footer') ?>

