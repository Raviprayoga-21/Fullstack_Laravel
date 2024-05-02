<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Absensi Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="absensikaryawan">
          @csrf
          <div id="method"></div>
          <div class="card_body">
            <div class="form_group">
              <label for="nama_karyawan">Nama Karyawan</label>
              <input type="text" class="form-control col-lg-6" id="nama_karyawan" placeholder="Nama Karyawan" name="nama_karyawan">
            </div>
            <div class="form-group">
              <label for="tanggal_masuk">Tanggal Masuk</label>
              <input type="date" class="form-control col-lg-6" id="tanggal_masuk" placeholder="Tanggal Masuk" name="tanggal_masuk">
            </div>
            <div class="form-group">
              <label for="waktu_masuk">Waktu Masuk</label>
              <input type="time" class="form-control col-lg-6" id="waktu_masuk" placeholder="Waktu Masuk" name="waktu_masuk" pattern="[0-9]{2}:[0-9]{2}">
            </div>
            <div class="form-group">
              <label for="statuss">Status</label>
              <select class="form-select" aria-label="Default select example" name="statuss">
                <option value="1">Sakit</option>
                <option value="2">Cuti</option>
                <option value="3">Masuk</option>
                <option value="4">Izin</option>
              </select>
            </div>
            <div class="form-group">
              <label for="waktu_keluar">Waktu Kerja Selesai</label>
              <input type="time" class="form-control col-lg-6" id="waktu_keluar" placeholder="Waktu Keluar" name="waktu_keluar" pattern="[0-9]{2}:[0-9]{2}">
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