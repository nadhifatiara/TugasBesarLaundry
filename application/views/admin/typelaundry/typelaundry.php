<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<?php $this->load->view('admin/menu') ?>

<div class="container">
<h1>List Type Laundry</h1>

  <a href="<?php echo base_url('admin/Typelaundry_c/input') ?>" class="btn btn-primary mb-3">Input</a>
<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
      <th>ID</th>
      <th>Name</th>
      <th>Cost per Kilo</th>
      <th width="135">Action</th>
    </thead>
    <tbody>
      <?php foreach ($getData as $key => $value): ?>
        <tr>
        <td><?php echo $value['typelaundry_id'] ?></td>
        <td><?php echo $value['typelaundry_name'] ?></td>
        <td><?php echo $value['typelaundry_costperkilo'] ?></td>
        <td>
          <a href="<?php echo base_url('Admin_controller/update') ?>" class="btn btn-sm btn-success">Update</a>
          <a href="" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
</div>
<?php $this->load->view('admin/footer') ?>

