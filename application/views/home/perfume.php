<?php $this->load->view('home/header') ?>
    <div class="main-wrapper">
      <div class="working-process-area">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="section-title text-center">
                <h2>PERFUME</h2>
                <p>It use to scent the clothes</p>
              </div>
            </div>
          </div>
          <div class="row">
    <?php foreach ($perfume as $key => $value): ?>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img class="card-img-top" src="<?php echo base_url("assets/upload/perfume/".$value['perfume_image']); ?>" alt="Card image cap" width="348" height="225">
          <div class="card-body">
          <h5 class="mt-0 mb-1 text-center"><?php echo $value['perfume_name'] ?></h5>
          <p class="lead text-center">Cost Per Kilo <?php echo $value['perfume_costperkilo'] ?></p>
          </div>
        </div>
    </div>
    <?php endforeach ?>
  </div>
  <?php 
        if(isset($links)){
          echo $links;
        } ?>
        </div>
      </div>
    </div>

<?php $this->load->view('home/footer') ?>
