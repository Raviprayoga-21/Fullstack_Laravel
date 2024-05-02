<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Stok</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form method="POST" action="stok" >
                <div id="method"></div>
                  @csrf
                  <div class="form-group row">
                      <label for="menu_id" class="col-sm-4 col-form-label">Menu</label>
                      <div class="col-sm-8">
                          <select class="form-control" name="menu_id" id="menu_id">
                              <option value="">Pilih Menu</option>
                              @foreach ($menu as $p)
                                  <option value="{{ $p->id }}">{{ $p->nama_menu }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah">
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

<div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Jenis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('import-jenis') }}" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jenis">File Excel</label>
                            <input type="file" name="import" id="import" class="form-control-file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>