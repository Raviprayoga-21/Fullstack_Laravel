<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="kategori">
          @csrf
          <div id="method"></div>
          <div class="card_body">
            <div class="form_group">
              <label for="nama_jenis">Nama Kategori</label>
              <input type="text" class="form-control col-lg-6" id="nama_kategori" placeholder="Nama Kategori" name="nama_kategori">
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