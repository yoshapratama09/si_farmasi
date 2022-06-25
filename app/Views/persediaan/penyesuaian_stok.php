<div class="container-fluid" id="">
  <div class="row ms-1">
    <div class="col">
      <h2 class="mb-2">Penyesuaian Stock Obat</h2>
      
      <form class="mt-4" method="POST" id="formDataExp" action="/persediaan/getPStock">
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
        <div class="col-sm-6 my-1 ms-1 mb-0">
            <input type="checkbox" class="form-check-input" id="filter" name="filter" value='0'>
            <label class="form-check-label" for="exampleCheck1">Filter Berdasarkan Nama</label>
        </div>
      </form>

      <form action="/persediaan/updateStock" method="POST">
        <div class="row mb-1 mt-3">
          <div class="col-sm-3 form-group" >
              <label class="" for="idPs">ID Penyesuaian</label>
              <div class="input-group">
                  <?php foreach($invoice as $i): ?>
                  <input type="text" class="form-control text-right" id="idPs" placeholder="ID Penyesuaian" name="idPs" value="<?= $i['stock_invoice']+1; ?>" required>
                  <?php break; ?>
                  <?php endforeach; ?>
              </div>
          </div>
        </div>
        
        <table id="tablePS" class="table table-hover">
          <thead>
            <tr>
                <th scope="col">ID Obat</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Qty</th>
                <th scope="col">Qty Baru</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $p) : ?>
                <tr>
                    <th scope="row"><?= $p['medicine_id']; ?></th>
                    <td><?= $p['medicine_name']; ?></td>
                    <td><?= $p['stock_qty']; ?></td>
                    <td>
                      <input type="hidden" class="form-control col-md-3" name="idObat[]" value="<?= $p['medicine_id']; ?>" id="" placeholder="">
                      <input type="hidden" class="form-control col-md-3" name="idStock[]" value="<?= $p['stock_id']; ?>" id="" placeholder="">
                      <input type="number" class="form-control col-md-3" name="qtyBaru[]" id="hargaB" placeholder="Qty Baru">
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </tfoot>
        </table>
        <div class="col-auto my-1 mt-4 me-4 text-right">
          <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
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
  $(function() {
    $('#tablePS').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
  });
</script>