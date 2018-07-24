<?php 

/* order status
1. Ordered belum dijemput
2. Udah dijemput
3. Udah diambil dari tukang jemput
4. Udah dikerjakan (poses pencucian)
5. Udah selesai
6. Udah diambil
*/
 ?>
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
                <h2>LIST ORDER</h2>
                <p>It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving</p>
              </div>
            </div>
          </div>
          <div class="row">
    <table class="table table-striped table-inverse table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Date</th>
                <th>Address</th>
                <th>Perfume</th>
                <th>Typelaundry</th>
                <th>Customers Name</th>
                <th>Weight</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($list_order as $key => $value): ?>
                <tr>
                  <td><?php echo ++$key ?></td>
                  <td><?php echo $value['date'] ?></td>
          <td><?php echo $value['address'] ?></td>
          <td><?php echo $value['perfume'] ?></td>
          <td><?php echo $value['typelaundry'] ?></td>
          <td><?php echo $value['customer_name'] ?></td>
          <td><?php echo $value['weight'] ?></td>
          <td><?php echo $value['harga'] ?></td>
                  <td>
                    <?php 
                    switch ($value['status']) {
                      case 1:
                        $var = 'Finding';
                        break;
                        case 2:
                        $var = 'Driver coming';
                        break;
                        case 3:
                        $var = 'Ordered';
                        break;
                        case 4:
                        $var = 'Process';
                        break;
                        case 5:
                        $var = 'Kirim Barang';
                        break;
                        case 6:
                        $var = 'Taked';
                        break;
                      
                      default:
                        $var = 'Unidentified';
                        break;
                    }
                     ?>
                     <?php echo $var ?>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>

  </div>
        </div>
      </div>
    </div>

<?php $this->load->view('home/footer') ?>
