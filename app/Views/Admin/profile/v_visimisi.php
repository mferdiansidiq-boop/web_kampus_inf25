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
              <?php echo form_open_multipart('admin/profile/update_visimisi') ?>
            <div class="row">
              <div class="col-md-12">
                <div class="card card-outline card-info">
                  <div class="card-header">
                    <h3 class="card-title">
                      Visi Kampus
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <textarea class="summernote" name="visi">
                      <?= $setting['visi'] ?? '' ?>
                    </textarea>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <!-- /.col-->
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card card-outline card-info">
                  <div class="card-header">
                    <h3 class="card-title">
                      Misi Kampus
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <textarea class="summernote" name="misi">
                      <?= $setting['misi'] ?? '' ?>
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