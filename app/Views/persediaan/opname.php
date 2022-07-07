<div class="container-fluid" id="">
  <div class="content bg-light">
    <div class="row ms-1">
      <div class="col">
        <h2 class="mb-2">Opname Stok</h2>
        
        <form class="mt-4 mb-4" method="POST" id="formDataExp" action="/persediaan/opname">
          <label class=" col-form-label" for="">Cari Berdasarkan ID Obat</label>
          <?php 
              if(session()->getFlashdata('msg') != NULL):       
            ?>
            <div class="col-sm-3 my-1">
              <label class="sr-only" for="hidden">Hidden</label>
              <input type="hidden" class="form-control alert" id="msg" name="msg" placeholder="Message" value="<?= session()->getFlashdata('msg'); ?>">
            </div>
          <?php endif;?>

          <div class="form-row align-items-center">
            <div class="col-sm-3 my-1">
              <label class="sr-only" for="medId">ID</label>
              <input type="text" class="form-control" id="medId" name="medId" placeholder="ID Obat" data-toggle="modal" data-target="#exampleModalCenter" required>
            </div>
            <div class="col-sm-3 my-1">
              <label class="sr-only" for="medName">Nama Obat</label>
              <div class="input-group">
                  <input type="text" class="form-control" id="medName" placeholder="Nama Obat" name="medName">
              </div>
            </div>
            <div class="col-auto my-1">
              <button type="submit" class="btn btn-primary msg" name="submitDataExp">Submit</button>
            </div>
            <div class="col-auto my-1">
              <button type="submit" class="btn btn-danger" id="clearBtn" >Clear</button>
            </div>
          </div>
          <!-- <div class="col-sm-6 my-1 ms-1">
              <input type="checkbox" class="form-check-input" id="filter" name="filter">
              <label class="form-check-label" for="exampleCheck1">Filter Berdasarkan Nama</label>
          </div> -->
        </form>

        <table id="tableData" class="table table-hover">
          <thead>
          <tr>
              <th scope="col">Tanggal</th>
              <th scope="col">Invoice</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Harga</th>
              <th scope="col">In</th>
              <th scope="col">Out</th>
              <th scope="col">Stok</th> 
          </tr>
          </thead>
          <tbody> 
            <?php $index=0; ?>
            <?php foreach ($data as $p) : ?>
              <tr>
                <th scope="row"><?= $p['created_at']; ?></th>
                <td><?= $p['stock_invoice']; ?></td>
                <?php 
                  if(empty($p['item_price'])){
                    $p['item_price']=0;
                  }

                  if($p['stock_type'] == 'P'){  
                    if(empty($harga) && $p['stock_qty'] == 0){
                      echo '<td> Barang didaftarkan </td>';
                      echo '<td> 0 </td>';
                      echo '<td> 0 </td>';
                      echo '<td> 0 </td>';
                    }else{
                      echo '<td> Penyesuaian Stock </td>';
                      if($p['stock_qty'] == '0'){
                        echo '<td> 0 </td>';
                        echo '<td> 0 </td>';
                        echo '<td> 0 </td>';
                      }else{
                        $price=0;
                        foreach($harga as $h){
                          if($p['price_id'] == $h['price_id']){
                            $price = $h['price_amount'];
                            break;
                          }else{
                            $price = 0;
                          }
                        }
                        echo '<td>'. $price .'</td>';
                      }
                      if($p['stock_qty'] > $index){
                        echo '<td>'. $p['stock_qty'] - $index .'</td>';
                        echo '<td> - </td>';
                      }else if ($p['stock_qty'] < $index){
                        echo '<td> - </td>';
                        echo '<td>'. $index - $p['stock_qty'] .'</td>';
                      }
                    }
                    
                  }else if ($p['stock_type'] == 'I'){
                    echo '<td> Pembelian </td>';
                    echo '<td>'. $p['item_price'] .'</td>';
                    echo '<td>' . $p['stock_qty'] - $index . '</td>';
                    echo '<td> - </td>';
                  }else {
                    echo '<td> Penjualan </td>';
                    echo '<td>'. $p['item_price'] .'</td>';
                    echo '<td> - </td>';  
                    echo '<td></td>';
                  }
                ?>
                <td><?= $p['stock_qty']; ?></td> 
              </tr>
              <?php $index = $p['stock_qty']; ?>
            <?php endforeach; ?>
          </tbody>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Daftar Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="table" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID Obat</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Qty</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stock as $p) : ?>
                    <tr data-dismiss="modal">
                        <th scope="row"><?= $p['medicine_id']; ?></th>
                        <td><?= $p['medicine_name']; ?></td>
                        <td><?= $p['stock_qty']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </tfoot>    
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div> 
</div>

<script src="<?= base_url('template/js/persediaan.js'); ?>"></script>

<script>
  $(function() {
    $('#tableData').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
  });
  

</script>

