 <div class="container">
  <h3 class="text-center">Type Laundry</h3>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
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
                        $var = 'Wait Our Courier to Respond';
                        break;
                        case 7:
                        $var = 'Courier on the way';
                        break;
                        case 8:
                        $var = 'Barang Telah Di ambil';
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
</div>
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