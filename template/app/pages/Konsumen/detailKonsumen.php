<div class="container">
  <div class="row">
    <div class="col-6">
    <h1>Detail Konsumen</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
    
    </div>
  </div>
  <div class="row">
    <div class="col">
    </div>
  </div> 
    <table class="table table-striped" id="detail-tagihan">
    <thead align="center">
      <tr>
        <th scope="col">No</th>
        <th scope="col">jatuh Tempo</th>
        <th scope="col">No Faktur</th>
        <th scope="col">Tanggal Bayar</th>
        <th scope="col">Harga</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody >

      <tr align="center">
        <th width="5%" scope="col"><?=$no?></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">Rp. </th>
        <th width="15%">
        <a id="btn-bayar" class="btn btn-outline-info  ml-5" href="#">Bayar</a>
        </th>
      </tr>
    </tbody>
  </table>
</div>

<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="konsumenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="konsumenModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
      <form action="" id="form-bayar">
        <!-- kolom id -->
        <input type="text" id="hidden-id" name="id">
        <p> apakah konsumen anda membayar?</p>
      </div>
      <div class="modal-footer">
        <button type="submit" id="submit-bayar" class="btn btn-primary">Tambah Data</button>
      </form>
      </div>
    </div>
  </div>
</div>