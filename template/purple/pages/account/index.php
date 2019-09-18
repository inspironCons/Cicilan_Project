<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-account"></i>                 
              </span>
              Pengaturan Akun
            </h3>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
            <p class="card-description" style="margin-left: -50px">
            <a class="btn btn-outline-primary ml-5 btn-ubah" href="#tambah">Tambah</a>
            </p>
                <table id="tbl-user" class="table table-striped">
                  <thead class="thead-dark" align="center">
                      <tr>
                        <th>
                          Username
                        </th>
                        <th>
                          Role
                        </th>
                        <th>
                          Terakhir Login
                        </th>
                        <th>
                          Status
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
                          admin
                      </td>
                      <td>
                          22/22/2222 jam:menit:detik
                      </td>
                      <td>
                          Aktif
                      </td>
                      <td>
                        <a class="btn btn-outline-primary ml-5 btn-ubah" href="#">Ubah</a>
                        <a class="btn btn-outline-danger ml-5 btn-ubah" href="#">Hapus</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="controls pull-right">
                  <ul id="pagination-user" class="pagination"></ul>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>

<!-- modals -->
<div id="modal-default" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="konsumenModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form id="form-akun" method="post" action="" autocomplete="off">
    <input type="hidden" id="hidden-id" name="id">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="passwordbase">Password</label>
            <input type="password" class="form-control" id="passwordbase" name="passwordbase" placeholder="Username">
        </div>
        
        <div class="form-group">
            <label for="password">Repasword</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Tulis ulang pasword">
        </div>
        <div id='message' style="width: 100%;margin: 0;text-align: center;"></div>
        <div class="form-group">
            <label for="password">Role</label>
            <select class="form-control" name="role" id="role">
                <option value='administrator'>Administrator</option>
                <option value='support'>admin support</option>
            </select>
        </div>
      <div class="modal-footer">
        <button id="submit-akun" class="btn btn-gradient-primary">Tambah</button>
      </div>
    </form>
    </div>
  </div>
</div>