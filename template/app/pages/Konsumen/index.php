<div class="container">
  <div class="row">
    <div class="col-6">
    <h1>Daftar Konsumen</h1>
    </div>
    <div class="col-6">
      <a href="<?=set_url('Konsumen#tambah');?>" class="btn btn-primary" role="button">Tambah</a> 
    </div>
  </div>
  <div class="row">
    <div class="col">
      
    </div>
  </div>
    <table class="table" id="table-konsumen">
    <thead class="thead-dark" align="center">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Telepon</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody >
      <tr>
        <td width="5%" align="center" scope="col">1</td>
        <td width="20%" scope="col">Muhammad Ramdhon</td>
        <td width="15%"align="center" scope="col">0858</td>
        <td width="30%" scope="col">
          <a class="float-right btn btn-outline-info  ml-5" href="#" >Detail</a>
          <a class="float-right btn btn-outline-secondary ml-5 btn-ubah"  href="#">Ubah</a>
          <a class="float-right btn btn-outline-danger" href="#">Hapus</a>
        </td>
      </tr>
    </tbody>
    
  </table>

  <div class="controls pull-right">
      <ul id="pagination-konsumen" class="pagination"></ul>
  </div>
  
</div>


<!-- Modal -->
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
      <form action="" id="form-konsumen" autocomplete="off">
        <!-- kolom id -->
        <input type="hidden" id="hidden-id" name="id">
        <div id="row-tagihan" class="form-row p-3 mb-2 bg-success text-white">
          <div class="form-group col-md-6 tanggal">
            <label for="jatuhTempo">Jatuh Tempo Pertama</label>
            <input type="text" class="form-control" id="jatuhTempo" name="jatuhTempo">
          </div>
          <div class="form-group col-md-6">
            <label for="jumlah">Jumlah Bayar Per Cicilan</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
        </div>
        <div class="form-group row">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="alamat" name="alamat">
          </div>
        </div>
        <div class="form-group row">
          <label for="telpon" class="col-sm-2 col-form-label">Telpon</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="telpon" name="telpon">
          </div>
        </div>
        <div class="form-group row">
          <label for="harga" class="col-sm-2 col-form-label">Harga</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="harga" name="harga">
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" id="submit-konsumen" class="btn btn-primary">Tambah Data</button>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- modal detail  -->
<div class="modal fade" id="modal-bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document"  >
    <div class="modal-content" style="width:1100px; margin-left:-145px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col">
        <!-- detail text -->
        
          <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Nama</span>
            </div>
              <input type="text" class="form-control" name="detailNama" id="detailNama" readonly value="xxxx">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Alamat</span>
            </div>
            <textarea class="form-control" readonly name="detailAlamat" id="detailAlamat"></textarea>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Telepon</span>
            </div>
              <input type="text" class="form-control" name="detailTelepon" id="detailTelepon" readonly value="xxxx">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Total Biaya</span>
            </div>
              <input type="text" class="form-control" name="detailTotalBiaya" id="detailTotalBiaya" readonly value="Rp. xxxx">
          </div>
          <!-- /detail text -->
        </div>
      </div>
        <form action="" id="form-detail">
        <input type="hidden" id="idBayar" name="idBayar">
        </form>
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
          <tbody>
            <tr align="center">
              <th width="5%" scope="col"></th>
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
      <div class="modal-footer">
        <button type="button" id="close-detail" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>