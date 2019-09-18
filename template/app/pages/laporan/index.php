<div class="container">
  <div class="row">
    <div class="col-sm text-center">
      <h3>PELAPORAN</h3>  
    </div>
  </div>
  <div class="row">
    <div class="col-sm text-justify">
      <h5>FILTER</h5>  
    </div>
  </div>
  <div class="row">
    <div class="col-sm text-justify">
      <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
          <i class="fa fa-calendar"></i>
          <span></span> <i class="fa fa-caret-down"></i>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
      <div id="filter" class="dropdown mt-2">
        <button id="btn-filter" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Filter
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#ambil?kategori=BAYAR&hal=1">Bayar</a>
          <a class="dropdown-item" href="#ambil?kategori=BELUM&hal=1">Belum Bayar</a>
        </div>

        <button type="button" id="saveBtn" class="btn btn-primary" data-dismiss="modal">Simpan Perubahan</button>
      </div>
      
      </div>
  </div>
  <div class="row mt-3">
    <div class="col">
    <table class="table table-striped" id="tbl-laporan">
      <thead>
        <tr>
          <th scope="col">Jatuh Tempo</th>
          <th scope="col">Nama</th>
          <th scope="col">Bayar</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>1</th>
          <td>Mark</td>
          <td>Otto</td>
        </tr>
      </tbody>
    </table>
    <div class="controls pull-right">
        <ul id="pagination-laporan" class="pagination"></ul>
    </div>
    </div>
  </div>
  <div class="row">
    <div class="col" id="btn-download">
    <a class="btn btn-secondary btn-sm active" role="button" aria-pressed="true" onclick="printLaporan()">Print</a>
    </div>
  </div>
</div>