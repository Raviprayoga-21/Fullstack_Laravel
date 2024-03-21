<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pemesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="pemesanan">
          @csrf
          <div id="method"></div>
          <div class="card_body">
            <div class="form_group">
              <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
              <input type="date" class="form-control col-lg-6" id="tanggal_pemesanan" placeholder="Tanggal Pemesanan" name="tanggal_pemesanan">
            </div>
            <div class="form-group">
              <label for="jam_mulai">Jam Mulai</label>
              <input type="time" class="form-control col-lg-6" id="jam_mulai" placeholder="Jam Mulai" name="jam_mulai">
            </div>
            <div class="form-group">
              <label for="jam_selesai">Jam Selesai</label>
              <input type="time" class="form-control col-lg-6" id="jam_selesai" placeholder="Jam Selesai" name="jam_selesai">
            </div>
            <div class="form-group">
              <label for="nama_pemesan">Nama Pemesan</label>
              <input type="text" class="form-control col-lg-6" id="nama_pemesan" placeholder="Nama Pemesan" name="nama_pemesan">
            </div>
            <div class="form-group">
              <label for="jumlah_pelanggan">Jumlah Pelanggan</label>
              <input type="number" class="form-control col-lg-6" id="jumlah_pelanggan" placeholder="Jumlah Pelanggan" name="jumlah_pelanggan">
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