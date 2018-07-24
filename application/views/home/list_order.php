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
                        $var = '<a href="'.base_url("Home/kirim_barang/".$value['id']).'" class="btn btn-sm btn-primary">Kirim</a>';
                        break;
                        case 6:
                        $var = 'Wait Our Courier to respond';
                        break;
                        case 7:
                        $var = 'Courier on the way';
                        break;
                        case 8:
                        $var = 'Barang telah diambil';
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
