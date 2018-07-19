<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal text-white">Laundry Online</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-white" href="<?php echo base_url('Home') ?>">Home</a>
      <a class="p-2 text-white" href="<?php echo base_url('Home/Perfume') ?>">Perfume</a>
      <a class="p-2 text-white" href="<?php echo base_url('Home/about') ?>">About</a>
      <a class="p-2 text-white" href="<?php echo base_url('Home/list_order') ?>">List Order</a>
    </nav>
    <?php if (!$this->session->userdata('logged_in'))
    : ?>
    <a class="btn btn-outline-light" href="<?php echo base_url('Login/login') ?>">Sign In</a>
    <?php else: ?>
      <div class="dropdown">
        <a class="btn btn-outline-light" data-toggle="dropdown" >
          <img src="<?php echo base_url('assets/upload/users/'.$this->session->userdata('image')) ?>" alt="" style="width: 20px;">
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?php echo base_url('Home/list_order') ?>"">Status</a>
          <a class="dropdown-item" href="<?php echo base_url('Login/logout') ?>"">Logout</a>
        </div>
      </div>
    <?php endif ?>
  </div>
  <?php if($this->session->flashdata('user_loggedin')): ?>
   <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
   <?php endif; ?>

   