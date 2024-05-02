<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="menu" method="POST" enctype="multipart/form-data">
          @csrf
          <div id="method"></div>
          <input type="hidden" name="old_image" id="old_image">
          <div class="card_body">
            <div class="form_group">
              <label for="nama_menu">Nama Menu</label>
              <input type="text" class="form-control col-sm-5" id="nama_menu" placeholder="Nama Menu" name="nama_menu">
            </div>
            <div class="form-group flex">
              <label for="jenis_id" class="col-sm-4 col-form-label">Nama Jenis</label>
              <div class="col-sm-8">
                <select class="form-select" name="jenis_id" id="jenis_id">
                  <option value="">- Pilih -</option>
                  @foreach ($jenis as $p)
                    <option value="{{ $p->id}}">{{ $p->nama_jenis}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="number" class="form-control col-sm-4" id="harga" placeholder="Harga" name="harga" min="0">
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <img class="img-preview img-fluid" style="max-height: 200px">
              <div class="input-group input-group-outline my-3" style="width: 250px;"> <!-- Sesuaikan lebar dengan kebutuhan Anda -->
                  <input type="file" name="image" id="image" class="form-control">
              </div>
            <div class="form-group">  
              <label for="deskripsi">Deskripsi</label>
              <!-- Menggunakan elemen <textarea> -->
              <textarea class="form-control col-sm-12" id="deskripsi" placeholder="" name="deskripsi" style="height: 150px;"></textarea>
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

