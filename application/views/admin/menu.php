<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <?php if ($this->session->userdata('level') == '1'): ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Admin_controller') ?>">
                  <span data-feather="home"></span>
                  Dashboard 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Users') ?>">
                  <span data-feather="file"></span>
                  Users
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Level') ?>">
                  <span data-feather="users"></span>
                  Level
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Perfume') ?>">
                  <span data-feather="users"></span>
                  Perfume
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/Typelaundry_c') ?>">
                  <span data-feather="bar-chart-2"></span>
                  Typelaundry
                </a>
              </li>
              <?php endif ?>
              
              <?php if ($this->session->userdata('level') == '3' || $this->session->userdata('level') == '1'): ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/Order/finding') ?>">
                  <span data-feather="layers"></span>
                  Order Finding
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/Order/deliver') ?>">
                <span data-feather="layers"></span>
                Item Finding
                </a>
              </li>
              <?php endif ?>

              <?php if ($this->session->userdata('level') == '4' || $this->session->userdata('level') == '1'): ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/Order/list_transaction') ?>">
                  <span data-feather="layers"></span>
                  Order List Transaction
                </a>
              </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/Order/list_wash') ?>">
                  <span data-feather="layers"></span>
                  Order Wash
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/Order/list_clear') ?>">
                  <span data-feather="layers"></span>
                  Order Clear
                </a>
              </li>
              <?php endif ?>
              <?php if ($this->session->userdata('level') == '5' || $this->session->userdata('level') == '1'): ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/Order/laporan') ?>">
                  <span data-feather="layers"></span>
                  Transaction Report
                </a>
              </li>
              <?php endif ?>
            </ul>
          </div>
        </nav>