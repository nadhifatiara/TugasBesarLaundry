    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 font-weight-normal">Laundry Online</h1>
        <p class="lead font-weight-normal">We will help you to do laundry easier.</p>
      </div>
      <div class="product-device box-shadow d-none d-md-block"></div>
      <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
    </div>

    <div class="container">
      <h3 class="text-center">Type Laundry</h3>
      <div class="card-deck mb-3 text-center">
        <?php foreach ($typelaundry as $key => $value): ?>
          <div class="card mb-4 box-shadow">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal"><?php echo $value['typelaundry_name'] ?></h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">Rp. <?php echo $value['typelaundry_costperkilo'] ?> <small class="text-muted">/ kg</small></h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>Selesai ± 5 hari</li>
                <li>Dapat memilih parfum</li>
              </ul>
            </div>
          </div>
        <?php endforeach ?>

      </div>
      <div class="col-md-5 mx-auto">
        <?php echo form_open('home/order'); ?>
        <h3 class="text-center">Order</h3>
        <div class="form-group">
          <label for="">Address</label>
          <input type="text" name="order_address" class="form-control" required="">
        </div>
        <label for="">Harga</label>
        <input type="text" readonly="" name="order_cost" class="form-control text-center" value="5000">
        <button type="submit" class="btn btn-primary mt-2 btn-block">Order</button>
        <?php echo form_close(); ?>
      </div>
    </div>