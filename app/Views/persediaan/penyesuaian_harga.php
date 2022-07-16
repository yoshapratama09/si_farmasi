<div class="container-fluid" id="">
  <div class="row ms-1">
    <div class="col">
      <h2 class="mb-2">Penyesuaian Harga</h2>
      
      <form class="mt-4 mb-4" method="POST" id="formDataExp" action="/persediaan/pHarga">
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
                <input type="text" class="form-control" id="medName" placeholder="Nama Obat" name="medName" data-toggle="modal" data-target="#exampleModalCenter" required>
            </div>
          </div>
          <div class="col-auto my-1">
            <button type="submit" class="btn btn-primary msg" name="submitDataExp">Submit</button>
          </div>
          <div class="col-auto my-1">
            <button type="submit" class="btn btn-danger" id="clearBtn" >Clear</button>
          </div>
        </div>
        <div class="col-sm-6 my-1 ms-1">
            <input type="checkbox" class="form-check-input" id="filter" name="filter">
            <label class="form-check-label" for="exampleCheck1">Filter Berdasarkan Nama</label>
        </div>
      </form>

      <form action="/persediaan/updateHarga" method="POST" >
        <table id="tableData" class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID Obat</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Qty</th>
              <th scope="col">Modal</th>
              <th scope="col">Harga Lama</th>
              <th scope="col">Harga Baru</th>
            </tr>
            </thead>
            <tbody>
              <?php $index = 0; ?>
              <?php foreach ($data as $p) : ?>
                <tr>
                    <th scope="row"><?= $p['medicine_id']; ?></th>
                    <td><?= $p['medicine_name']; ?></td>
                    <td><?= $p['stock_qty']; ?></td>
                    <td>
                      <?php foreach($capital as $c) : ?>
                        <?php if($p['medicine_id'] == $c['medicine_id']) : ?>
                        <?= $c['price_amount']; ?>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </td>
                    <td>
                      <?php foreach($sales as $s) : ?>
                        <?php if($p['medicine_id'] == $s['medicine_id']) : ?>
                        <?= $s['price_amount']; ?>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </td>
                    <td>
                      <!-- <div class="col-sm-3 my-1"> -->
                      <input type="hidden" class="form-control col-md-3" name="idObat[]" value="<?= $p['medicine_id']; ?>" id="" placeholder="">
                      <input type="hidden" class="form-control col-md-3" name="idPrice[]" value="<?= $p['price_id']; ?>" id="" placeholder="">
                      <input type="number" class="form-control col-md-4" name="hargaB[]" id="hargaB" placeholder="Harga Baru">
                      <!-- </div> -->
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </tfoot>
        </table>
        <div class="col-auto my-1 mt-4 me-4 text-right">
          <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
          <!-- <button type="submit" class="btn btn-danger btn-lg">Batal</button> -->
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
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
                <?php foreach ($allData as $p) : ?>
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
  // $(function() {
  //   $('#tableData').DataTable({
  //       "paging": true,
  //       "lengthChange": false,
  //       "searching": false,
  //       "ordering": true,
  //       "info": true,
  //       "autoWidth": false,
  //       "responsive": true,
  //   });

  // });

  for(var i = 1; i < tablePH.rows.length; i++)
  {
    tablePH.rows[i].onclick = function()
    {
      document.getElementById("medId").value = this.cells[0].innerHTML;
      document.getElementById("medName").value = this.cells[1].innerHTML;
      tablePH.rows[i].className.add('table-active');
    };
  }
</script>

<script>
  $('#tableData').ddTableFilter();
</script>