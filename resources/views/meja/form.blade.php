<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Meja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="jenis">
          @csrf
          <div id="method"></div>
          <div class="card_body">
            <div class="form_group">
              <label for="nomor_meja">Nomor Meja</label>
              <input type="text" class="form-control col-lg-6" id="nomor_meja" placeholder="Nomor Meja" name="nomor_meja">
            </div>
          </div>
          <div class="card_body">
            <div class="form_group">
              <label for="kapasitas">Kapasitas</label>
              <input type="text" class="form-control col-lg-6" id="kapasitas" placeholder="Kapasitas" name="kapasitas">
            </div>
          </div>
          <div class="form-group mt-4">
            <label for="status">Status</label>
            <select class="form-select" aria-label="Default select example" name="status">
              <option value="1">Tersedia</option>
              <option value="2">Penuh</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>