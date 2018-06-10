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
                <th>Cost</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($list_order as $key => $value): ?>
                <tr>
                  <td><?php echo ++$key ?></td>
                  <td><?php echo $value['order_date'] ?></td>
                  <td><?php echo $value['order_address'] ?></td>
                  <td><?php echo $value['order_cost'] ?></td>
                  <td>
                    <?php 
                    switch ($value['order_status']) {
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
                        $var = 'Finish';
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