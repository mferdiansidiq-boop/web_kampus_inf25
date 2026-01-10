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
              <?php echo form_open_multipart('admin/profile/update_sejarah') ?>
               <div class="row">
              <div class="col-md-12">
                <div class="card card-outline card-info">
                  <div class="card-header">
                    <h3 class="card-title">
                      Sejarah Kampus
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <textarea id="summernote" name="sejarah">
                      <?= $setting['sejarah'] ?? '' ?>
                    </textarea>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- ./row -->

            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('admin/setting/logo') ?>"class="btn btn-success btn-flat">Kembali</a>

              <?php echo form_close() ?>

        </div>
    </div>
</div>