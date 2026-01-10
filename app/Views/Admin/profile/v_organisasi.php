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
              <?php echo form_open_multipart('admin/profile/update_organisasi') ?>

               
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <div class="form-group">
                        <label class="mt-3">Organisasi Kampus</label>
                        <div>
                        <img type="image" src="<?= base_url('uploads/kampus/'. ($setting['organisasi'] ?? '')) ?>" width="600px">
                        </div>
                        <label> Ganti Organisasi Kampus</label>
                        <input type="file" name="organisasi" class="form-control" accept="image/*">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti organisasi Kampus.</small>
                    </div>
                    
                    </div>
                  </div>    
                </div>         
            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('admin/setting/logo') ?>"class="btn btn-success btn-flat">Kembali</a>

              <?php echo form_close() ?>

        </div>
    </div>
</div>