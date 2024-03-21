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
        <form method="POST" action="produktitipan">
          @csrf
          <div id="method"></div>
          <div class="card_body">
            <div class="form_group">
              <label for="nama_produk">Nama Produk</label>
              <input type="text" class="form-control col-lg-6" id="nama_produk" placeholder="Nama Produk" name="nama_produk">
            </div>
            <div class="form-group">
              <label for="nama_supplier">Nama Supplier</label>
              <input type="text" class="form-control col-lg-6" id="nama_supplier" placeholder="Nama Supplier" name="nama_supplier">
            </div>
            <div class="form-group">
              <label for="harga_beli">Harga Beli</label>
              <input type="text" class="form-control col-lg-6" id="harga_beli" placeholder="Harga Beli" name="harga_beli">
            </div>
            <div class="form-group">
              <label for="harga_jual">Harga Jual</label>
              <input type="text" class="form-control col-lg-6" id="harga_jual" placeholder="Harga Jual" name="harga_jual">
            </div>
            <div class="form-group">
              <label for="stok">Stok</label>
              <input type="text" class="form-control col-lg-6" id="stok" placeholder="Stok" name="stok">
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control col-lg-6" id="keterangan" placeholder="Keterangan" name="keterangan">
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