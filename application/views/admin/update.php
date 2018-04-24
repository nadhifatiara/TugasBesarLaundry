<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>

<div class="container-fluid mt-3">  
  <div class="row">
    <div class="col">
      <form>
  <div class="form-group row">
    <label for="section_id" class="col-sm-2 col-form-label">ID</label>
    <div class="col-sm-10">
      <input type="text" name="section_id" class="form-control" id="section_id" value="">
    </div>
  </div>
  <div class="form-group row">
    <label for="section_name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="section_name" class="form-control" id="section_name" value="">
    </div>
  </div>
  <div class="form-group row">
    <label for="section_salary" class="col-sm-2 col-form-label">Salary</label>
    <div class="col-sm-10">
      <input type="text" name="section_salary" class="form-control" id="section_salary" value="">
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

