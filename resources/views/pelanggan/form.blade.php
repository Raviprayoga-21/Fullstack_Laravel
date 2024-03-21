<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="pelanggan">
          @csrf
          <div id="method"></div>
          <div class="card_body">
            <div class="form_group">
              <label for="nama">Nama Pelanggan</label>
              <input type="text" class="form-control col-lg-6" id="nama_pelanggan" placeholder="Nama Pelanggan" name="nama_pelanggan">
            </div>
            <div class="form-group">
              <label for="alamat">Email</label>
              <input type="text" class="form-control col-lg-6" id="email" placeholder="Email" name="email">
            </div>
            <div class="form-group">
              <label for="no_hp">Nomor Telepon</label>
              <input type="text" class="form-control col-lg-6" id="nomor_telepon" placeholder="Nomor Telepon" name="nomor_telepon">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control col-lg-6" id="alamat" placeholder="alamat" name="alamat">
            </div>
            <div class="form-group">
              <label for="no_hp">Jenis Kelamin</label>
              <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                <option value="1">Laki-laki</option>
                <option value="2">Perempuan</option>
                <option value="3">Memilih untuk tidak memberi tahu</option>
              </select>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>