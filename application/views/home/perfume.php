<body>
<main role='main'>
  <div class="container">
  <h1 class="text-center">Kind of Perfume</h1>
  <div class="row">
    <?php foreach ($perfume as $key => $value): ?>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22208%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20208%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_163ea2251f5%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A11pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_163ea2251f5%22%3E%3Crect%20width%3D%22208%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2266.953125%22%20y%3D%22117.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap" width="348" height="225">
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
</main>
