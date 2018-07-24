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
                <h2>ABOUT</h2>
                <p>It about profile our teamwork</p>
              </div>
            </div>
          </div>
    <div class="row">
      <div class="col-md-6">
        <center>
        <p>TUGAS BESAR LAUNDRY KELOMPOK 6</p>
    <br>
    <P>Andre Prayoga</P>
    <br>
    <p>Nadhifa Tiara Putri</p>
    <br>
    <p>Tholib Subechan</p>
  </center>
      </div>
    </div>
  </div>

      </div>
    </div>

<?php $this->load->view('home/footer') ?>
