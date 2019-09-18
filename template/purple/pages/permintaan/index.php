<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bell-ring"></i>                 
              </span>
              Permintaan Pesanan
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
              </ol>
            </nav>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <table id="tbl-permintaan" class="table table-striped">
                  <thead class="thead-dark" align="center">
                      <tr>
                        <th>
                          Nama
                        </th>
                        <th>
                          Kontak
                        </th>
                        <th>
                          Pesanan
                        </th>
                        <th>
                          Keterangan
                        </th>
                        <th>
                          Aksi
                        </th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                          Muhammad Ramdhon
                      </td>
                      <td>
                          085863152525
                      </td>
                      <td>
                          nastar, kastangel,nastar, kastangel,nastar, kastangel,nastar, kastangel,nastar, kastangel,nastar, kastangel,nastar, kastangel
                      </td>
                      <td>
                      nastar 1 toples , kastangel 2 toples
                      </td>
                      <td>
                        <button type="button" class="btn btn-outline-success">Terima</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="controls pull-right">
                  <ul id="pagination-permintaan" class="pagination"></ul>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>

<!-- modals -->
<div id="modal-default" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="konsumenModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
          <label for="nama" class="col-sm-2 col-form-label">Pesanan</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="pesanan" id="pesanan" rows="4" readonly style="background-color : #fff"></textarea>
          </div>
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
        <div class="form-group row">
          <label for="harga" class="col-sm-2 col-form-label">Cicilan</label>
          <div class="col-sm-1">
            <select class="form-control" name="cicilan" id="cicilan">
              <?php for($i=1;$i<=52;$i++){
                echo "<option value='$i'>$i</option>";
              } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="submit-permintaan" class="btn btn-primary">Tambah Data</button>
      </div>
    </div>
  </div>
</div>