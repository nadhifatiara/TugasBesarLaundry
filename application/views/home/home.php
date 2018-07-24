<?php $this->load->view('home/header') ?>
        <div class="banner-area">
          <div class="container">
            <div class="row height align-items-center">
              <div class="col-lg-7">
                <div class="banner-content">
                  <h1 class="text-white text-uppercase mb-10">Laundry, <br> Where ever you are</h1>
                  <p class="text-white mb-30"></p>
                  <?php if (!$this->session->userdata("logged_in")): ?>
                    <a href="<?php echo base_url('Login/login') ?>" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Log in First</span><span class="lnr lnr-arrow-right"></span></a>
                  
                  <?php endif ?>
                  <?php if ($this->session->userdata("logged_in") && $this->session->flashdata('order_data') == null): ?>
                   <?php echo form_open("Home/order"); ?>
                   <div class="col-md-8">
                      <div class="input-group">
                      <select name="perfume" id="" class="form-control">
                      <?php foreach ($perfume as $key => $value): ?>
                        <option value="<?php echo $value['perfume_id'] ?>"><?php echo $value['perfume_name'] ?></option>
                      <?php endforeach ?>
                    </select>
                    <select name="typelaundry" id="" class="form-control">
                      <?php foreach ($typelaundry as $key => $value): ?>
                        <option value="<?php echo $value['typelaundry_id'] ?>"><?php echo $value['typelaundry_name'] ?></option>
                      <?php endforeach ?>
                    </select>
                   
                    </div>
                     <input type="text" name="address" class="single-input" placeholder="Address Pickup">
                     <input type="submit" class="genric-btn primary-border btn-block" value="Pick Up">
                   </div>
                   <?php echo form_close(); ?>
                    <?php endif ?>
                    <?php if ($this->session->flashdata('order_data') != null): ?>

                      <p class="text-white">Pemesanan Anda Sedang Diproses, <a href="<?php echo base_url("Home/list_order") ?>" class="btn btn-primary cicle">Check Transaksi</a></p>
                    <?php endif ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main-wrapper">
      <div class="working-process-area">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="section-title text-center">
                <h2>Our Working Process</h2>
                <p>It won’t be difficult to do laundry now</p>
              </div>
            </div>
          </div>
          <div class="total-work-process d-flex flex-wrap justify-content-around align-items-center">
            <div class="single-work-process">
              <div class="work-icon-box">
                <span class="lnr lnr-funnel"></span>
              </div>
              <h4 class="caption">1. Order</h4>
            </div>
            <div class="work-arrow">
              <img src="<?php echo base_url('assets_home/') ?>img/elements/work-arrow.png" alt="">
            </div>
            <div class="single-work-process">
              <div class="work-icon-box">
                <span class="lnr lnr-layers"></span>
              </div>
              <h4 class="caption">2. Courier Pick Up</h4>
            </div>
            <div class="work-arrow">
              <img src="<?php echo base_url('assets_home/') ?>img/elements/work-arrow.png" alt="">
            </div>
            <div class="single-work-process">
              <div class="work-icon-box">
                <span class="lnr lnr-paw"></span>
              </div>
              <h4 class="caption">3. Laundry in Process</h4>
            </div>
            <div class="work-arrow">
              <img src="<?php echo base_url('assets_home/') ?>img/elements/work-arrow.png" alt="">
            </div>
            <div class="single-work-process">
              <div class="work-icon-box">
                <span class="lnr lnr-smile"></span>
              </div>
              <h4 class="caption">4. Finish</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php $this->load->view('home/footer') ?>
    
