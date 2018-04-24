<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>

<div class="container">
<h1>List Section</h1>

  <a href="<?php echo base_url('Admin_controller/input') ?>" class="btn btn-primary mb-3">Input</a>
<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
      <th>ID</th>
      <th>Name</th>
      <th>Salary</th>
      <th width="135">Action</th>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Employee</td>
        <td>$100.000.00</td>
        <td>
          <a href="<?php echo base_url('Admin_controller/update') ?>" class="btn btn-sm btn-success">Update</a>
          <a href="" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
<?php $this->load->view('admin/footer') ?>

