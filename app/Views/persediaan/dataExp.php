<div class="container-fluid" id="">
  <div class="row ms-1">
    <div class="col">
      <h2 class="mb-2">Data Obat Expired</h2>
      
      <form class="mt-4 mb-4" method="POST" id="formDataExp" action="/persediaan/getDataExp">
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
            <input type="checkbox" class="form-check-input" id="filter" name="filter" value='0'>
            <label class="form-check-label" for="exampleCheck1">Filter Berdasarkan Nama</label>
        </div>
      </form>

      <table id="example2" class="table table-hover">
        <thead>
          <tr>
              <th scope="col">ID Obat</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Kuantitas</th>
              <th scope="col">Expired Date</th>
              <th scope="col">Status</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $p) : ?>
              <tr>
                  <th scope="row"><?= $p['medicine_id']; ?></th>
                  <td><?= $p['medicine_name']; ?></td>
                  <td><?= $p['medicine_stock']; ?></td>
                  <td><?= $p['medicine_exp']; ?></td>
                  <td>
                    <?php 
                      if($p['medicine_exp'] > getdate()){
                        echo "Expired";
                      }else{
                        echo "Active";
                      }
                    ?>
                  </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </tfoot>
      </table>
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
                <?php foreach ($medicine as $p) : ?>
                    <tr data-dismiss="modal">
                        <th scope="row"><?= $p['medicine_id']; ?></th>
                        <td><?= $p['medicine_name']; ?></td>
                        <td><?= $p['medicine_stock']; ?></td>
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