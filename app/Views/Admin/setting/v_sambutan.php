<div class="col-md-12">
    <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $judul ?></h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php 
              session();
              $validation = \Config\Services::validation();
              ?>
              <?php echo form_open_multipart('admin/setting/update_sambutan') ?>
                 <div class="row">
                    <div class="col-sm-12">
                    <div class="form-group">
                      <label>Nama pimpinan</label>
                      <input type="text" name="nama_pimpinan" value="<?= $setting['nama_pimpinan'] ?? '' ?>" placeholder="Nama Pimpinan" class="form-control <?= isset(session('errors')['nama_pimpinan']) ? 'is-invalid' : '' ?>">
                      <div class="invalid-feedback">
                          <?= session('errors')['nama_pimpinan'] ?? '' ?>
                      </div>
                    </div>
                 </div>
                </div>
               
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <div class="form-group">
                        <label class="mt-3">Foto Pimpinan</label>
                        <div>
                        <img type="image" src="<?= base_url('uploads/foto/'. ($setting['foto_pimpinan'] ?? '')) ?>" width="250px">
                        </div>
                        <label> Ganti Foto Pimpinan</label>
                        <input type="file" name="foto_pimpinan" class="form-control" accept="image/*">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto pimpinan.</small>
                    </div>
                    </div>
                  </div>    
                </div>
                <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <label>Ganti Sambutan Pimpinan</label>
                    <textarea name="sambutan" class="form-control" rows="10"><?= $setting['sambutan'] ?? '' ?></textarea>
                    </div>
                    </div>
                </div>

            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('admin/setting/logo') ?>"class="btn btn-success btn-flat">Kembali</a>

              <?php echo form_close() ?>

        </div>
    </div>
</div>